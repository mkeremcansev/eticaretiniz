<?php $__env->startSection('title', '419'); ?>
<?php $__env->startSection('content'); ?>
<section class="error-part">
    <div class="container">
        <h1>419</h1>
        <h3><?php echo app('translator')->get('words.419_error_title'); ?></h3>
        <p><?php echo app('translator')->get('words.419_error_content',['email'=>setting('mail')]); ?></p>
        <a href="<?php echo e(route('web.index')); ?>"><?php echo app('translator')->get('words.go_to_shopping'); ?></a>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.extends', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eticaretiniz\resources\views/errors/419.blade.php ENDPATH**/ ?>