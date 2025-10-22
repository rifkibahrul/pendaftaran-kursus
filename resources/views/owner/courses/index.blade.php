@extends('layouts.app')

@section('title', 'Dashboard Owner')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Manage Content -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Kelola Kursus</h1>
            <p class="mt-2 text-gray-600">Manajemen kursus Anda</p>
        </div>
    </div>

    <!-- Courses Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($courses as $course)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
            <div class="p-6">
                <div class="flex items-center mb-3">
                    <span class="text-2xl mr-2">{!! $course->category->icon !!}</span>
                    <span class="text-xs font-semibold text-indigo-600 bg-indigo-100 px-2 py-1 rounded">
                        {{ $course->category->name }}
                    </span>
                </div>

                <h3 class="text-xl font-semibold mb-2">{{ $course->name }}</h3>

                <p class="text-gray-600 mb-4 line-clamp-3">
                    {{ Str::limit($course->description, 120) }}
                </p>

                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm text-gray-500">
                        👥 {{ $course->students->count() }} Peserta
                    </span>
                    <a href="{{ route('front.details', $course->slug) }}"
                        class="text-sm text-blue-600 hover:text-blue-700"
                        target="_blank">
                        Lihat Halaman →
                    </a>
                </div>

                <div class="flex space-x-2">
                    <a href="{{ route('owner.courses.edit', $course) }}"
                        class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-center">
                        Edit
                    </a>
                    <form action="{{ route('owner.courses.destroy', $course) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12 bg-white rounded-lg shadow">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada kursus</h3>
            <p class="mt-2 text-gray-500">Mulai buat kursus pertama Anda</p>
            <a href="{{ route('owner.courses.create') }}"
                class="mt-6 inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                Tambah Kursus
            </a>
        </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $courses->links() }}
    </div>
</div>
@endsection