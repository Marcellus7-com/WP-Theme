<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lvgshop_flash_sell_grid extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'lvgshop_flash_sell_grid';
    }

    public function get_title()
    {
        return esc_html__('Lvgshop Flash Sell Product Grid', 'lvgshop-core');
    }

    public function get_icon()
    {
        return 'lvgshop-custom-icon';
    }

    public function get_categories()
    {
        return ['lvgshop-ele-widgets-cat'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'Brand-Logo-Content',
            [
                'label' => esc_html__('Flash Sell Product Grid', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'flash_sell_title',
            [
                'label' => esc_html__( 'Title', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Todays Flash Sales', 'textdomain' ),
                'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'flash_sell_subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'TRENDING ITEMS', 'textdomain' ),
                'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'due_date',
            [
                'label' => esc_html__('Offer Time Set', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'product_section_style',
            [
                'label' => __('Select Product Style', 'lvgshop'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'two',
                'options' => [
                    'one' => __(' Style One', 'lvgshop'),
                    'two' => __(' Style Two', 'lvgshop'),
                    'three' => __(' Style Three', 'lvgshop'),


                ],
            ]
        );
        $this->add_control(
            'item_per_page',
            [
                'label' => __('Number of Products to Show', 'nikstore-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 2,
                'max' => 1000,
                'step' => 1,
                'default' => 8,
            ]
        );
        $this->add_control(
            'selected_product_category',
            array(
                'label' => esc_html__('Select Category', 'lvgshop-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => array_flip(lvgshop_elements_categories('categories', array(
                    'sort_order' => 'ASC',
                    'taxonomy' => 'product_cat',
                    'hide_empty' => false,
                ))),
                'label_block' => true,
            )
        );

        $this->add_control(
            'product_type',
            [
                'label' => __('Select Product Type', 'nikstore-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'regular',
                'options' => [
                    'regular' => __('Regular', 'nikstore-core'),
                    'featured' => __('Featured', 'nikstore-core'),
                    'onsale' => __('On Sale', 'nikstore-core'),
                    'bestseller' => __('Best Seller', 'nikstore-core'),
                ],

                // 'condition' => [
                //     'product_rightside_btn_flt' => 'ones',
                // ],

            ]
        );
        $this->add_control(
            'flash_button',
            [
                'label' => esc_html__( 'Button Text', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Default title', 'textdomain' ),
                'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'flash_button_link',
            [
                'label' => esc_html__( 'Link', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'style_section_main',
            [
                'label' => esc_html__( 'Flash Section Style', 'textdomain' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Section-Padding',
            [
                'label' => esc_html__('Section Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .el2-trending-products' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'style_section_main_title',
            [
                'label' => esc_html__( 'Title Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fw-semibold' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style_section_main_title_typography',
                'label' => esc_html__( ' Title typography', 'textdomain' ),
                'selector' => '{{WRAPPER}} .fw-semibold',

            ]
        );
        $this->add_control(
            'style_section_main_sub_title',
            [
                'label' => esc_html__( 'Sub Title Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el2-section-subtitle' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style_section_main_sub_title_typography',
                'label' => esc_html__( 'Sub Title typography', 'textdomain' ),
                'selector' => '{{WRAPPER}} .el2-section-subtitle',

            ]
        );
        $this->add_control(
            'style_section_main_counter_text',
            [
                'label' => esc_html__( 'Sub Title Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el2-countdown-timer li span' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',

            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style_section_main_counter_typography',
                'label' => esc_html__( 'Sub Title typography', 'textdomain' ),
                'selector' => '{{WRAPPER}} .el2-countdown-timer li span',

            ]
        );
        $this->add_control(
            'style_section_main_counter_bg',
            [
                'label' => esc_html__( 'Sub Title Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el2-countdown-timer li span' => 'background-color: {{VALUE}}',
                ],

            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'style_section_button',
            [
                'label' => esc_html__( 'Flash Button Style', 'textdomain' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'style_section_main_button',
            [
                'label' => esc_html__( 'Button Text Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-blue' => 'color: {{VALUE}}',
                ],

            ]
        );
        $this->add_control(
            'style_section_main_button_hover',
            [
                'label' => esc_html__( 'Button Text Hover Color ', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-blue:hover' => 'color: {{VALUE}}',
                ],

            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style_section_button_s_typography',
                'label' => esc_html__( 'Button typography', 'textdomain' ),
                'selector' => '{{WRAPPER}} .el-btn.btn-blue',

            ]
        );
        $this->add_control(
            'style_section_main_button_bg',
            [
                'label' => esc_html__( 'Button Background', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-blue' => 'background-color: {{VALUE}}',
                ],

            ]
        );
        $this->add_control(
            'style_section_main_button_bg_hover',
            [
                'label' => esc_html__( 'Button Background Hover', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-blue:hover' => 'background-color: {{VALUE}}',
                ],

            ]
        );
        $this->add_control(
            'Button-Border-Radius',
            [
                'label' => esc_html__('Button Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-blue' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $item_per_page = $settings['item_per_page'];
        $product_section_style = $settings['product_section_style'];
        $selected_product_category = $settings['selected_product_category'];
        $product_type = $settings['product_type'];
        $time = $settings['due_date'];
        $date = date_create($time);
        $animation = 1;

        if ($product_type == 'onsale') {
            $product_args = array(
                'post_type' => 'product',
                'post_status' => 'publish',

                'posts_per_page' => $item_per_page,
                'meta_query' => WC()->query->get_meta_query(),
                'post__in' => array_merge(array(0), wc_get_product_ids_on_sale())
            );

        } else {
            $product_args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'posts_per_page' => $item_per_page,
            );
        }
        if (!empty($selected_product_category[0])) {
            $product_args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'ids',
                    'terms' => $selected_product_category,
                )
            );
        }

        if ($product_type == 'featured') {
            $product_args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field' => 'name',
                    'terms' => 'featured',
                    'operator' => 'IN',
                )
            );
        }
        if ($product_type == 'bestseller') {
            $product_args['meta_query'] = array(

                array(
                    'key' => 'total_sales',
                    'value' => 0,
                    'compare' => '>',
                    'type' => 'numeric'
                )
            );

        }

        ?>
        <!--trending products section start-->
        <section class="el2-trending-products bg-white overflow-hidden pt-115">
            <div class="container-1440">
                <div class="row align-items-center">
                    <div class="col-lg-6 wow fadeInUp">
                        <div class="el2-section-title text-center text-lg-start">
                            <span class="el2-section-subtitle"><?php echo $settings['flash_sell_subtitle']; ?></span>
                            <h2 class="fw-semibold"><?php echo $settings['flash_sell_title']; ?></h2>
                        </div>
                    </div>
                    <?php if ($time){ ?>
                    <div class="col-lg-6 wow fadeInUp">
                        <div class="text-center text-xl-end mt-5 mt-lg-0 countdown-timer " data-date="<?php echo date_format($date, 'Y-n-d'); ?> 23:59:59">
                            <ul class="el2-countdown-timer">
                                <li><span class="days">20</span></li>
                                <li><span class="hours">11</span></li>
                                <li><span class="minutes">34</span></li>
                                <li><span class="seconds">59</span></li>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="row g-30 mt-20">
                    <?php
                    $the_query = new \WP_Query($product_args);
                    if ($the_query->have_posts()) {
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            global $product;
                            ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".<?php echo $animation++; ?>s">
                                <?php
                                switch ($product_section_style) {
                                    case "one":
                                        get_template_part('inc/vendor/woocommerce/product-style/product-style-one');
                                        break;
                                    case "two":
                                        get_template_part('inc/vendor/woocommerce/product-style/product-style-two');
                                        break;
                                    case "three":
                                        get_template_part('inc/vendor/woocommerce/product-style/product-style-three');
                                        break;
                                }

                                ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="col-12 d-flex justify-content-center">
                        <a href="<?php echo $settings['flash_button_link']['url']; ?>" class="btn-blue el-btn wow animate__fadeInLeft position-relative z-1"
                           data-wow-delay=".3s" style="
                visibility: visible;
                animation-delay: 0.3s;
                animation-name: fadeInLeft;
              "><?php echo $settings['flash_button']; ?>
                            <span class="ms-2"><i class="fas fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
        </section>
        <!--trending products section end-->
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \lvgshop_flash_sell_grid());

