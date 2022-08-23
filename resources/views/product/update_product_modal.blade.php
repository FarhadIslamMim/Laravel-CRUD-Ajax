<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateProductModal" aria-hidden="true">
    <form action="" id="updateProductForm">
        @csrf
        <input type="hidden" id="up_id">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateProductModal">Update Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errMsgContainer mb-3">

                    </div>

                    <div class="form_group my-1">
                        <label for="up_name">Product Name</label>
                        <input type="text" class="form-control" name="up_name" id="up_name" >
                    </div>

                    <div class="form_group my-1">
                        <label for="up_size">Product Size</label>
                        <input type="text" class="form-control" name="up_size" id="up_size" >
                    </div>

                    <div class="form_group my-1">
                        <label for="up_price">Product Price</label>
                        <input type="text" class="form-control" name="up_price" id="up_price" >
                    </div>


                </div>
                <div class="modal-footer my-1">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary up_product">Update Product</button>
                </div>
            </div>
        </div>
    </form>
</div>