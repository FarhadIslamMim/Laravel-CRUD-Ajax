<?php

namespace App\Http\Controllers;

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
                'productSize' => 'required|unique:products',
                'productPrice' => 'required',
            ],
            [
                'productName.required' => 'Product Name is Required',
                'productName.unique' => 'Product Already Exixts',
                'productSize.required' => 'Product Size is Required',
                'productSize.unique' => 'Product Size Already Exixts',
                'productPrice.required' => 'Product Price is Required',
            ]
        );
    }
}
