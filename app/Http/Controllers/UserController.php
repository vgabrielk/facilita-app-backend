<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\HandlesExecution;
use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    use HandlesExecution;

    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function view()
    {
        $users = $this->userService->all();
        return view('users.view', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        return $this->handleExecution(
            function () use ($validated) {
                $this->userService->create($validated);
            },
            'Usuário criado com sucesso!',
            'users.view'
        );
    }

    public function edit(int $id)
    {
        $user = $this->userService->find($id);
        if (!$user) {
            return redirect()->route('users.view')->with('error', 'Usuário não encontrado!');
        }

        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, int $id)
    {
        $validated = $request->validated();

        return $this->handleExecution(
            function () use ($id, $validated) {
                $this->userService->update($id, $validated);
            },
            'Usuário atualizado com sucesso!',
            'users.view'
        );
    }

    public function destroy(int $id)
    {
        return $this->handleExecution(
            function () use ($id) {
                $this->userService->delete($id);
            },
            'Usuário deletado com sucesso!',
            'users.view'
        );
    }
}
