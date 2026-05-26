<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Controls_Manager;
use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lvgshop_faq extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'lvgshop_faq';
    }

    public function get_title() {
        return esc_html__('Lvgshop FAQ', 'lvgshop-core');
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
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section-Content',
            [
                'label' => esc_html__('Section Content', 'lvgshop-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'section-subtitle',
            [
                'label' => esc_html__('Section Subtitle', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('FAQ QUESTIONS', 'textdomain'),
                'placeholder' => esc_html__('Type your subtitle here', 'textdomain'),
            ]
        );
        $this->add_control(
            'section-title',
            [
                'label' => esc_html__('Section Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Some General Questions', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'faq_title',
            [
                'label' => esc_html__('Faq Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('When do I receive my order?', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'faq_content',
            [
                'label' => esc_html__('Faq Content', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __(' When placing the order, a day of shipment is indicated.
                    After the order has been placed, the same delivery time
                    will also be stated on the order confirmation. It is
                    therefore never possible that during the order, the
                    shipping day on the website, is different than on the
                    order confirmation.', 'textdomain'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => esc_html__('FAQ List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'faq_title' => esc_html__('When do I receive my order?', 'textdomain'),
                    ],
                    [
                        'faq_title' => esc_html__('I now see the longer delivery time of my order. How can I
                  cancel it?', 'textdomain'),
                    ],
                    [
                        'faq_title' => esc_html__('When will I receive the invoice for my order?', 'textdomain'),
                    ],
                    [
                        'faq_title' => esc_html__('When will I receive the invoice for my order?', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ faq_title }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section-Subtitle-style',
            [
                'label' => esc_html__('Section Subtitle Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Section-Subtitle-color',
            [
                'label' => esc_html__('Section Subtitle Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el__subtitle' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Subtitle-typography',
                'label' => esc_html__('Section Subtitle Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el__subtitle',
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
                    '{{WRAPPER}} .el__title' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Title-typography',
                'label' => esc_html__('Section Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el__title',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Faq-style',
            [
                'label' => esc_html__('Faq Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'FAQ-Title-color',
            [
                'label' => esc_html__('FAQ Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-faq-section .accordion-button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'FAQ-Title-typography',
                'label' => esc_html__('FAQ Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-faq-section .accordion-button',
            ]
        );
        $this->add_control(
            'FAQ-Content-color',
            [
                'label' => esc_html__('FAQ Content Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-faq-section .accordion-collapse .accordion-body p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'FAQ-Content-typography',
                'label' => esc_html__('FAQ Content Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-faq-section .accordion-collapse .accordion-body p',
            ]
        );
        $this->end_controls_section();


    }



    protected function render() {
        $this_is = $this;
        $settings = $this->get_settings_for_display();
        if ('style_1' == $settings['Widget-Style']) {
            lvgshop_faq_style_1($settings, $this_is);
        }
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \lvgshop_faq());

