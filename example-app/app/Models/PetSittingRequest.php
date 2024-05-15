<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetSittingRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_name',
        'species',
        'breed',
        'age',
        'description',
        'start_date',
        'end_date',
        'hourly_rate',
        'picture',
    ];
}