<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'structure',
        'logo',
        'logo_desc',
        'vision',
        'mission',
        'organization_desc',
        'period',
        'active_members',
        'area',
        'alumni_count',
    ];
}
