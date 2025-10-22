<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
        'owner_id',
    ];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke user (owner)
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // Relasi ke student (many-to-many)
    public function students()
    {
        return $this->belongsToMany(User::class, 'course_students', 'course_id', 'student_id')
            ->withPivot('registered_at')
            ->withTimestamps();
    }

    // 'slug' untuk  URL
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Cek apakah user tertentu sudah terdaftar pada kursus
    public function isEnrolledBy($userId)
    {
        return $this->students()->where('student_id', $userId)->exists();
    }
}
