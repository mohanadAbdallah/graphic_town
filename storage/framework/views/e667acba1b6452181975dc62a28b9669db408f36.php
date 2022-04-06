<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

    <title>Graphic Town</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->'
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/jqvmap/jqvmap.min.css')); ?>">
    <!-- Theme style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/daterangepicker/daterangepicker.css')); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.css')); ?>">
    <script src="<?php echo e(asset('js/alerts.js')); ?>"></script>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo e(route('home')); ?>" class="brand-link">
            <img src="<?php echo e(asset('dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Graphic Town</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo e(asset('dist/img/avatar.png')); ?>" class="img-rounded "
                         alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                    </a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <?php
                    $segment = Request::segment(2);
                    ?>
                    <li class="nav-item has-treeview menu-open">
                        <a href="<?php echo e(route('home')); ?>" class="nav-link
                            <?php if(!$segment): ?>
                            active
                             <?php endif; ?>">
                            <p>
                                Dashboard
                            </p>
                        </a>

                    </li>
                        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                        <li class="nav-item">
                        <div class="row mt-4"></div>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('users.index')); ?>"
                           class="nav-link <?php echo e(request()->routeIs('users.*')?'active' :''); ?>">
                            <p>
                               Manage Agents
                            </p>
                        </a>
                    </li>
                        <?php endif; ?>

                            <?php if(auth()->check() && auth()->user()->hasAnyRole('agent|admin')): ?>
                        <li class="nav-item">
                        <a href="<?php echo e(route('products.index')); ?>"
                           class="nav-link <?php echo e(request()->routeIs('products.*')?'active' :''); ?>">
                            <p>
                                Manage Products
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('categories.index')); ?>"
                           class="nav-link <?php echo e(request()->routeIs('categories.*','subcategories.*')?'active' :''); ?>">
                            <p>
                                Manage Categories
                            </p>
                        </a>

                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('adds.index')); ?>"
                           class="nav-link <?php echo e(request()->routeIs('adds.*')?'active' :''); ?>">
                            <p>
                                Manage Advertisements
                            </p>
                        </a>
                    </li>
                        <?php endif; ?>

                    <li class="nav-header">Action</li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('logout')); ?>" class="nav-link">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p class="text">Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
<div class="content-wrapper">
        <?php echo $__env->yieldContent('content'); ?>

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <?php echo $__env->yieldContent('footer'); ?>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<.
<!-- ./wrapper -->

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo e(asset('plugins/chart.js/Chart.min.js')); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo e(asset('plugins/sparklines/sparkline.js')); ?>"></script>






<script src="<?php echo e(asset('plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
<!-- Summernote -->
<script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>



<script src="<?php echo e(asset('dist/js/adminlte.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset('dist/js/pages/dashboard.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>

</body>
</html>
<?php /**PATH C:\laragon\www\graphic-town\resources\views/layouts/admin.blade.php ENDPATH**/ ?>