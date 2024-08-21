<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::where('deleted', false)->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        return User::create($validatedData);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_number' => 'nullable',
            'password' => 'nullable'
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $user->update($validatedData);

        return $user;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->deleted = true;
        $user->save();

        return response(null, 204);
    }
}
