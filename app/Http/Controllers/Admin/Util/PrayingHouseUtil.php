<?php

namespace App\Http\Controllers\Admin\Util;

class PrayingHouseUtil
{
    public static function listLocalityPrayingHouseInListCaster($casterListItems) {
        $listName = collect();
        collect($casterListItems)->each(function ($item, $key) use ($listName) {
            if($listName->contains('praying_house', '=', $item->praying_house) == false) {
                $listName->push(['praying_house' => $item->praying_house]);
            }
        });
        return $listName->sortBy('praying_house')->map(function ($item) {
            return $item['praying_house'];
        });
    }
}