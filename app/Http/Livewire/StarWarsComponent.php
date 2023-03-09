<?php

namespace App\Http\Livewire;

use App\Http\Resources\PersonCollection;
use App\Http\Resources\PersonResource;
use App\Http\Resources\StarShipResource;
use App\Traits\ApiResponse;
use App\Traits\FormatUrl;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class StarWarsComponent extends Component
{
    use FormatUrl, ApiResponse;

    public $search;
    public $page;
    public $records;
    public $nextPageUrl;
    public $previousPageUrl;
    public $pageCount;
    public string $url = 'https://swapi.dev/api/';
    public int $personId;
    public mixed $person;
    public string $format = '';
    public array $queryParams = [];
    public mixed $personDetails = [];
    public mixed $collection = [];
    public mixed $starShipCollection = [];
    public bool $showPersonProfile = false;
    public bool $showFilms = false;
    public string $message = 'Return a list of persons from external API & converts the payload into a custom PersonResourceCollection';
    public string $color = 'info';
    public string $searchType = 'people';
    public string $externalUrl;
    public string $internalUrl;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount($page = null)
    {

        $this->page = $page;
    }

    /* Render function by default returns the livewire component, but we also return the response of the fetch to starwars api
     *
     */
    public function render()
    {
        $this->queryParams = [
            'format' => $this->format,
            'page' => $this->page,
            'search' => $this->search,
        ];

        $this->externalUrl = $this->url . $this->searchType . "?" . http_build_query($this->queryParams);
        // get the person details
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get($this->externalUrl);

        $this->internalUrl = route('person.get', [http_build_query($this->queryParams)]);

        if ($response->successful() && count($response['results'])) {
            // convert the external api response into a PersonResource collection
            $this->records = PersonCollection::make($response['results'])->resolve();

            $this->previousPageUrl = Arr::get($response, 'previous');
            $this->nextPageUrl = Arr::get($response, 'next');
            $this->pageCount = Arr::get($response, 'count');

            $this->collection = $this->records;
            $this->success($this->collection, $response->status(), $response->reason());

        } else {
            $this->error($this->collection, $response->status(), $response->reason());

        }

        return view('livewire.star-wars-component');
    }

    /**
     * Provided a personId we get the details of that person as well any additional requests that need to be made to starships endpoints for that person.
     * @param $personId
     * @return array|void
     */
    public function showPerson($personId)
    {
        $this->showPersonProfile = true;
        $this->showFilms = false;

        $this->queryParams = [
            'format' => $this->format,
        ];

        $this->externalUrl = $this->url . $this->searchType . "?" . http_build_query($this->queryParams);
        $this->internalUrl = route('person.show', [http_build_query($this->queryParams)]);

        // get the payload by ID & pass queryParams
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])
            ->get($this->url . $this->searchType . '/' . $personId . "?" . http_build_query($this->queryParams));

        //dd($response, $this->url . $this->searchType .'/' . $personId . "?" . http_build_query($this->queryParams), $this->url . $this->searchType  . $personId . "?" . http_build_query($this->queryParams));
        // if api response fails, return this
        if (!$response->successful()) {

            $this->error($this->collection, $response->status(), $response->reason());
        }
        // this is the default action when no format exists
        // lets make the person payload pretty, by using a Resource Class
        $this->personDetails = PersonResource::make($response)->resolve();
        $this->message = "Return person details from external API for " . $this->personDetails['name'] . ". Convert API response to a custom PersonResource, we also get the details for each starship and convert it to a StarShipResource, as well as count of films, vehicles, & starships for person. We then merge all the resources together & return a person object that also has the details of each starship";

        // check whether there are starships related to person
        if (count($response['starships'])) {
            $this->starShipCollection = collect($response['starships'])
                ->map(function ($starshipUrl) {
                    $relatedResponse = Http::withHeaders([
                        'Accept' => 'application/json',
                    ])->get($starshipUrl);

                    // return a new starShip resource when endpoint is hit, else return error
                    if ($relatedResponse->successful() && !is_null($relatedResponse->json())) {
                        return StarShipResource::make($relatedResponse->json())->resolve();
                    } else {
                        $this->message = 'Issue contacting Star Wars external API, please try again';
                        $this->error($this->collection, $relatedResponse->status(), $relatedResponse->reason());
                    }
                })
                // convert starships to array
                ->toArray();
        }

        // returns PersonResource merged w StarShipResource
        $this->collection = collect($this->personDetails)
            ->merge(['starships' => $this->starShipCollection]);

        $this->personId = $personId;
        $this->person = $this->collection;

        $this->success($this->collection, $response->status(), $response->reason());
    }

    /**
     * Reset Component To Default State
     * @return void
     */
    public function goBack()
    {
        $this->showPersonProfile = false;
        $this->searchType = 'people';
        //$this->emit('refreshComponent');
    }

    /**
     * Set pageId dynamically for pagination
     * @param $pageId
     * @return void
     */
    public function setPage($pageId)
    {
        $this->page = $pageId;
    }
}
