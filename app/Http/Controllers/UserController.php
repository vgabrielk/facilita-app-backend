<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use App\Models\User;

class UserController extends Controller
{
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

        try {
            $this->userService->create($validated);
            return redirect()->route('users.view')->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function edit(int $id)
    {
        $user = $this->userService->find($id);
        if (!$user) {
            return redirect()->route('users.view')->with('error', 'User not found.');
        }

        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, int $id)
    {
        $validated = $request->validated();

        try {
            $this->userService->update($id, $validated);
            return redirect()->route('users.view')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->userService->delete($id);
            return redirect()->route('users.view')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('users.view')->with('error', 'Error' . $e->getMessage());
        }
    }
}
