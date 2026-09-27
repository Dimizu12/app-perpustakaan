{{-- File: resources/views/books/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Add Book')

@section('content')
    <h1>Tambah Buku</h1>
    <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar buku</a></p>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <label for="title">title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}"> <br />
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="writer">writer</label>
        <input type="text" name="writer" id="writer" value="{{ old('writer') }}"> <br />
        @error('writer')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="publisher">publisher</label>
        <input type="text" name="publisher" id="publisher" value="{{ old('publisher') }}"> <br />
        @error('publisher')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="publication_year">Tahun Terbit</label>
        <input type="number" name="publication_year" id="publication_year" value="{{ old('publication_year') }}">
        @error('publication_year')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="isbn">ISBN (opsional)</label>
        <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}">
        @error('isbn')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="stock">stock</label>
        <input type="number" name="stock" id="stock" value="{{ old('stock', 1) }}">
        @error('stock')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="category_id">Kategori</label>
        <select name="category_id" id="category_id">
            <option value="">-- Pilih Kategori gayest--</option>
            @foreach ($categories as $category)
                <option value="{{ $category['id'] }}" @selected(old('category_id') == $category['id'])>
                    {{ $category['category_name'] }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn">Simpan</button>
    </form>
@endsection