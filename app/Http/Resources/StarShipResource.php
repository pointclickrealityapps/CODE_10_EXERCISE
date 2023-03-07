<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class StarShipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        /**
         * "name" => "X-wing"
         * "model" => "T-65 X-wing"
         * "manufacturer" => "Incom Corporation"
         * "cost_in_credits" => "149999"
         * "length" => "12.5"
         * "max_atmosphering_speed" => "1050"
         * "crew" => "1"
         * "passengers" => "0"
         * "cargo_capacity" => "110"
         * "consumables" => "1 week"
         * "hyperdrive_rating" => "1.0"
         * "MGLT" => "100"
         * "starship_class" => "Starfighter"
         * "pilots" => array:4 [▶]
         * "films" => array:3 [▶]
         * "created" => "2014-12-12T11:19:05.340000Z"
         * "edited" => "2014-12-20T21:23:49.886000Z"
         * "url" => "https://swapi.dev/api/starships/12/"
         */
        $randomNumber = rand(31,36);
        return [
            'image' => (string) 'https://cdn1.iconfinder.com/data/icons/space-duotone/64/Duotone_Space_ship-' .$randomNumber. '-512.png',
            'name' => (string)$this->resource['name'],
            'model' => (string)$this->resource['model'],
            'manufacturer' => (string)$this->resource['manufacturer'],
            'cost_in_credits' => (int)$this->resource['cost_in_credits'],
            'length' => (int)$this->resource['length'],
            'max_atmosphering_speed' => (int)$this->resource['max_atmosphering_speed'],
            'crew' => (int)$this->resource['crew'],
            'passengers' => (int)$this->resource['passengers'],
            'cargo_capacity' => (int)$this->resource['cargo_capacity'],
            'consumables' => (string)$this->resource['consumables'],
            'hyperdrive_rating' => (double)$this->resource['hyperdrive_rating'],
            'starship_class' => (string)$this->resource['starship_class'],
            //'pilots' => [$this->resource['pilots']],
            'created' => (string)$this->resource['created'],
            'edited' => (string)$this->resource['edited'],
            'url' => (string)$this->resource['url'],
        ];
    }
}
