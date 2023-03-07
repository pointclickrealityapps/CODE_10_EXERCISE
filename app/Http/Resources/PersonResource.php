<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\FormatUrl;
class PersonResource extends JsonResource
{
    use FormatUrl;
    protected string $formattedUrl;
    /**
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        $randomNumber = random_int(7,30);
        return [
            // format the url string so that we use the internal app endpoints
            'url' => (string) $this->resource['url'],
            'image' => (string) 'https://cdn3.iconfinder.com/data/icons/picnic/lightsaber'.$randomNumber.'.png',
            'name' => (string)$this->resource['name'],
            'height' => (int)$this->resource['height'],
            'mass' => (int)$this->resource['mass'],
            'hairColor' => (string)$this->resource['hair_color'],
            'skinColor' => (string)$this->resource['skin_color'],
            'eyeColor' => (string)$this->resource['eye_color'],
            'birthYear' => (string)$this->resource['birth_year'],
            'gender' => (string)$this->resource['gender'],
            'homeWorld' => (string)$this->resource['homeworld'],
            'createdOn' => (string)$this->resource['created'],
            'editedOn' => (string)$this->resource['edited'],
            'noOfFilms' => (int) count($this->resource['films']),
            'noOfStarShips' => (int)count($this->resource['starships']),
            'noOfVehicles' => (int)count($this->resource['vehicles']),
            //'starships' => (array)$this->resource['starships'],
            //'ships' => StarShipResource::collection($this->resource['starships']),
        ];
    }
}
