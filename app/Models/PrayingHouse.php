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
        'locality', 'saturday', 'saturdayHours', 'sunday', 'sundayHours', 'address', 'cooperator_craft_id', 'administrative_region_id'
    ];
}
