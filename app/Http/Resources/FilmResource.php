<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {

        $randomNumber = rand(1,35);
        return [
            'format' => $request['format'],
            'image' => 'https://cdn2.iconfinder.com/data/icons/space-filled-outline-6/128/Space_-_Filled_Outline_-_38-' . $randomNumber . '-512.png',
            'title' => (string)$this->resource['title'],
            'episodeId' => (int)$this->resource['episode_id'],
            'opening_crawl' => (string)$this->resource['opening_crawl'],
            'director' => (string)$this->resource['director'],
            'producer' => (string)$this->resource['producer'],
            'release_date' => (string)$this->resource['release_date'],
            //'pilots' => [$this->resource['pilots']],
            'created' => (string)$this->resource['created'],
            'edited' => (string)$this->resource['edited'],
            'url' => (string)$this->resource['url'],
            'totalSpeciesCount' => (int)count($this->resource['species']),
            //'species' => (array) $this->resource['species'],
        ];
    }
}
