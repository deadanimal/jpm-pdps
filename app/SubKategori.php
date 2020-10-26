<?php

namespace App;

use App\SubKategori;
use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'sub_kategori';

    protected $fillable = [
        'nama_sub_kategori',
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
    public function subkategori()
    {
        return $this->belongsToMany(SubKategori::class);
    }
}