<form id="checkout" method="post">

    @csrf
    @method('DELETE')

    @if (isset($data_of_products_in_cart))

        @foreach ($data_of_products_in_cart as $id => $dop)

            @if ($dop['stock'] >= 1)

                <tr>
                    <td><img src="{{$dop['image']}}" style="height:60px; width:60px;"/></td>
                    <td><br><b>{{ $dop['name'] }}</b></td>
                    <td><br><b>$<span id="{{ $dop['price'] }}">{{ $dop['price'] }}</span></b></td>
                    <td><br><b><span style="color:green;">{{ $dop['stock'] }}</span></b></td>
                    <td>
                        <button type="button" onclick="quantityMinus({{ $id }}, {{ $dop['price'] }})" style="border:none;background:none;cursor:pointer;font-size:15px;color:#0066ff;">
                            <br><i class="fas fa-chevron-circle-down"></i>
                        </button>
                        <b><span id="{{ $id }}">1</span></b>
                        <button type="button" onclick="quantityPlus({{ $id }}, {{ $dop['stock'] }}, {{ $dop['price'] }})" style="border:none;background:none;cursor:pointer;font-size:15px;color:#0066ff;">
                            <i class="fas fa-chevron-circle-up"></i>
                        </button>
                    </td>
                    <td>
                        <br>
                        <a href="/cart/{{ $id }}">
                            <button type="button" style="border:none;background:none;cursor:pointer;">
                                <i style="color:red;" class="fas fa-trash"></i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <br>
                        <span>
                            <b>
                                $<span id="subtot{{ $id }}"><span id="subtot">{{ $dop['price'] }}</span></span>
                            </b>
                        </span>
                    </td>
                </tr>

                <input type="hidden" name="{{ $id }}" id="{{ $id }}finalquant" value="1">

                <!--js script to calculate total quantity-->
                <script src="script1.js"></script>

                <!--adjusting the total price variable-->
                @php
                    $totprice += $dop['price'];
                @endphp

            @else

                <tr>
                    <td><img src="{{ $dop['image'] }}" style="height:60px; width:60px;"/></td>
                    <td><br><b>{{ $dop['name'] }}</b></td>
                    <td><br><b>$<span>{{ $dop['price'] }}</span></b></td>
                    <td><br><b><span style="color:red;">{{ $dop['stock'] }}</span></b></td>
                    <td>
                        <button disapled type="button" style="border:none;background:none;cursor:pointer;font-size:15px;color:#0066ff;">
                            <br><i class="fas fa-chevron-circle-down"></i>
                        </button>
                        <b><span>{{ $dop['stock'] }}</span></b>
                        <button disapled type="button" style="border:none;background:none;cursor:pointer;font-size:15px;color:#0066ff;">
                            <i class="fas fa-chevron-circle-up"></i>
                        </button>
                    </td>
                    <td>
                        <br>
                        <a href="/cart/{{ $id }}">
                            <button type="button" style="border:none;background:none;cursor:pointer;">
                                <i style="color:red;" class="fas fa-trash"></i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <br>
                        <span>
                            <b>
                                $<span><span>{{ $dop['price'] }}</span></span>
                            </b>
                        </span>
                    </td>
                </tr>

            @endif

        @endforeach

        <!--injecting the total price in a hidden tag-->
        <p hidden><span id="totp">{{ $totprice }}</span></p>

        <!--js script to view total price of all products in cart-->
        <script src="script2.js"></script>

    @endif


</form>