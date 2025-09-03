@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Formulir PPDB</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('ppdb.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="deskripsi">Deskripsi / Keterangan</label>
            <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="foto">Upload Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
</div>
@endsection
