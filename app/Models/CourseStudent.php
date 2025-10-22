<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseStudent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['student_id', 'course_id', 'registered_at'];
    protected $casts = [
        'registered_at' => 'datetime',
    ];

    // Relasi ke student
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // Relasi ke course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
