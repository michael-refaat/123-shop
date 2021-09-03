<div class="w3-content" style="max-width:1400px;">

    <div class="w3-main" style="margin-left:250px;"> <br><br>

        <!--looping through all categories-->
        @foreach ($categories as $category)

            <!--category grid-->
            <div id="{{$category->category}}" class="w3-row">
                
                <h3 style="margin-left:20px;margin-top:30px;">{{$category->category}}</h3>
                
                <!--looping through all products-->
                @foreach ($products as $product)

                    <!--work only with products belongs to the category which we are looping through-->
                    @if ($product->category === $category->category)
                        
                        <!--The user is not authenticated-->
                        @guest
                            <!--if product is out of stock, display outofstock-product component-->
                            @if ($product->stock === 0)

                                @include('components.products.outofstock-product')

                            <!--if product is in stock, display add-product component-->
                            @else

                                @include('components.products.add-product')

                            @endif
                        @endguest

                        <!--The user is authenticated-->
                        @auth
                            <!--if product is existed in the user's cart-->
                            @if (in_array($product->id, $ids_of_products_in_cart))

                                @include('components.products.remove-product')

                            <!--if product is out of stock, display outofstock-product component-->
                            @elseif ($product->stock === 0)

                                @include('components.products.outofstock-product')

                            <!--if product is in stock, display add-product component-->
                            @else

                                @include('components.products.add-product')

                            @endif
                        @endauth

                    @endif

                @endforeach

            </div>

        @endforeach

    </div>

</div>