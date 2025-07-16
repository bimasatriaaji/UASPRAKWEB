@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold text-success">Data Zakat</h3>
        <a href="{{ route('zakats.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Zakat
        </a>
    </div>

    {{-- Form Pencarian --}}
    <form method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari nama muzakki...">
            <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
        </div>
    </form>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tabel Zakat --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-success">
                        <tr>
                            <th>Nama Muzakki</th>
                            <th>Tanggal</th>
                            <th>Jenis Zakat</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($zakats as $zakat)
                        <tr>
                            <td>{{ $zakat->donatur->nama }}</td>
                            <td>{{ \Carbon\Carbon::parse($zakat->tanggal)->format('d M Y') }}</td>
                            <td><span class="badge bg-info">{{ ucfirst($zakat->jenis) }}</span></td>
                            <td class="fw-semibold">Rp {{ number_format($zakat->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $zakat->keterangan ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('zakats.edit', $zakat->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('zakats.destroy', $zakat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus zakat ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data zakat.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
