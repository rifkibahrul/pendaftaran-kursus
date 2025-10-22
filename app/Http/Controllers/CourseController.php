<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'owner']);
    // }
    public function index()
    {
        $courses = Course::with(['category', 'owner'])
            ->where('owner_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('owner.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('owner.courses.create', compact('categories'));
    }

    public function store(StoreCourseRequest $request)
    {
        $data = $request->validated();
        $data['owner_id'] = Auth::id();
        Course::create($data);
        return redirect()->route('owner.courses.index')->with('success', 'Kursus dibuat');
    }

    public function edit(Course $course)
    {
        $this->authorizeOwnerOf($course);
        $categories = Category::all();
        return view('owner.courses.edit', compact('course', 'categories'));
    }

    public function update(StoreCourseRequest $request, Course $course)
    {
        $this->authorizeOwnerOf($course);
        $course->update($request->validated());
        return redirect()->route('owner.courses.index')->with('success', 'Kursus diperbarui');
    }

    public function destroy(Course $course)
    {
        $this->authorizeOwnerOf($course);
        $course->delete();
        return back()->with('success', 'Kursus dihapus');
    }

    // Cek apakah kursus milik owner yang login
    protected function authorizeOwnerOf(Course $course)
    {
        if ($course->owner_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
    }
}
