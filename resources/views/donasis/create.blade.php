@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success">Tambah Donasi</h3>
        <a href="{{ route('donasis.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('donasis.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Donatur</label>
                    <select name="donatur_id" class="form-select" required>
                        <option disabled selected>-- Pilih Donatur --</option>
                        @foreach($donaturs as $d)
                            <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Donasi</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis</label>
                    <select name="jenis" class="form-select" required>
                        <option value="tunai">Tunai</option>
                        <option value="transfer">Transfer</option>
                        <option value="barang">Barang</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah (Rp)</label>
                    <input type="number" name="jumlah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="2"></textarea>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Simpan Donasi
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
