<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Household extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'households';
    protected $dates = ['deleted_at'];

    // use string as primary key start
    // protected $primaryKey = 'id';
    protected $casts = [
        'household_id' => 'string',
    ];
    // public $incrementing = false;
    protected $keyType = 'string';

    protected $primaryKey = 'household_id';
    public $incrementing = false;


    // use string as primary key end

    protected $fillable = [
        'household_id',
        'date',
        'house_number',
        'family_head',
        'state_region_id',
        'district_id',
        'township_id',
        'ward_village_tract_id',
        'village_id',
        'user_id',
        'deleted_at',
        // 'street_id',
    ];

    public function state_region()
    {
        return $this->belongsTo(StateRegion::class, 'state_region_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function township()
    {
        return $this->belongsTo(Township::class, 'township_id');
    }

    public function wardvillagetract()
    {
        return $this->belongsTo(WardVillageTract::class, 'ward_village_tract_id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function family()
    {
        return $this->hasMany('App\Models\Family');
    }

}
