<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Menampilkan daftar User
    public function index()
    {
        $data['dataUser'] = User::all();

        return view('admin.user.index', $data);
    }

    // Menampilkan form tambah User
    public function create()
    {
        return view('admin.user.create');
    }

    // Menyimpan User baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'Penambahan Data User Berhasil!');
    }

    // Menampilkan detail User
    public function show(string $id)
    {
        $data['dataUser'] = User::findOrFail($id);

        return view('admin.user.show', $data);
    }

    // Menampilkan form edit User
    public function edit(string $id)
    {
        $data['dataUser'] = User::findOrFail($id);

        return view('admin.user.edit', $data);
    }

    // Memperbarui data User
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Password hanya diganti jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()
            ->route('users.index')
            ->with('success', 'Perubahan Data User Berhasil!');
    }

    // Menghapus User
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'Data User berhasil dihapus!');
    }
}
