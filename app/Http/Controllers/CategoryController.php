<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private array $categories = [
        ['id' => 1, 'category_name' => 'Fiction', 'description' => 'Buku cerita rekaan seperti novel dan kumpulan cerpen.'],
        ['id' => 2, 'category_name' => 'Tech', 'description' => 'Buku seputar Tech, pemrograman, dan ilmu komputer.'],
        ['id' => 3, 'category_name' => 'History', 'description' => 'Buku bertema sejarah dan biografi tokoh.'],
    ];

    public function index()
    {
        $categories = $this->categories;

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('categories.index')
            ->with('success', "Kategori \"{$validated['category_name']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    public function edit(string $id)
    {
        return "CategoryController@edit, id: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "CategoryController@update, id: {$id}";
    }

    public function destroy(string $id)
    {
        return "CategoryController@destroy, id: {$id}";
    }
}
