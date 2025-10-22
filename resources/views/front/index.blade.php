@extends('layouts.app')

@section('title', 'Katalog Kursus')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Hero Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Temukan Kursus Terbaik</h1>
        <p class="text-lg text-gray-600">Tingkatkan skill Anda dengan berbagai kursus berkualitas</p>
    </div>

    <!-- Categories -->
    @if($categories->count() > 0)
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Kategori</h2>
        <div class="flex flex-wrap gap-3">
            @foreach($categories as $category)
            <a href="{{ route('front.category', $category->slug) }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:border-indigo-500 hover:text-indigo-600 transition">
                {{ $category->name }} ({{ $category->courses_count }})
            </a>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Courses Grid -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Semua Kursus</h2>

        @if($courses->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($courses as $course)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-semibold text-indigo-600 bg-indigo-100 px-2 py-1 rounded">
                            {{ $course->category->name }}
                        </span>
                        <span class="text-xs text-gray-500">{{ $course->students_count }} siswa</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $course->name }}</h3>
                    <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ Str::limit($course->description, 100) }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Oleh {{ $course->owner->name }}</span>
                        <a href="{{ route('front.details', $course->slug) }}" class="text-indigo-600 hover:text-indigo-700 font-medium text-sm">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $courses->links() }}
        </div>
        @else
        <div class="text-center py-12 bg-white rounded-lg">
            <p class="text-gray-500">Belum ada kursus tersedia.</p>
        </div>
        @endif
    </div>
</div>
@endsection