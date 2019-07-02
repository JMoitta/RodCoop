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
    protected $fillable = [
        'locality', 'saturday', 'sunday', 'address', 'cooperator_craft_id', 'administrative_region_id'
    ];

    public function cooperatorCraft()
    {
        return $this->belongsTo(Cooperator::class);
    }
}
