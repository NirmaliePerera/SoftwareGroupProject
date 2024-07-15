
@extends('layouts.invoice_app')

@section('content')
<div class="container">
    <h1>Create Bill</h1>
    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} - ${{ $product->initial_price }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="payment_amount">Payment Amount</label>
            <input type="number" step="0.01" name="payment_amount" id="payment_amount" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Invoice</button>
    </form>
</div>
@endsection