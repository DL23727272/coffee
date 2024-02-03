@section('admin')

<div class="table-container">
    <h2>Total Orders: <span id="totalOrders">{{ count($orders) }}</span></h2>
    <div class="table-responsive">
        <table id="cartTable" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Order No.</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Size</th>
                    <th scope="col">Temperature</th>
                    <th scope="col">Price</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->product_name }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->size }}</td>
                    <td>{{ $order->temperature }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>
                        @if (isset($order->status) && $order->status === 'done')
                            <span>Done</span>
                        @else
                            <button class="btn btn-success cancel-btn" data-order-id="{{ $order->id }}">Done</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#cartTable').on('click', '.cancel-btn', function() {
            var row = $(this).closest('tr');
            var orderId = $(this).data('order-id');


            $.ajax({
                type: 'POST',
                url: '{{ route("markOrderAsDone") }}',
                data: {
                    orderId: orderId,
                    _token: '{{ csrf_token() }}',
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alertify.success('Order marked as done!');
                        row.hide();
                        updateTotalOrdersCount();
                    } else {
                        alertify.error('Failed to update order status.');
                    }
                },
                error: function() {
                    alertify.error('An error occurred while updating the order status.');
                }
            });
        });
    });

    function updateTotalOrdersCount() {
        var totalOrders = parseInt($('#totalOrders').text());
        $('#totalOrders').text(totalOrders - 1);
    }
    alertify.set('notifier', 'position', 'top-right');
    alertify.set('notifier', 'delay', 5);
</script>

<style>
    .table-container {
        margin: 20px;
    }
</style>
