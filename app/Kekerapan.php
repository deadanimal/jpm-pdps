<?php

namespace App;

use App\Kekerapan;
use Illuminate\Database\Eloquent\Model;

class Kekerapan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'kekerapan';

    protected $fillable = [
        'id',
        'nama',
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
    
}