<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Product;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('product')->get();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $products = Product::all();
        return view('invoices.create', compact('products'));
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $totalAmount = $product->initial_price * $request->quantity;
        $balance = $totalAmount - $request->payment_amount;

        Invoice::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'payment_amount' => $request->payment_amount,
            'total_amount' => $totalAmount,
            'balance' => $balance,
        ]);

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $products = Product::all();
        return view('invoices.edit', compact('invoice', 'products'));
    }

    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $product = Product::findOrFail($request->product_id);
        $totalAmount = $product->initial_price * $request->quantity;
        $balance = $totalAmount - $request->payment_amount;

        $invoice->update([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'payment_amount' => $request->payment_amount,
            'total_amount' => $totalAmount,
            'balance' => $balance,
        ]);

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }

    public function show($id)
    {
        $invoice = Invoice::with('product')->findOrFail($id);
        return view('invoices.show', compact('invoice'));
    }
}

