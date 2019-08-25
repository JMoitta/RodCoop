<?php

namespace App\Http\Controllers\Admin\Util;

class CooperatorUtil
{
    public static function listNameCooperatorInListCaster($casterListItems) {
        $listName = collect();
        collect($casterListItems)->each(function ($item, $key) use ($listName) {
            if($listName->contains('cooperator', '=', $item->cooperator) == false) {
                $listName->push(['cooperator' => $item->cooperator]);
            }
        });
        return $listName->sortBy('cooperator')->map(function ($item) {
            return $item['cooperator'];
        });
    }
}