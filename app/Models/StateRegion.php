<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateRegion extends Model
{
    use HasFactory;

    protected $table = 'state_regions';

    protected $fillable = [
        'id',
        'name',
    ];

    public function household()
    {
        return $this->hasMany('App\Models\Household');
    }
}
