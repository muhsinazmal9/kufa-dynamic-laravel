<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail_image',
        'category_id',
        'description'
    ];


    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'category_id');
    }
}
