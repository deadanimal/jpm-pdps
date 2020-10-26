<?php

namespace App;

use App\ProgramMaster;
use Illuminate\Database\Eloquent\Model;

class ProgramMaster extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'program_master';

    protected $fillable = [
        'id',
        'program_id',
        'sub_kategori_id',
        'jenis_sub_kategori_id',
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
    public function programmaster()
    {
        return $this->belongsToMany(ProgramMaster::class);
    }
}