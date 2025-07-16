@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="mb-4 text-success fw-bold">
        <i class="bi bi-speedometer2 me-2"></i>Dashboard
    </h3>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-success-subtle">
                <div class="card-body">
                    <h6 class="text-success"><i class="bi bi-person-fill me-1"></i> Jumlah Donatur</h6>
                    <h3 class="fw-bold">{{ $totalDonatur }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-primary-subtle">
                <div class="card-body">
                    <h6 class="text-primary"><i class="bi bi-people-fill me-1"></i> Jumlah Muzakki</h6>
                    <h3 class="fw-bold">{{ $totalMuzakki }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-warning-subtle">
                <div class="card-body">
                    <h6 class="text-warning"><i class="bi bi-cash-stack me-1"></i> Total Donasi</h6>
                    <h4 class="fw-bold">Rp {{ number_format($totalDonasi, 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0 bg-info-subtle">
                <div class="card-body">
                    <h6 class="text-info"><i class="bi bi-wallet2 me-1"></i> Total Zakat</h6>
                    <h4 class="fw-bold">Rp {{ number_format($totalZakat, 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0 bg-secondary-subtle">
                <div class="card-body">
                    <h6 class="text-secondary"><i class="bi bi-clipboard-data me-1"></i> Total Transaksi</h6>
                    <h4 class="fw-bold">{{ $totalTransaksi }} transaksi</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
