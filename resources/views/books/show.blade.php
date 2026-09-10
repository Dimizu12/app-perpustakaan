{{-- File: resources/views/books/show.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Book Details</title>
    <style>
        body { font-family: sans-serif; margin: 40px; max-width: 500px; }
        table { border-collapse: collapse; width: 100%; margin-top: 16px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { width: 160px; background: #f3f4f6; }
    </style>
</head>
<body>
    <h1>Book Details</h1>
    <p><a href="{{ route('books.index') }}">&larr; Back to book list</a></p>

    <table>
        <tr>
            <th>Title</th>
            <td>{{ $book['title'] }}</td>
        </tr>
        <tr>
            <th>Writer</th>
            <td>{{ $book['writer'] }}</td>
        </tr>
        <tr>
            <th>Publisher</th>
            <td>{{ $book['publisher'] }}</td>
        </tr>
        <tr>
            <th>Publication Year</th>
            <td>{{ $book['publication_year'] }}</td>
        </tr>
        <tr>
            <th>ISBN</th>
            <td>{{ $book['isbn'] ?? '-' }}</td>
        </tr>
        <tr>
            <th>Stock</th>
            <td>{{ $book['stock'] }}</td>
        </tr>
        <tr>
            <th>Category</th>
            <td>{{ $book['category'] }}</td>
        </tr>
    </table>
</body>
</html>
