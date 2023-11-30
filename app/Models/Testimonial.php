<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_avatar',
        'client_name',
        'client_designation',
        'satisfactory_text',
        'validated_url',
    ];
}
