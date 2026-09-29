<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('id')->paginate(10);

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', "Books \"{$validated['title']}\" berhasil ditambahkan.");
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);

        return view('books.show', compact('book'));
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(StoreBookRequest $request, string $id)
    {
        $book = Book::findOrFail($id);
        $validated = $request->validated();

        // $validated = $request->validate([
        //     'title' => 'required|string|max:200',
        //     'writer' => 'required|string|max:100',
        //     'publisher' => 'required|string|max:100',
        //     'publication_year' => 'required|integer|min:1900|max:'.date('Y'),
        //     'isbn' => 'nullable|string|max:20',
        //     'stock' => 'required|integer|min:0',
        //     'category_id' => 'required|integer|exists:categories,id',
        // ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', "Book \"{$validated['title']}\" berhasil diperbarui.");
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book berhasil dihapus.');
    }
}
