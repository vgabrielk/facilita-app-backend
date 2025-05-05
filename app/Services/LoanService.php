<?php

namespace App\Services;

use App\Models\Loan;

class LoanService
{
    /**
     * Retorna todos os registros.
     */
    public function all()
    {
        return Loan::all();
    }

    /**
     * Cria um novo registro.
     */
    public function create(array $data)
    {
        $loan = Loan::create($data);
        return $loan;
    }

    /**
     * Retorna um registro específico.
     */
    public function find(int|string $id)
    {
        //
    }

    /**
     * Atualiza um registro.
     */
    public function update(int|string $id, array $data)
    {
        $loan = Loan::findOrFail($id);
        $loan->update($data);
        $loan->save();

        return $loan;
    }
    /**
     * Remove um registro.
     */
    public function delete(int|string $id)
    {
        //
    }
}
