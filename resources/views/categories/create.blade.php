{{-- File: resources/views/categories/create.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Add Category</title>
    <style>
        body { font-family: sans-serif; margin: 40px; max-width: 500px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, textarea { width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box; }
        .error { color: #b91c1c; font-size: 14px; margin-top: 4px; }
        .btn { margin-top: 20px; padding: 8px 16px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Add Category</h1>
    <p><a href="{{ route('categories.index') }}">&larr; Back to category list</a></p>

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
        <button type="submit" class="btn">Save</button>
    </form>
</body>
</html>
