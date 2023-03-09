<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\FilmCollection;
use App\Http\Resources\FilmResource;
use App\Http\Resources\PersonResource;
use App\Http\Resources\SpeciesResource;
use App\Http\Resources\StarShipResource;
use App\Http\Resources\WookiePersonResource;
use App\Http\Resources\WookieStarShipResource;
use App\Traits\ApiResponse;
use App\Traits\FormatUrl;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    use FormatUrl, ApiResponse;

    public string $url = 'https://swapi.dev/api';
    public string $actualUrl;
    public string $format = '';
    public mixed $searchType = '/people';
    public mixed $relatedType = '/starships/';
    public mixed $personDetails = [];
    public mixed $starShipCollection = [];
    public mixed $filmsCollection = [];
    public mixed $speciesCollection = [];
    public mixed $collection = [];

    public array $queryParams = [
        'format' => '',
        'page' => '',
        'search' => ''
    ];

    /**
     *  App Index
     *
     * Non-Ajax Loads the livewire component that interacts directly with api backend
     * Ajax calls Returns list of persons from API response
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('dashboard.default', []);
    }

    /**
     * List persons
     *
     * Fetch paginated collection of persons
     * convert items into a PersonResourceCollection
     *
     * @queryParam search string allows you to search results by provided param. Example: Darth Maul
     * @queryParam page int allows you to set the current page. Example: 1
     *
     * @group Person API Specification
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function listPeople(Request $request): JsonResponse
    {
        $message = 'Return a collection of persons from Star Wars Galaxy';

        $this->queryParams = [
            'format' => $request->get('format'),
            'page' => $request->get('page'),
            'search' => $request->get('search'),
        ];
        // get the person details
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])
            ->get($this->url . $this->searchType . "?" . http_build_query($this->queryParams));

        if (!$response->successful()) {
            $message = 'Issue contacting Star Wars external API, please try again';
            return $this->error($this->collection, Response::HTTP_INTERNAL_SERVER_ERROR, $message);
        }

        if ($response->successful() && !empty($response->json())) {
            $this->collection = PersonResource::collection($response->json()['results'])->resolve();
        }

        return $this->success($this->collection, Response::HTTP_OK, $message);
    }

    /**
     * Show person
     *
     * Fetch the details of a single PersonResource
     * fetch all StarShipResource related to person
     *
     * @pathParam personId int required The id of the person object. Example: 17
     *
     * @group Person API Specification
     *
     * @param Request $request
     * @param $personId
     * @return JsonResponse
     */
    public function showPeople(Request $request, $personId): JsonResponse
    {

        $this->queryParams = [
            'format' => $request->get('format'),
        ];

        // get the person details by ID & pass queryParams
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])
            ->get($this->url . $this->searchType . '/' . $personId . "?" . http_build_query($this->queryParams));

        // if api response fails, return this
        if (!$response->successful()) {
            $message = 'Issue contacting Star Wars external API, please try again';
            return $this->error($this->collection, Response::HTTP_INTERNAL_SERVER_ERROR, $message);
        }

        // check to see if the format param exists, so that we use the WookiePerson & WookieStarShip resource classes instead
        if ('wookiee' == $this->queryParams['format']) {
            $this->personDetails = WookiePersonResource::make($response)->resolve();
            $message = 'Return output in Wookiee format';

            // we will only perform this action if there are actually starships for requested person
            if (count($response['caorarccacahakc'])) {

                $this->starShipCollection = collect($response['caorarccacahakc'])
                    // iterate each starship provided, get ship details, then convert the incoming payload into a resource
                    ->map(function ($starshipUrl) {

                        // trait removes url string & returns the starship id
                        $starShipId = $this->formatUrl($starshipUrl);

                        // get details on each starship
                        $relatedResponse = Http::withHeaders([
                            'Accept' => 'application/json',
                        ])->get($this->url . $this->relatedType . $starShipId . "?" . http_build_query($this->queryParams));

                        if ($relatedResponse->successful() && !is_null($relatedResponse->json())) {
                            // return the resource that is in WOokie format
                            return WookieStarShipResource::make($relatedResponse->json())->resolve();

                        } else {
                            $message = 'Issue contacting Star Wars external API, please try again';
                            return $this->error($this->collection, Response::HTTP_INTERNAL_SERVER_ERROR, $message);
                        }
                    })
                    // convert starships to array
                    ->toArray();
            }

        } else {

            // this is the default action when no format exists
            // lets make the person payload pretty, by using a Resource Class
            $this->personDetails = PersonResource::make($response)->resolve();
            $message = "Return person details from external API for " . $this->personDetails['name'] . ". Convert API response to a custom PersonResource, we also get the details for each starship and convert it to a StarShipResource, as well as count of films, vehicles, & starships for person. We then merge all the resources together & return a person object that also has the details of each starship";
            if (count($response['starships'])) {
                $this->starShipCollection = collect($response['starships'])
                    ->map(function ($starshipUrl) {
                        $relatedResponse = Http::withHeaders([
                            'Accept' => 'application/json',
                        ])->get((string)$starshipUrl);

                        // return a new starShip resource when endpoint is hit, else return error
                        if ($relatedResponse->successful() && !is_null($relatedResponse->json())) {
                            return StarShipResource::make($relatedResponse->json())->resolve();
                        } else {
                            $message = 'Issue contacting Star Wars external API, please try again';
                            return $this->error($this->collection, Response::HTTP_INTERNAL_SERVER_ERROR, $message);
                        }
                    })
                    // convert starships to array
                    ->toArray();
            }
        }
        // returns PersonResource merged w StarShipResource
        $this->collection = collect($this->personDetails)
            ->merge(['starships' => $this->starShipCollection]);

        return $this->success($this->collection, Response::HTTP_OK, $message);

    }

    /**
     * Person in Wookiee Language
     *
     * Fetch the details of a single PersonResource
     * fetch all StarShipResource related to person
     * return payload in Wookie Language Format
     *
     * @pathParam personId int required The id of the person object. Example: 10
     * @queryParam format string converts response to wookiee format, remove this value to see normal response. Example: wookiee
     *
     * @group Wookie Format API Specification
     *
     * @param Request $request
     * @param $personId
     * @return JsonResponse
     */
    public function showPeopleWookieLanguage(Request $request, $personId): JsonResponse
    {
        $this->searchType = '/people/';

        $this->queryParams = [
            'format' => 'wookiee',
        ];
        $message = 'Return output in Wookiee format';

        // get the person details by ID & pass queryParams
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])
            ->get($this->url . $this->searchType . $personId . "?" . http_build_query($this->queryParams));

        // if api response fails, return this
        if (!$response->successful()) {
            $message = 'Issue contacting Star Wars external API, please try again';
            return $this->error($this->collection, Response::HTTP_INTERNAL_SERVER_ERROR, $message);
        }

        // check to see if the format param exists, so that we use the WookiePerson & WookieStarShip resource classes instead
        if ('wookiee' == $this->queryParams['format']) {
            $this->personDetails = WookiePersonResource::make($response)->resolve();
            // we will only perform this action if there are actually starships for requested person
            if (count($response['caorarccacahakc'])) {
                $this->starShipCollection = collect($response['caorarccacahakc'])
                    // iterate each starship provided, get ship details, then convert the incoming payload into a resource
                    ->map(function ($starshipUrl) {
                        $type = '/starships/';
                        // trait removes url string & returns the starship id
                        $starShipId = $this->formatUrl($starshipUrl);

                        // get details on each starship
                        $relatedResponse = Http::withHeaders([
                            'Accept' => 'application/json',
                        ])->get($this->url . $type . $starShipId . "?" . http_build_query($this->queryParams));

                        if ($relatedResponse->successful() && !is_null($relatedResponse->json())) {
                            // return the resource that is in WOokiee format
                            return WookieStarShipResource::make($relatedResponse->json())->resolve();

                        } else {
                            $message = 'Issue contacting Star Wars external API, please try again';
                            return $this->error($this->collection, Response::HTTP_INTERNAL_SERVER_ERROR, $message);
                        }
                    })
                    // convert starships to array
                    ->toArray();
            }

        }
        // returns PersonResource merged w StarShipResource
        $this->collection = collect($this->personDetails)
            ->merge(['starships' => $this->starShipCollection]);

        return $this->success($this->collection, Response::HTTP_OK, $message);
    }

    /**
     * List Films
     *
     * Fetch paginated collection of films
     * convert items into a FilmsResourceCollection
     *
     * @queryParam search string allows you to search a film. Example: A New Hope
     *
     * @group Film API Specification
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function listFilms(Request $request): JsonResponse
    {
        $message = 'Return a list of all films';
        $this->searchType = '/films/';
        $this->queryParams = [
            'search' => $request->get('search'),
        ];

        // get the person details
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get($this->url . $this->searchType . "?" . http_build_query($this->queryParams));

        if (!$response->successful()) {
            $message = 'Issue contacting Star Wars external API, please try again';
            return $this->error($this->collection, Response::HTTP_INTERNAL_SERVER_ERROR, $message);
        }

        if (count($response['results'])) {
            $this->collection = FilmCollection::make($response['results'])->resolve();
        }

        return $this->success($this->collection, Response::HTTP_OK, $message);
    }


    /**
     * Show a film
     *
     * Get a single film from external API,
     * convert the payload into a FilmResource,
     * fetch all related species and merge w associated film
     *
     * @pathParam filmId int required The id of the film object. Example: 1
     *
     * @group Film API Specification
     *
     * @param Request $request
     * @param $filmId
     * @return JsonResponse
     */
    public function showFilms(Request $request, $filmId): JsonResponse
    {
        $this->searchType = '/films/';
        $this->queryParams = [
            'format' => $request->get('format'),
        ];
        // get the person details
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get($this->url . $this->searchType . $filmId . "?" . http_build_query($this->queryParams));

        if (!$response->successful()) {
            $message = 'Issue contacting Star Wars external API, please try again';
            return $this->error($this->collection, Response::HTTP_INTERNAL_SERVER_ERROR, $message);
        }

        $this->filmsCollection = FilmResource::make($response->json())->resolve();
        $message = 'Return the classification of all species in the Episode # ' . $response['episode_id'] . ' - ' . $response['title'];

        if (count($response['species'])) {
            $this->speciesCollection = collect($response['species'])
                ->map(function ($speciesUrl) {

                    $relatedResponse = Http::withHeaders([
                        'Accept' => 'application/json',
                    ])->get($speciesUrl);

                    if ($relatedResponse->successful() && !is_null($relatedResponse->json())) {
                        return SpeciesResource::make($relatedResponse->json())->resolve();
                    } else {

                        $message = 'Issue contacting Star Wars external API, please try again';
                        return $this->error($this->collection, Response::HTTP_INTERNAL_SERVER_ERROR, $message);
                    }
                })
                // filter out duplicates as some names have same classification name
                //->unique('classification')
                ->toArray();
        }

        // merge the film & species resource
        $this->collection = collect($this->filmsCollection)
            ->merge(['species' => $this->speciesCollection]);

        return $this->success($this->collection, Response::HTTP_OK, $message);
    }

    /**
     * Population API Specification
     *
     * Returns the total population for all planets in galaxy.
     * Function also removes all planets that have an unknown population as we are unable to get a count of those planets
     * Sum the population of all planets that have a population
     *
     * @group Planet API Specification
     *
     * @return array|JsonResponse
     */
    public function galaxyDetails()
    {
        $message = 'We fetch all planets from all pages for StarWars Galaxy, merges all requests, remove unknown populations (not-integer). Sum population of all remaining planets. Return total count of planets that have population';
        $this->searchType = '/planets';
        $type = $this->searchType;

        // perform fetch to all pages at once
        $responses = Http::pool(fn(Pool $pool) => [
            $pool->as(1)->get($this->url . $this->searchType . "?page=1"),
            $pool->as(2)->get($this->url . $this->searchType . "?page=2"),
            $pool->as(3)->get($this->url . $this->searchType . "?page=3"),
            $pool->as(4)->get($this->url . $this->searchType . "?page=4"),
            $pool->as(5)->get($this->url . $this->searchType . "?page=5"),
            $pool->as(6)->get($this->url . $this->searchType . "?page=6"),
        ]);

        // we need to ensure each fetch was successful else we throw error, since we need all planets on all pages
        if (!$responses[1]->ok() || !$responses[2]->ok() || !$responses[3]->ok() || !$responses[4]->ok() || !$responses[5]->ok() || !$responses[6]->ok()) {
            $message = 'Issue contacting Star Wars external API, please try again';
            return $this->error($this->collection, Response::HTTP_INTERNAL_SERVER_ERROR, $message);
        }

        // merge each response into a single collection
        $collection = collect([
            $responses[1]->json()['results'],
            $responses[2]->json()['results'],
            $responses[3]->json()['results'],
            $responses[4]->json()['results'],
            $responses[5]->json()['results'],
            $responses[6]->json()['results'],
        ])
            // flatten the array of planets
            ->flatten(1);

        // reject all planets w population unknown, since this is not an int
        $filteredData = $collection
            ->reject(function ($planet) {
                // reject planets with unknown population, since this is not an Int value
                return $planet['population'] == 'unknown';
            })
            ->map(function ($planetsWithPopulation) {
                // only planets with population value
                return $planetsWithPopulation;
            });

        $this->collection = [
            // sum of population attribute in external APi
            'totalGalacticPopulation' => (int)$filteredData->sum('population'),
            'noOfPlanetsWithWithPopulation' => (int)count($filteredData),
        ];

        return $this->success($this->collection, Response::HTTP_OK, $message);
    }
}
