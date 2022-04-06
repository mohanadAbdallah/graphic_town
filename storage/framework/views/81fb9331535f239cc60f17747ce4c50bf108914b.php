<!-- ✅ load jQuery ✅ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<!-- ✅ load jQuery UI ✅ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php $__env->startSection('content'); ?>



    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col-sm-2">
                        <a class="btn btn-success rounded-pill user_create"  href="javascript:void(0)" >Create Agent</a>
                    </div>
                    <div class="col-sm-9">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Agents</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">
            <table  class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>status</th>
                    <th>Last Seen</th>
                    <th>Roles</th>
                    <th>Action</th>
                </tr>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(++$i); ?></td>
                        <td><a href="javascript:void(0)" class="user_show text-bold text-dark" show-id="<?php echo e($agent->id); ?>"><?php echo e($agent->name); ?></a></td>
                        <td><?php echo e($agent->email); ?></td>
                        <td>
                            <?php if(Cache::has('is_online' . $agent->id)): ?>
                                <label class="badge badge-success">Online</label>

                            <?php else: ?>
                                <label class="badge badge-secondary">Offline</label>
                            <?php endif; ?>
                        </td>

                        <td>
                            <?php if($agent->last_seen != null): ?>
                                <?php echo e(\Carbon\Carbon::parse($agent->last_seen)->diffForHumans()); ?>

                            <?php else: ?>
                                <code class="text-secondary">No seen</code>
                            <?php endif; ?></td>

                        <td>
                            <?php if(!empty($agent->getRoleNames())): ?>
                                <?php $__currentLoopData = $agent->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="badge badge-primary"><?php echo e($v); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?> </td>
                        <td>
                              <a href="<?php echo e(route('users.edit',$agent->id)); ?>" class="btn btn-info ">Edit</a>
                              <a href="javascript:void(0)" class="user_show btn btn-warning" show-id="<?php echo e($agent->id); ?>">Show</a>
                              <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger " >Delete</a>
                              <form action="<?php echo e(route('users.destroy', $agent->id)); ?>" method="post">
                                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                  <?php echo method_field('DELETE'); ?>
                              </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
        <?php echo $data->render(); ?>


    </section>
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
        user_show_fun();
        user_create_fun();


        function user_show_fun() {

            $('body').on('click', '.user_show', function (e) {
                e.preventDefault();
                var id = $(this).attr('show-id');

                $.ajax({
                    type: 'GET',
                    url: "/admin/users/" + id,

                    success: function (response) {
                        console.log(response);
                        $('.content').html('');
                        $('.content').append(response.user_show)
                    },

                });

            });
        }
        function user_create_fun() {

            $('body').on('click', '.user_create', function (e) {
                e.preventDefault();

                $.ajax({
                    type: 'GET',
                    url: "/admin/users/create",

                    success: function (response) {
                        console.log(response);
                        $('.content').html('');
                        $('.content').append(response.user_create)
                    },

                });

            });
        }

    });

</script>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\graphic-town\resources\views/admin/agents/index.blade.php ENDPATH**/ ?>