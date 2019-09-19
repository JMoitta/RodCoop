<?php

namespace App\Models;

use App\Tenant\TenantModels;

use Illuminate\Database\Eloquent\Model;

class PrayingHouse extends Model
{
    use TenantModels;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     
    const SUNDAY = 1;
    const SATURDAY = 1;
    protected $fillable = [
        'locality', 'saturday', 'sunday', 'address', 'cooperator_craft_id', 'administrative_region_id'
    ];

    protected $casts = [
        'sunday' => 'boolean',
        'saturday' => 'boolean',
    ];

    public function cooperatorCraft()
    {
        return $this->belongsTo(Cooperator::class);
    }

    public function setSaturdayAttribute($value)
    {
        $this->attributes['saturday'] = strtolower($value) === 'on' ? 1 : 0;
    }
    
    public function setSundayAttribute($value)
    {
        $this->attributes['sunday'] = strtolower($value) === 'on' ?  1 : 0;
    }
}
