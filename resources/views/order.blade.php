

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Order | Barista</title>
     <!-- Alertify sakit sa ulo -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <script src="jquery-3.6.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
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

        /*------Products------*/
        .cup:hover{
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }
        .product{
            margin: 20px;
        }
        .divs{
            width: 100%;
            margin: auto;
            text-align: center;
            padding-top: 50px;
        }
        .divs h1{
            font-size: 32px;
            color: black;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
        .cup{
            flex-basis: 32%;
            border-radius: 30px;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
            width: fit-content;
            display: block;
        }
        .cup img{
        width: 400px;
        height: 290px;
        }
        .row{
            margin-top: 5%;
            display: flex;
            justify-content: space-between;
        }
        .layer{
            background: transparent;
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            transition: 0.5s;
        }
        .layer:hover{
            background: rgba(42, 44, 43, 0.7);
        }
        .layer h3{
            width: 100%;
            font-weight: 500;
            color: #fff;
            font-size: 26px;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            position: absolute;
            opacity: 0;
            transition: 0.5s;
        }
        .layer:hover h3{
            bottom: 49%;
            opacity: 1;
        }

        @media(max-width: 1000px){
            .container{
                background:  white;
                z-index: 9999;
                position: -webkit-sticky; /* Safari */
                position: sticky;
                top: 0;
            }
            .row{
                align-items: center;
                flex-direction: column;
            }
            .cup img{
                width: 300px;
              }
        }
    </style>


</head>
<body>



    @yield('content')
    @include('components.modal.modal')
    @extends('components.footer.footer')
    @extends('components.content.orderContent')
    @extends('components.navbar.navbar')


<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <!-- Script block to include addToCart function -->
 <script>

        function addToCart(productName, nameId, sizeId, temperatureId) {
            // Get the CSRF token from the page's meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            calculateTotalAmount();

            // Fetch the price based on the selected size
            var price = $('#' + sizeId + ' option:selected').data('price');
            console.log('Selected Price:', price);
            // Use AJAX to call addToCart route
            $.ajax({
                type: 'POST',
                url: '{{ route("addToCart") }}',
                data: {
                    productName: productName,
                    name: $('#' + nameId).val(),
                    size: $('#' + sizeId).val(),
                    temperature: $('#' + temperatureId).val(),
                    price: price,  // Include the price in the data
                    // Include the CSRF token in the data
                    _token: csrfToken,
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        $('#' + nameId).val('');
                        $('#' + sizeId).val('venti');
                        $('#' + temperatureId).val('iced');

                        // Close all modals
                        $('[id^=coffee]').modal('hide');

                        refreshCart();
                        alertify.success('Item added to cart!');
                    } else {
                        alertify.error('Failed to add item to cart.');
                    }
                },
                error: function() {
                    alertify.error('An error occurred while adding the item to the cart.');
                }
            });
        }


    function refreshCart() {
        $.ajax({
            type: 'GET',
            url: '{{ route("getCartContent") }}',
            dataType: 'html',
            success: function(cartContent) {
                $('#cartTable tbody').html(cartContent);
            },
            error: function() {
                console.error('An error occurred while refreshing the cart.');
            }
        });
    }
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
    $(document).ready(function() {
        alertify.set('notifier', 'position', 'top-right');
        alertify.set('notifier', 'delay', 5);
        alertify.set('notifier', 'position', 'top-right');
        refreshCart();
    });
</script>


</body>
</html>
