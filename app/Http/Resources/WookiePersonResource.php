<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WookiePersonResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'format' => $request['format'],
            'name' => (string)$this->resource['whrascwo'],//name
            'height' => (int)$this->resource['acwoahrracao'],//height
            'mass' => (int)$this->resource['scracc'],//mass
            'hairColor' => (string)$this->resource['acraahrc_oaooanoorc'],//hairColor
            'skinColor' => (string)$this->resource['corahwh_oaooanoorc'],//skinColor
            'eyeColor' => (string)$this->resource['worowo_oaooanoorc'],//eyeColor
            'birthYear' => (string)$this->resource['rhahrcaoac_roworarc'],//birthYear
            'gender' => (string)$this->resource['rrwowhwaworc'],//gender
            'homeWorld' => (string)$this->resource['acooscwoohoorcanwa'],//homeWorld
            'url' => (string)$this->resource['hurcan'],//url
            'starships' => (array)$this->resource['caorarccacahakc'],//url
        ];
    }
}
