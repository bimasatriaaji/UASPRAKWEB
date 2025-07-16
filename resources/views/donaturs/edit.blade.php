@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-warning">Edit Donatur / Muzakki</h3>
        <a href="{{ route('donaturs.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('donaturs.update', $donatur->id) }}" method="POST">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama', $donatur->nama) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis</label>
                    <select name="jenis" class="form-select" required>
                        <option value="donatur" {{ $donatur->jenis == 'donatur' ? 'selected' : '' }}>Donatur</option>
                        <option value="muzakki" {{ $donatur->jenis == 'muzakki' ? 'selected' : '' }}>Muzakki</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email', $donatur->email) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $donatur->no_hp) }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2">{{ old('alamat', $donatur->alamat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Catatan Tambahan</label>
                    <textarea name="catatan" class="form-control" rows="2">{{ old('catatan', $donatur->catatan) }}</textarea>
                </div>

                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-save2"></i> Update
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
