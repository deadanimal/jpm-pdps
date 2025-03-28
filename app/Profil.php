<?php

namespace App;

use App\Profil;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'profil';

    protected $fillable = [
        'nama',
        'no_kp',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];


    /**
     * Get the items of the tag
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */

    // public function profil()
    // {
    //     return $this->belongsToMany(Profil::class);
    // }
}