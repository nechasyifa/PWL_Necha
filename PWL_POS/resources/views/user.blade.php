@extends('layouts.app')

@section('subtitle', 'User')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'User')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <span>Manage User</span>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-2">
                    <a href="{{ url('/user/tambah') }}" class="btn btn-primary">Add User</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>ID Level Pengguna</th>
                            <th>Kode Level</th>
                            <th>Nama Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $d->user_id }}</td>
                                <td>{{ $d->username }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->level_id }}</td>
                                <td>{{ $d->level->level_kode }}</td>
                                <td>{{ $d->level->level_nama }}</td>
                                <td>
                                    <a href="{{ url('/user/ubah/'.$d->user_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ url('/user/hapus/'.$d->user_id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
