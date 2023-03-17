<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'families';
    protected $dates = ['deleted_at', 'date_of_birth'];


    protected $fillable = [
        'name',
        'date_of_birth',
        'gender',
        'father_name',
        'mother_name',
        'relationship_id',
        'nrc_id',
        'occuption',
        'education',
        'ethnicity_id',
        'nationality_id',
        'religion',
        'remark',
        'house_hold_id',
        'user_id',
        'deleted_at',
    ];
    
    public function household()
    {
        return $this->belongsTo(Household::class, 'house_hold_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function ethnicity()
    {
        return $this->belongsTo(Ehnicity::class, 'ethnicity_id');
    }
    public function nationailty()
    {
        return $this->belongsTo(Nationailty::class, 'nationailty_id');
    }
    public function relationship()
    {
        return $this->belongsTo(Relationship::class, 'relationship_id');
    }

    public function death()
    {
        return $this->hasOne(Death::class);
    }

    // public function death()
    // {
    //     return $this->hasMany(Death::class);
    // }

}
