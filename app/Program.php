<?php

namespace App;

use App\Program;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'program';

    protected $fillable = [
        'agensi_id', 
        'kategori_id',
        'teras_id',
        'status_pelaksanaan',
        'manfaat',
        'tarikh_mula',
        'tarikh_tamat',
        'kekerapan',
        'status_program',
        'nama',
        'objektif',
        'kos',
        'sebab_tidak_aktif',
        'syarat_program',
        'url',
        'logo',
        'rekod_oleh',
        'tarikh_rekod',
        'kemaskini_oleh',
        'tarikh_kemaskini',
    ];


    /**
     * Get the items of the tag
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function program()
    {
        return $this->belongsToMany(Program::class);
    }

    public function path()
    {
        return "/logo/{$this->logo}";
    }
}