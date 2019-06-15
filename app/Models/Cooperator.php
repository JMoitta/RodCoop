<?php

namespace App\Models;

use App\Models\AdministrativeRegion;
use App\Models\PrayingHouse;
use Illuminate\Database\Eloquent\Model;

class Cooperator extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'administrative_region_id'
    ];
    
    public function administrativeRegion()
    {
        return $this->belongsTo(AdministrativeRegion::class);
    }
    public function prayingHouse()
    {
        return $this->hasOne(PrayingHouse::class, 'cooperator_craft_id', 'id');
    }
}
