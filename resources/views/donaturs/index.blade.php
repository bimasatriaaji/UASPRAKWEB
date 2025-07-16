@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success">Data Donatur & Muzakki</h3>
        <a href="{{ route('donaturs.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Donatur
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-success">
                        <tr>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Catatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($donaturs as $d)
                        <tr>
                            <td class="fw-semibold">{{ $d->nama }}</td>
                            <td>
                                <span class="badge bg-{{ $d->jenis == 'donatur' ? 'success' : 'info' }}">
                                    {{ ucfirst($d->jenis) }}
                                </span>
                            </td>
                            <td>{{ $d->email ?? '-' }}</td>
                            <td>{{ $d->no_hp ?? '-' }}</td>
                            <td>{{ $d->alamat ?? '-' }}</td>
                            <td>{{ $d->catatan ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('donaturs.edit', $d->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('donaturs.destroy', $d->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada data donatur/muzakki.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
