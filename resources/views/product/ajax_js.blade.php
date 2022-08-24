
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
        $(document).on('click','.add_product',function(e){
            
            e.preventDefault();
            let pName=$('#productName').val();
            let pSize=$('#productSize').val();
            let pPrice=$('#productPrice').val();
            //console.log(pName+pSize+pPrice);
            
            

            $.ajax({
                url:"{{route('add.product') }}",
                method:'post',
                data:{productName:pName,productSize:pSize,productPrice:pPrice},
                success:function(res){
                    if(res.status=='success'){
                         $('#addModal').modal('hide');
                         $('#addProductForm')[0].reset();
                         $('.table').load(location.href+' .table');
                    }
                },error:function(err){
                    let error=err.responseJSON;
                    $.each(error.errors,function(index,value){
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                }

            });
        })

        //show product value in update form
        $(document).on('click','.update_product_form',function(){
            
            let id= $(this).data('id');
            let productName= $(this).data('productName');
            let productSize= $(this).data('productSize');
            let productPrice= $(this).data('productPrice');

            console.log(id,productName,productSize,productPrice);
           
            console.log(id);
            console.log(productName);

            $('#up_id').val(id);
            $('#up_name').val(productName);
            $('#up_size').val(productSize);
            $('#up_price').val(productPrice);

            console.log(up_id);
            console.log(up_name);
        });
        
    });
</script>