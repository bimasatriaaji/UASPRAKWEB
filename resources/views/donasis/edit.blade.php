@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-warning">Edit Donasi</h3>
        <a href="{{ route('donasis.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('donasis.update', $donasi->id) }}" method="POST">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Donatur</label>
                    <select name="donatur_id" class="form-select" required>
                        @foreach($donaturs as $d)
                            <option value="{{ $d->id }}" {{ $donasi->donatur_id == $d->id ? 'selected' : '' }}>
                                {{ $d->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Donasi</label>
                    <input type="date" name="tanggal" value="{{ $donasi->tanggal }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis</label>
                    <select name="jenis" class="form-select" required>
                        <option value="tunai" {{ $donasi->jenis == 'tunai' ? 'selected' : '' }}>Tunai</option>
                        <option value="transfer" {{ $donasi->jenis == 'transfer' ? 'selected' : '' }}>Transfer</option>
                        <option value="barang" {{ $donasi->jenis == 'barang' ? 'selected' : '' }}>Barang</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah (Rp)</label>
                    <input type="number" name="jumlah" value="{{ $donasi->jumlah }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="2">{{ $donasi->keterangan }}</textarea>
                </div>

                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-save2"></i> Update Donasi
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
