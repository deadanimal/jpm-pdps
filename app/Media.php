<?php

namespace App;

use App\Media;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'media';

    protected $fillable = [
        'program_id',
        'jenis',
        'status',
        'tajuk',
        'keterangan',
        'tarikh_mula',
        'tarikh_tamat',
        'gambar',
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