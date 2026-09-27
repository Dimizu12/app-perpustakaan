{{-- File: resources/views/members/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Add Book')

@section('content')
    <h1>Add Member</h1>
    <p><a href="{{ route('members.index') }}">&larr; back to member list</a></p>

    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <label for="nim">NIM</label>
        <input type="number" name="nim" id="nim" value="{{ old('nim') }}">
        @error('nim')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{ old('email') }}">
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="phone_num">Phone Number</label>
        <input type="number" name="phone_num" id="phone_num" value="{{ old('phone_num') }}">
        @error('phone_num')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="{{ old('address') }}">
        @error('address')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="status">Status</label>
        <input type="text" name="status" id="status" value="{{ old('status') }}">
        @error('status')
            <div class="error">{{ $message }}</div>
        @enderror

        {{-- <label for="category_id">Kategori</label>
        <select name="category_id" id="category_id">
            <option value="">-- Pilih Kategori gayest--</option>
            @foreach ($categories as $category)
                <option value="{{ $category['id'] }}" @selected(old ('category_id') == $category['id'])>
                    {{ $category['category_name'] }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="error">{{ $message }}</div>
        @enderror --}}

        <button type="submit" class="btn">Simpan</button>
    </form>
@endsection