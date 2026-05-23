<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Threat extends Model
{
    use HasFactory;

    protected $fillable = [
        'alias',
        'type',
        'risk_level',
        'description',
        'cloud_link'
    ];
}