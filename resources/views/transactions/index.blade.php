@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Transaksi</h1>
    <a href="{{ route('transactions.create') }}" class="btn btn-success mb-3">Tambah Transaksi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Instansi</th>
                <th>Kegiatan</th>
                <th>Jenis</th>
                <th>Nominal</th>
                <th>Aksi</th>
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
                    <td>
                        <!-- Tombol Edit dan Delete (jika diperlukan) -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
