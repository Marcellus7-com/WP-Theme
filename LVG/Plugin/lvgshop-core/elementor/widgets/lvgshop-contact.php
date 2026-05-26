<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Controls_Manager;
use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lvgshop_contact extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'lvgshop_contact';
    }

    public function get_title() {
        return esc_html__('Lvgshop Contact Form', 'lvgshop-core');
    }

    public function get_icon() {
        return 'lvgshop-custom-icon';
    }

    public function get_categories() {
        return ['lvgshop-ele-widgets-cat'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'Contact-Form-Content',
            [
                'label' => esc_html__('Contact Form Content', 'lvgshop-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'form_title',
            [
                'label' => esc_html__('Subtitle', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get In Touch', 'textdomain'),
                'placeholder' => esc_html__('Type your Form title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'form_shortcode',
            [
                'label' => esc_html__('Form Shortcode', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Type your form shortcode here', 'textdomain'),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Contact-Information',
            [
                'label' => esc_html__('Contact Information', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'contact_info_title',
            [
                'label' => esc_html__('Contact Info Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Contact Information', 'textdomain'),
                'placeholder' => esc_html__('Type your Contact info title here', 'textdomain'),
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-phone-alt',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
            'contact_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Call Us', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'contact_info_1',
            [
                'label' => esc_html__('Contact Info 1', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('(290) 2920 9911', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'contact_link_1',
            [
                'label' => esc_html__('Contact Info Link 1', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('tel:(290)29209911', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'contact_info_2',
            [
                'label' => esc_html__('Contact Info 2', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('(738) 0299 1627', 'textdomain'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'contact_link_2',
            [
                'label' => esc_html__('Contact Info Link 2', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('tel:(738)02991627', 'textdomain'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__('Contact List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'contact_title' => esc_html__('Call Us', 'textdomain'),
                    ],
                    [
                        'contact_title' => esc_html__('Email', 'textdomain'),
                    ],
                    [
                        'contact_title' => esc_html__('Location', 'textdomain'),
                    ],
                ],
                'title_field' => '{{{ contact_title }}}',
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
            'Section-Padding',
            [
                'label' => esc_html__('Section Padding', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .ec__contact_section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Contact-Form-Title-style',
            [
                'label' => esc_html__('Contact Form Title Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Contact-Form-Title-color',
            [
                'label' => esc_html__('Contact Form Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .form__before_title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Contact-Form-Title-typography',
                'label' => esc_html__('Contact Form Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .form__before_title',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Contact-Info-style',
            [
                'label' => esc_html__('Contact Info Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Info-Box-Bg-color',
            [
                'label' => esc_html__('Info Box Bg Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-contact-info-box' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Contact-Info-Heading-color',
            [
                'label' => esc_html__('Contact Info Heading Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact__info_headign' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Contact-Info-Heading-typography',
                'label' => esc_html__('Contact Info Heading Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .contact__info_headign',
            ]
        );
        $this->add_control(
            'Contact-Info-Title-color',
            [
                'label' => esc_html__('Contact Info Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Contact-Info-Title-typography',
                'label' => esc_html__('Contact Info Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .title',
            ]
        );
        $this->add_control(
            'Contact-Info-color',
            [
                'label' => esc_html__('Contact Info Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .info-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Contact-Info-typography',
                'label' => esc_html__('Contact Info Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .info-text',
            ]
        );
        $this->end_controls_section();



    }


    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- contact form section start -->
        <section class="wow fadeInUp ec__contact_section">
            <div class="container container-xxxl custom_container_width">
                <div class="row">
                    <div class="col-lg-7 col-xl-8 col-xxl-9 wow fadeInUp">
                        <?php if ($settings['form_title']) { ?>
                            <h3 class="mb-40 form__before_title"><?php echo $settings['form_title']; ?></h3>
                        <?php } ?>
                        <?php echo do_shortcode($settings['form_shortcode']); ?>
                    </div>

                    <div class="col-lg-5 col-xl-4 col-xxl-3 mt-60 mt-lg-0 wow fadeInUp">
                        <?php if ($settings['contact_info_title']) { ?>
                            <h3 class="mb-30 contact__info_headign"><?php echo $settings['contact_info_title']; ?></h3>
                        <?php } ?>
                        <div class="el-contact-info-box">
                            <?php
                            foreach ($settings['list'] as $item) {
                                ?>
                                <div class="single-contact-box">
                                    <div class="left-side">
                                        <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                    <div class="right-side">
                                        <h4 class="title"><?php echo $item['contact_title']; ?></h4>
                                        <?php if ($item['contact_info_1']) { ?>
                                            <a class="info-text" <?php if($item['contact_link_1']){ ?> href="<?php echo $item['contact_link_1']; ?>" <?php } ?>><?php echo $item['contact_info_1']; ?></a>
                                        <?php } ?>
                                        <?php if ($item['contact_info_2']) { ?>
                                            <a class="info-text" <?php if($item['contact_link_1']){ ?> href="<?php echo $item['contact_link_2']; ?>" <?php } ?>><?php echo $item['contact_info_2']; ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact form section end -->
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \lvgshop_contact());

