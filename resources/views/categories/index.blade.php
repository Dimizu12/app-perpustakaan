{{-- File: resources/views/categories/index.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Category List</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; margin-top: 16px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        .success { background: #d1fae5; color: #065f46; padding: 10px 14px; border-radius: 4px; margin-top: 16px; }
        .btn { display: inline-block; padding: 6px 14px; background: #2563eb; color: #fff; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Category List</h1>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <p><a href="{{ route('categories.create') }}" class="btn">+ Add Category</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category['id'] }}</td>
                    <td>{{ $category['category_name'] }}</td>
                    <td>{{ $category['description'] ?? '-' }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category['id']) }}">Edit</a>
                        |
                        <form style="display:inline" action="{{ route('categories.destroy', $category['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p><em>Catatan: data di atas masih data dummy (array statis di Controller), belum dari database. Migration &amp; Model Eloquent baru dibuat di Pertemuan 5.</em></p>
</body>
</html>
