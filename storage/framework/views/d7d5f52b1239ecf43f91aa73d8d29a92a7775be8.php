<!DOCTYPE html>

<html lang="<?php echo e(app()->getLocale()); ?>">



<head>



    <style>

    /* custom search */

    .search_input {

        position: relative;

    }



    div#searchlist {

        background: #fff;

        position: absolute;

        z-index: 9;

        width: 85%;

        padding: 0;

        max-height: 220px;

        overflow-y: auto;

        box-shadow: 0 5px 6px rgba(0, 0, 0, 0.5);

        top: 94px;

        left: 20px;

        text-align: left;

    }



    ul.searchdrop {

        margin: 0;

        padding: 0;

    }



    ul.searchdrop li {

        padding: 5px 35px 5px 10px;

        border-top: 1px solid #ddd;

        position: relative;

        color: #000;

    }



    span.flag_name {

        position: absolute;

        right: 5px;

        color: #a9a9a9;

        text-transform: uppercase;

        font-size: 11px;

    }



    ul.searchdrop li:hover {

        background: #f2f2f2;

        color: #05B3F8;

    }





    .fade:not(.show) {

        opacity: 0;

        visibility: hidden;

    }

    </style>



    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/bootstrap.min.css')); ?>">



    <!-- Custom CSS -->

    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/style.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/responsive.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/owl.carousel.min.css')); ?>">

    <!-- <link rel="stylesheet" href="<?php echo e(asset('css/frontend/lightslider.css')); ?>"> -->
    
    <link rel="stylesheet" href="<?php echo e(asset('css/frontend/bootstrap-select.css')); ?>">



    <!-- font icon CSS -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>
    <link rel="stylesheet" type="text/css"

        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">



    <title><?php echo e(config('app.name')); ?></title>

</head>



<body>



    <div class='notifications top-right'></div>



    <?php echo $__env->make('layouts.frontend.home_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <?php echo $__env->yieldContent('content'); ?>



    <?php echo $__env->make('layouts.frontend.home_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script src ="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" >

    </script>

    <script src="<?php echo e(asset('js/frontend/bootstrap-select.js')); ?>"></script>
    <script src="<?php echo e(asset('js/frontend/bootstrap.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/frontend/owl.carousel.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/frontend/lightslider.js')); ?>"></script>

    <script src="<?php echo e(asset('js/frontend/customjs.js')); ?>"></script>

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>



    <script>

    <?php if(Session::has('flash_message_success')): ?>

    $('.top-right').notify({

        message: {

            text: "<?php echo e(Session::get('flash_message_success')); ?>"

        },

        // fadeOut: { enabled: true, delay: 3000 }

        transition: 'fade'

    }).show();

    <?php

    Session::forget('flash_message_success');

    ?>

    <?php endif; ?>



    <?php if(Session::has('flash_message_error')): ?>

    $('.top-right').notify({

        message: {

            text: "<?php echo e(Session::get('flash_message_error')); ?>"

        },

        // fadeOut: { enabled: true, delay: 3000 },

        type: 'error',

        transition: 'fade'

    }).show();

    <?php

    Session::forget('flash_message_error');

    ?>

    <?php endif; ?>

    </script>



    <script>

    var o2 = $('#work-class2')

    o2.owlCarousel({

        items: 1,

        singleItem: true,

        loop: false,

        margin: 10,

        dots: false,

        pagination: false,

        nav: false,

        touchDrag: false,

        slideBy: 2,

        mouseDrag: false

    });



    var o1 = $('#work-class1');

    o1.owlCarousel({

        items: 1,

        singleItem: true,

        loop: false,

        margin: 0,

        //dots:false,

        pagination: false,

        nav: true,

        touchDrag: false,

        slideBy: 1,

        mouseDrag: false

    });



    var o1 = $('#work-class1'),

        o2 = $('#work-class2');



    //Sync o2 by o1

    o1.on('click onDragged', '.owl-next', function() {

        o2.trigger('next.owl.carousel')

    });



    o1.on('click dragged.owl.carousel', '.owl-prev', function() {

        o2.trigger('prev.owl.carousel')

    });



    //Sync o1 by o2

    o2.on('click onDragged', '.owl-next', function() {

        o1.trigger('next.owl.carousel')

    });



    o2.on('click dragged.owl.carousel', '.owl-prev', function() {

        o1.trigger('prev.owl.carousel')

    });

    </script>



     <script>

    $(document).ready(function() {

        $('.search_location').keyup(function() {

            var query = $(this).val();



            $.ajax({

                url: "/search",

                method: "get",

                data: {

                    query: query

                },

                success: function(data) {

                    $('#searchlist').fadeIn();

                    $('#searchlist').html(data);

                }

            });

            // }

        });



        $(document).on('click', '#city_search', function() {

            $('#search_name').val($(this).text());

            $('#searchlist').fadeOut();

        });



        $(document).on('click', function() {

            $('#searchlist').fadeOut();

        });



        $(document).keyup(function(e) {

            if (e.key === "Escape") {

                $('#searchlist').fadeOut();

            }

        });

    });

 </script>



</body>



</html><?php /**PATH D:\rapid deals\rapidleads.buzzsummo.net\resources\views/layouts/frontend/home_design.blade.php ENDPATH**/ ?>