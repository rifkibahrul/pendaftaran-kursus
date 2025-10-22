<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    // Halamn utama / landing page
    public function index()
    {
        $courses = Course::with(['category', 'owner'])
            ->withCount('students')     // jumlah murid terdaftar
            ->latest()
            ->paginate(12);

        $categories = Category::withCount('courses')->get();

        return view('front.index', compact('courses', 'categories'));
    }


    public function details(Course $course)
    {
        $course->load(['category', 'owner', 'students']);

        $isEnrolled = false;

        if (Auth::check() && Auth::user()->isStudent()) {
            $isEnrolled = $course->isEnrolledBy(Auth::id());
        }

        return view('front.details', compact('course', 'isEnrolled'));
    }

    public function category(Category $category)
    {
        $courses = Course::with(['category', 'owner'])
            ->where('category_id', $category->id)
            ->latest()
            ->paginate(12);

        $categories = Category::withCount('courses')->get();

        return view('front.category', compact('courses', 'category', 'categories'));
    }
}
