@extends('layouts.app')

@section('title', $course->name)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Content -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="mb-4">
                    <a href="{{ route('front.category', $course->category->slug) }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">
                        {{ $course->category->name }}
                    </a>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $course->name }}</h1>
                <div class="flex items-center space-x-4 text-sm text-gray-600 mb-6">
                    <span>Oleh {{ $course->owner->name }}</span>
                    <span>•</span>
                    <span>{{ $course->students->count() }} siswa terdaftar</span>
                </div>
                <div class="prose max-w-none">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Deskripsi Kursus</h3>
                    <p class="text-gray-700 whitespace-pre-line">{{ $course->description }}</p>
                </div>
            </div>
        </div>

        <!-- Right Content -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-8">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Informasi Kursus</h3>
                <div class="space-y-3 mb-6">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Instruktur</span>
                        <span class="font-medium">{{ $course->owner->name }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Kategori</span>
                        <span class="font-medium">{{ $course->category->name }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Total Siswa</span>
                        <span class="font-medium">{{ $course->students->count() }}</span>
                    </div>
                </div>

                <!-- Validation -->
                @auth
                @if(auth()->user()->isStudent())
                @if($isEnrolled)
                <div class="bg-green-50 border border-green-200 rounded-lg p-4 text-center">
                    <svg class="w-12 h-12 text-green-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-green-700 font-medium">Anda sudah terdaftar</p>
                </div>
                @else
                <form action="{{ route('student.enroll', $course->slug) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-indigo-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-indigo-700 transition">
                        Daftar Sekarang
                    </button>
                </form>
                @endif
                @else
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-center">
                    <p class="text-gray-600 text-sm">Hanya student yang dapat mendaftar kursus</p>
                </div>
                @endif
                @else
                <a href="{{ route('login') }}" class="block w-full bg-indigo-600 text-white text-center py-3 px-4 rounded-lg font-medium hover:bg-indigo-700 transition">
                    Login untuk Mendaftar
                </a>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection