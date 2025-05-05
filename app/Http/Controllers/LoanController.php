<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;
use App\Models\Book;
use App\Models\Loan;
use App\Services\BookService;
use App\Services\LoanService;
use App\Http\Controllers\Traits\HandlesExecution;

class LoanController extends Controller
{

    use HandlesExecution;
    protected LoanService $loanService;
    protected BookService $bookService;

    public function __construct(LoanService $loanService, BookService $bookService)
    {
        $this->loanService = $loanService;
        $this->bookService = $bookService;
    }
    public function index(){
        $loans = $this->loanService->all();
        return view('loans.view', compact('loans'));
    }
    public function view(Book $book)
    {
        return view('loans.loan', compact('book'));
    }

    public function edit(Loan $loan)
    {
        $loan->load(['book', 'user']);
        return view('loans.edit', compact('loan'));
    }

    public function store(LoanRequest $request)
    {
        $validated = $request->validated();

        return $this->handleExecution(function () use ($validated) {
            $this->loanService->create($validated);

            $book = $this->bookService->find($validated['book_id']);

            $this->bookService->changeStatusToBorrowed($book);

            return redirect()->route('books.view', $book->id)
                ->with(['success' => 'Livro emprestado com sucesso!']);
        }, 'Livro emprestado com sucesso!');
    }

    public function update(LoanRequest $request, int $id)
    {
        $validated = $request->validated();
        return $this->handleExecution(function () use ($validated, $id) {
            $this->loanService->update($id, $validated);
        }, 'Livro atualizado com sucesso!', 'loans.index');
    }
}
