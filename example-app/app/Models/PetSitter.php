<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetSitter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'hourly_rate',
    ];

    public function pictures()
    {
        return $this->hasMany(PetSitterPicture::class);
    }
}
