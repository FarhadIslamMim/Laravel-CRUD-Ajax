<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Ajax Curd</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="my-5 text-center">Laravel Ajax Crud</h2>
                <div class="table-data">
                    <a href="" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</a>
                    @if(Session::has('msg'))
                    <p class="alert alert-success">{{Session::get('msg')}}</p>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Size</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key=>$product)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$product->productName}}</td>
                                <td>{{$product->productSize}}</td>
                                <td>{{$product->productPrice}}</td>
                                <td>
                                    <a href=""
                                            class="btn btn-success update_product_form"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#updateModal"

                                            data-id="{{ $product->id}}"
                                            data-productName="{{$product->productName}}"
                                            data-productSize="{{$product->productSize}}"
                                            data-productPrice="{{$product->productPrice}}"
                                           >
                                           <i class="las la-edit"></i>
                                      </a>
                                    <a href="" onclick="return confirm('Are You Sure To Delete')" class="btn btn-danger"><i class="las la-trash-alt"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$products ->links()!!}
                </div>
            </div>
        </div>
    </div>

    @include('product.add_product_modal')
    @include('product.update_product_modal')
    @include('product.ajax_js')


</body>

</html>