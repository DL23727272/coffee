@section('admin')



<div class="table-container">
    <h2>Total Orders: <span id="totalOrders">{{ count($orders) }}</span></h2>
    <table id="cartTable" class="table">
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
                    @if (property_exists($order, 'status') && $order->status === 'done')
                        <!-- Item is marked as done -->
                        <span>Done</span>
                    @else
                        <!-- Add data-order-id attribute with the order ID -->
                        <button class="btn btn-success cancel-btn" data-order-id="{{ $order->id }}">Done</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // JavaScript for handling the "Done" button click
    $(document).ready(function() {
        // Add a click event handler for the "Done" buttons
        $('#cartTable').on('click', '.cancel-btn', function() {
            var row = $(this).closest('tr'); // Get the closest row to the clicked button
            var orderId = $(this).data('order-id');

            // Make an Ajax request to update the order status
            $.ajax({
                type: 'POST',
                url: '{{ route("markOrderAsDone") }}', // Replace with your route
                data: {
                    orderId: orderId,
                    _token: '{{ csrf_token() }}', // Include CSRF token
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Update the UI or reload the table if needed
                        alertify.success('Order marked as done!');
                        row.hide(); // Hide the row upon success
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

</script>

<style>
    .table-container {
        margin: 20px; /* Adjust the margin size as needed */
    }
</style>
