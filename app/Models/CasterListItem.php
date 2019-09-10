<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CasterListItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    const SUNDAY = 'Sunday';
    const SATURDAY = 'Saturday';

    protected $fillable = [''];

    protected $dates = [
        'date_caster',
    ];

    public function prayingHouse()
    {
        return $this->belongsTo(PrayingHouse::class);
    }

    public function cooperator()
    {
        return $this->belongsTo(Cooperator::class);
    }
}
