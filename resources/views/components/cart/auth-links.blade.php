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

<span style="margin-left:150px;padding-left:-0px;">
    <button form="logout" style="margin-right:30px;border:none;background:none;cursor:pointer;text-decoration:underline;">Log Out</button>
</span>

<a href="/cart">
    <button style="border:none;background:none;cursor:pointer;padding-right:80px;font-size:23px;padding-bottom:95px;">
        <i class="fas fa-shopping-cart"></i>
        <span class="w3-badge w3-right w3-small w3-orange">
            <b>{{$num_of_products_in_cart}}</b>
        </span>
    </button>
</a>