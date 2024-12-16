@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Laporan Transaksi</h1>

    <!-- Form Filter -->
    <form method="GET" action="{{ route('transactions.report') }}">
        <div class="row">
            <div class="col-md-3">
                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
            </div>
            <div class="col-md-3">
                <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
            </div>
            <div class="col-md-3">
                <select name="type" class="form-control">
                    <option value="">Pilih Jenis</option>
                    <option value="income" {{ request('type') == 'income' ? 'selected' : '' }}>Pemasukan</option>
                    <option value="expense" {{ request('type') == 'expense' ? 'selected' : '' }}>Pengeluaran</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Tabel Laporan -->
    <div class="mt-4">
        <h3>Total Pemasukan: Rp {{ number_format($total_income, 2, ',', '.') }}</h3>
        <h3>Total Pengeluaran: Rp {{ number_format($total_expense, 2, ',', '.') }}</h3>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Instansi</th>
                    <th>Kegiatan</th>
                    <th>Jenis</th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaction->name }}</td>
                        <td>{{ $transaction->institution }}</td>
                        <td>{{ $transaction->activity }}</td>
                        <td>{{ $transaction->type == 'income' ? 'Pemasukan' : 'Pengeluaran' }}</td>
                        <td>Rp {{ number_format($transaction->amount, 2, ',', '.') }}</td>
                        <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
