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
        $products= Product::latest()->paginate(5);



        return view('product.product',compact('products'));
    }

    //add product
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


    //Update product
    public function updateProduct(Request $request)
    {
        
        $request->validate(
            
            [
                'up_name' => 'required|unique:products,productName,'.$request->up_id,
                'up_size' => 'required',
                'up_price' => 'required',
            ],
            [
                'up_name.required' => 'Product Name is Required',
                'up_name.unique' => 'Product Already Exixts',
                'up_size.required' => 'Product Size is Required',
                'up_price.required' => 'Product Price is Required',
            ]
        );
        
        Product::where('id',$request->up_id)->update([
            'productName'=>$request->up_name,
            'productSize'=>$request->up_size,
            'productPrice'=>$request->up_price,
        ]);
       
        
        return response()->json([
            'status'=>'success',
        ]);
    }

    //delete product
    public function deleteProduct(Request $request){
        Product::find($request->product_id)->delete();

        return response()->json([
            'status'=>'success',
        ]);
    }


//product pagination
public function pagination(Request $request){
    
    
    $products= Product::latest()->paginate(5);
    return view('product.pagination_product',compact('products'))->render();
}


    
    
}
