<?php

namespace App;

use App\JenisSubKategori;
use Illuminate\Database\Eloquent\Model;

class JenisSubKategori extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'jenis_sub_kategori';

    protected $fillable = [
        'sub_kategori_id',
        'nama_jenis_sub_kategori',
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
    public function jenisSubKategori()
    {
        return $this->belongsToMany(JenisSubKategori::class);
    }
}