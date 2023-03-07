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
        /**
        "whrascwo": "Lhuorwo Sorroohraanorworc",
        "acwoahrracao": "172",
        "scracc": "77",
        "acraahrc_oaooanoorc": "rhanoowhwa",
        "corahwh_oaooanoorc": "wwraahrc",
        "worowo_oaooanoorc": "rhanhuwo",
        "rhahrcaoac_roworarc": "19BBY",
        "rrwowhwaworc": "scraanwo",
        "acooscwoohoorcanwa": "acaoaoakc://cohraakah.wawoho/raakah/akanrawhwoaoc/1/",
        "wwahanscc": [
        "acaoaoakc://cohraakah.wawoho/raakah/wwahanscc/1/",
        "acaoaoakc://cohraakah.wawoho/raakah/wwahanscc/2/",
        "acaoaoakc://cohraakah.wawoho/raakah/wwahanscc/3/",
        "acaoaoakc://cohraakah.wawoho/raakah/wwahanscc/6/"
        ],
        "cakwooaahwoc": [],
        "howoacahoaanwoc": [
        "acaoaoakc://cohraakah.wawoho/raakah/howoacahoaanwoc/14/",
        "acaoaoakc://cohraakah.wawoho/raakah/howoacahoaanwoc/30/"
        ],
        "caorarccacahakc": [
        "acaoaoakc://cohraakah.wawoho/raakah/caorarccacahakc/12/",
        "acaoaoakc://cohraakah.wawoho/raakah/caorarccacahakc/22/"
        ],
        "oarcworaaowowa": "2014-12-09T13:50:51.644000Z",
        "wowaahaowowa": "2014-12-20T21:17:56.891000Z",
        "hurcan": "acaoaoakc://cohraakah.wawoho/raakah/akwoooakanwo/1/"
         */
        return [
            'requestedFormat' => $request['format'],
            'values' => $this->resource,

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
