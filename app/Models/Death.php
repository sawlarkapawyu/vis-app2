<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
    use HasFactory;

    protected $table = 'deaths';
    

    protected $fillable = [
        'family_id',
        'complainant',
        'death_date',
        'death_place',
    ];

    // public function family()
    // {
    //     return $this->belongsTo(Family::class);
    // }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
    
    
}
