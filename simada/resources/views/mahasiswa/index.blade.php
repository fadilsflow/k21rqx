@extends('layouts.app')

@section('title','Daftar Mahasiswa')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="m-0">Daftar Mahasiswa</h3>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah</a>
</div>

<div class="card p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswa as $m)
                    <tr>
                        <td>{{ $m->nim }}</td>
                        <td>{{ $m->nama }}</td>
                        <td>{{ $m->jurusan }}</td>
                        <td>{{ $m->angkatan }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('mahasiswa.show', $m->id) }}" class="btn btn-sm btn-outline-secondary">Detail</a>
                                <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Yakin?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
