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

        return [
            'image' => (string)url('/assets/media/stock/900x600/' . rand(1, 85) . '.jpg'),
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
