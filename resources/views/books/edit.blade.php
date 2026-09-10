{{-- File: resources/views/books/edit.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
    <style>
        body { font-family: sans-serif; margin: 40px; max-width: 500px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, select { width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box; }
        .error { color: #b91c1c; font-size: 14px; margin-top: 4px; }
        .btn { margin-top: 20px; padding: 8px 16px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Edit Buku</h1>
    <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar buku</a></p>

    <form action="{{ route('books.update', $book['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $book['title']) }}">
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="writer">writer</label>
        <input type="text" name="writer" id="writer" value="{{ old('writer', $book['writer']) }}">
        @error('writer')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="publisher">publisher</label>
        <input type="text" name="publisher" id="publisher" value="{{ old('publisher', $book['publisher']) }}">
        @error('publisher')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="publication_year">Tahun Terbit</label>
        <input type="number" name="publication_year" id="publication_year" value="{{ old('publication_year', $book['publication_year']) }}">
        @error('publication_year')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="isbn">ISBN (opsional)</label>
        <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book['isbn']) }}">
        @error('isbn')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="stock">stock</label>
        <input type="number" name="stock" id="stock" value="{{ old('stock', $book['stock']) }}">
        @error('stock')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="category_id">Kategori</label>
        <select name="category_id" id="category_id">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category['id'] }}" @selected(old('category_id', $book['category_id']) == $category['id'])>
                    {{ $category['category_name'] }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn">Perbarui</button>
    </form>
</body>
</html>
