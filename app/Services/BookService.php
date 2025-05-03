<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
    /**
     * Retorna todos os registros.
     */
    public function all()
    {
        return Book::all();
    }

    /**
     * Cria um novo registro.
     */
    public function create(array $data)
    {
        Book::create($data);
    }

    /**
     * Retorna um registro específico.
     */
    public function find(int|string $id)
    {
        return Book::find($id);
    }

    /**
     * Atualiza um registro.
     */
    public function update(int|string $id, array $data)
    {
        $book = Book::findOrFail($id);
        $book->update($data);
        $book->save();

        return $book;
    }

    /**
     * Remove um registro.
     */
    public function delete(int|string $id)
    {
        return Book::find($id)->delete();
    }
}
