<?php $__env->startSection('content'); ?>

<?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="blank_space"></div>
<div class="inner_banner" style="background-image:url(<?php echo e(url('images/frontend/page_images/large/'.$p->page_image)); ?>);">
    <div class="container h-100">
        <div class="row  h-100">
            <div class="col-lg-6 align-self-center m-auto text-center">
                <h3><?php echo e($p->title); ?></h3>
                <p>Established to provide comprehensive and customized Real Estate solutions, RAPID DEALS REAL ESTATE
                    BROKERS has been consistently delivering the best deals at the most reasonable prices to its
                    clients.</p>
            </div>
        </div>
    </div>
</div>

<?php echo $p->content; ?>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.home_design_2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\rapid deals\server code\resources\views/frontend/pages/single_page.blade.php ENDPATH**/ ?>