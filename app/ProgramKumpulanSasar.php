<?php

namespace App;

use App\ProgramKumpulanSasar;
use Illuminate\Database\Eloquent\Model;

class ProgramKumpulanSasar extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'program_kumpulan_sasar';

    protected $fillable = [
        'id', 
        'kumpulan_sasar_id',
        'program_id',
        'rekod_oleh',
        'tarikh_rekod',
        'kemaskini_oleh',
        'tarikh_kemaskini',
    ];

}