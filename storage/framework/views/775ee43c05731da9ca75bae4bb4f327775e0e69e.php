<?php $count =1 ?>

<?php $__currentLoopData = $advertisement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($count); ?></td>
        <td><?php echo e($adds->title_ar); ?></td>
        <td><?php echo e($adds->description_ar); ?></td>
        <td>
            <?php if($adds->image): ?>
                <img src="<?php echo e(Storage::url($adds->image)); ?>"   alt="img" style="max-height:100px;max-width:50px;border-radius: 7px;">
            <?php endif; ?>
        </td>
        <td>
            <button class="btn btn-warning rounded-pill dropdown-toggle" type="button" name="action" id="dropdownmenue1" data-toggle="dropdown">
                Take action
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li class="breadcrumb-item"><a class="dropdown-item" href="<?php echo e(route('adds.edit',$adds->id)); ?>">Edit</a></li>
                <li role="presentation">
                    <a class="dropdown-item" href="javascript:void(0)" onclick="$(this).parent().find('form').submit()">Delete</a>
                    <form action="<?php echo e(route('adds.destroy',$adds->id)); ?>" method="post">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <?php echo method_field('DELETE'); ?>
                    </form>
                </li>
            </ul>

        </td>

        <?php $count++ ?>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\graphic-town\resources\views/components/Adds.blade.php ENDPATH**/ ?>