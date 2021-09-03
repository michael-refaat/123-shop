<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//using Product and Cart model
use App\Models\Product;
use App\Models\Cart;

//using collections
use Illuminate\Database\Eloquent\Collection;

//access the authenticated user data
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

  //passing all data from Product model
  public function index() {

    //categories
    $categories = Product::select('category')->distinct()->get();

    //products
    $products = Product::all();

    //user_id
    $user_id = Auth::id();

    //number of products in the user's cart
    if (Auth::check()) {
      $num_of_products_in_cart = Cart::where('user_id', $user_id)->count();
    } else {
      $num_of_products_in_cart = 0;
    }

    //ids of products in the user's cart (to represent them with the 'remove-product' component)
    $ids_of_products_in_cart = array();

    if (Auth::check()) {

      $list_of_products_in_cart = Cart::where('user_id', $user_id)->pluck('product_id');

      foreach ($list_of_products_in_cart as $one_of_products_in_cart) {

        $ids_of_products_in_cart[] = $one_of_products_in_cart;

      }
    } else {
      $list_of_products_in_cart = null;
    }


    return view('products', ['categories' => $categories, 'products' => $products, 'user_id' => $user_id, 'ids_of_products_in_cart' => $ids_of_products_in_cart, 'num_of_products_in_cart' => $num_of_products_in_cart]);

  }


  //add product to user's cart
  public function store() {

    //new record in carts table
    $product_to_add = new Cart();

    //get the product and user ids
    $product_to_add->product_id = request('addthisproduct');
    $product_to_add->user_id = Auth::id();


    //check if user had been added the product before to his/her cart
    $check = Cart::where([['product_id', '=', $product_to_add->product_id], ['user_id', '=', $product_to_add->user_id]]);

    //if product is not added before, save the record 
    if (!$check->count()) {
        $product_to_add->save();
    }

    return redirect('/');

  }


  //remove product from user's cart
  public function destroy() {

    //get the product and user ids
    $product_id = request('removethisproduct');
    $user_id = Auth::id();

    //find and delete the record
    $product_to_remove = Cart::where([['product_id', '=', $product_id], ['user_id', '=', $user_id]]);
    $product_to_remove->delete();

    return redirect('/');

  }


}
