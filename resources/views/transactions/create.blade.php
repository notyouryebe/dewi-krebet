@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Transaksi</h1>
    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
            <label for="institution" class="form-label">Instansi</label>
            <input type="text" name="institution" class="form-control" id="institution" required>
        </div>
        <div class="mb-3">
            <label for="activity" class="form-label">Kegiatan</label>
            <input type="text" name="activity" class="form-control" id="activity" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Jenis Transaksi</label>
            <select name="type" class="form-control" id="type" required>
                <option value="income">Pemasukan</option>
                <option value="expense">Pengeluaran</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Nominal</label>
            <input type="number" name="amount" class="form-control" id="amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
