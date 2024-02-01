@section('cart')

<!--Main Content-->

<div id="cartContentContainer" class="container my-5">
    <h2>Your Shopping Cart</h2>
    <table id="cartTable" class="table">
        <thead>
        <tr>
            <th scope="col">Order No.</th>
            <th scope="col">Product Name</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Size</th>
            <th scope="col">Temperature</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th> <!-- Added Actions column -->
        </tr>
        </thead>
        <tbody>
        <!-- Cart content will be dynamically inserted here -->
        @foreach(session('cart', []) as $index => $cartItem)
        <tr>
            <td>{{ (int)$index + 1 }}</td>
            <td class="product-name">{{ $cartItem['productName'] }}</td>
            <td class="customer-name">{{ $cartItem['name'] }}</td>
            <td class="size">{{ $cartItem['size'] }}</td>
            <td class="temperature">{{ $cartItem['temperature'] }}</td>
            <td class="price">₱{{ number_format($cartItem['price'], 2) }}</td>
            <td>
                <button class="btn btn-danger cancel-btn" data-index="{{ $index }}">Cancel</button>
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>

    <!-- Total amount and order button section -->
    <div class="row">
        <div class="col-md-6">
            <h4>Total Amount: <span id="totalAmount">₱0.00</span></h4>
        </div>
        <div class="col-md-6 text-end">
            <button class="btn btn-primary" onclick="placeOrder()">Place Order</button>
        </div>
    </div>
</div>
