<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lvgshop_banner extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'lvgshop_banner';
    }

    public function get_title() {
        return esc_html__('Lvgshop Banner', 'lvgshop-core');
    }

    public function get_icon() {
        return 'lvgshop-custom-icon';
    }

    public function get_categories() {
        return ['lvgshop-ele-widgets-cat'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'Widget-style-section',
            [
                'label' => esc_html__('Widget Style Section', 'lvgshop-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'Widget-Style',
            [
                'label' => esc_html__('Select Widget Style', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'style_1',
                'options' => [
                    'style_1' => esc_html__('Style 1', 'textdomain'),
                    'style_2' => esc_html__('Style 2', 'textdomain'),
                    'style_3' => esc_html__('Style 3', 'textdomain'),
                    'style_4' => esc_html__('Style 4', 'textdomain'),
                    'style_5' => esc_html__('Style 5', 'textdomain'),
                    'style_6' => esc_html__('Style 6', 'textdomain'),
                    'style_7' => esc_html__('Style 7', 'textdomain'),
                    'style_8' => esc_html__('Style 8', 'textdomain'),
                    'style_9' => esc_html__('Style 9', 'textdomain'),
                    'style_10' => esc_html__('Style 10', 'textdomain'),
                    'style_11' => esc_html__('Style 11', 'textdomain'),
                    'style_12' => esc_html__('Style 12', 'textdomain'),
                    'style_13' => esc_html__('Style 13', 'textdomain'),
                    'style_14' => esc_html__('Style 14', 'textdomain'),
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section-Content',
            [
                'label' => esc_html__('Section Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'section_bg_img',
            [
                'label' => esc_html__('Section BG Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'right_banner_img',
            [
                'label' => esc_html__('Right BG Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'Widget-Style' => 'style_13',
                ],
            ]
        );
        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('discover tools', 'textdomain'),
                'placeholder' => esc_html__('Type your subtitle here', 'textdomain'),
                'condition' => [
                    'Widget-Style!' => ['style_8', 'style_13'],
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Smart watch', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
                'condition' => [
                    'Widget-Style!' => 'style_10',
                ],
            ]
        );
        $this->add_control(
            'style-10-title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __(' Up to <span class="text-light-red">30% Off</span> Instant
                Discount', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
                'condition' => [
                    'Widget-Style' => 'style_10',
                ],
            ]
        );
        $this->add_control(
            'price_before_tagline',
            [
                'label' => esc_html__('Price Before Tagline', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Started at', 'textdomain'),
                'placeholder' => esc_html__('Type your price before tagline here', 'textdomain'),
                'condition' => [
                    'Widget-Style' => 'style_10',
                ],
            ]
        );
        $this->add_control(
            'price',
            [
                'label' => __('Price', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('$270.99', 'textdomain'),
                'placeholder' => esc_html__('Type your price here', 'textdomain'),
                'condition' => [
                    'Widget-Style' => ['style_2', 'style_10'],
                ],
            ]
        );
        $this->add_control(
            'sell_price',
            [
                'label' => esc_html__('Sell Price', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('$53.99', 'textdomain'),
                'placeholder' => esc_html__('Type your sell price here', 'textdomain'),
                'condition' => [
                    'Widget-Style' => ['style_6', 'style_12'],
                ],
            ]
        );
        $this->add_control(
            'regular_price',
            [
                'label' => esc_html__('Regular Price', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('$69.99', 'textdomain'),
                'placeholder' => esc_html__('Type your Regular price here', 'textdomain'),
                'condition' => [
                    'Widget-Style' => ['style_6', 'style_12'],
                ],
            ]
        );
        $this->add_control(
            'info',
            [
                'label' => esc_html__('Info', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Up to 70% Off & Free Shipping', 'textdomain'),
                'placeholder' => esc_html__('Type your info here', 'textdomain'),
                'condition' => [
                    'Widget-Style' => ['style_1', 'style_2', 'style_3', 'style_4', 'style_14'],
                ],
            ]
        );
        $this->add_control(
            'button_title',
            [
                'label' => esc_html__('Button Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore Now', 'textdomain'),
                'label_block' => true,
                'condition' => [
                    'Widget-Style' => ['style_1', 'style_2', 'style_3', 'style_4', 'style_5', 'style_6', 'style_8', 'style_9', 'style_11', 'style_13', 'style_14'],
                ],
            ]
        );
        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'textdomain'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
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
            'Section-BG-Color',
            [
                'label' => esc_html__('Section BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-discover-feature' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-1' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-2' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-4' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-3' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-6' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-8' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .sidebar-banner-widget-3' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .banner-1' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-7' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}} .el-banner-section-4' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Section-Hover-BG-Overlay-Color',
            [
                'label' => esc_html__('Section Hover BG Overlay Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-discover-feature::after' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'Widget-Style' => ['style_1', 'style_2'],
                ],
            ]
        );
        $this->add_control(
            'Section-Padding',
            [
                'label' => esc_html__('Section Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .el-discover-feature' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .el2-banner-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .el2-banner-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .el2-banner-4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .el2-banner-3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .el2-banner-6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .el2-banner-8' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .sidebar-banner-widget-3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .banner-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .el2-banner7-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .el-banner-section-4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Subtitle-style',
            [
                'label' => esc_html__('Subtitle Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style!' => ['style_8', 'style_13'],
                ],
            ]
        );
        $this->add_control(
            'Subtitle-color',
            [
                'label' => esc_html__('Subtitle Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elect-banner-subtitle' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .subtitle' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el2-subtitle' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-2 > span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-4 .el2-subtitle' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-3 > span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-8 .yellow-text-color' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .sidebar-banner-widget-3 .banner-1 .badge-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-banner-section-3 .banner-1 .tag-line' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-banner-section-3 .banner-1 .badge-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tag-line' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Subtitle-BG-color',
            [
                'label' => esc_html__('Subtitle BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el2-subtitle' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-4 .el2-subtitle' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el-banner-section-3 .banner-1 .badge-title' => 'background-color: {{VALUE}} !important',
                ],
                'condition' => [
                    'Widget-Style' => ['style_4', 'style_6', 'style_12'],
                ],
            ]
        );
        $this->add_control(
            'Subtitle-Bg-Border-Radius',
            [
                'label' => esc_html__('Subtitle Bg Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .el2-subtitle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'Widget-Style' => ['style_4', 'style_6'],
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Subtitle-typography',
                'label' => esc_html__('Subtitle Typography', 'textdomain'),
                'selector' => '
                {{WRAPPER}} .elect-banner-subtitle,
                {{WRAPPER}} .subtitle,
                {{WRAPPER}} .el2-subtitle,
                {{WRAPPER}} .el2-banner-2 > span,
                {{WRAPPER}} .el2-banner-4 .el2-subtitle,
                {{WRAPPER}} .el2-banner-3 > span,
                {{WRAPPER}} .el2-banner-8 .yellow-text-color,
                {{WRAPPER}} .sidebar-banner-widget-3 .banner-1 .badge-title,
                {{WRAPPER}} .el-banner-section-3 .banner-1 .tag-line,
                {{WRAPPER}} .el-banner-section-3 .banner-1 .badge-title,
                {{WRAPPER}} .tag-line'
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Title-style',
            [
                'label' => esc_html__('Title Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Title-color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .banner-content h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-2 h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-4 .banner-content h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-3 h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-6 h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-8 h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .sidebar-banner-widget-3 .banner-1 .et__title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-banner-section-3 .banner-1 .title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .lvgshop__banner_title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .title.et__title' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'Widget-Style!' => 'style_10',
                ],

            ]
        );
        $this->add_control(
            'Style-10-Title-color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title span p' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'Widget-Style' => 'style_10',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Title-typography',
                'label' => esc_html__('Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .title span,
                {{WRAPPER}} .banner-content h2,
                {{WRAPPER}} .el2-banner-2 h4,
                {{WRAPPER}} .el2-banner-4 .banner-content h2,
                {{WRAPPER}} .el2-banner-3 h4,
                {{WRAPPER}} .el2-banner-6 h2,
                {{WRAPPER}} .el2-banner-8 h2,
                {{WRAPPER}} .sidebar-banner-widget-3 .banner-1 .et__title,
                {{WRAPPER}} .el-banner-section-3 .banner-1 .title,
                {{WRAPPER}} .lvgshop__banner_title,
                {{WRAPPER}} .title',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Price-style',
            [
                'label' => esc_html__('Price Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => ['style_1', 'style_2', 'style_10'],
                ],
            ]
        );
        $this->add_control(
            'Price-Before-Tagline-color',
            [
                'label' => esc_html__('Price Before Tagline Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sidebar-banner-widget-3 .banner-1 .tag-line' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'Widget-Style' => 'style_10',
                ],
            ]
        );
        $this->add_control(
            'Price-color',
            [
                'label' => esc_html__('Price Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .price' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tag-line span.text-light-red' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Price-typography',
                'label' => esc_html__('Price Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .price,
                {{WRAPPER}} .sidebar-banner-widget-3 .banner-1 .tag-line',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Sell-Price-style',
            [
                'label' => esc_html__('Sell Price Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => ['style_6', 'style_12'],
                ],
            ]
        );
        $this->add_control(
            'Sell-Price-color',
            [
                'label' => esc_html__('Sell Price Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el2-banner-4 .banner-content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-banner-section-3 .banner-1 .price-wrapper .current-price' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Sell-Price-typography',
                'label' => esc_html__('Sell Price Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el2-banner-4 .banner-content p,
                {{WRAPPER}} .el-banner-section-3 .banner-1 .price-wrapper .current-price',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Regular-Price-style',
            [
                'label' => esc_html__('Regular Price Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => ['style_6', 'style_12'],
                ],
            ]
        );
        $this->add_control(
            'Regular-Price-color',
            [
                'label' => esc_html__('Regular Price Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el2-banner-4 .banner-content p del' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-banner-section-3 .banner-1 .price-wrapper .old-price' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Regular-Price-typography',
                'label' => esc_html__('Regular Price Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el2-banner-4 .banner-content p del,
                {{WRAPPER}} .el-banner-section-3 .banner-1 .price-wrapper .old-price',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Info-style',
            [
                'label' => esc_html__('Info Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => ['style_1', 'style_2', 'style_3', 'style_4', 'style_14'],
                ],
            ]
        );
        $this->add_control(
            'Info-color',
            [
                'label' => esc_html__('Info Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-discover-feature .des' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el2-banner-1 .banner-content p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .info_style_14' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Info-typography',
                'label' => esc_html__('Info Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-discover-feature .des,
                {{WRAPPER}} .el2-banner-1 .banner-content p,
                {{WRAPPER}} .info_style_14',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Button-style',
            [
                'label' => esc_html__('Button Style', 'lvgshop-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => ['style_1', 'style_2', 'style_3', 'style_4', 'style_5', 'style_6', 'style_8', 'style_9', 'style_11', 'style_13', 'style_14'],
                ],
            ]
        );
        $this->start_controls_tabs(
            'style-tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );
        $this->add_control(
            'Button-Text-color',
            [
                'label' => esc_html__('Button Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-dark-outline' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-blue' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-white' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-light-red-outline' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-dark' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-yellow' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-light-outline' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Button-Text-typography',
                'label' => esc_html__('Button Text Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-btn.btn-dark-outline,
                {{WRAPPER}} .el-btn.btn-blue,
                {{WRAPPER}} .el-btn.btn-white,
                {{WRAPPER}} .el-btn.btn-light-red-outline,
                {{WRAPPER}} .el-btn.btn-dark,
                {{WRAPPER}} .el-btn.btn-yellow,
                {{WRAPPER}} .el-btn.btn-light-outline',
            ]
        );
        $this->add_control(
            'Button-BG-color',
            [
                'label' => esc_html__('Button BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-dark-outline' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-blue' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-white' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-light-red-outline' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-dark' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-yellow' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-light-outline' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .el2-banner-1 .el-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .el-btn.btn-light-red-outline' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .el2-banner-4 .el-btn.btn-dark' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .el-btn.btn-blue' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .el-btn.btn-yellow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .el-btn.btn-dark' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'Widget-Style' => ['style_3', 'style_4', 'style_5', 'style_6', 'style_8', 'style_9', 'style_13'],
                ],
            ]
        );
        $this->add_control(
            'Button-Border-Color-style',
            [
                'label' => esc_html__('Button Border Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-dark-outline' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-light-red-outline' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-light-outline' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'Widget-Style' => ['style_1', 'style_2', 'style_5', 'style_11'],
                ],
            ]
        );
        $this->end_controls_tab();
        /*END STYLE NORMAL TAB*/
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'textdomain'),
            ]
        );
        $this->add_control(
            'Button-Hover-color',
            [
                'label' => esc_html__('Button Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-dark-outline:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-blue:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-white:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-light-red-outline:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-dark:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-yellow:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-light-outline:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button-Hover-BG-color',
            [
                'label' => esc_html__('Button Hover BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-dark-outline:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-blue:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-white:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-light-red-outline:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-dark:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-yellow:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-light-outline:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button-Hover-Border-color',
            [
                'label' => esc_html__('Button Hover Border Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-dark-outline:hover' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-light-red-outline:hover' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .el-btn.btn-light-outline:hover' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'Widget-Style' => ['style_1', 'style_2', 'style_5', 'style_11'],
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        if ('style_1' == $settings['Widget-Style']) {
            lvgshop_banner_style_1($settings);
        } elseif ('style_2' == $settings['Widget-Style']) {
            lvgshop_banner_style_2($settings);
        } elseif ('style_3' == $settings['Widget-Style']) {
            lvgshop_banner_style_3($settings);
        } elseif ('style_4' == $settings['Widget-Style']) {
            lvgshop_banner_style_4($settings);
        } elseif ('style_5' == $settings['Widget-Style']) {
            lvgshop_banner_style_5($settings);
        } elseif ('style_6' == $settings['Widget-Style']) {
            lvgshop_banner_style_6($settings);
        } elseif ('style_7' == $settings['Widget-Style']) {
            lvgshop_banner_style_7($settings);
        } elseif ('style_8' == $settings['Widget-Style']) {
            lvgshop_banner_style_8($settings);
        } elseif ('style_9' == $settings['Widget-Style']) {
            lvgshop_banner_style_9($settings);
        } elseif ('style_10' == $settings['Widget-Style']) {
            lvgshop_banner_style_10($settings);
        } elseif ('style_11' == $settings['Widget-Style']) {
            lvgshop_banner_style_11($settings);
        } elseif ('style_12' == $settings['Widget-Style']) {
            lvgshop_banner_style_12($settings);
        } elseif ('style_13' == $settings['Widget-Style']) {
            lvgshop_banner_style_13($settings);
        } else {
            lvgshop_banner_style_14($settings);
        }
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \lvgshop_banner());

