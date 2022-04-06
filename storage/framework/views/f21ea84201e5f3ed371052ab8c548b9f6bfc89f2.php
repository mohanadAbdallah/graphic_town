<?php $__env->startSection('content'); ?>
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('adds.index')); ?>">Advertisements</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

    <form method="post" action="<?php echo e(route('adds.update', $adds->id)); ?>">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>

        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
        <div class="card-body">
            <div class="form-group">
                <label for="AgentAdding">Name In Arabic :  </label>
                <input class="form-control input-group-sm" id="name-ar" name="name-ar" value="<?php echo e($adds->title_ar); ?>">
            </div>
            <div class="form-group">
                <label for="AgentAdding"> Name In English : </label>
                <input class="form-control input-group-sm" id="name-en" name="name-en" value="<?php echo e($adds->title_en); ?>">
            </div>
            <div class="form-group">
                <label for="AgentAdding"> Address :  </label>
                <input class="form-control input-group-sm" id="Address" name="Address" value="<?php echo e($adds->description); ?>">
            </div>
            <div class="form-group">
                <label for="AgentAdding">Phone Number :  </label>
                <input class="form-control input-group-sm" id="phone_number" name="phone_number" value="<?php echo e($adds->image); ?>">
            </div>
            <div class="form-group">
                <label for="AgentAdding"> Password :</label>
                <input class="form-control input-group-sm" type="password" id="name-en" name="Password">
            </div>
            <div class="form-group">
                <label for="AgentAdding"> Re-Password : </label>
                <input class="form-control input-group-sm" type="password" id="name-en" name="Password">
            </div>

        </div>

        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\graphic-town\resources\views/admin/adds/edit.blade.php ENDPATH**/ ?>