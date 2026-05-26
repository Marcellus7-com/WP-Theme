<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Controls_Manager;
use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lvgshop_about_us extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'lvgshop_about_us';
    }

    public function get_title() {
        return esc_html__('Lvgshop About Us', 'lvgshop-core');
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
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('About Us', 'textdomain'),
                'placeholder' => esc_html__('Type your subtitle here', 'textdomain'),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Who We Are?', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Praesent metus tellus, elementum eu, semper a, adipiscing nec, purus. Vestibulum volutpat pretium libero.
            In
            ut quam
            vitae odio lacinia tincidunt. Diam donec adipiscing tristique risus nec feugiat in fermentum. Cursus metus
            aliquam
            eleifend mi in nulla posuere sollicitudin. Tortor condiment lacinia quis vel eros donec ac. Vitae suscipit
            tellus mauris
            a diam maecenas. Tellus pellentesque eu tincidunt tortor aliquam nulla.', 'textdomain'),
                'placeholder' => esc_html__('Type your Description here', 'textdomain'),
            ]
        );
        $this->add_control(
            'button_title',
            [
                'label' => esc_html__('Button Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Products', 'textdomain'),
                'placeholder' => esc_html__('Type your Button title here', 'textdomain'),
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
        $this->add_control(
            'banner_img',
            [
                'label' => esc_html__('Banner Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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
                    '{{WRAPPER}} .el-main-about-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
                ],
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
                    '{{WRAPPER}} .el-main-about-section .subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Subtitle-typography',
                'label' => esc_html__('Section Subtitle Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-main-about-section .subtitle',
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
                    '{{WRAPPER}} .el-main-about-section .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Title-typography',
                'label' => esc_html__('Section Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-main-about-section .title',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Description-style',
            [
                'label' => esc_html__('Description Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Description-color',
            [
                'label' => esc_html__('Description Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ec__about_description' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Description-typography',
                'label' => esc_html__('Description Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .ec__about_description',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Button-style',
            [
                'label' => esc_html__('Button Style', 'lvgshop-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} .el-btn.btn-yellow' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Button-Text-typography',
                'label' => esc_html__('Button Text Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-btn.btn-yellow',
            ]
        );
        $this->add_control(
            'Button-BG-color',
            [
                'label' => esc_html__('Button BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-yellow' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .el-btn.btn-yellow:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button-Hover-BG-color',
            [
                'label' => esc_html__('Button Hover BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-yellow:hover' => 'background-color: {{VALUE}}'
                ],
            ]
        );
        $this->end_controls_tab();
        /*END STYLE HOVER TAB*/
        $this->end_controls_tabs();
        $this->end_controls_section();



    }


    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- about section start -->
        <section class="el-main-about-section ptb-120 wow fadeInUp">
            <div class="container container-xxxl custom_container_width">
                <div class="row">
                    <div class="col-lg-6 wow fadeInUp">
                        <?php if ($settings['subtitle']) { ?>
                            <h6 class="subtitle">
                                <?php echo $settings['subtitle']; ?>
                            </h6>
                        <?php } ?>
                        <?php if ($settings['title']) { ?>
                            <h2 class="title mb-20">
                                <?php echo $settings['title']; ?>
                            </h2>
                        <?php } ?>

                        <?php if ($settings['description']) { ?>
                            <p class="ec__about_description">
                                <?php echo $settings['description']; ?>
                            </p>
                        <?php } ?>

                        <?php if ($settings['button_title']) { ?>
                            <a class="btn-yellow el-btn mt-20" href="<?php echo $settings['button_link']['url']; ?>">
                                <?php echo $settings['button_title']; ?>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        <?php } ?>
                    </div>
                    <?php if ($settings['banner_img']['url']) { ?>
                        <div class="col-lg-6 mt-30 mt-lg-0 wow fadeInUp">
                            <img src="<?php echo $settings['banner_img']['url']; ?>" alt="about img" class="img-fluid">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- about section end -->
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \lvgshop_about_us());

