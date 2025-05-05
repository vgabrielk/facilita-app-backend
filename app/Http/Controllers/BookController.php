<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Genre;
use App\Services\BookService;
use App\Http\Controllers\Traits\HandlesExecution;

class BookController extends Controller
{
    use HandlesExecution;
    protected BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function view()
    {
        $genreId = request('genre');
        $books = $this->bookService->filteredByGenre($genreId);
        return view('books.view', compact('books'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('books.create', compact('genres'));
    }

    public function store(BookRequest $request)
    {
        $validated = $request->validated();
        return $this->handleExecution(function () use ($validated) {
            $this->bookService->create($validated);
        }, 'Livro criado com sucesso!','books.view');
    }

    public function edit(int $id)
    {
        $book = $this->bookService->find($id);
        if (!$book) {
            return redirect()->route('books.view')->with('error', 'Livro não encontrado!');
        }

        return view('books.edit', compact('book'));
    }

    public function update(BookRequest $request, int $id)
    {
        $validated = $request->validated();
        return $this->handleExecution(function () use ($validated, $id) {
            $this->bookService->update($id, $validated);
        }, 'Livro atualizado com sucesso!', 'books.view');
    }



    public function destroy(int $id)
    {
        return $this->handleExecution(function () use ($id) {
            $this->bookService->delete($id);
        }, 'Livro deletado com sucesso!', 'books.view');
    }

}
