@extends('layouts.app')

@section('title','Tambah Mahasiswa')

@section('content')
<h3 class="mb-4">Tambah Mahasiswa</h3>

<div class="card p-4">
    <form action="{{ route('mahasiswa.store') }}" method="POST" class="vstack gap-3">
        @csrf

        <div>
            <label class="form-label">NIM</label>
            <input type="text" name="nim" value="{{ old('nim') }}" class="form-control @error('nim') is-invalid @enderror">
            @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="form-label">Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="form-label">Jurusan</label>
            <input type="text" name="jurusan" value="{{ old('jurusan') }}" class="form-control @error('jurusan') is-invalid @enderror">
            @error('jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="form-label">Angkatan</label>
            <input type="number" name="angkatan" value="{{ old('angkatan') }}" class="form-control @error('angkatan') is-invalid @enderror">
            @error('angkatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-light border">Batal</a>
        </div>
    </form>
</div>
@endsection
