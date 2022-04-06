<?php $__env->startSection('content'); ?>


    <div class="card-body">
        <div class="form-group w-50">

        </div>
    </div>
    <!-- /.card-body -->


    <form role="form" action="<?php echo e(route('products.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
        <div class="card-body">
            <div class="form-group">
                <label for="name_ar"> Product Name In Arabic</label>
                <input class="form-control input-group-sm" id="product_ar_name" name="product_ar_name" placeholder="Enter the product Name In Arabic">
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
            <div class="form-group">
                <label for="name_en"> Product Name In English</label>
                <input class="form-control input-group-sm" id="product_en_name" name="product_en_name" placeholder="Enter the product Name In English">
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
            <div class="form-group">
                <label for="description_ar"> Product Description In Arabic</label>
                <input class="form-control input-group-sm" id="product_ar_description" name="product_ar_description" placeholder="Enter the Description Name In Arabic">
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
            <div class="form-group">
                <label for="description_ar"> Product Description In English</label>
                <input class="form-control input-group-sm" id="product_en_description" name="product_en_description" placeholder="Enter the product Description In English">
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
            <div class="form-group">
                <div class="form-group">

                    <label for="category">Choose Category</label>
                        <select class="category_id browser-default custom-select" name="category" id="category_id">
                            <option selected>Select category</option>

                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>" <?php echo e(old('category_id') == $item->id ? 'selected' : ''); ?>><?php echo e($item->title_ar); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    <?php if($errors->any()): ?>

                        <ul >
                            <?php $__errorArgs = ['category'];
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
                <div class="form-group">

                    <label for="subcategory_id">Choose Sub_Category</label>
                    <select class="subcategory browser-default custom-select" name="subcategory_id" id="subcategory_id">
                        <option value="">First Select category </option>
                    </select>
                    <?php if($errors->any()): ?>

                        <ul >
                            <?php $__errorArgs = ['subcategory_id'];
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
                <div class="form-group">
                    <label for="category">Choose product image</label>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image"/>
                        <label class="custom-file-label" for="image">Upload Sub-Category image :</label>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <label for="size"> Product size</label>
                <input class="form-control input-group-sm" id="size" name="size" placeholder="Enter the product size">
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
            <div class="form-group">
                <label for="price"> Product price</label>
                <input class="form-control input-group-sm" id="price" name="price" placeholder="Enter the product price">
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

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Insert</button>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $('select[name="category"]').on("change", function (e) {
            var category_id = $(this).val();
            $('#subcategory_id').html('<option value="">Firstly, Choose Category</option>');
            $.ajax({
                type: 'get',
                dataType: "json",
                url: '<?php echo e(url('admin/subcategories')); ?>/' + category_id,
                data: {'subcategory_id': '<?php echo e(old('subcategory_id') ?? ''); ?>'},
                cache: "false",
                success: function (data) {
                    $('#subcategory_id').html(data.options);

                }, error: function (data) {
                    if (category_id === '') {
                        $('#subcategory_id').html('<option value="">Firstly, Choose Category</option>');
                    } else {
                        $('#subcategory_id').html('<option value="">There is no sub categories</option>');
                    }
                }
            });
            return false;
        });
        $('select[name="category"]').change();

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\graphic-town\resources\views/admin/products/create.blade.php ENDPATH**/ ?>