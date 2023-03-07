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
        /**
         * array:18 [▼ // app/Http/Controllers/HomeController.php:145
         * "whrascwo" => "X-ohahwhrr"
         * "scoowawoan" => "T-65 X-ohahwhrr"
         * "scrawhhuwwraoaaohurcworc" => "Iwhoaoosc Coorcakoorcraaoahoowh"
         * "oaoocao_ahwh_oarcwowaahaoc" => "149999"
         * "anwowhrraoac" => "12.5"
         * "scrak_raaoscoocakacworcahwhrr_cakwowowa" => "1050"
         * "oarcwooh" => "1"
         * "akraccwowhrrworcc" => "0"
         * "oararcrroo_oaraakraoaahaoro" => "110"
         * "oaoowhchuscrarhanwoc" => "1 ohwowoor"
         * "acroakworcwarcahhowo_rcraaoahwhrr" => "1.0"
         * "MGLT" => "100"
         * "caorarccacahak_oaanracc" => "Saorarcwwahrracaoworc"
         * "akahanooaoc" => array:4 [▼
         * 0 => "acaoaoakc://cohraakah.wawoho/raakah/akwoooakanwo/1/"
         * 1 => "acaoaoakc://cohraakah.wawoho/raakah/akwoooakanwo/9/"
         * 2 => "acaoaoakc://cohraakah.wawoho/raakah/akwoooakanwo/18/"
         * 3 => "acaoaoakc://cohraakah.wawoho/raakah/akwoooakanwo/19/"
         * ]
         * "wwahanscc" => array:3 [▼
         * 0 => "acaoaoakc://cohraakah.wawoho/raakah/wwahanscc/1/"
         * 1 => "acaoaoakc://cohraakah.wawoho/raakah/wwahanscc/2/"
         * 2 => "acaoaoakc://cohraakah.wawoho/raakah/wwahanscc/3/"
         * ]
         * "oarcworaaowowa" => "2014-12-12T11:19:05.340000Z"
         * "wowaahaowowa" => "2014-12-20T21:23:49.886000Z"
         * "hurcan" => "acaoaoakc://cohraakah.wawoho/raakah/caorarccacahakc/12/"
         * ]
         */
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
