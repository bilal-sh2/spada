<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'branch_name_ar',
        'latitude',
        'longitude',
        'image',
        'description',
        'description_ar',
    ];
}
