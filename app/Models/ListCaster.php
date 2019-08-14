<?php

namespace App\Models;

use App\User;
use App\Tenant\TenantModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListCaster extends Model
{
    use SoftDeletes;
    use TenantModels;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['administrative_region_id', 'castor_user_id'];

    public function castorUser(){
        return $this->belongsTo(User::class);
    }
}
