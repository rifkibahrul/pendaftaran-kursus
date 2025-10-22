<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseStudentController extends Controller
{
    // Dashboard student
    public function dashboard()
    {
        $enrolledCourses = Auth::user()
            ->enrolledCourses()
            ->with(['category', 'owner'])
            ->withPivot('registered_at')
            ->latest('course_students.registered_at')
            ->limit(6)
            ->get();

        $totalCourses = Auth::user()->enrolledCourses()->count();

        return view('student.dashboard', compact('enrolledCourses', 'totalCourses'));
    }

    // Fungsi untuk mendaftar ke kursus
    public function enroll(Course $course)
    {
        $userId = Auth::id();

        // Cek apakah sudah terdaftar
        if ($course->isEnrolledBy($userId)) {
            return redirect()->back()
                ->with('error', 'Anda sudah terdaftar di kursus ini');
        }

        // Daftarkan student
        CourseStudent::create([
            'student_id' => $userId,
            'course_id' => $course->id,
            'registered_at' => now(),
        ]);

        return redirect()->route('student.my-courses')
            ->with('success', 'Berhasil mendaftar kursus!');
    }

    // Menampilkan daftar kursus yang diikuti oleh student
    public function myCourses()
    {
        $enrolledCourses = Auth::user()
            ->enrolledCourses()
            ->with(['category', 'owner'])
            ->latest('course_students.registered_at')
            ->paginate(10);

        return view('student.my-courses', compact('enrolledCourses'));
    }
}
