<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_name',
        'image_name',
        'image_data',
        'created_at',
    ];

    protected $dates = ['created_at'];
}