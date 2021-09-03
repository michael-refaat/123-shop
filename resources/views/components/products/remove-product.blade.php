<form method="post">
    @csrf
    @method('DELETE')
    <div class="w3-col m3">
        <div class="w3-container">
            <div class="w3-display-container">
                <div class="con-tainer">
                    <img class="product-image" src="{{$product->image}}" style="width:;height:;"/>
                    <div class="w3-display-middle but-ton">
                        <button class="w3-button w3-red w3-hover-red w3-round w3-ripple" style="margin-right:20px;" type="submit" name="removethisproduct" value="{{$product->id}}">
                        Remove <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            <p>
                {{$product->name}}<br>
                <b>${{$product->price}}</b>
                @if ($product->stock === 0)
                    <span style="margin-left:130px;color:red;"><b>{{$product->stock}} </b><small>in stock</small></span>
                @else
                    <span style="margin-left:130px;color:green;"><b>{{$product->stock}} </b><small>in stock</small></span>
                @endif
            </p>
        </div>
    </div>
</form>