<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lvgshop_brand_logo extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'lvgshop_brand_logo';
    }

    public function get_title()
    {
        return esc_html__('Lvgshop Brand Logo', 'lvgshop-core');
    }

    public function get_icon()
    {
        return 'lvgshop-custom-icon';
    }

    public function get_categories()
    {
        return ['lvgshop-ele-widgets-cat'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'Brand-Logo-Content',
            [
                'label' => esc_html__('Brand Logo Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'brand_logo_image',
            [
                'label' => esc_html__('Brand Logo', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'website_link',
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
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => esc_html__('Repeater List', 'textdomain'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                    ],
                    [
                    ],
                    [
                    ],
                    [
                    ],
                    [
                    ],
                    [
                    ],
                    [
                    ],
                    [
                    ],
                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $count = 1;
        ?>
        <!--brand section start-->
        <div class="el2-brand-section bg-white">
            <div class="container-1440">
                <div class="el2-brands-list ">
                    <?php foreach ($settings['list'] as $item) {

                        ?>
                        <div class="el2-brand-single wow animate__flipInX" data-wow-delay=".<?php echo $count++; ?>s">
                            <a href="<?php echo $item['website_link']['url']; ?>">
                                <img src="<?php echo $item['brand_logo_image']['url']; ?>" alt="brand" class="img-fluid">
                            </a>
                        </div>
                        <?php

                    } ?>


                </div>
            </div>
        </div>
        <!--brand section end -->
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \lvgshop_brand_logo());

