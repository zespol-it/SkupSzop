<?php

namespace App\Models;

use App\Scopes\PopularCategoryScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'popularity',
    ];

    protected static function booted()
    {
        static::addGlobalScope('category', new PopularCategoryScope());
    }
}
