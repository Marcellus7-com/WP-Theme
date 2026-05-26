<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lvgshop_feedback extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'lvgshop-feedback-section';
    }

    public function get_title()
    {
        return esc_html__('lvgshop feedback Section', 'lvgshop-core');
    }

    public function get_icon()
    {
        return ' lvgshop-custom-icon';
    }

    public function get_categories()
    {
        return ['lvgshop-ele-widgets-cat'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'lvgshop_cat_grid',
            [
                'label' => __('feedback Settings', 'lvgshop'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'lvgshop_review_style',
            [
                'label' => esc_html__('Select Style', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'one',
                'options' => [
                    'one' => esc_html__('One', 'textdomain'),
                    'two' => esc_html__('Two', 'textdomain'),

                ],
            ]
        );
        $this->add_control(
            'feedback_top_title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' =>  esc_html__( 'What Our Customer Says','textdomain' ),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),

            ]
        );
        $this->add_control(
            'feedback_button',
            [
                'label' => esc_html__('Name', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'view all testimonial', 'textdomain' ),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
                'condition' => [
                    'lvgshop_review_style' => 'one',
                ],
            ]
        );
        $this->add_control(
            'feedback_button_link',
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
                'condition' => [
                    'lvgshop_review_style' => 'one',
                ],
            ]
        );

        $this->add_control(
            'feedback_images',
            [
                'label' => esc_html__('feedback Left Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'lvgshop_review_style' => 'one',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'rating',
            [
                'label'   => esc_html__( 'Rating', 'elementor' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 0,
                'max'     => 5,
                'step'    => 0.1,
                'default' => 5,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'feedback_title',
            [
                'label' => esc_html__('Name', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '', 'By David Smith',
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'feedback_date',
            [
                'label' => esc_html__('Dagination', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '', '@daniel, smith - 15 Jul, 2023',
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $repeater->add_control(
            'feedback_image',
            [
                'label' => esc_html__('feedback Bg Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'feedback_decription',
            [
                'label' => esc_html__('Decription', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '', 'The customer service at @Lvgshop is exceptional. Their team is friendly, knowledgeable, and always willing to assist with any questions or concerns. It evident that they genuinely care about their customers satisfaction and go....',
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => esc_html__('Hotspot List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feedback_title' => __('Julia Luis Flora', 'nikstore'),
                        'feedback_date' => __('Fashion Designer', 'nikstore'),
                        'feedback_decription' => __('Brighten up your look vibrant gemstone je we there are many variations of passages of Lorem Ipsum available, but the majority have suffered from alteration.', 'nikstore'),
                    ],
                    [
                        'feedback_title' => __('Michle Jhon', 'nikstore'),
                        'feedback_date' => __('Fashion Designer', 'nikstore'),
                        'feedback_decription' => __('Brighten up your look vibrant gemstone je we there are many variations of passages of Lorem Ipsum available, but the majority have suffered from alteration.', 'nikstore'),
                    ],
                    [
                        'feedback_title' => __('Robert Stiphen', 'nikstore'),
                        'feedback_date' => __('Fashion Designer', 'nikstore'),
                        'feedback_decription' => __('Brighten up your look vibrant gemstone je we there are many variations of passages of Lorem Ipsum available, but the majority have suffered from alteration.', 'nikstore'),
                    ],
                    [
                        'feedback_title' => __('Devid Leo', 'nikstore'),
                        'feedback_date' => __('Fashion Designer', 'nikstore'),
                        'feedback_decription' => __('Brighten up your look vibrant gemstone je we there are many variations of passages of Lorem Ipsum available, but the majority have suffered from alteration.', 'nikstore'),
                    ],
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'lvgshop_section_top_title',
            [
                'label' => __('feedback Top Title', 'lvgshop'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'lvgshop_button_border-color',
            [
                'label' => esc_html__('Button Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-border-1 , {{WRAPPER}} .el-single-testimonial' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'feedback_main_text_color',
            [
                'label' => esc_html__('Main Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-testimonial-section h2 , {{WRAPPER}} .customer-feddback-widget h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feedback_main_typography',
                'selector' => '{{WRAPPER}} .el-testimonial-section h2 , {{WRAPPER}} .customer-feddback-widget h4',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'lvgshop_button_top',
            [
                'label' => __('feedback Button', 'lvgshop'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'lvgshop_button_top_color',
            [
                'label' => esc_html__('Button Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-yellow' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'lvgshop_button_top_hover_color',
            [
                'label' => esc_html__('Button Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-yellow:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'lvgshop_button_top_bg_color',
            [
                'label' => esc_html__('Button Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-yellow' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'lvgshop_button_top_bg_hover_color',
            [
                'label' => esc_html__('Button Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-yellow:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'lvgshop_section_feedback_Name_style',
            [
                'label' => __('feedback Name Style', 'lvgshop'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'feedback_text_color',
            [
                'label' => esc_html__('Main Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feedback_title_typography',
                'selector' => '{{WRAPPER}} .name',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'lvgshop_section_feedback_dega',
            [
                'label' => __('feedback Degsnation', 'lvgshop'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'feedback_Degsnation_color',
            [
                'label' => esc_html__(' Degsnation Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .desig' => 'color: {{VALUE}}!important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feedback_Degsnation_typography',
                'selector' => '{{WRAPPER}} .desig ',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'lvgshop_section_feedback_decription_style',
            [
                'label' => __('feedback Decription Style', 'lvgshop'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'feedback_decription_color',
            [
                'label' => esc_html__('Decription Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-cf-feedback p , {{WRAPPER}}  .el-single-testimonial p' => 'color: {{VALUE}}!important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'feedback_decription_typography',
                'selector' => '{{WRAPPER}} .single-cf-feedback p , {{WRAPPER}}  .el-single-testimonial p',
            ]
        );

        $this->end_controls_section();
    }


    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        $lvgshop_review_style = $settings['lvgshop_review_style'];

        if ('one' == $settings['lvgshop_review_style']){
            lvgshop_review_one($settings);
        }elseif('two' == $settings['lvgshop_review_style']){
            lvgshop_review_two($settings);
        }
        ?>


        <?php

    }


}

\Elementor\Plugin::instance()->widgets_manager->register(new \lvgshop_feedback());
?>