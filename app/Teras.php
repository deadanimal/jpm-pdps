<?php

namespace App;

use App\Teras;
use Illuminate\Database\Eloquent\Model;

class Teras extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'teras';

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
    
    public function media()
    {
        return $this->belongsToMany(Media::class);
    }


    public function path()
    {
        return "/banner/{$this->gambar}";
    }
}