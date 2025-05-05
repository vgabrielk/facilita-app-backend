<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * Retorna todos os registros.
     */
    public function all()
    {
        return User::all();
    }
    public function paginate(int $limit = 10)
    {
        return User::paginate($limit);
    }

    /**
     * Cria um novo registro.
     */
    public function create(array $data): void
    {
       User::create($data);
    }

    /**
     * Retorna um registro específico.
     */
    public function find(int|string $id)
    {
        return User::find($id);
    }

    /**
     * Atualiza um registro.
     */
    public function update(int|string $id, array $data)
    {
        User::find($id)->update($data);
    }

    /**
     * Remove um registro.
     */
    public function delete(int|string $id)
    {
        User::find($id)->delete();
    }
}
