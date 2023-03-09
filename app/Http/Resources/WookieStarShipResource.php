<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WookieStarShipResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'requestedFormat' => $request['format'],
            'name' => (string)$this->resource['whrascwo'],
            'model' => (string)$this->resource['scoowawoan'],
            'manufacturer' => (string)$this->resource['scrawhhuwwraoaaohurcworc'],
            'cost_in_credits' => (int)$this->resource['oaoocao_ahwh_oarcwowaahaoc'],
            'length' => (int)$this->resource['anwowhrraoac'],
            'max_atmosphering_speed' => (int)$this->resource['scrak_raaoscoocakacworcahwhrr_cakwowowa'],
            'crew' => (int)$this->resource['oarcwooh'],
            'passengers' => (int)$this->resource['akraccwowhrrworcc'],
            'cargo_capacity' => (int)$this->resource['oararcrroo_oaraakraoaahaoro'],
            'consumables' => (string)$this->resource['oaoowhchuscrarhanwoc'],
            'hyperdrive_rating' => (double)$this->resource['acroakworcwarcahhowo_rcraaoahwhrr'],
            'starship_class' => (string)$this->resource['caorarccacahak_oaanracc'],
            //'pilots' => [$this->resource['pilots']],
            'created' => (string)$this->resource['oarcworaaowowa'],
            'edited' => (string)$this->resource['wowaahaowowa'],
            'url' => (string)$this->resource['hurcan'],
        ];
    }
}
