<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Controls_Manager;
use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Lvgshop_product_tabs extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'Lvgshop_product_tabs';
    }

    public function get_title()
    {
        return esc_html__('Lvgshop Tab', 'lvgshop-core');
    }

    public function get_icon()
    {
        return 'lvgshop-custom-icon';
    }

    public function get_categories()
    {
        return ['lvgshop-ele-widgets-cat'];
    }

    protected function register_controls() {



        $this->start_controls_section(
            'Product-style-Three-Content',
            [
                'label' => esc_html__('Tab Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_title',
            [
                'label' => esc_html__( 'Button Text', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'View All Product', 'textdomain' ),
                'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_link',
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
        $repeater_style = new \Elementor\Repeater();

        $repeater_style->add_control(
            'tab_title',
            [
                'label' => esc_html__('Tab Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Best Seller', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater_style->add_control(
            'active_tab',
            [
                'label' => esc_html__('Active Tab', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'your-plugin'),
                'label_off' => esc_html__('No', 'your-plugin'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater_style->add_control(
            'item_per_page',
            [
                'label' => __('Number of Products to Show', 'textdomain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 2,
                'max' => 1000,
                'step' => 1,
                'default' => 8,
            ]
        );
        $repeater_style->add_control(
            'category',
            [
                'label' => esc_html__('Select Category', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => array_flip(Lvgshop_elements_categories('categories', array(
                    'sort_order' => 'ASC',
                    'taxonomy' => 'product_cat',
                    'hide_empty' => false,
                ))),
                'label_block' => true,
            ]
        );

        $repeater_style->add_control(
            'product_type',
            [
                'label' => __('Select Product Type', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'regular',
                'options' => [
                    'regular' => __('Regular', 'textdomain'),
                    'featured' => __('Featured', 'textdomain'),
                    'onsale' => __('On Sale', 'textdomain'),
                    'bestseller' => __('Best Seller', 'textdomain'),
                ],
            ]
        );

        $this->add_control(
            'tab_list',
            [
                'label' => esc_html__('Repeater List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater_style->get_controls(),
                'default' => [
                    [
                        'tab_title' => esc_html__('Best Seller', 'textdomain'),
                        'active_tab' => 'yes',
                    ],
                    [
                        'tab_title' => esc_html__('New Arrivals', 'textdomain'),
                        'active_tab' => 'no',
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'Product-tab_style',
            [
                'label' => esc_html__('Product Tab Bottom', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'product_section_style' => 'style_1',
                ],
            ]
        );
        $this->add_control(
            'Product_button_text',
            [
                'label' => esc_html__('Button Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Shope All',
                'label_block' => true,
            ]

        );
        $this->add_control(
            'Product_button_link',
            [
                'label' => esc_html__('Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
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
            'filter_section-style_top-filter',
            [
                'label' => esc_html__('Section Top Filter ', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'filter_top_title-filter_main_color',
            [
                'label' => esc_html__('Filter Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-filter-section-3 .product-filter-nav button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'filter_top_title-filter_main_color_hover',
            [
                'label' => esc_html__('Filter Text Color Hover / Active', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-filter-section-3 .product-filter-nav button.active' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'filter_top_title-filter_main_typography',
                'label' => esc_html__('Filter Text Typography', 'textdomain'),
                'selector' => '{{WRAPPER}}  .product-filter-section-3 .product-filter-nav button',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'filter_section-button',
            [
                'label' => esc_html__('Section Button ', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'filter_top_title-button_color',
            [
                'label' => esc_html__('Button Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-yellow' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'filter_top_title-button_color_hver',
            [
                'label' => esc_html__('Button Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-yellow:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'filter_top_button_typography',
                'label' => esc_html__('Filter Text Typography', 'textdomain'),
                'selector' => '{{WRAPPER}}  .el-btn.btn-yellow',
            ]
        );
        $this->add_control(
            'filter_top_title-button',
            [
                'label' => esc_html__('Button BG', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-yellow' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'filter_top_title-button_hvr',
            [
                'label' => esc_html__('Button Hover BG', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-yellow:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'Product_batch',
            [
                'label' => esc_html__('Product Discount Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Product_batch_color',
            [
                'label' => esc_html__('Product Discount Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rectangle-badge , {{WRAPPER}}  .vr4-product-card .feature-image .badge-white , {{WRAPPER}} .circle-badge' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Product_batch_color_bg',
            [
                'label' => esc_html__('Product Discount Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rectangle-badge , {{WRAPPER}}  .vr4-product-card .feature-image .badge-white , {{WRAPPER}} .circle-badge' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'filter_top_title-Product_batch_color_bg_typo',
                'label' => esc_html__('Filter Text Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .ajax-posts__filter:hover, {{WRAPPER}}  .ajax-posts__filter.is-active , {{WRAPPER}}  .vr4-product-card .feature-image .badge-white , {{WRAPPER}} .circle-badge',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Product_icon',
            [
                'label' => esc_html__('Product Icon Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Product_discount_color',
            [
                'label' => esc_html__('Product Icon Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} path' => 'stroke: {{VALUE}}',
                    '{{WRAPPER}} .action-box i , {{WRAPPER}} .product-action-btns i , {{WRAPPER}}  .tooltip-text , {{WRAPPER}} .cart-action-box a , {{WRAPPER}}  .action-box .action-btns a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Product_discount_color_bg',
            [
                'label' => esc_html__('Product Icon Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vr-product-card .action-box  , {{WRAPPER}} .tooltip-text , {{WRAPPER}} .vr-product-card .action-box a .tooltip-text::before , {{WRAPPER}}  .vr6-product-card .feature-image .product-action-btns a , {{WRAPPER}} .cart-action-box a , {{WRAPPER}} .vr4-product-card .feature-image .cart-action-box .btn-squre a , {{WRAPPER}}  .action-box .action-btns a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Product_discount_color_bg_hover',
            [
                'label' => esc_html__('Product Icon Hover Background Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vr6-product-card .feature-image .product-action-btns a::before , {{WRAPPER}} .vr4-product-card .feature-image .cart-action-box .btn-squre a::before , {{WRAPPER}} .vr4-product-card .feature-image .cart-action-box a.btn-squre:hover::before , {{WRAPPER}}  .action-box .action-btns a:hover::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Product_ad_to_cart_color',
            [
                'label' => esc_html__('Add To Cart Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vr4-product-card .cart-action-box  .cart-btn  a, {{WRAPPER}} .vr4-product-card .cart-action-box  .cart-btn  a span , {{WRAPPER}} .vr5-product-card .cart-btn  a , {{WRAPPER}} .vr5-product-card  .cart-btn  a span ,  {{WRAPPER}} .vr6-product-card-content .template-btn   a , {{WRAPPER}} .vr6-product-card-content .template-btn a span' => 'color: {{VALUE}}!important',
                ],
            ]
        );
        $this->add_control(
            'Product_ad_to_cart_color_bg',
            [
                'label' => esc_html__('Add TO cart Bg Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vr4-product-card .feature-image .cart-action-box .cart-btn , {{WRAPPER}} .vr4-feature-image-slider .tooltip-text , {{WRAPPER}} .vr5-product-card  .cart-btn , {{WRAPPER}} .vr5-feature-image-slider .tooltip-text , {{WRAPPER}} .vr6-product-card-content .template-btn , ' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Product_ad_to_cart_color_bg_hover',
            [
                'label' => esc_html__('Add TO cart Hover Bg Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vr4-product-card .feature-image .cart-action-box .cart-btn::before , {{WRAPPER}} .vr5-product-card .cart-btn::before , {{WRAPPER}} .vr6-product-card-content .template-btn::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Product_add_to_cart_color',
            [
                'label' => esc_html__('Product Add to Cart Border Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} path' => 'stroke: {{VALUE}}',
                    '{{WRAPPER}} .vr6-product-card .vr6-product-card-content .template-btn' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'Category-style',
            [
                'label' => esc_html__('Category Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'product_section_style' => ['style_1', 'style_2'],
                ],
            ]
        );
        $this->add_control(
            'Category-color',
            [
                'label' => esc_html__('Category Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .Lvgshop__product_style_cat a , {{WRAPPER}} .fw-semibold a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Category-typography',
                'label' => esc_html__('Category Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .Lvgshop__product_style_cat a , {{WRAPPER}} .fw-semibold a',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Product-Title-style',
            [
                'label' => esc_html__('Product Title Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Product-Title-color',
            [
                'label' => esc_html__('Product Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card-bottom h5 , {{WRAPPER}}  .vr4-product-card h5 , {{WRAPPER}} .fw-semibold' => 'color: {{VALUE}}',

                ],
            ]
        );
        $this->add_control(
            'Product-Title-color_hover',
            [
                'label' => esc_html__('Product Title Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vr-product-card .card-bottom h5:hover , {{WRAPPER}}  .fw-semibold:hover' => 'color: {{VALUE}}',

                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Product-Title-typography',
                'label' => esc_html__('Product Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .card-bottom h5 , {{WRAPPER}}  .vr4-product-card h5',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'product_decription',
            [
                'label' => esc_html__('Product Decription', 'woodly-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Product-decription-color',
            [
                'label' => esc_html__('Product Decription Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .product-content p' => 'color: {{VALUE}}',

                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Product-decription-typography',
                'label' => esc_html__('Product Decription Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .product-content p',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Product-Price-style',
            [
                'label' => esc_html__('Product Price Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Product-Price-color',
            [
                'label' => esc_html__('Product Price Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text-main-color' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Product-Price-typography',
                'label' => esc_html__('Product Price Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .text-main-color',
            ]
        );
        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();


            ?>

            <!-- products section start -->
            <div class="product-filter-section-3 pb-60 wow fadeInUp">
                <ul class="nav product-filter-nav" id="nav-filter-1" role="tablist">
                    <?php
                    $i = 0;
                    foreach ($settings['tab_list'] as $item) {
                        $active_tab = $item['active_tab'];
                        $acvtclass = "";
                        if ($active_tab == "yes") {
                            $acvtclass = "active";
                        }
                        ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?php echo $acvtclass; ?>" id="el-filter-<?php echo esc_attr($item['_id']); ?>-tab" data-bs-toggle="tab" data-bs-target="#el-filter-<?php echo esc_attr($item['_id']); ?>"
                                    type="button" role="tab" aria-controls="el-filter-<?php echo esc_attr($item['_id']); ?>" aria-selected="true">
                                <?php echo esc_attr($item['tab_title']); ?>
                            </button>
                        </li>


                        <?php
                    }
                    ?>

                </ul>
                <div class="divider"></div>
                <div class="tab-content" id="myTabContent1">
                    <?php foreach ($settings['tab_list'] as $item) {
                        $category = $item['category'];
                        $product_type = $item['product_type'];
                        $item_per_page = $item['item_per_page'];

                        $active_tab = $item['active_tab'];

                        $acvpclass = "";
                        if ($active_tab == "yes") {
                            $acvpclass = "show active";
                        }
                        ?>
                        <div class="tab-pane fade <?php echo $acvpclass; ?>" id="el-filter-<?php echo esc_attr($item['_id']); ?>" role="tabpanel" aria-labelledby="el-filter-<?php echo esc_attr($item['_id']); ?>-tab">
                            <div class="row g-4">
                                <?php
                                $product_args = array(
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    'posts_per_page' => $item_per_page,
//                                    'order' => $order,

                                );
                                if (!empty($category[0])) {
                                    $product_args['tax_query'] = array(
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field' => 'ids',
                                            'terms' => $category
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
                                $the_query = new \WP_Query($product_args);
                                while ($the_query->have_posts()) {
                                    $the_query->the_post();

                                    ?>

                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <?php
                                        get_template_part('inc/vendor/woocommerce/product-style/product-style-one');
                                        ?>


                                    </div>

                                    <?php
                                }
                                wp_reset_postdata();
                                ?>

                            </div>

                        </div>


                        <?php
                    }
                    ?>


                </div>

                <!-- view all button -->
                <div class="d-flex justify-content-center">
                    <a class="btn-yellow el-btn text-center mt-30" href="<?php echo $settings['button_link']; ?>"><?php echo $settings['button_title']; ?> <i
                                class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <!-- products section end -->



        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \Lvgshop_product_tabs());

