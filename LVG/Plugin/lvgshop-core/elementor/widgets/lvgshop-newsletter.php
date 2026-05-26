<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lvgshop_newsletter extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'lvgshop_newsletter';
    }

    public function get_title()
    {
        return esc_html__('Lvgshop Newsletter', 'lvgshop-core');
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
                'label' => esc_html__('Newsletter Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'newletter_title',
            [
                'label' => esc_html__( 'Title', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Default title', 'textdomain' ),
                'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'newletter_sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Subscribe Newsletter', 'textdomain' ),
                'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
            ]
        );
        $this->add_control(
            'newletter_sub_decription',
            [
                'label' => esc_html__( 'Decription', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Become a premium member and get 20% off your next purchase!', 'textdomain' ),
                'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
            ]
        );

        $this->add_control(
            'newletter_short_code',
            [
                'label' => esc_html__( 'Put Short Code', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '[put_your_shortcode]',
                'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => esc_html__( 'Choose Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
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

        <!--newsletter section start-->
        <section class="el2-newsletter ptb-100 position-relative z-1 overflow-hidden">
            <img src="<?php echo $settings['image']['url']; ?>" alt="drone" class="drone-bg wow animate__fadeIn" data-wow-delay=".1s">
            <div class="container-1440">
                <div class="row justify-content-end wow fadeInUp" data-wow-delay=".2s">
                    <div class="col-xl-5 col-lg-6">
                        <div class="el2-newsletter-content">
                            <div class="el2-section-title">
                                <span class="el2-section-subtitle"><?php echo $settings['newletter_sub_title']; ?></span>
                                <h2 class="fw-semibold mb-4"><?php echo $settings['newletter_title']; ?></h2>
                                <p>
                                    <?php echo $settings['newletter_sub_decription']; ?>
                                </p>
                                <form class="el2-newsletter-form">

                                    <?php
                                    echo do_shortcode($settings['newletter_short_code']);
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--newsletter section end-->
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \lvgshop_newsletter());

