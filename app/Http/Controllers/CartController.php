<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//using Product and Cart model
use App\Models\Cart;
use App\Models\Product;

//using collections
use Illuminate\Database\Eloquent\Collection;

//access the authenticated user data
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
 
    //passing data of products that added to user's cart
    public function index() {


        //get user's id
        $user_id = Auth::id();


        //number of products in the user's cart
        $num_of_products_in_cart = Cart::where('user_id', $user_id)->count();


        //get data of products in the user's cart and inject it in $data_of_products_in_cart
        if (Auth::check()) {
            $ids_of_products_in_cart = Cart::where('user_id', $user_id)->latest()->pluck('product_id');
        } else {
            $ids_of_products_in_cart = null;
        }

        $data_of_products_in_cart = array();

        foreach ($ids_of_products_in_cart as $id_of_product_in_cart) {

            $product = Product::where('id', $id_of_product_in_cart)->first();

            $data_of_products_in_cart[$id_of_product_in_cart] = ['name' => $product->name, 'categore' => $product->category, 'image' => $product->image, 'price' => $product->price, 'stock' => $product->stock];

        }


        $totprice = 0;

        return view('cart', ['data_of_products_in_cart' => $data_of_products_in_cart, 'num_of_products_in_cart' => $num_of_products_in_cart, 'totprice' => $totprice]);
    }


    //remove product from user's cart
    public function destroy($product_id) {

        //get user's id
        $user_id = Auth::id();

        //find and delete the record
        $product_to_remove = Cart::where([['product_id', '=', $product_id], ['user_id', '=', $user_id]]);
        $product_to_remove->delete();

        return redirect('/cart');

    }


    //remove all products from user's cart
    public function destroyAll() {

        //get user's id
        $user_id = Auth::id();

        //find and delete all the records (products) related to the user
        $products_to_remove = Cart::where('user_id', $user_id);
        $products_to_remove->delete();

        return redirect('/cart');

    }


    //buy products added to user's cart
    public function checkout() {

        //get user's id
        $user_id = Auth::id();

        //number of products in the user's cart
        $num_of_products_in_cart = Cart::where('user_id', $user_id)->count();

        //get products that added to user's cart and loop through them
        $products_in_cart = Cart::where('user_id', $user_id)->get();
        foreach ($products_in_cart as $product_in_cart) {
            
            //get product data
            $product_data = Product::where('id', $product_in_cart->product_id)->first();

            //ordered quantity
            $quantity = (int)request($product_data->id);

            //make sure that ordered quantity is ( less than or equal to stock ) and (greater than or equal to 1)
            if ($quantity <= $product_data->stock && $quantity >= 1 && $product_data->stock >= 1) {
                
                //modify stock
                $modified_stock = $product_data->stock - $quantity;
                $product_data->stock = $modified_stock;
                $product_data->save();

                //clear user's cart
                $products_to_remove_after_checkout = Cart::where('user_id', $user_id);
                $products_to_remove_after_checkout->delete();

                //number of products in the user's cart after checkout
                $num_of_products_in_cart = Cart::where('user_id', $user_id)->count();

                //response
                $response = 'Checkout Successfully Done!';

            } else {

                //response
                $response = 'Something Went Wrong, Try Again!';

            }
        }

        return view('/cart', ['response' => $response, 'num_of_products_in_cart' => $num_of_products_in_cart]);

    }
}
