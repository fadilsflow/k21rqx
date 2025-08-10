@extends('layouts.app')

@section('title','Detail Mahasiswa')

@section('content')
<h3 class="mb-4">Detail Mahasiswa</h3>

<div class="card p-4">
    <table class="table table-borderless align-middle mb-0">
        <tr>
            <th style="width: 150px;">NIM</th>
            <td>{{ $mahasiswa->nim }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $mahasiswa->nama }}</td>
        </tr>
        <tr>
            <th>Jurusan</th>
            <td>{{ $mahasiswa->jurusan }}</td>
        </tr>
        <tr>
            <th>Angkatan</th>
            <td>{{ $mahasiswa->angkatan }}</td>
        </tr>
        <tr>
            <th>Dibuat</th>
            <td>{{ $mahasiswa->created_at->format('d M Y, H:i') }}</td>
        </tr>
    </table>
</div>

<div class="mt-3 d-flex gap-2">
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-light border">Kembali</a>
    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-outline-primary">Edit</a>
</div>
@endsection
