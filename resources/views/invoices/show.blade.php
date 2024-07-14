@extends('layouts.invoice_app')

@section('content')
<div class="container">
    <h1>Invoice Details</h1>
    <h5> Shirona Salon and Bridal</h5>
        <br><h6>Colombo Road
            <br>Kunara
            <br>Negamnbo</br></h6>

    
    
    <div class="card">
        <div class="card-header">
        Invoice #{{ $invoice->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $invoice->product->name }}</h5>
            <p class="card-text">Quantity: {{ $invoices->quantity }}</p>
            <p class="card-text">Total Amount: LKR - {{ $invoice->total_amount }}</p>
            <p class="card-text">Payment Amount: LKR - {{ $invoice->payment_amount }}</p>
            <p class="card-text">Balance: LKR {{ $invoice->balance }}</p>
            <p class="card-text">Date: {{ $invoice->created_at->format('d-m-Y H:i:s') }}</p>
            <a href="{{ route('invoices.index') }}" class="btn btn-primary no-print">Back to Invoices</a>
            <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning no-print">Edit</a>
            <a href="#" class="btn btn-info no-print" onclick="window.print()">Print Invoice</a>
        </div>
    </div>
</div>

<!-- Add this style block -->
<style>
    @media print {
        .no-print {
            display: none;
        }
    }
</style>
@endsection
