<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Http\Requests\Authentication\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Products::with('category')->get();
        return response()->json($products,200);
    }
    public function detail($id){
        $product = Products::where('id',$id)->with('category')->get();
        return response()->json($product,200);
    }
    public function create(ProductRequest $request){
        $product = Products::create($request->validated());
        return response()->json($product,200);
    }
    public function edit(ProductRequest $request,$id){
        $product = Products::where('id',$id)->update($request->validated());
        return response()->json(['message'=>'success'],200);
    }
    public function destroy($id){
        $product = Products::find($id);
        $product->delete();
        return response()->json(['message'=>'success'],200);
    }
}
