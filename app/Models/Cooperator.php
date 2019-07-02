<?php

namespace App\Models;

use App\Tenant\TenantModels;

use App\Models\AdministrativeRegion;
use App\Models\PrayingHouse;
use Illuminate\Database\Eloquent\Model;

class Cooperator extends Model
{
    use TenantModels;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'administrative_region_id'
    ];
    
    public function prayingHouse()
    {
        return $this->hasOne(PrayingHouse::class, 'cooperator_craft_id', 'id');
    }
}
