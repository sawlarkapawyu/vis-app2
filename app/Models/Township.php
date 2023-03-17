<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    use HasFactory;

    protected $table = 'townships';

    protected $fillable = [
        'id',
        'name',
        'district_id',
    ];

    // public function stateregion()
    // {
    //     return $this->belongsTo(StateRegion::class);
    // }

    // public function district()
    // {
    //     return $this->belongsTo(District::class);
    // }

    
}
