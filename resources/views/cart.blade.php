<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <!--w3.css framework-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!--stylesheet-->
    <link rel="stylesheet" href="style.css">

    <!--fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!--google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

    <!--js script to define total quantity variable-->
    <script src="script.js"></script>

</head>
<body>

    <!--if the user clicked on 'checkout'-->
    @if (isset($response))
        <script>alert('{{$response}}');</script>
    @endif

    @include('components.cart.header')
    @include('components.cart.checkout')
    @include('components.cart.listing-products')

    <!--js script to adjusting quantity-->
    <script src="quantity.js"></script>

</body>
</html>