
<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr>
        <th><?php echo e(++$i); ?></th>
        <th><?php echo e($cat->title_ar); ?></th>
        <th></th>
        <th></th>
        <th>
            <?php if($cat->image): ?>
                <img src="<?php echo e(Storage::url($cat->image)); ?>" class="object-cover w-full h-full rounded-full" alt="img" style="max-width:60px;max-height: 100px; border-radius: 7px;">
        <?php endif; ?>
        <td><?php echo e($cat->user->name); ?></td>
        <td></td>
        <th></th>
        <td>
            <button class="btn btn-warning rounded-pill dropdown-toggle" type="button" name="action" id="dropdownmenue1" data-toggle="dropdown">Take action </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li role="presentation"><a class="dropdown-item edit_cat" href="javascript:void(0)" edit_cat_id="<?php echo e($cat->id); ?>">Edit</a></li>
                <li role="presentation"><a class="dropdown-item add_subcategories" href="javascript:void(0)" add-id="<?php echo e($cat->id); ?>">Add Sub-Category</a></li>
                <li class="presentation"><a class="dropdown-item delete" href="javascript:void(0)" delete-id="<?php echo e($cat->id); ?>" >Delete</a></li>

            </ul>
        </td>


    <?php $__currentLoopData = $cat->SupCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr style="margin-left:100px;">
            <th></th>
            <th>#<?php echo e(++$i); ?></th>
            <td></td>

            <td><?php echo e($sub_cat->subcategoryname_ar); ?></td>
            <td>
                <?php if($sub_cat->image): ?>
                    <img src="<?php echo e(Storage::url($sub_cat->image)); ?>"  alt="img" style="max-width:60px;max-height: 50px; margin-left: 120px; border-radius: 7px;">
                <?php endif; ?>
            </td>
            <td></td>
            <td></td>
            <td>
                <button class="btn btn-warning rounded-pill dropdown-toggle" type="button" name="action" id="dropdownmenue1" data-toggle="dropdown">
                    Take action
                </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="breadcrumb-item"><a class="dropdown-item" href="<?php echo e(route('subcategory.edit',$sub_cat->id)); ?> ">Edit</a></li>
                    <li role="presentation">
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$(this).parent().find('form').submit()">Delete</a>
                        <form action="<?php echo e(route('subcategory.destroy',$sub_cat->id)); ?>" method="post">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <?php echo method_field('DELETE'); ?>
                        </form>
                    </li>
                </ul>

            </td>

            <td>
            </td>
        </tr>

        <?php echo $categories->render(); ?>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\graphic-town\resources\views/components/categoriesComp.blade.php ENDPATH**/ ?>