<?php $count=1 ?>
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tbody>
    <tr class="table-secondary">
        <th><?php echo e($count); ?></th>
        <th><?php echo e($product->product_ar_name); ?></th>
        <th><?php echo e($product->product_ar_description); ?></th>
        <td>
            <?php if($product->image): ?>
                <img src="<?php echo e(Storage::url($product->image)); ?>"  alt="img" style="width:60px;border-radius: 7px;">
            <?php endif; ?>
        </td>
        <th><?php echo e($product->size); ?></th>
        <th><?php echo e($product->price); ?></th>
        <td>
            <button class="btn btn-success rounded-pill dropdown-toggle" type="button" name="action" id="dropdownmenue1" data-toggle="dropdown">Take action </button>
            <ul class="dropdown-menu post" aria-labelledby="dropdownMenuButton1">
                <li role="presentation">
                    <a href="javascript:void(0)" class="btn btn-info dropdown-item edit"  product_id="<?php echo e($product->id); ?>">Edit</a>
                </li>

                <li class="breadcrumb-item">
                    <a href="javascript:void(0)" class="btn btn-danger dropdown-item delete" product_id="<?php echo e($product->id); ?>">Delete</a>
                </li>
            </ul>
        </td>
        <?php $count++ ?>
    </tr>
    </tbody>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH C:\laragon\www\graphic-town\resources\views/components/productComp.blade.php ENDPATH**/ ?>