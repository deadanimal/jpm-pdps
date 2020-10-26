<?php

namespace App;

use App\Orgdata;
use Illuminate\Database\Eloquent\Model;

class Orgdata extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $table = 'permintaan_data';
    
    protected $fillable = [
    'program_id',
    'agensi_id',
    'status',
    'subjek',
    'created_by',
    'created_at',
    'updated_by',
    'updated_at'];

    /**
     * Get the items of the tag
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function orgdata()
    {
        return $this->belongsToMany(Orgdata::class);
    }
}
