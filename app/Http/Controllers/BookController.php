<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private array $categories = [
        ['id' => 1, 'category_name' => 'Fiction'],
        ['id' => 2, 'category_name' => 'Tech'],
        ['id' => 3, 'category_name' => 'History'],
    ];

    private array $books = [
        ['id' => 1, 'title' => 'Laskar Pelangi', 'writer' => 'Andrea Hirata', 'publisher' => 'Bentang Pustaka', 'publication_year' => 2005, 'isbn' => '9789793062792', 'stock' => 5, 'category_id' => 1, 'category' => 'Fiction'],
        ['id' => 2, 'title' => 'Bumi Manusia', 'writer' => 'Pramoedya Ananta Toer', 'publisher' => 'Hasta Mitra', 'publication_year' => 1980, 'isbn' => '9789794330746', 'stock' => 3, 'category_id' => 1, 'category' => 'Fiction'],
        ['id' => 3, 'title' => 'Clean Code', 'writer' => 'Robert C. Martin', 'publisher' => 'Prentice Hall', 'publication_year' => 2008, 'isbn' => '9780132350884', 'stock' => 7, 'category_id' => 2, 'category' => 'Tech'],
    ];

    public function index()
    {
        $books = $this->books;

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = $this->categories;

        return view('books.create', compact('categories'));
    }

    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('books.index')
            ->with('success', "Buku \"{$validated['title']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    public function show(string $id)
    {
        $book = collect($this->books)->firstWhere('id', (int) $id);

        abort_if(! $book, 404);

        return view('books.show', compact('book'));
    }

    public function edit(string $id)
    {
        $book = collect($this->books)->firstWhere('id', (int) $id);

        abort_if(! $book, 404);

        $categories = $this->categories;

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'writer' => 'required|string|max:100',
            'publisher' => 'required|string|max:100',
            'publication_year' => 'required|integer|min:1900|max:'.date('Y'),
            'isbn' => 'nullable|string|max:20',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|integer',
        ]);

        return redirect()->route('books.index')
            ->with('success', "Buku \"{$validated['title']}\" berhasil diperbarui (data dummy, belum tersimpan ke database).");
    }

    public function destroy(string $id)
    {
        return redirect()->route('books.index')
            ->with('success', "Buku dengan id {$id} berhasil dihapus (data dummy, belum tersimpan ke database).");
    }
}
