<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WardVillageTract extends Model
{
    use HasFactory;

    protected $table = 'ward_village_tracts';

    protected $fillable = [
        'id',
        'name',
        'township_id',
    ];
}