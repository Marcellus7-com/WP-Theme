<?php
global $product;
?>

<!--product details start-->
<section class="el-main-product-details-section ptb-120 wow fadeInUp">
    <div class="container container-xxxl">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-12 col-xl-5 ">
                        <?php wc_get_template_part('single-product/lvgshop-product-single-slider', 'style-three'); ?>
                    </div>
                    <div class="col-12 col-xl-7">
                        <?php wc_get_template_part('single-product/lvgshop-product-single', 'info'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 mt-60 mt-lg-0">
                <?php wc_get_template_part('single-product/lvgshop-product-shiping', 'sidebar'); ?>
            </div>
        </div>
    </div>
    </div>
</section>
<!---product details end-->


