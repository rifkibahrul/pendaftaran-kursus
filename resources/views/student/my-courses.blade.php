@extends('layouts.app')

@section('title', 'Kursus Saya')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Side Content -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Riwayat Pendaftaran Kursus</h1>
        <p class="text-gray-600 mt-2">Total: {{ $enrolledCourses->count() }} kursus</p>
    </div>

    <!-- Main Content -->
    @if($enrolledCourses->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($enrolledCourses as $course)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
            <div class="p-6">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-semibold text-indigo-600 bg-indigo-100 px-2 py-1 rounded">
                        {{ $course->category->name }}
                    </span>
                    <span class="text-xs text-green-600 bg-green-100 px-2 py-1 rounded font-medium">
                        Terdaftar
                    </span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $course->name }}</h3>
                <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ Str::limit($course->description, 120) }}</p>
                <div class="space-y-2 mb-4">
                    <div class="flex items-center text-xs text-gray-500">
                        Instruktur: {{ $course->owner->name }}
                    </div>
                    <div class="flex items-center text-xs text-gray-500">
                        Terdaftar: {{ \Carbon\Carbon::parse($course->pivot->registered_at)->format('d M Y') }}
                    </div>
                </div>
                <a href="{{ route('front.details', $course->slug) }}" class="block w-full text-center bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition font-medium text-sm">
                    Lihat Detail
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-white rounded-lg shadow-md p-12 text-center">
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Kursus</h3>
        <p class="text-gray-600 mb-6">Anda belum mendaftar kursus apapun. Mulai belajar sekarang!</p>
        <a href="{{ route('front.index') }}" class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-medium">
            Jelajahi Kursus
        </a>
    </div>
    @endif
</div>
@endsection