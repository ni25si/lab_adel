@extends('layouts.admin.app')

<<<<<<< HEAD
        @section('content')
            {{-- START MAIN CONTENT --}}
            <div class="py-4">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">user</a></li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between w-100 flex-wrap">
                    <div class="mb-3 mb-lg-0">
                        <h1 class="h4">Data User</h1>
                        <p class="mb-0">List data seluruh user</p>
                    </div>
                    <div>
                        <a href="{{ route('users.create') }}" class="btn btn-success text-white"><i
                                class="far fa-question-circle me-1"></i>
                            Tambah user</a>
                    </div>
                </div>
            </div>

            <div class="row">
                @if (session('success'))
                    <div class="alert alert-info">
                        {!! session('success') !!}
                    </div>
                @endif
                <div class="col-12 mb-4">
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table-user" class="table table-centered table-nowrap mb-0 rounded">

                                    <thead class="thead-light">
                                        <tr>
                                            <th class="border-0">Nama</th>
                                            <th class="border-0">Email</th>
                                            <th class="border-0 rounded-end">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($dataUser as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    <a href="{{ route('users.edit', $item->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('users.destroy', $item->id) }}" method="POST"
                                                        style="display:inline"
                                                        onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    Belum ada data user.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END MAIN CONTENT --}}
        @endsection
=======
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div>
        <h2>Data User</h2>
        <p class="mb-0">List data seluruh user</p>
    </div>
    <div>
        <a href="{{ route('user.create') }}" class="btn btn-success">Tambah User</a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="border-gray-200">NAME</th>
                <th class="border-gray-200">EMAIL</th>
                <th class="border-gray-200">PASSWORD</th>
                <th class="border-gray-200">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ Str::limit($user->password, 30) }}</td>
                <td>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
>>>>>>> 9bacf7bbeff680a8489dfd9b6dcd19ba2a5a3ff1
