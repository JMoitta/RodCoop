<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrayingHouse extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'locality', 'saturday', 'sunday', 'address', 'cooperator_craft_id', 'administrative_region_id'
    ];

    public function administrativeRegion()
    {
        return $this->belongsTo(AdministrativeRegion::class);
    }

    public function cooperatorCraft()
    {
        return $this->belongsTo(Cooperator::class);
    }
}
