<?php

namespace App;

use App\Agensi;
use Illuminate\Database\Eloquent\Model;

class Agensi extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'agensi';

    protected $fillable = [
        'negeri_id',
        'kementerian_id',
        'nama',
        'alamat',
        'no_telepon',
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
    public function agensi()
    {
        return $this->belongsToMany(Agensi::class);
    }
}