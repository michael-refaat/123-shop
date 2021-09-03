<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//using Product model
use App\Models\Product;

class CreateProductController extends Controller
{

    //show product creation form
    public function index() {
    
        return view('create-product');

    }


    //create new product record in products table
    public function store(Request $request) {

        //make sure that the product name is not used
        $product_with_same_name = Product::where('name', $request->name)->first();

        if (is_null($product_with_same_name)) {
        
            $new_product = new Product();

            
            $new_product->name = $request->name;

            $new_product->category = $request->category;
            
            $new_product->price = $request->price;
            
            $new_product->stock = $request->stock;

            $new_product->image = $request->file('image')->storeAs('images', $request->name);

            
            $new_product->save();



            $response = "Product Created Successfully!";

            return view('create-product', ['response' => $response]);


        }   else    {


            $response = "This Name is Already Used!...Try another Name...";

            return view('create-product', ['response' => $response, 'request' => $request]);

        }
        

    }
}
