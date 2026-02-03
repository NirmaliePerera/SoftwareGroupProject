@extends('product.main')

@section('title', 'Customer Dashboard - Shirona Salon and Bridal')

@section('content')
        
<div class="row">
    @foreach($products as $product)
        <div class="col-md-3 col-6 mb-4">
            <div class="card">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title">{{ $product->name }}</h4>
                    <h6 class="card-subtitle">Rs. {{ $product->initial_price }}</h6>
                    <p>{{ $product->description }}</p>
                    
                    <p class="btn-holder">
                        <button class="btn btn-outline-danger add-to-collection" data-product-id="{{ $product->id }}">Add to favourite</button>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

@section('scripts')

<script type="text/javascript">
    $(".add-to-collection").click(function (e) {
        e.preventDefault();

        var productId = $(this).data("product-id");
        var productQuantity = $(this).siblings(".product-quantity").val();
        var collectionItemId = $(this).data("collection_item_id");

        $.ajax({
            url: "{{ route('add-product-to-favourite-collection') }}",
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}', 
                product_id: productId,
                quantity: productQuantity,
                collection_item_id: collectionItemId
            },
            success: function (response) {
                $('#collection-quantity').text(response.collectionCount);
                 alert('collection Updated');
                console.log(response);
            },
            error: function (xhr, status, error) {
                // Handle errors (e.g., display an error message)
                console.error(xhr.responseText);
            }
        });
    });
</script>


@endsection