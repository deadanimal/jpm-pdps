<?php

namespace App;

use App\Manfaat;
use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'audit_trail';

    protected $fillable = [
        'entity_id',
        'proses',
        'ketrangan_proses',
        'ip_address',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];
}