{{-- File: resources/views/categories/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Add Book')

@section('content')
    <h1>Tambah Kategori</h1>
    <p><a href="{{ route('categories.index') }}">&larr; Kembali ke daftar kategori</a></p>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <label for="category_name">Category Name</label>
        <input type="text" name="category_name" id="category_name" value="{{ old('category_name') }}">
        @error('category_name')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="description">Description (opsional)</label>
        <textarea name="description" id="description" rows="4">{{ old('description') }}</textarea>
        @error('description')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn">Simpan</button>
    </form>
@endsection