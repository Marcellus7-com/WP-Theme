<?php
function crete_election_one($settings)
{
    ?>
    <!-- feature section start -->
    <section class="el-feature-section pt-100 pb-90">
        <div class="container container-xxxl">
            <!-- title bar -->
            <div class="row align-items-center mb-10">
                <div class="col-md-6">
                    <h2 class="text-capitalize font-semibold wow fadeInUp">
                        <?php echo esc_html($settings['widget_main_titles']); ?>
                    </h2>
                </div>
                <div class="col-md-6 d-flex justify-content-md-end mt-30 mt-md-0">
                    <a class="btn-dark el-btn wow fadeInUp"
                       href="<?php echo esc_url($settings['website_links']['url']); ?>"><?php echo esc_html($settings['widget_button_titles']); ?><?php \Elementor\Icons_Manager::render_icon($settings['button_icons'], ['aria-hidden' => 'true']); ?></a>
                </div>
            </div>

            <!-- main content -->
            <div class="row">
                <?php
                $item_per_row = $settings['item_per_row'];
                $selected_product_category = $settings['selected_product_category'];
                $items_per_row = $item_per_row;
                $terms = get_terms(array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => false,
                    'include' => $selected_product_category,
                ));
                $col_grid = "";
                switch ($items_per_row) {
                    case 3:
                        $show_items = "col-md-6 col-xl-4";
                        break;
                    case 4:
                        $show_items = "col-md-6 col-xl-3";
                        break;
                    case 6:
                        $show_items = "col-md-6 col-xl-5";
                        break;
                    case 5:
                        $col_grid = "row-cols-5 ";
                        $show_items = "col mb-4";
                        break;
                }

                if ($terms) {
                    foreach ($terms as $term) {
                        $children = get_terms($term->taxonomy, array(
                            'parent' => $term->term_id,
                            'hide_empty' => false
                        ));

                        $cat_thumb_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                        $cat_image = wp_get_attachment_image_url($cat_thumb_id, 'category-list-block-catagories');
                        // $cat_image = wp_get_attachment_url($cat_thumb_id, 'lvgshop-grid-post');
                        ?>
                        <div class="<?php echo $show_items; ?>  mt-40 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="single-fea-category">
                                <h4 class="font-medium text-capitalize"><a href="<?php echo get_term_link( $term->slug, 'product_cat' ); ?>"><?php echo $term->name; ?></a></h4>
                                <ul>
                                    <?php

                                    if ($children) {
                                        foreach ($children as $subcat) {


                                            ?>
                                            <li><a href="<?php echo get_term_link( $subcat->slug, 'product_cat' ); ?>"><?php echo $subcat->name; ?></a></li>
                                                <?php
                                            
                                        }
                                    }

                                    ?>
                                </ul>
                                <div class="img-wrapper">
                                    <?php if ($cat_image) {
                                        echo "<img src='{$cat_image}' alt='' />";
                                    } ?>

                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>
        </div>
    </section>
    <!-- feature section end -->
    <?php
}

function crete_election_two($settings)
{
    ?>
    <!--categories section start-->
    <section class="el2-categories-section bg-white overflow-hidden">
    <div class="container-1440">
    <div class="row align-items-center g-5">
    <div class="col-xxl-5 col-xl-6 overflow-hidden">
        <div class="el2-category-content el2-section-title">
            <span
                    class="el2-subtitle text-uppercase secondary-text-color fw-semibold d-block mb-1 wow animate__fadeInLeft"
                    data-wow-delay=".1s"><?php echo esc_html($settings['widget_sub_titles']); ?></span>
            <h2 class="mb-32 fw-semibold wow animate__fadeInLeft" data-wow-delay=".2s">
                <?php echo esc_html($settings['widget_main_titles']); ?>
            </h2>
            <p class="mb-5 wow animate__fadeInLeft" data-wow-delay=".2s">
                <?php echo esc_html($settings['widget_decription_titles']); ?>
            </p>
            <a href="<?php echo esc_url($settings['website_links']['url']); ?>"
               class="btn-blue el-btn wow animate__fadeInLeft"
               data-wow-delay=".3s"><?php echo esc_html($settings['widget_button_titles']); ?><?php \Elementor\Icons_Manager::render_icon($settings['button_icons'], ['aria-hidden' => 'true']); ?></span></a>
        </div>
    </div>
    <div class="col-xxl-7">
    <div class="row g-30">
    <?php
    $item_per_row = $settings['item_per_row'];
    $selected_product_category = $settings['selected_product_category'];
    $items_per_row = $item_per_row;
    $terms = get_terms(array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'include' => $selected_product_category,
    ));
    $col_grid = "";
    switch ($items_per_row) {
        case 3:
            $show_items = "col-md-6 col-xl-4";
            break;
        case 4:
            $show_items = "col-md-6 col-xl-3";
            break;
        case 6:
            $show_items = "col-md-6 col-xl-5";
            break;
        case 5:
            $col_grid = "row-cols-5 ";
            $show_items = "col mb-4";
            break;
    }

    if ($terms) {
       $x = 0;
        foreach ($terms as $term) {
            $children = get_terms($term->taxonomy, array(
                'parent' => $term->term_id,
                'hide_empty' => false
            ));
            $cat_thumb_id = get_term_meta($term->term_id, 'thumbnail_id', true);
            $cat_image = wp_get_attachment_image_url($cat_thumb_id, 'category-list-block-catagories');
    
            if( !$term->count == 0 ){
                ?>

                <div class="col-lg-3 col-sm-4 wow fadeInUp" data-wow-delay=".<?php echo $x++; ?>s">
                    <div class="el2-icon-box text-center">
                <span class="icon-wrapper">
                  <?php if ($cat_image) {
                      echo "<img src='{$cat_image}' alt='' />";
                  } ?>

                </span>
                        <a href="<?php echo get_term_link( $term->slug, 'product_cat' ); ?>">
                            <h6 class="mb-1 mt-4"><?php echo $term->name; ?></h6>
                        </a>
                        <p class="mb-0"><?php echo esc_html( $term->count ) . ""; ?> Products</p>
                    </div>
                </div>
                <?php
            }

        }}
            ?>

            </div>
            </div>
            </div>
            </div>
            </section>
            <!--categories section end-->
            <?php
}
function crete_election_three($settings)
{
    ?>
    <!-- feature section start -->
    <section class="el-feature-section el-feature-section-3 pb-30 pt-80 wow fadeInUp">
        <div class="container container-xxxl position-relative">
            <!-- title bar -->
            <div class="row align-items-center mb-20">
                <div class="col-md-6">
                    <h3 class="text-capitalize font-semibold">
                        <?php echo esc_html($settings['widget_main_titles']); ?>
                    </h3>
                </div>
            </div>
            <div class="divider mb-30"></div>
            <!-- main content -->
            <div class="el-home-3-fea-slider">
                <?php
                $item_per_row = $settings['item_per_row'];
                $selected_product_category = $settings['selected_product_category'];
                $items_per_row = $item_per_row;
                $terms = get_terms(array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => false,
                    'include' => $selected_product_category,
                ));
                $col_grid = "";
                switch ($items_per_row) {
                    case 3:
                        $show_items = "col-md-6 col-xl-4";
                        break;
                    case 4:
                        $show_items = "col-md-6 col-xl-3";
                        break;
                    case 6:
                        $show_items = "col-md-6 col-xl-5";
                        break;
                    case 5:
                        $col_grid = "row-cols-5 ";
                        $show_items = "col mb-4";
                        break;
                }

                if ($terms) {
                    foreach ($terms as $term) {
                        $children = get_terms($term->taxonomy, array(
                            'parent' => $term->term_id,
                            'hide_empty' => false
                        ));
                        $cat_thumb_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                        $cat_image = wp_get_attachment_image_url($cat_thumb_id, 'category-list-block-catagories');
                    
                        ?>
                        <div class="single-fea-category">
                            <h5 class="font-medium text-capitalize">
                                <?php echo $term->name; ?>
                            </h5>
                            <ul>
                                <?php

                                if ($children) {
                                    foreach ($children as $subcat) {

                                        echo '<li><a href="' . esc_url(get_term_link($subcat, $subcat->taxonomy)) . '"><span>' . $subcat->name . '</span> </a></li>';
                                        
                                    }
                                }

                                ?>
                            </ul>

                            <a class="cate-btn" href="<?php echo get_term_link( $subcat->slug, 'product_cat' ); ?>"><?php echo esc_html($settings['widget_button_titles']); ?><?php \Elementor\Icons_Manager::render_icon($settings['button_icons'], ['aria-hidden' => 'true']); ?></a>

                            <div class="img-wrapper-2">
                                <?php if ($cat_image) {
                                    echo "<img src='{$cat_image}' alt='' />";
                                } ?>
                            </div>
                        </div>
                        <?php
                    }}
                ?>

            </div>
        </div>
    </section>
    <!-- feature section end -->
    <?php
}