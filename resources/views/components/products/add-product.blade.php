<form method="post">
    @csrf
    <div class="w3-col m3">
        <div class="w3-container">
            <div class="w3-display-container">
                <div class="container">
                    <img class="productimage" src="{{$product->image}}" style="width:;height:;"/>
                    <div class="w3-display-middle button">
                        <button class="w3-button w3-orange w3-hover-orange w3-round w3-ripple" style="margin-right:20px;" type="submit" name="addthisproduct" value="{{$product->id}}">
                        Add to Cart <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <p>
                {{$product->name}}<br>
                <b>${{$product->price}}</b>
                <span style="margin-left:130px;color:green;"><b>{{$product->stock}} </b><small>in stock</small></span>
            </p>
        </div>
    </div>
</form>