@extends('layouts.frontend')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Formulir PPDB Online</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Validasi error --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ppdb.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Keterangan / Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Upload Foto (opsional)</label>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
</div>
@endsection
