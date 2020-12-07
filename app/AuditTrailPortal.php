<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditTrailPortal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'audit_trail_portal';

    protected $fillable = [
        'program_id',
        'ip_address',
        'city',
        'region',
        'country',
        'created_by',
        'updated_by'
    ];
}