<div class="w3-sidebar w3-bar-block" style="width:18%;right:0;">

    @include ('components.cart.auth-links')

    <div style="background-color:#d9d9d9;padding-top:10px;padding-bottom:30px;margin-top:190px;margin-right:20px;">
        <h3 class="w3-bar-item">
            Checkout
        </h3>
        <h6 class="w3-bar-item">
            Total Items : &nbsp;
            <b><span id="totquant">0</span></b>
        </h6>
        <h6 class="w3-bar-item">
            Total Price : &nbsp;
            <b>$<span id="totprice">0</span></b>
        </h6>
        <button form="checkout" type="submit" class="w3-button w3-green w3-hover-green w3-round w3-ripple" style="margin-left:58px;margin-top:30px;">
            Checkout&nbsp;
            <i class="fas fa-check"></i>
        </button>
    </div>
</div>