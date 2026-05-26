<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Controls_Manager;
use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lvgshop_product_filter extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'lvgshop_product_filter';
    }

    public function get_title() {
        return esc_html__('Lvgshop Product Filter', 'lvgshop-core');
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
            'item_per_row',
            [
                'label' => __('Items Per Row', 'nikstore-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 2,
                'max' => 6,
                'step' => 1,
                'default' => 4,
            ]
        );
        $this->add_control(
            'filter_align',
            [
                'label' => esc_html__('Filter Alignment', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'justify-content-start',
                'options' => [

                    'justify-content-start' => esc_html__('Left', 'textdomain'),
                    'justify-content-end' => esc_html__('Right', 'textdomain'),

                    'justify-content-center' => esc_html__('Center', 'textdomain'),
                    'justify-content-between' => esc_html__('Justfied', 'textdomain'),

                ],

            ]
        );
        $this->add_control(
            'filter_title',
            [
                'label' => esc_html__('Section Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section-style',
            [
                'label' => esc_html__('Section Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Section-Title-color',
            [
                'label' => esc_html__('Section Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ajax_epc_section_title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Title-typography',
                'label' => esc_html__('Section Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .ajax_epc_section_title',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Filter-Nav-style',
            [
                'label' => esc_html__('Filter Nav Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Filter-Nav-color',
            [
                'label' => esc_html__('Filter Nav Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ajax-posts__filter' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Filter-Nav-typography',
                'label' => esc_html__('Filter Nav Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .ajax-posts__filter',
            ]
        );
        $this->add_control(
            'Filter-Active-Nav-color',
            [
                'label' => esc_html__('Filter Active Nav Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-popular-product-section .el-hm1-filter-btn-group .is_active' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Load-More-style',
            [
                'label' => esc_html__('Load More Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Load-More-Button-color',
            [
                'label' => esc_html__('Load More Button Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ajax-posts__load-more .js-load-more' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Load-More-Button-typography',
                'label' => esc_html__('Load More Button Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .ajax-posts__load-more .js-load-more',
            ]
        );
        $this->add_control(
            'Load-More-Button-Hover-color',
            [
                'label' => esc_html__('Load More Button Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ajax-posts__load-more .js-load-more' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Load-More-Button-Hover-options',
            [
                'label' => esc_html__('Load More Button Hover Options', 'textdomain'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'Button-Hover-color',
            [
                'label' => esc_html__('Button Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ajax-posts__load-more .js-load-more:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button-Hover-BG--color',
            [
                'label' => esc_html__('Button Hover BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ajax-posts__load-more .js-load-more:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $item_per_page = $settings['item_per_page'];
        $item_per_row = $settings['item_per_row'];
        $filter_align = $settings['filter_align'];
        $filter_title = $settings['filter_title'];
        ?>

        <?php echo do_shortcode("[ttc_ajax_filter post_type='product' tax='product_cat' posts_per_page='$item_per_page'  column='$item_per_row' filteralign='$filter_align' titlecontent='$filter_title']"); ?>
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \lvgshop_product_filter());

