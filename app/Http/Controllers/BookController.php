<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Genre;
use App\Services\BookService;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    protected BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function view()
    {
        $books = $this->bookService->all();
        $genres = Genre::all();
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
        Log::info($validated);

        try {
            $this->bookService->create($validated);
            return redirect()->route('books.view')->with('success', 'Book created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function edit(int $id)
    {
        $book = $this->bookService->find($id);
        if (!$book) {
            return redirect()->route('books.view')->with('error', 'Book not found.');
        }

        return view('books.edit', compact('book'));
    }

    public function update(BookRequest $request, int $id)
    {
        $validated = $request->validated();

        try {
            $this->bookService->update($id, $validated);
            return redirect()->route('books.view')->with('success', 'Book updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->bookService->delete($id);
            return redirect()->route('books.view')->with('success', 'Book deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('books.view')->with('error', 'Error' . $e->getMessage());
        }
    }
}
