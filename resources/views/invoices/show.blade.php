
@extends('layouts.invoice_app')

@section('content')
<div class="container">
    <h1>Invoice Details</h1>
    <div class="card">
        <div class="card-header">
            Invoice #{{ $invoice->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $invoice->product->name }}</h5>
            <p class="card-text">Quantity: {{ $invoice->quantity }}</p>
            <p class="card-text">Total Amount: ${{ $invoice->total_amount }}</p>
            <p class="card-text">Payment Amount: ${{ $invoice->payment_amount }}</p>
            <p class="card-text">Balance: ${{ $invoice->balance }}</p>
            <p class="card-text">Date: {{ $invoice->created_at->format('d-m-Y H:i:s') }}</p>
            <a href="{{ route('invoices.index') }}" class="btn btn-primary">Back to Invoices</a>
            <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning">Edit</a>
            <a href="#" class="btn btn-info" onclick="window.print()">Print Invoice</a>
        </div>
    </div>
</div>
@endsection