<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    // Relasi satu kategori memiliki banyak course
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    // 'slug' untuk route model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

