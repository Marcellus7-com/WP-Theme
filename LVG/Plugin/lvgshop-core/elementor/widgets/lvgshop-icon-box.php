<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lvgshop_icon_box extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'lvgshop_icon_box';
    }

    public function get_title() {
        return esc_html__('Lvgshop Icon Box', 'lvgshop-core');
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
                'label' => esc_html__('Widget Style Section', 'woodly-core'),
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
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section-Content',
            [
                'label' => esc_html__('Section Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
            'image',
            [
                'label' => esc_html__( 'Choose Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Free Delivery', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'info',
            [
                'label' => esc_html__('Info', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Orci lectus per torquent netusque habitasse mauris inceptos.', 'textdomain'),
                'placeholder' => esc_html__('Type your Info here', 'textdomain'),
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => esc_html__('Icon List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => esc_html__('Free Delivery', 'textdomain'),
                        'info' => esc_html__('From All Orders Over $100', 'textdomain'),
                    ],
                    [
                        'title' => esc_html__('24/7 Support', 'textdomain'),
                        'info' => esc_html__('Get Online Support 24/7', 'textdomain'),
                    ],
                    [
                        'title' => esc_html__('15 Days Refund', 'textdomain'),
                        'info' => esc_html__('Return Within 15 Days', 'textdomain'),
                    ],
                    [
                        'title' => esc_html__('Gift Voucher', 'textdomain'),
                        'info' => esc_html__('Get Vouchers On Products', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'Section-style',
            [
                'label' => esc_html__('Section Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'container-width',
            [
                'label' => esc_html__('Container Width', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2800,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .custom_container_width' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'Section-BG-color',
            [
                'label' => esc_html__('Section BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bg-blue' => 'background-color: {{VALUE}}!important',
                    '{{WRAPPER}} .el-main-about-fea-section' => 'background-color: {{VALUE}} ',

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
                    '{{WRAPPER}} .hm2-feature-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .el-main-about-fea-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'Border-color',
            [
                'label' => esc_html__('Border Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hm2-feature-section' => 'border-top-color: {{VALUE}}',
                    '{{WRAPPER}} section.hm2-feature-section' => 'border-bottom-color: {{VALUE}}',
                    '{{WRAPPER}} .vr5-feature-box' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .vr5-feature-box .icon-box.border-right::after' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'Widget-Style!' => 'style_3',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Icon-style',
            [
                'label' => esc_html__('Icon Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Icon-Circle-Border-color',
            [
                'label' => esc_html__('Icon Circle Border Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hm2-feature-box .icon-wrapper' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'Widget-Style' => ['style_1', 'style_3'],
                ],
            ]
        );
        $this->add_control(
            'Icon-Hover-BG-color',
            [
                'label' => esc_html__('Icon Hover BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vr-ab-feature-box:hover .icon-wrapper' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'Widget-Style' => 'style_3',
                ],
            ]
        );
        $this->add_control(
            'Icon-color',
            [
                'label' => esc_html__('Icon Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .svg-margin svg path' => 'fill: {{VALUE}}!important',
                    '{{WRAPPER}} .single-about-feature path' => 'stroke: {{VALUE}} ',
                    '{{WRAPPER}} .single-about-feature i' => 'color: {{VALUE}} ',
                ],
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
                    '{{WRAPPER}} .el-single-fea-support h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-main-about-fea-section .single-about-feature h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Title-typography',
                'label' => esc_html__('Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-single-fea-support h4,
                {{WRAPPER}} .el-main-about-fea-section .single-about-feature h4',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Info-style',
            [
                'label' => esc_html__('Info Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Info-color',
            [
                'label' => esc_html__('Info Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-single-fea-support p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .el-main-about-fea-section .single-about-feature p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Info-typography',
                'label' => esc_html__('Info Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-single-fea-support p,
                {{WRAPPER}} .el-main-about-fea-section .single-about-feature p',
            ]
        );
        $this->end_controls_section();


    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        if ('style_1' == $settings['Widget-Style']) {
            lvgshop_icon_box_style_1($settings);
        } elseif('style_2' == $settings['Widget-Style']) {
            lvgshop_icon_box_style_2($settings);
        }else{
            lvgshop_icon_box_style_3($settings);
        }
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \lvgshop_icon_box());

