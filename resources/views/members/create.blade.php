{{-- File: resources/views/members/create.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Add Member</title>
    <style>
        body { font-family: sans-serif; margin: 40px; max-width: 500px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, select { width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box; }
        .error { color: #b91c1c; font-size: 14px; margin-top: 4px; }
        .btn { margin-top: 20px; padding: 8px 16px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
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
</body>
</html>
