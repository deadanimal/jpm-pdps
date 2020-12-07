<?php

namespace App;

use App\KumpulanSasar;
use Illuminate\Database\Eloquent\Model;

class KumpulanSasar extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'kumpulan_sasar';

    protected $fillable = [
        'id', 
        'nama',
        'value',
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

}