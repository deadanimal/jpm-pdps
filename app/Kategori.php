<?php

namespace App;

use App\Kategori;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori',
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
    public function kategori()
    {
        return $this->belongsToMany(Kategori::class);
    }
}