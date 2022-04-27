<section class="section niche-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                        <li>
                            <a href="#top-new" class="tab-link active" data-bs-toggle="tab">
                                <i class="icofont-loop"></i>
                                <span><?php echo app('translator')->get('words.new_products'); ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="#top-rate" class="tab-link" data-bs-toggle="tab">
                                <i class="icofont-star"></i>
                                <span><?php echo app('translator')->get('words.popular_products'); ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="#top-disc" class="tab-link" data-bs-toggle="tab">
                                <i class="icofont-sale-discount"></i>
                                <span><?php echo app('translator')->get('words.discounted_products'); ?></span>
                            </a>
                        </li>
                </ul>
            </div>
        </div>
            <?php echo $__env->make('web.homepage.layouts.new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('web.homepage.layouts.popular', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('web.homepage.layouts.discount', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section><?php /**PATH C:\laragon\www\eticaretim\resources\views/web/homepage/layouts/tab.blade.php ENDPATH**/ ?>