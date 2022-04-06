<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<?php $__env->startSection('content'); ?>

    <?php $count =1 ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-2">
                    <a class="btn btn-success rounded-pill create" href="javascript:void(0)" >Create Product</a>
                </div>
                <div class="col-sm-9">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">products</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">

        <div id="alerts"></div>

        <div class="container-fluid">

            <table  class="table table-hover" id="products">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title "AR"</th>
                    <th>Description "AR"</th>
                    <th>Image</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>

            </table>

        </div>

    </section>

    <!-- START Create Modal -->

    <div class="modal " id="createProduct" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" style="margin-left: 400px;">

            <div class="modal-content">
                <div class="modal-header" style="background-color: #1a1e21;">
                    <h5 class="modal-title" id="exampleModalCenterTitle" style="color: #f1f1f1">create Product</h5>
                    <button type="button" class="close" data-dismiss="modal" style="color: #f1f1f1" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="addform" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6 ms-auto">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="product_ar_name" name="product_ar_name" placeholder='Name "AR" '>
                                    <?php if($errors->any()): ?>

                                        <ul >
                                            <?php $__errorArgs = ['product_ar_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <li class="text-danger"><?php echo e($message); ?></li>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </ul>

                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="product_en_name" name="product_en_name" placeholder='Name "AR" '>
                                    <?php if($errors->any()): ?>

                                        <ul >
                                            <?php $__errorArgs = ['product_en_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <li class="text-danger"><?php echo e($message); ?></li>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </ul>

                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="product_ar_description" name="product_ar_description" placeholder='Description "AR" '>
                                    <?php if($errors->any()): ?>

                                        <ul >
                                            <?php $__errorArgs = ['product_ar_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <li class="text-danger"><?php echo e($message); ?></li>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </ul>

                                    <?php endif; ?>
                                </div>

                                <div class="mb-3">
                                    <input type="text" class="form-control" id="product_en_description" name="product_en_description" placeholder='Description "EN" '>
                                    <?php if($errors->any()): ?>

                                        <ul >
                                            <?php $__errorArgs = ['product_en_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <li class="text-danger"><?php echo e($message); ?></li>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </ul>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6 ms-auto">

                                <div class=" mb-3 custom-file">
                                    <select class="category_id browser-default custom-select" name="category" id="category_id">
                                        <option selected>Select category</option>

                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e(old('category_id') == $item->id ? 'selected' : ''); ?>><?php echo e($item->title_ar); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                                <div class=" mb-3 custom-file">
                                    <select class="subcategory browser-default custom-select" name="subcategory_id" id="subcategory_id">
                                        <option value="">Select Sub-Category </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="size" name="size" placeholder='size '>
                                    <?php if($errors->any()): ?>

                                        <ul >
                                            <?php $__errorArgs = ['size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <li class="text-danger"><?php echo e($message); ?></li>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </ul>

                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="price" name="price" placeholder='price '>
                                    <?php if($errors->any()): ?>

                                        <ul >
                                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <li class="text-danger"><?php echo e($message); ?></li>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </ul>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ms-auto">
                                <div class=" mb-3 custom-file">
                                    <label for="formFileMultiple" class="form-label">Choose Product image</label>
                                    <input class="form-control" type="file" name="image"  id="image" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary add_product_btn">Insert</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- END Create Modal -->


    


    <!-- START Delete Modal -->
    <div class="modal" id="DeleteProduct" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="delete_product_id">
                    <h4>Are you sure ? want to delete this product ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_product_btn">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Delete Modal -->




    <!-- START Edit Modal -->
    <div class="modal " id="editProduct" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" style="margin-left: 400px;">

            <div class="modal-content">
                <div class="modal-header" style="background-color: #1a1e21;">
                    <h5 class="modal-title" id="exampleModalCenterTitle" style="color: #f1f1f1">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" style="color: #f1f1f1" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="editform" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="id" name="id"/>

                    <div class="modal-body">
                        <input type="hidden" id="edit_product_id">


                        <div class="row">
                            <div class="col-md-6 ms-auto">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="edit_product_ar_name" name="product_ar_name" placeholder='Name "AR" '>
                                    <?php if($errors->any()): ?>

                                        <ul >
                                            <?php $__errorArgs = ['product_ar_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <li class="text-danger"><?php echo e($message); ?></li>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </ul>

                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="edit_product_en_name" name="product_en_name" placeholder='Name "AR" '>
                                    <?php if($errors->any()): ?>

                                        <ul >
                                            <?php $__errorArgs = ['product_en_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <li class="text-danger"><?php echo e($message); ?></li>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </ul>

                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="edit_product_ar_description" name="product_ar_description" placeholder='Description "AR" '>
                                    <?php if($errors->any()): ?>

                                        <ul >
                                            <?php $__errorArgs = ['product_ar_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <li class="text-danger"><?php echo e($message); ?></li>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </ul>

                                    <?php endif; ?>
                                </div>

                                <div class="mb-3">
                                    <input type="text" class="form-control" id="edit_product_en_description" name="product_en_description" placeholder='Description "EN" '>
                                    <?php if($errors->any()): ?>

                                        <ul >
                                            <?php $__errorArgs = ['product_en_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <li class="text-danger"><?php echo e($message); ?></li>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </ul>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6 ms-auto">

                                <div class=" mb-3 custom-file">
                                    <select class="category_id browser-default custom-select" name="category" id="edit_category_id">
                                        <option selected>Select category</option>

                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e(old('category_id') == $item->id ? 'selected' : ''); ?>><?php echo e($item->title_ar); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                                <div class=" mb-3 custom-file">
                                    <select class="subcategory browser-default custom-select" name="subcategory_id" id="edit_subcategory_id">
                                        <option value="">Select Sub-Category </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="edit_size" name="size" placeholder='size '>
                                    <?php if($errors->any()): ?>

                                        <ul >
                                            <?php $__errorArgs = ['size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <li class="text-danger"><?php echo e($message); ?></li>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </ul>

                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="edit_price" name="price" placeholder='price '>
                                    <?php if($errors->any()): ?>

                                        <ul >
                                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <li class="text-danger"><?php echo e($message); ?></li>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </ul>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ms-auto">
                                <div class=" mb-3 custom-file">
                                    <label for="formFileMultiple" class="form-label">Choose Product image</label>
                                    <input class="form-control" type="file" name="image"  id="edit_image" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary edit_product_btn">Update</button>
                    </div>

                </form>



            </div>
        </div>
    </div>
    <!-- END Edit Modal -->





<?php $__env->stopSection(); ?>

<!-- ✅ load jQuery ✅ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<!-- ✅ load jQuery UI ✅ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                fetchProducts();
            function fetchProducts(){
                $.ajax({
                    type:'GET',
                    url:"/fetch-products",
                    success:function (response) {
                        console.log(response);
                        $('#products').append(response.productComp)
                    },

                });
            };
            $('body').on('click', '.delete', function (e) {
                e.preventDefault();
                var id = $(this).attr('product_id');

                $('#delete_product_id').val(id);
                $('#DeleteProduct').modal('show');

            });

            
            
            
            
            
            
            
            
            
            
            

            
            
            
            
            
            
            
            
            
            
            

            $('#DeleteProduct').on('click','.delete_product_btn',function (e){
               e.preventDefault();

               var product_id=$('#delete_product_id').val();

                $.ajax({
                    type:"delete",
                    url: "<?php echo e(url('admin/products')); ?>/"+product_id,
                    dataType: 'json',
                    beforeSend:function (){
                        $(document).find('.delete_product_btn').text('Deleting...');

                    },
                    success: function(res){

                        $('#DeleteProduct').modal('hide');
                        $('#products').html('');
                        fetchProducts();
                        $(document).find('.delete_product_btn').text('Yes Delete');
                        alertDanger("Products was deleted.");
                    },
                    error:function (error){
                        console.log(error)
                        alert("Data Not Saved");
                    }
                });

            });


            $('body').on('click', '.create', function (e) {
                e.preventDefault();
                $('#createProduct').modal('show');

            });

            $('#addform').submit(function(e) {
                e.preventDefault();
                var data = new FormData(this);
                $.ajax({

                    type:'POST',
                    url: '<?php echo e(route('products.store')); ?>',
                    data:data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend:function (){
                        $(document).find('.add_product_btn').text('Inserting...');

                    },
                    success:function (response){
                        $('#products').html('');
                        $('#createProduct').modal('hide');
                        fetchProducts();
                        alertSuccess("New Product Added Successfuly .")
                        $(document).find('.add_product_btn').text('Insert');
                    },
                    error:function (error){
                        console.log(error)
                        alert("Data Not Saved");
                        $(document).find('.add_product_btn').text('Insert');

                    }

                });

            });

            $('body').on('click', '.edit', function (e) {
                e.preventDefault();

                var id = $(this).attr('product_id');
                $('#edit_product_id').val(id);

                $('#editProduct').modal('show');

            });

            $('body').on('click', '.edit', function (e) {
                e.preventDefault();

                var id = $(this).attr('product_id');
                $('#edit_product_id').val(id);
                $('#editProduct').modal('show');

                $.ajax({
                    type:'GET',
                    url:"/admin/products/"+id+"/edit",
                    success:function (response){
                        if(response.status==404){
                            alert(response.message);
                            $('#editProduct').modal('hide');

                        }
                        else {
                            $('#edit_product_ar_name').val(response.products.product_ar_name);
                            $('#edit_product_en_name').val(response.products.product_en_name);
                            $('#edit_product_ar_description').val(response.products.product_ar_description);
                            $('#edit_product_en_description').val(response.products.product_en_description);
                            $('#edit_category_id').val(response.products.category_id);
                            $('#edit_subcategory_id').val(response.products.subcategory_id);
                            $('#edit_size').val(response.products.size);
                            $('#edit_price').val(response.products.price);
                            $('#edit_product_id').val(id);
                        }
                    },
                });
            });

            $('#editform').submit(function(e) {
                e.preventDefault();
                var product_id=$('#edit_product_id').val();
                var data = new FormData(this);

                $.ajax({
                    type:'POST',
                    url: '/update-product/'+product_id,
                    data:data,
                    cache: false,
                    contentType: false,
                    processData: false,

                    success:function (response){
                        console.log(response)
                        $('#products').html('');
                        $('#editProduct').modal('hide');
                        fetchProducts();
                        alertSuccess("Product Was Edited Successfully .")

                    },
                    error:function (error){
                        console.log(error)
                        alert("Data Not Saved");
                    }

                });
            });




            });
</script>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\graphic-town\resources\views/admin/products/index.blade.php ENDPATH**/ ?>