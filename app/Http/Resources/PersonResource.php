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

        return [
            'format' => $request['format'],
            // format the url string so that we use the internal app endpoints
            'url' => (string)$this->resource['url'],
            'image' => (string)url('/assets/media/avatars/300-' . rand(1, 30) . '.jpg'),
            'homeWorldImage' => (string)url('/assets/media/stock/600x400/img-' . rand(1, 80) . '.jpg'),
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
