<?php

namespace App\Http\Controllers\Admin\Util;

class PrayingHouseUtil
{
    public static function listLocalityPrayingHouseInListCaster($casterListItems) {
        $listLocality = collect();
        collect($casterListItems)->each(function ($item, $key) use ($listLocality) {
            if($listLocality->contains('praying_house', '=', $item->praying_house) == false) {
                $listLocality->push(['praying_house' => $item->praying_house,
                    'praying_houses_id' =>$item->praying_houses_id]);
            }
        });
        $listLocalityPraying = array();
        foreach($listLocality as $item){
            $listLocalityPraying[intval($item['praying_houses_id'])] = $item['praying_house'];
        }
        return $listLocalityPraying;
    }
}