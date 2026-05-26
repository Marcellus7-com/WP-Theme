<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Controls_Manager;
use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lvgshop_product_list extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'lvgshop_product_list';
    }

    public function get_title() {
        return esc_html__('Lvgshop Product List', 'lvgshop-core');
    }

    public function get_icon() {
        return 'lvgshop-custom-icon';
    }

    public function get_categories() {
        return ['lvgshop-ele-widgets-cat'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'Section-Content',
            [
                'label' => esc_html__('Section Content', 'lvgshop-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'section-title',
            [
                'label' => esc_html__('Section Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trending Products', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'item_per_row',
            [
                'label' => __('Items Per Row', 'lvgshop'),
                'type' => \Elementor\Controls_Manager::NUMBER,

                'step' => 1,
                'default' => 3,
            ]
        );
        $this->add_control(
            'category',
            array(
                'label' => esc_html__('Select Category', 'lvgshop'),
                'type' => Controls_Manager::SELECT2,
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
                'label' => __('Select Product Type', 'lvgshop'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'regular',
                'options' => [
                    'regular' => __('Latest', 'lvgshop'),
                    'featured' => __('Featured', 'lvgshop'),
                    'onsale' => __('On Sale', 'lvgshop'),
                    'bestseller' => __('Best Seller', 'lvgshop'),
                ],
            ]
        );
        $this->add_control(
            'Title-Wrap',
            [
                'label' => esc_html__('Title Wrap', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'textdomain'),
                'label_off' => esc_html__('No', 'textdomain'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section-Title-style',
            [
                'label' => esc_html__('Section Title Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Section-Title-color',
            [
                'label' => esc_html__('Section Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el2-products-list h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Title-typography',
                'label' => esc_html__('Section Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el2-products-list h3',
            ]
        );
        $this->add_control(
            'Section-Title-Border-color',
            [
                'label' => esc_html__('Section Title Border Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el2-products-list h3::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Product-style',
            [
                'label' => esc_html__('Product Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Product-Title-color',
            [
                'label' => esc_html__('Product Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el2-horizontal-card .el2-card-content a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Product-Title-typography',
                'label' => esc_html__('Product Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el2-horizontal-card .el2-card-content a',
            ]
        );
        $this->add_control(
            'Product-Sale-Price-color',
            [
                'label' => esc_html__('Product Sale Price Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el2-horizontal-card .el2-card-content .el2-pricing' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Product-Regular-Price-color',
            [
                'label' => esc_html__('Product Regular Price Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el2-horizontal-card .el2-card-content .el2-pricing del' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Action-Box-options',
            [
                'label' => esc_html__('Action Box Options', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'Action-Box-BG-color',
            [
                'label' => esc_html__('Action Box BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el2-horizontal-card .el2-action-box' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Action-Box-Icon-color',
            [
                'label' => esc_html__('Action Box Icon Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el2-horizontal-card .el2-action-box a.add-to-cart-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el2-horizontal-card .compare-button .woosc-btn:before' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();


    }


    protected function render() {
        $settings = $this->get_settings_for_display();
        $title_wrap_class = '';
        if ('yes' == $settings['Title-Wrap']){
            $title_wrap_class = 'product_list_widget_title_wrap';
        }

        $category = $settings['category'];
        $item_per_row = $settings['item_per_row'];
        $product_type = $settings['product_type'];
        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        if ($product_type == 'onsale') {
            $product_args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'paged' => $paged,
                'posts_per_page' => $item_per_row,
                'meta_query' => WC()->query->get_meta_query(),
                'post__in' => array_merge(array(0), wc_get_product_ids_on_sale())
            );

        } else {
            $product_args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'paged' => $paged,
                'posts_per_page' => $item_per_row,
            );
        }
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
        $the_query = new \WP_Query($product_args);

        ?>
        <div class="el2-products-list <?php echo $title_wrap_class; ?>">
            <?php if ($settings['section-title']) { ?>
                <h3 class="mb-4 fw-medium"><?php echo $settings['section-title']; ?></h3>
            <?php } ?>
            <?php
            $i = 0;
            while ($the_query->have_posts()) {
                $i++;
                $the_query->the_post();
                $product = wc_get_product();

                // Create an Object
                $productID = new stdClass();

                // Added property to the object
                $productID->ID = $product->get_id();
                $nonce = wp_create_nonce("product_nonce");
                ?>
                <div class="el2-horizontal-card position-relative <?php if (1 < $i) echo 'mt-30'; ?>">
                    <div class="el2-feature-image">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="not found" class="img-fluid">
                        </a>
                    </div>
                    <div class="el2-card-content">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <div class="el2-rating-star">
                            <?php lvgshop_get_star_rating(); ?>
                        </div>
                        <div class="el2-pricing">
                            <?php
                            echo $product->get_price_html();
                            ?>
                        </div>

                    </div>
                    <div class="el2-action-box">
                        <?php do_action('lvgshop_product_add_to_cart_sm_btn', $productID, $product, $nonce); ?>
                        <?php lvgshop__compare_icon_in_product_card(); ?>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
            ?>
        </div>
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \lvgshop_product_list());

