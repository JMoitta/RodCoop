<?php

namespace App\Http\Controllers\Admin\Util;

class CooperatorUtil
{
    public static function listNameCooperatorInListCaster($casterListItems) {
        $listName = collect();
        // dd($casterListItems);
        collect($casterListItems)->each(function ($item, $key) use ($listName) {
            if($listName->contains('cooperator', '=', $item->cooperator) == false) {
                $listName->push(['cooperator' => $item->cooperator, 'cooperator_id' => $item->cooperator_id]);
            }
        });
        $listNameCooperator = array();
        foreach($listName as $item){
            $listNameCooperator[intval($item['cooperator_id'])] = $item['cooperator'];
        }
        
        return $listNameCooperator;
    }
}