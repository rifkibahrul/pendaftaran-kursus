@extends('layouts.app')

@section('title', 'Dashboard Student')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Dashboard Student</h1>
        <p class="text-gray-600 mt-2">Selamat datang, {{ auth()->user()->name }}!</p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Total Kursus</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalCourses }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Courses -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-900">Kursus Terbaru Saya</h2>
            <a href="{{ route('student.my-courses') }}" class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">
                Lihat Semua →
            </a>
        </div>

        @if($enrolledCourses->count() > 0)
        <div class="space-y-4">
            @foreach($enrolledCourses as $course)
            <div class="border border-gray-200 rounded-lg p-4 hover:border-indigo-300 transition">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs font-semibold text-indigo-600 bg-indigo-100 px-2 py-1 rounded">
                                {{ $course->category->name }}
                            </span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $course->name }}</h3>
                        <p class="text-sm text-gray-600 mb-2">{{ Str::limit($course->description, 120) }}</p>
                        <div class="flex items-center space-x-4 text-xs text-gray-500">
                            <span>Instruktur: {{ $course->owner->name }}</span>
                            <span>•</span>
                            <span>Terdaftar: {{ \Carbon\Carbon::parse($course->pivot->registered_at)->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('front.details', $course->slug) }}" class="ml-4 text-indigo-600 hover:text-indigo-700 text-sm font-medium whitespace-nowrap">
                        Lihat Detail →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <p class="text-gray-600 mb-4">Anda belum mendaftar kursus apapun</p>
            <a href="{{ route('front.index') }}" class="inline-block px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                Jelajahi Kursus
            </a>
        </div>
        @endif
    </div>
</div>
@endsection