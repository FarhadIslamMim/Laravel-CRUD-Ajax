<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct()
    {
        //$showData= Curd::all();

        //pagination
        //$showData=Curd::paginate(5);
        //Another pagination
        //$showData=Curd::simplePaginate(5);

        return view('product.product');
    }
    public function addProduct(Request $request)
    {
        $request->validate(
            [
                'productName' => 'required|unique:products',
                'productSize' => 'required',
                'productPrice' => 'required',
            ],
            [
                'productName.required' => 'Product Name is Required',
                'productName.unique' => 'Product Already Exixts',
                'productSize.required' => 'Product Size is Required',
                'productPrice.required' => 'Product Price is Required',
            ]
        );
        $product=new Product();
        $product->productName=$request->productName;
        $product->productSize=$request->productSize;
        $product->productPrice=$request->productPrice;
        $product->save();
        return response()->json([
            'status'=>'success',
        ]);
    }
}
