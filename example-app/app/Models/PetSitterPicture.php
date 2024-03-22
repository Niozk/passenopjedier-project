<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetSitterPicture extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_sitter_id',
        'url',
    ];

    public function petSitter()
    {
        return $this->belongsTo(PetSitter::class);
    }
}
