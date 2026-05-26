<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Controls_Manager;
use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lvgshop_product_grid extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'lvgshop_product_grid';
    }

    public function get_title() {
        return esc_html__('Lvgshop Product Grid', 'lvgshop-core');
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
            'product_section_style',
            [
                'label' => __('Select Section Style', 'lvgshop'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'one',
                'options' => [
                    'one' => __('List Style One', 'lvgshop'),
                    'two' => __('List Style Two', 'lvgshop'),
                    'three' => __('List Style Three', 'lvgshop'),


                ],
            ]
        );
        $this->add_control(
            'item_per_row',
            [
                'label' => __('Items Per Row', 'lvgshop'),
                'type' => \Elementor\Controls_Manager::NUMBER,

                'step' => 1,
                'default' => 2,
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
        $this->end_controls_section();


    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $product_section_style = $settings['product_section_style'];
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
        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-<?php echo $item_per_row; ?>">
                <?php
                    if ($the_query->have_posts()) {
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            echo '<div class="col">';
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
                            echo '</div>';
                        }
                        wp_reset_postdata();
                    }
                ?>
        </div>
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \lvgshop_product_grid());

