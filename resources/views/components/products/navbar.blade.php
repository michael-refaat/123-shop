<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;margin-left:-15px;" id="mySidebar">
    <div class="w3-container w3-display-container">
        <button style="border:none;background:none;cursor:pointer;margin-bottom:80px;padding-right:10px;font-size:20px;">
            <h2 class="w3-wide" style="margin-left:20px;">
                <b>
                    <a href="/" style="text-decoration:none;">
                    123SHOP
                    </a>
                </b>
            </h2>
        </button>
    </div>
    <div class="w3-padding-64 w3-large w3-text-grey w3-center" style="font-weight:bold;">
    <p class="w3-bar-item w3-center"><b>Categories</b></p>
    @foreach ($categories as $category)
        <a href="#{{$category->category}}" class="w3-bar-item w3-button w3-center w3-text-black">
        {{$category->category}}
        </a>
    @endforeach
    </div>
</nav>