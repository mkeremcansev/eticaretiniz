<?php $__env->startSection('script'); ?>
    <script>
        window.onload = function() {
            const stock = $('.variant-attr')
            let qty = $('#quantity').val()
            stock.map(response => {
                let t_stock = parseInt(stock[response].attributes[1].nodeValue)
                if (qty > t_stock) {
                    stock[response].classList.add('custom-disabled-alert')
                    // stock[response].parentElement.classList.remove('custom-data-tooltip')
                } else {
                    stock[response].classList.remove('custom-disabled-alert')
                    // stock[response].parentElement.classList.add('custom-data-tooltip')
                }
            })
        }
        $('.qty-plus-minus .dec, .qty-plus-minus .inc').on('click', function() {
        const stock = $('.variant-attr')
        let qty = $('#quantity').val()
        stock.map(response => {
            let t_stock = parseInt(stock[response].attributes[1].value)
            if (qty > t_stock) {
                stock[response].classList.add('custom-disabled-alert')
                // stock[response].parentElement.classList.remove('custom-data-tooltip')
            } else {
                stock[response].classList.remove('custom-disabled-alert')
                // stock[response].parentElement.classList.add('custom-data-tooltip')
            }
        })
        });
        $(document).ready(function(){
            $('.custom-variant-attribute').on('click', function(){
                let count = $(this).attr('variant-stock');
                $('.custom-stock').text('<?php echo app('translator')->get("words.product_stock_count_detail", ["count"=>"'+count+'"]); ?>')
            })
            let add_to_cart_btn = $('#add-to-cart')    
            add_to_cart_btn.on('click', function(){
                let product_hash =  '<?php echo e($product->hash); ?>'
                 let variants = [];
                $('ul .active').each(function() { 
                    variants.push($(this).attr('variant-hash')); 
                });
                console.log(variants)
                let quantity = $('#quantity').val()
                $.ajax({
                    method: 'POST',
                    url: '<?php echo e(route("web.shopping.cart.store")); ?>',
                    data: {product_hash:product_hash, variants:variants, quantity:quantity},
                    dataType:'json',
                    success: function (response) {
                        if(response.status == 'error'){
                            Swal.fire({
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: '<?php echo app('translator')->get("words.okey"); ?>'
                            })
                        } else if(response.status == 'success'){
                            add_to_cart_btn.addClass('custom-disabled')
                            Swal.fire({
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: '<?php echo app('translator')->get("words.okey"); ?>',
                            }).then((result) => {
                                result.isConfirmed ? location.reload() : location.reload()
                            })
                        }
                    },
                    error: function (response) {
                        Swal.fire({
                            text: getValidateMessage(response),
                            icon: 'error',
                            confirmButtonText: '<?php echo app('translator')->get("words.okey"); ?>'
                        })
                    }
                })
            })
            let add_to_wishlist_btn = $('#add-to-wishlist')    
            add_to_wishlist_btn.on('click', function(){
                let product_hash =  '<?php echo e($product->hash); ?>'
                $.ajax({
                    method: 'POST',
                    url: '<?php echo e(route("web.wishlist.store")); ?>',
                    data: {product_hash:product_hash},
                    dataType:'json',
                    success: function (response) {
                        add_to_wishlist_btn.addClass('custom-disabled')
                        Swal.fire({
                            text: response.success,
                            icon: 'success',
                            confirmButtonText: '<?php echo app('translator')->get("words.okey"); ?>',
                        }).then((result) => {
                            result.isConfirmed ? location.reload() : location.reload()
                        })
                    },
                    error: function (response) {
                        Swal.fire({
                            text: getValidateMessage(response),
                            icon: 'error',
                            confirmButtonText: '<?php echo app('translator')->get("words.okey"); ?>'
                        })
                    }
                })
            })
            let add_to_review_btn = $('#add-to-review')
            let review_content = $('#review_content')
            add_to_review_btn.on('click', function(){
                let rating = $('.rating-input:checked').val();
                let content = $('#review_content').val();
                let product = '<?php echo e($product->hash); ?>'
                $.ajax({
                    method: 'POST',
                    url: '<?php echo e(route("web.product.review.store")); ?>',
                    data: {rating:rating, content:content, product:product},
                    dataType:'json',
                    success: function (response) {
                        if(response.status == 'error'){
                            Swal.fire({
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: '<?php echo app('translator')->get("words.okey"); ?>',
                            })
                        } else if(response.status == 'success'){
                            review_content.val('')
                            add_to_review_btn.addClass('custom-disabled')
                            Swal.fire({
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: '<?php echo app('translator')->get("words.okey"); ?>',
                            }).then((result) => {
                                result.isConfirmed ? location.reload() : location.reload()
                            })
                        }
                            
                    },
                    error: function (response) {
                        Swal.fire({
                            text: getValidateMessage(response),
                            icon: 'error',
                            confirmButtonText: '<?php echo app('translator')->get("words.okey"); ?>'
                        })
                    }
                })
            })
        })
    </script>
<?php $__env->stopSection(); ?><?php /**PATH C:\laragon\www\eticaretiniz\resources\views/web/product/script/script.blade.php ENDPATH**/ ?>