<?php

namespace App;

use App\Manfaat;
use Illuminate\Database\Eloquent\Model;

class Manfaat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'manfaat';

    protected $fillable = [
        'id',
        'nama',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];
}