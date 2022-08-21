<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="AddProductModal" aria-hidden="true">
    <form action="post" id="addProductForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddProductModal">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errMsgContainer mb-3">

                    </div>

                    <div class="form_group my-1">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" name="productName" id="productName" placeholder="Product Name">
                    </div>

                    <div class="form_group my-1">
                        <label for="productSize">Product Size</label>
                        <input type="text" class="form-control" name="productSize" id="productSize" placeholder="Product Size">
                    </div>

                    <div class="form_group my-1">
                        <label for="productPrice">Product Price</label>
                        <input type="text" class="form-control" name="productPrice" id="productPrice" placeholder="Product Price">
                    </div>


                </div>
                <div class="modal-footer my-1">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_product">Save Product</button>
                </div>
            </div>
        </div>
    </form>
</div>