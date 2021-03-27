<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index')->with('products',$products);
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required",
        ], [
            "name.required" => "campo requerido",
            "price.required" => "campo requerido",
        ]);
        $product = new Product();
        $product->name = strtoupper($request->name);
        $product->price = $request->price;
        $product->save();
        return redirect()->route('product');
    }
}
