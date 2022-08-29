<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {
        //alert();

        //add Product
        $(document).on('click', '.add_product', function(e) {

            e.preventDefault();
            let pName = $('#productName').val();
            let pSize = $('#productSize').val();
            let pPrice = $('#productPrice').val();
            //console.log(pName+pSize+pPrice);



            $.ajax({
                url: "{{route('add.product') }}",
                method: 'post',
                data: {
                    productName: pName,
                    productSize: pSize,
                    productPrice: pPrice
                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#addModal').modal('hide');
                        $('#addProductForm')[0].reset();
                        $('.table').load(location.href + ' .table');

                        Command: toastr["success"]("Product Added.")

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $('.errMsgContainer').append('<span class="text-danger">' + value + '</span>' + '<br>');
                    });
                }

            });
        })

        //show product value in update modal
        $(document).on('click', '.update_product_form', function() {

            let id = $(this).data('id');
            let productName = $(this).data('name');
            let productSize = $(this).data('size');
            let productPrice = $(this).data('price');

            ///console.log(id,productName,productSize,productPrice);

            //console.log(id);
            console.log(productName);

            $('#up_id').val(id);
            $('#up_name').val(productName);
            $('#up_size').val(productSize);
            $('#up_price').val(productPrice);

            //console.log(up_id);
            //console.log(up_name);
        });


        //Update product
        $(document).on('click', '.update_product', function(e) {

            e.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_size = $('#up_size').val();
            let up_price = $('#up_price').val();
            console.log(up_id + up_name + up_size + up_price);



            $.ajax({
                url: "{{route('update.product') }}",
                method: 'post',

                data: {
                    up_id: up_id,
                    up_name: up_name,
                    up_size: up_size,
                    up_price: up_price
                },

                success: function(res) {
                    if (res.status == 'success') {
                        $('#updateModal').modal('hide');
                        $('#updateProductForm')[0].reset();
                        $('.table').load(location.href + ' .table');

                        Command: toastr["success"]("Product Updated")

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },
                error: function(err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function(index, value) {
                        $('.errMsgContainer').append('<span class="text-danger">' + value + '</span>' + '<br>');
                    });
                }

            });

        })

        //Delete product
        $(document).on('click', '.delete_product', function(e) {

            e.preventDefault();

            let product_id = $(this).data('id');

            //alert(product_id);

            if (confirm('Are you sure to delete product?')) {
                $.ajax({
                    url: "{{route('delete.product') }}",
                    method: 'post',
                    data: {
                        product_id: product_id
                    },

                    success: function(res) {
                        if (res.status == 'success') {

                            $('.table').load(location.href + ' .table');


                            Command: toastr["error"]("Product Delete")

                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": true,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }
                    }

                });
            }

        })

        //Pagination
        $(document).on('click', '.pagination a', function(e) {

            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1]
            product(page)
        })

        function product(page) {
            $.ajax({
                url: "/pagination/paginate-data?page=" + page,
                success: function(res) {

                    $('.table-data').html(res);
                }
            })
        }

        //Search Product
        $(document).on('keyup', function(e) {

            e.preventDefault();
            let search_string = $('#search').val();
            //console.log(search_string);

            $.ajax({

                url: "{{route('search.product') }}",
                method: 'GET',
                data: {
                    search_string: search_string
                },

                success: function(res) {

                    //$('.table-data').html(res);
                    if(res.status=='nothing_found'){
                        $('.table-data').html('<span class="text-danger"> '+ 'Nothing Found !'+'</span>');
                    }else{
                        $('.table-data').html(res);
                    }
                }

            });
        })

    });
</script>