<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lvgshop_product_category extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'lvgshop-category-section';
    }

    public function get_title()
    {
        return esc_html__('Lvgshop category Section', 'lvgshop-core');
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
            'product_category_settings',
            [
                'label' => __('Product Categorys', 'lvgshop-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'product_catgories_style',
            [
                'label' => __('Product Catagories Style', 'lvgshop-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cat_style_1',
                'options' => [
                    'cat_style_1' => __('Style One', 'lvgshop-core'),
                    'cat_style_2' => __('Style Two', 'lvgshop-core'),
                    'cat_style_3' => __('Style Three', 'lvgshop-core'),

                ],

            ]
        );
        $this->add_control(
            'product_catgories_top_ebl',
            [
                'label' => __('Product Title & Button', 'lvgshop-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'on',
                'options' => [
                    'on' => __('Enable', 'lvgshop-core'),
                    'off' => __('Disable', 'lvgshop-core'),

                ],


            ]
        );

        $this->add_control(
            'item_per_row',
            [
                'label' => __('Items Per Row', 'lvgshop'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 3,
                'max' => 4,
                'step' => 1,
                'default' => 4,
                'condition' => [
                    'product_catgories_style' => 'cat_style_1',
                ],
            ]
        );
        $this->add_control(
            'selected_product_category',
            array(
                'label' => esc_html__('Select Category', 'lvgshop-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
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
            'website_links',
            [
                'label' => esc_html__('Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'textdomain'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition' => [
                    'product_catgories_style' => ['cat_style_1', 'cat_style_2'],
                ],
            ]
        );
        $this->add_control(
            'widget_sub_titles',
            [
                'label' => esc_html__('Sub Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('TOP CATEGORIES', 'textdomain'),
                'placeholder' => esc_html__('TOP CATEGORIES', 'textdomain'),
                'condition' => [
                    'product_catgories_style' => 'cat_style_2',
                ],
            ],

        );
        $this->add_control(
            'widget_main_titles',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Popular Categories', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),

            ],

        );
        $this->add_control(
            'widget_decription_titles',
            [
                'label' => esc_html__('Decription', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Electronics stores are renowned for being the first to showcase new gadgets and devices.', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
                'condition' => [
                    'product_catgories_style' => 'cat_style_2',
                ],
            ],

        );
        $this->add_control(
            'widget_button_titles',
            [
                'label' => esc_html__('Button Text', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View All Categories', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ],

        );
        $this->add_control(
            'button_icons',
            [
                'label' => esc_html__('Icon', 'textdomain'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'ri ri-arrow-right-line',
                    'library' => 'ri ri-arrow-right-line',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],

            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'title_style',
            [
                'label' => __('Title Style', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'title_text_color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h2 , {{WRAPPER}} h3 ' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typographys',
                'selector' => '{{WRAPPER}} h2 , {{WRAPPER}} h3 ',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'sub_title_style',
            [
                'label' => __('Sub Title Style', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'product_catgories_style' =>  'cat_style_2',
                ],
            ]
        );

        $this->add_control(
            'sub_title_text_color',
            [
                'label' => esc_html__('Sub Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el2-subtitle ' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sub_content_typographys',
                'selector' => '{{WRAPPER}} .el2-subtitle ',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'decription_style',
            [
                'label' => __('Decription Style', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'product_catgories_style' =>  'cat_style_2',
                ],
            ]
        );

        $this->add_control(
            'decription__color',
            [
                'label' => esc_html__('Decription Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} p ' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'decription__typographys',
                'selector' => '{{WRAPPER}} p',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'button_style',
            [
                'label' => __('Button Style', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );

        $this->add_control(
            'button__color',
            [
                'label' => esc_html__('Button Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-dark , {{WRAPPER}} .btn-blue , {{WRAPPER}}  .cate-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__('Button Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-dark:hover , {{WRAPPER}} .btn-blue:hover , {{WRAPPER}}  .cate-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Button Bg Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-dark , {{WRAPPER}} .btn-blue' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'product_catgories_style' => ['cat_style_2' , 'cat_style_1'] ,
                ],
            ]
        );
        $this->add_control(
            'button_bg_hover_color',
            [
                'label' => esc_html__('Button Bg Hover Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-dark:hover , {{WRAPPER}} .btn-blue:hover' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'product_catgories_style' => ['cat_style_2' , 'cat_style_1'] ,
                ],
            ]
        );
        $this->add_control(
            'Border-Radius',
            [
                'label' => esc_html__('Border Radius', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .el-btn.btn-blue' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'product_catgories_style' => ['cat_style_2'] ,
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button__typographys',
                'selector' => '{{WRAPPER}} .btn-dark , {{WRAPPER}} .btn-blue , {{WRAPPER}}  .cate-btn',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'cat_style',
            [
                'label' => __('Catagorie Style', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_control(
            'Catagories_bg',
            [
                'label' => esc_html__('Catagorie Box BG', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-fea-category ' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Catagories_name',
            [
                'label' => esc_html__('Catagorie Name', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'defalt' => ' #000',
                'selectors' => [
                    '{{WRAPPER}} .single-fea-category h4 , {{WRAPPER}} .single-fea-category h5 , {{WRAPPER}}  .el2-icon-box h6' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Catagories_name_typo_m',
                'label' => esc_html__('Catagorie Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .single-fea-category h4 , {{WRAPPER}} .single-fea-category h5 , {{WRAPPER}}  .el2-icon-box h6' ,
            ]
        );
        $this->add_control(
            'sub_Catagories_name',
            [
                'label' => esc_html__('Sub Catagorie color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-fea-category ul li , {{WRAPPER}} .single-fea-category ul li a , {{WRAPPER}} .single-fea-category ul li a, {{WRAPPER}} .single-fea-category ul li p, {{WRAPPER}} .el2-icon-box p , {{WRAPPER}}  .el-feature-section-3 .single-fea-category ul li::before , {{WRAPPER}} .single-fea-category ul li'  => 'color: {{VALUE}}!important',
                ],
            ]
        );
        $this->add_control(
            'sub_Catagories_hover_name',
            [
                'label' => esc_html__('Sub Catagorie Hover color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-fea-category ul li , {{WRAPPER}} .single-fea-category ul li a , {{WRAPPER}} .single-fea-category ul li a, {{WRAPPER}} .single-fea-category ul li p, {{WRAPPER}} .el2-icon-box p , {{WRAPPER}}  .el-feature-section-3 .single-fea-category ul li::before , {{WRAPPER}} .single-fea-category ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Catagories_name_typo',
                'label' => esc_html__('Sub Catagorie Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .single-fea-category ul li , {{WRAPPER}} .single-fea-category ul li a , {{WRAPPER}} .single-fea-category ul li a, {{WRAPPER}} .single-fea-category ul li p, {{WRAPPER}} .el2-icon-box p , {{WRAPPER}}  .el-feature-section-3 .single-fea-category ul li::before , {{WRAPPER}} .single-fea-category ul li ',
            ]
        );
        $this->end_controls_section();
    }

    protected function render($instance = [])
    {
        $settings = $this->get_settings_for_display();
        if ('cat_style_1' == $settings['product_catgories_style']){
            crete_election_one($settings);
        }elseif ('cat_style_2' == $settings['product_catgories_style']){
            crete_election_two($settings);
        }elseif ('cat_style_3' == $settings['product_catgories_style']){
            crete_election_three($settings);
        }


    }


}

\Elementor\Plugin::instance()->widgets_manager->register(new \lvgshop_product_category());
?>