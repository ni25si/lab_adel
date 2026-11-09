@extends('layouts.admin.app')

@section('content')
<<<<<<< HEAD
    {{-- START MAIN CONTENT --}}
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('users.index') }}">User</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Edit User
                </li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit User</h1>
                <p class="mb-0">Form untuk mengubah data user.</p>
            </div>

            <div>
                <a href="{{ route('users.index') }}" class="btn btn-primary">
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <form action="{{ route('users.update', $dataUser->id) }}"
                          method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-4">
                            <div class="col-lg-6 col-sm-12">

                                {{-- Nama --}}
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Nama Lengkap
                                    </label>
                                    <input
                                        type="text"
                                        id="name"
                                        class="form-control"
                                        name="name"
                                        value="{{ old('name', $dataUser->name) }}"
                                        required
                                    >
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                        Email
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        class="form-control"
                                        name="email"
                                        value="{{ old('email', $dataUser->email) }}"
                                        required
                                    >
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-lg-6 col-sm-12">

                                {{-- Password Baru --}}
                                <div class="mb-3">
                                    <label for="password" class="form-label">
                                        Password Baru
                                    </label>
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control"
                                        name="password"
                                    >
                                    <small class="text-muted">
                                        Kosongkan jika tidak ingin mengubah password.
                                    </small>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Konfirmasi Password --}}
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">
                                        Konfirmasi Password Baru
                                    </label>
                                    <input
                                        type="password"
                                        id="password_confirmation"
                                        class="form-control"
                                        name="password_confirmation"
                                    >
                                </div>

                            </div>
                        </div>

                        {{-- Buttons --}}
                        <button type="submit" class="btn btn-primary">
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('users.index') }}"
                           class="btn btn-outline-secondary ms-2">
                            Batal
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- END MAIN CONTENT --}}
@endsection
=======
<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
        </ol>
    </nav>
    <h2>Edit User</h2>
    <p class="mb-0">Form untuk memperbarui data user.</p>
</div>

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card card-body border-0 shadow mb-4">
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="password">Password (Kosongkan jika tidak diubah)</label>
                <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Masukkan password baru">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email', $user->email) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Ulangi password baru">
            </div>
        </div>
        <div class="mt-3">
            <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Update</button>
            <a href="{{ route('user.index') }}" class="btn btn-light mt-2">Batal</a>
        </div>
    </form>
</div>
@endsection
>>>>>>> 9bacf7bbeff680a8489dfd9b6dcd19ba2a5a3ff1
