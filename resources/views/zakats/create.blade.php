@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-success">Tambah Zakat</h3>
        <a href="{{ route('zakats.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('zakats.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Muzakki</label>
                    <select name="donatur_id" class="form-select" required>
                        <option disabled selected>-- Pilih Muzakki --</option>
                        @foreach($donaturs as $d)
                            @if($d->jenis == 'muzakki')
                                <option value="{{ $d->id }}">{{ $d->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Zakat</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Zakat</label>
                    <select name="jenis" class="form-select" required>
                        <option value="fitrah">Fitrah</option>
                        <option value="maal">Maal</option>
                        <option value="profesi">Profesi</option>
                        <option value="lainnya">Lainnya</option>
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
                    <i class="bi bi-check-circle"></i> Simpan Zakat
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
