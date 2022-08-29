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
                                            data-name="{{$product->productName}}"
                                            data-size="{{$product->productSize}}"
                                            data-price="{{$product->productPrice}}"
                                           >
                                           <i class="las la-edit"></i>
                                      </a>
                                    <a href="" 
                                    class="btn btn-danger delete_product"
                                    data-id="{{ $product->id}}"
                                             >
                                    <i class="las la-trash-alt"></i>
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$products ->links()!!}