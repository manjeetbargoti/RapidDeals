<?php $__env->startSection('content'); ?>

<div class="blogbanner">
    <img src="<?php echo e(url('/images/frontend/images/blogbanner.jpg')); ?>">
</div>


<div id="smart_container">
    <section class="pt-1 pb-1">
        <div class="breadcrumb_sec">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb custom_breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="all_blogs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="blog_boxed">
                                <a href="<?php echo e(url('/blog/'.$p->url)); ?>">
                                    <div class="blogs_img">
                                        <img src="<?php echo e(url('images/frontend/post_images/small/'.$p->post_image)); ?>">
                                    </div>
                                    <div class="blogtxt">
                                        <span>Posted By <?php echo e(date('d M, Y', strtotime($p->created_at))); ?></span>
                                        <h6><?php echo e($p->title); ?></h6>
                                        <p><?php echo e(strip_tags(str_limit($p->content, $limit=230))); ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- <div class="pagination_strip">
                        <nav aria-label="..." style="display: inline-block;">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item" aria-current="page">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend.home_design_2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\rapid deals\server code\resources\views/frontend/posts/blog_page.blade.php ENDPATH**/ ?>