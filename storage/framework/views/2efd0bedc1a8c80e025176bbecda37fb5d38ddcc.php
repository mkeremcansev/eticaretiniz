<?php $__currentLoopData = $getAllSubCategoriesCollection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option <?php if($product->category_id == $c->id): ?> selected <?php endif; ?> value="<?php echo e($c->id); ?>"><?php echo e($parent_title . __('words.separator') . $c->title); ?></option>
    <?php if(count($c->getAllCategoriesCollection) > 0): ?>
        <?php echo $__env->make('panel.product.update.layouts.parents', ['getAllSubCategoriesCollection' => $c->getAllCategoriesCollection, 'parent_title' =>$parent_title.__('words.separator'). $c->title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\eticaretiniz\resources\views/panel/product/update/layouts/parents.blade.php ENDPATH**/ ?>