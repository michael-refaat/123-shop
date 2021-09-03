<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <!--w3.css framework-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!--stylesheet-->
    <link rel="stylesheet" href="style.css">

    <!--fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!--google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

</head>
<body>

    <!--if the user clicked on 'create'-->
    @if (isset($response))
    <script>alert('{{$response}}');</script>
    @endif

    @include('components.cart.header')

    <div class="w3-container" style="padding-right:520px;padding-left:520px;margin-top:50px;">
        <h2>Create Product</h2><br>
    </div>

    <form method="post" enctype="multipart/form-data" class="w3-container" style="padding-right:500px;padding-left:500px;">
        @csrf

        <br>

        Name:&nbsp;
        <input type="text" name="name" value="{{$request->name ??''}}" required>                            <br><br>

        Category:&nbsp;
        <input type="text" name="category" value="{{$request->category ??''}}" required>                            <br><br>

        Price:&nbsp;
        <input type="number" name="price" value="{{$request->price ??''}}" required>                          <br><br>

        Stock:&nbsp;
        <input type="number" name="stock" value="{{$request->stock ??''}}" required>                          <br><br>

        Image:&nbsp;
        <input type="file" name="image" value="{{$request->image ??''}}" required>

        <button class="w3-button w3-blue w3-hover-blue" style="margin-left:80px;margin-top:25px;" type="submit"><b>Create</b></button>

        <br><br>

    </form>


</body>
</html>