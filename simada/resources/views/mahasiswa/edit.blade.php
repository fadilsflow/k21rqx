@extends('layouts.app')

@section('title','Edit Mahasiswa')

@section('content')
<h3 class="mb-4">Edit Mahasiswa</h3>

<div class="card p-4">
    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" class="vstack gap-3">
        @csrf
        @method('PUT')

        <div>
            <label class="form-label">NIM</label>
            <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" class="form-control @error('nim') is-invalid @enderror">
            @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="form-label">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" class="form-control @error('nama') is-invalid @enderror">
            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="form-label">Jurusan</label>
            <input type="text" name="jurusan" value="{{ old('jurusan', $mahasiswa->jurusan) }}" class="form-control @error('jurusan') is-invalid @enderror">
            @error('jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="form-label">Angkatan</label>
            <input type="number" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan) }}" class="form-control @error('angkatan') is-invalid @enderror">
            @error('angkatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-light border">Batal</a>
        </div>
    </form>
</div>
@endsection
