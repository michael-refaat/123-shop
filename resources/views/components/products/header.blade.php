<div class="w3-top">
    <div class="w3-bar w3-white" id="myNavbar" style="height:60px">
        <div class="w3-right w3-hide-small" style="padding-top:12px;">

            <!--authentication-->

            @guest
                <span style="margin-left:90px;">

                    <a href="/create-product" style="margin-right:300px;text-decoration:none;">
                        <button class="w3-button w3-blue w3-hover-blue w3-round w3-ripple">
                            Create Product&nbsp;
                            <i class="fas fa-plus"></i>
                        </button>
                    </a>

                    <a style="margin-right:30px;" href="{{ route('login') }}">Log in</a>

                    <a href="{{ route('register') }}">Register</a>

                </span>

                <a href="/cart">
                    <button style="border:none;background:none;cursor:pointer;padding-right:80px;font-size:23px;padding-left:90px;padding-top:7px;">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="w3-badge w3-right w3-small w3-orange">
                            <b>{{$num_of_products_in_cart}}</b>
                        </span>
                    </button>
                </a>
            @endguest

            @auth
            <span style="margin-right:50px;padding-top:20px;">
                <form hidden id="logout" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log out') }}
                    </x-responsive-nav-link>
                </form>
            </span>

            <a href="/create-product" style="margin-right:250px;text-decoration:none;">
                <button class="w3-button w3-blue w3-hover-blue w3-round w3-ripple">
                    Create Product&nbsp;
                    <i class="fas fa-plus"></i>
                </button>
            </a>

            <span style="margin-left:90px;">
                <button form="logout" style="margin-right:30px;border:none;background:none;cursor:pointer;text-decoration:underline;">Log Out</button>
            </span>

            <a href="/cart">
                <button style="border:none;background:none;cursor:pointer;padding-right:80px;font-size:23px;padding-left:90px;padding-top:7px;">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="w3-badge w3-right w3-small w3-orange">
                        <b>{{$num_of_products_in_cart}}</b>
                    </span>
                </button>
            </a>
            @endauth

        </div>
    </div>
</div>