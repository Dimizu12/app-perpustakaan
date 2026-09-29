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

        <label for="status">Kategori</label>
        <select name="status" id="status">
            <option value="">-- Pilih Kategori--</option>
                <option value="active" @selected(old('status') == 'active')> Active </option>
                <option value="non-active" @selected(old('status') == 'non-active')> Non-Active </option>
        </select>
        @error('status')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn">Simpan</button>
    </form>
@endsection