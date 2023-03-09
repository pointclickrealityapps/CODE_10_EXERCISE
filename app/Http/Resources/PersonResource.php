<?php

namespace App\Http\Resources;

use App\Traits\FormatUrl;
use Illuminate\Http\Resources\Json\JsonResource;

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

        $exclude = array(4, 5, 6, 7, 8, 9);
        while (in_array(($randomNumber = rand(1, 29)), $exclude)) ;
        return [
            'format' => $request['format'],
            // format the url string so that we use the internal app endpoints
            'url' => (string)$this->resource['url'],
            'image' => (string)'https://cdn3.iconfinder.com/data/icons/picnic/lightsaber' . $randomNumber . '.png',
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
        ];
    }
}
