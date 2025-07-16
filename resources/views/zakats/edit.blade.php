@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-warning">Edit Zakat</h3>
        <a href="{{ route('zakats.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('zakats.update', $zakat->id) }}" method="POST">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Muzakki</label>
                    <select name="donatur_id" class="form-select" required>
                        @foreach($donaturs as $d)
                            @if($d->jenis == 'muzakki')
                                <option value="{{ $d->id }}" {{ $zakat->donatur_id == $d->id ? 'selected' : '' }}>
                                    {{ $d->nama }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Zakat</label>
                    <input type="date" name="tanggal" value="{{ $zakat->tanggal }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Zakat</label>
                    <select name="jenis" class="form-select" required>
                        <option value="fitrah" {{ $zakat->jenis == 'fitrah' ? 'selected' : '' }}>Fitrah</option>
                        <option value="maal" {{ $zakat->jenis == 'maal' ? 'selected' : '' }}>Maal</option>
                        <option value="profesi" {{ $zakat->jenis == 'profesi' ? 'selected' : '' }}>Profesi</option>
                        <option value="lainnya" {{ $zakat->jenis == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah (Rp)</label>
                    <input type="number" name="jumlah" value="{{ $zakat->jumlah }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="2">{{ $zakat->keterangan }}</textarea>
                </div>

                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-save2"></i> Update Zakat
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
