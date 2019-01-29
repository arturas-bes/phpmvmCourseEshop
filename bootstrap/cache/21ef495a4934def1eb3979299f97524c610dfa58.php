<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Panel - <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/34ae7a89dc.js"></script>
    <link href="/css/all.css" rel="stylesheet">

</head>
<body data-page-id="<?php echo $__env->yieldContent('data-page-id'); ?>">
<?php echo $__env->make('includes.admin-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="off-canvas-content admin_title_bar" data-off-canvas-content>
    <!-- Your page content lives here -->

    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
            <span class="title-bar-title"><?php echo e(getenv('APP_NAME')); ?></span>
        </div>
    </div>
    <?php echo $__env->yieldContent('content'); ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="/js/all.js"></script>
</body>

</html>
