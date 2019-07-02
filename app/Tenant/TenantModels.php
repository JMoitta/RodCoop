<?php

namespace App\Tenant;


use App\Models\AdministrativeRegion;
use Illuminate\Database\Eloquent\Model;

trait TenantModels
{

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new TenantScope());

        static::creating(function (Model $obj) {
            $administrativeRegion = \Tenant::getTenant();
            if($administrativeRegion){
                $obj->administrative_region_id = $administrativeRegion->id;
            }
        });
    }

    public function administrativeRegion(){
        return $this->belongsTo(AdministrativeRegion::class);
    }
}

//Category::all()