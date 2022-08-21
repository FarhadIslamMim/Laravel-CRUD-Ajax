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
}
