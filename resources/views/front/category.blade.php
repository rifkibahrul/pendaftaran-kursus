@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div>
    halaman kategori {{ $category->name }}
</div>
@endsection