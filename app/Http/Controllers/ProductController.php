<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
    	$product = Product::all();
    	return view('welcome', compact('product'));
    }

    public function add($id)
    {
    	if(Auth::check())
    	{
   			return view('admin.add-product',['id'=>$id]);
   		}
    }
    public function myproduct($id){
        if(Auth::check()){
            $prod = Product::find($id);
            return view('admin.my-product')->with('products',$prod);
        }
    }

    public function insert(Request $request)
    {
    	if(Auth::check())
    	{
    		$prod = new Product();
           $prod->user_id = $request->user_id;
    		$prod->name = $request->input('prodname');
    		$prod->slug = $request->input('prodslug');
    		$prod->type = $request->input('prodtype');
    		$prod->amount = $request->input('prodamount');
    		$prod->price = $request->input('prodprice');
    		$prod->description = $request->input('prddesc');

    		$prod->save();

    		return redirect('/')->with('status', "Product Added Successfully");
    	}
    }

    public function edit($id)
    {
    	$products = Product::find($id);
    	return view('admin.edit-product', compact('products'));
    }

    public function update(Request $request, $id)
    {
    	$prod = Product::find($id);

    	$prod->name = $request->input('prodname');
		$prod->slug = $request->input('prodslug');
		$prod->type = $request->input('prodtype');
		$prod->amount = $request->input('prodamount');
		$prod->price = $request->input('prodprice');
		$prod->description = $request->input('prddesc');

		$prod->update();

		return redirect('/')->with('status', "Product Updated Successfully");
    }

    public function delete($id)
    {
    	$prod = Product::find($id);
    	$prod->delete();

    	return redirect('/')->with('status', "Product Deleted Successfully");
    }
}
