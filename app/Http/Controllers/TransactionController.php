<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
    return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'activity' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
        ]);
    
        Transaction::create($request->all());
    
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $transaction = Transaction::findOrFail($id);
    return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'activity' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
        ]);
    
        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->all());
    
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
    
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
    public function report(Request $request)
    {
        // Ambil data transaksi dengan filter
    $query = Transaction::query();

    if ($request->has('start_date') && $request->has('end_date')) {
        $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
    }

    if ($request->has('type')) {
        $query->where('type', $request->type);
    }

    $transactions = $query->get();

    // Total pemasukan dan pengeluaran
    $total_income = $transactions->where('type', 'income')->sum('amount');
    $total_expense = $transactions->where('type', 'expense')->sum('amount');

    return view('transactions.report', compact('transactions', 'total_income', 'total_expense'));
    }
}
