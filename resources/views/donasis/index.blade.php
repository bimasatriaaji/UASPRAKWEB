@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success">Data Donasi</h3>
        <a href="{{ route('donasis.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Donasi
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
                            <th>Nama Donatur</th>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($donasis as $donasi)
                        <tr>
                            <td>{{ $donasi->donatur->nama }}</td>
                            <td>{{ \Carbon\Carbon::parse($donasi->tanggal)->format('d M Y') }}</td>
                            <td>
                                <span class="badge bg-{{ $donasi->jenis == 'tunai' ? 'primary' : 'info' }}">
                                    {{ ucfirst($donasi->jenis) }}
                                </span>
                            </td>
                            <td class="fw-semibold">Rp {{ number_format($donasi->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $donasi->keterangan ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('donasis.edit', $donasi->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('donasis.destroy', $donasi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus donasi ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data donasi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
