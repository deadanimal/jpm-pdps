<?php

namespace App;

use App\Negeri;
use Illuminate\Database\Eloquent\Model;

class Negeri extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'negeri';

    protected $fillable = [
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