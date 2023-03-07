<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class SpeciesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {

        /*
          "name" => "Human"
  "classification" => "mammal"
  "designation" => "sentient"
  "average_height" => "180"
  "skin_colors" => "caucasian, black, asian, hispanic"
  "hair_colors" => "blonde, brown, black, red"
  "eye_colors" => "brown, blue, green, hazel, grey, amber"
  "average_lifespan" => "120"
  "homeworld" => "https://swapi.dev/api/planets/9/"
  "language" => "Galactic Basic"
  "people" => array:4 [▶]
  "films" => array:6 [▶]
  "created" => "2014-12-10T13:52:11.567000Z"
  "edited" => "2014-12-20T21:36:42.136000Z"
  "url" => "https://swapi.dev/api/species/1/"
         */
        return [
            'classification' => $this->resource['classification'],
            'created' => $this->resource['created'],
            'edited' => $this->resource['edited'],
            'url' => $this->resource['url'],
        ];
    }
}
