
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | Barista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Include jQuery before Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <!-- Include AlertifyJS after jQuery -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- Your custom scripts -->
    <script src="jquery-3.6.1.js"></script>
    <style>
        .ajs-top-right {
            top: 10px;
            right: 10px;
        }
        nav img{
            width: 70px;
            border-radius: 50px;
        }

        .img{
            width: 500px;
            height: 400px;
        }

        body{
            overflow-x: hidden;
            overflow-y: auto;
            margin: 0;
            padding: 0;
        }

        #slider {
            width: 100%;
            height: 400px;
            display: flex;
            overflow: hidden;
        }

        .slide {
            min-width: 100%;
            transition: transform 1.1s ease-in-out;
        }

        .slide img {
            width: 600px;
            height: 400px;
        }
        .nav-link{
            cursor: pointer;
        }


    </style>


</head>
<body>

    @include('components.navbar.navbar')

    @yield('content')
    @include('components.content.carts')
    @include('components.footer.footer')

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JavaScript for updating cart content -->
<script>
    // Function to refresh cart content
    function refreshCart() {
        calculateTotalAmount();
        $.ajax({
            type: 'GET',
            url: '{{ route("getCartContent") }}',
            dataType: 'html',
            success: function(cartContent) {

                $('#cartTable tbody').html(cartContent);


                $('.cancel-btn').click(function() {
                    var index = $(this).data('index');

                    var confirmRemove = confirm('Are you sure you want to remove this item from the cart?');
                    if (confirmRemove) {
                        removeFromCart(index);
                    }
                });

            },
            error: function() {
                console.error('An error occurred while refreshing the cart.');
            }
        });
    }

    // Function to remove an item from the cart
    function removeFromCart(index) {
    $.ajax({
        type: 'POST',
        url: '{{ route("removeFromCart") }}',
        data: {
            index: index,
            _token: '{{ csrf_token() }}', // Include CSRF token
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {

                alertify.success('Item removed successfully!');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            } else {
                alertify.error('Failed to remove the item.');
            }
        },
        error: function() {
            alertify.error('An error occurred while removing the item.');
        }
    });
}


   // Function to calculate and display the total amount as an integer
    function calculateTotalAmount() {
            var totalAmount = 0;

            $('#cartTable tbody tr').each(function() {
                var priceText = $(this).find('.price').text().replace('₱', '').trim();
                var price = parseFloat(priceText);

                if (!isNaN(price)) {
                    totalAmount += Math.round(price * 100);
                }
            });

            $('#totalAmount').text('₱' + (totalAmount / 100).toFixed(2));
        }


        function placeOrder() {
            var orderDetails = [];

            $('#cartTable tbody tr').each(function() {
                var productName = $(this).find('.product-name').text();
                var customerName = $(this).find('.customer-name').text();
                var size = $(this).find('.size').text();
                var temperature = $(this).find('.temperature').text();
                var price = parseFloat($(this).find('.price').text().replace('₱', '').trim());

                // Push the order details into the array
                orderDetails.push({
                    productName: productName,
                    customerName: customerName,
                    size: size,
                    temperature: temperature,
                    price: price
                });
            });
            console.log('Order Details:', orderDetails);

            $.ajax({
                type: 'POST',
                url: '{{ route("placeOrder") }}',
                data: {
                    orders: orderDetails,
                    _token: '{{ csrf_token() }}',
                },
                dataType: 'json',
                success: function(response) {
                    console.log('Ajax Success Response:', response);
                        if (response.status === 'success') {
                            // Clear the cart after placing the order
                            console.log('Order placed successfully!');
                            alertify.success('Order placed successfully!');
                            setTimeout(function () {
                                location.reload();
                            }, 1500);
                        } else {
                            alertify.error('Failed to place the order.');
                        }
                    },

                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error occurred in Ajax request.');
                    console.log('jqXHR:', jqXHR);
                    console.log('textStatus:', textStatus);
                    console.log('errorThrown:', errorThrown);
                    alertify.error('An error occurred while placing the order.');
                }

            });
        }


    $(document).ready(function() {
        $('#cartTable').on('click', '.cancel-btn', function() {
        var index = $(this).data('index');
        removeFromCart(index);
        });
        alertify.set('notifier', 'position', 'top-right');
        alertify.set('notifier', 'delay', 5);
        alertify.set('notifier', 'position', 'top-right');

        refreshCart();
    });
</script>

</body>
</html>
