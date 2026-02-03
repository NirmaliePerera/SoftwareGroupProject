@extends('product.main')
  
@section('content')
<table id="collection" class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Description</th>
            <th>Price</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('collection'))
            @foreach(session('collection') as $id => $item)
                <tr rowId="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ isset($item['image']) ? $item['image'] : 'N/A' }}" class="card-img-top"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $item['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Description" class="text-center">${{ $item['description'] }}</td>

                    <td data-th="Price">${{ $item['initial_price'] }}</td>
                    <td class="actions">
                        <a class="btn btn-outline-danger btn-sm remove-item">Remove</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/products-list') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Adding</a>
                <button class="btn btn-danger" onclick="window.location.href='{{ route('appointments.create') }}'">Make Appointment</button>
            </td>
        </tr>
    </tfoot>
</table>
@endsection
  
@section('scripts')
<script type="text/javascript">
  
    $(".remove-item").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove.collection.item') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("rowId")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@endsection
