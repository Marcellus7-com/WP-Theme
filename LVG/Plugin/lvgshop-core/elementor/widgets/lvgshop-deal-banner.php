<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lvgshop_deal_banner extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'lvgshop_deal_banner';
    }

    public function get_title()
    {
        return esc_html__('Lvgshop Deal Banner / Product Offer ', 'lvgshop-core');
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
                    'style_3' => esc_html__('Product Offer', 'textdomain'),
                ],
            ]
        );
        $this->add_control(
            'Select-Product-style',
            [
                'label' => esc_html__('Select Product', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => array_key_first($this->lvgshop_woo_product_id()),
                'options' => $this->lvgshop_woo_product_id(),
                'label_block' => true,
                'condition' => [
                    'Widget-Style' => ['style_3']
                ],
            ]
        );
        $this->add_control(
            'Select-Product-image',
            [
                'label' => esc_html__( 'Offer Image', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'Widget-Style' => ['style_3']
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section-Content',
            [
                'label' => esc_html__('Section Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'Widget-Style' => ['style_2', 'style_1']
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'section_bg_img_two',
                'label' => esc_html__('Section BG', 'textdomain'),
                'types' => ['gradient', 'video'],
                'selector' => '{{WRAPPER}} .el2-offer-section',
                'condition' => [
                    'Widget-Style' => 'style_2',
                ],
            ]
        );
        $this->add_control(
            'section_shap',
            [
                'label' => esc_html__('Section Right Shape', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'Widget-Style' => 'style_2',
                ],

            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'section_shap_left',
                'label' => esc_html__('Section Left Shape', 'textdomain'),
                'types' => ['gradient', 'video'],
                'selector' => '{{WRAPPER}} .el2-offer-section .circle-shape-2',
                'condition' => [
                    'Widget-Style' => 'style_2',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'section_shap_middol',
                'label' => esc_html__('Section  Midol Shape', 'textdomain'),
                'types' => ['gradient', 'video'],
                'selector' => '{{WRAPPER}} .el2-offer-section .circle-shape-1',
                'condition' => [
                    'Widget-Style' => 'style_2',
                ],
            ]
        );

        $this->add_control(
            'section_main_product_image',
            [
                'label' => esc_html__('Section Product Img', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'Widget-Style' => 'style_2',
                ],

            ]
        );
        $this->add_control(
            'section_main_product_offer',
            [
                'label' => esc_html__('Section Offer Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'Widget-Style' => 'style_2',
                ],

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
                'condition' => [
                    'Widget-Style' => 'style_1',
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
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Smart watch', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'decription_main_two',
            [
                'label' => __('Decription', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Electronics stores are renowned for being the first to showcase new gadgets and devices.', 'textdomain'),
                'placeholder' => esc_html__('Type your price here', 'textdomain'),
                'condition' => [
                    'Widget-Style' => 'style_2',
                ],
            ]
        );

        $this->add_control(
            'due_date',
            [
                'label' => esc_html__('Due Date', 'textdomain'),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
            ]
        );
        $this->add_control(
            'button_title',
            [
                'label' => esc_html__('Button Title', 'textdomain'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore Now', 'textdomain'),
                'label_block' => true,
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
            'Subtitle-style',
            [
                'label' => esc_html__('Subtitle Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => ['style_2' , 'style_1'],
                ],
            ]
        );
        $this->add_control(
            'Subtitle-color',
            [
                'label' => esc_html__('Subtitle Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subtitle_del' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Subtitle-typography',
                'label' => esc_html__('Subtitle Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .subtitle_del',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Title-style',
            [
                'label' => esc_html__('Title Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => ['style_2' , 'style_1'],
                ],
            ]
        );
        $this->add_control(
            'Title-color',
            [
                'label' => esc_html__('Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title_del' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Title-typography',
                'label' => esc_html__('Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .title_del',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Price-style',
            [
                'label' => esc_html__('Decription Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => ['style_2' , 'style_1'],
                ],
            ]
        );
        $this->add_control(
            'Price-color',
            [
                'label' => esc_html__('Decription Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subtitle_del_dec' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'decription-typography',
                'label' => esc_html__('Decription Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .subtitle_del_dec',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'date-style',
            [
                'label' => esc_html__('Offer Date Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'date-style_bg',
            [
                'label' => esc_html__('BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .countdown-timer li , {{WRAPPER}} .single-countbox' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'date-style_color',
            [
                'label' => esc_html__('Offer Text Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subtitle_del_dec h3 , {{WRAPPER}} .subtitle_del_dec span , {{WRAPPER}} .single-countbox span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section-style',
            [
                'label' => esc_html__('Section Style', 'lvgshop-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'section-style-color',
            [
                'label' => esc_html__('Section Border Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sidebar-hot-deal-product .el-single-product' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Button-style',
            [
                'label' => esc_html__('Button Style', 'lvgshop-core'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => ['style_2' , 'style_1'],
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
                    '{{WRAPPER}} .button-custom' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Button-Text-typography',
                'label' => esc_html__('Button Text Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .button-custom',
            ]
        );
        $this->add_control(
            'Button-BG-color',
            [
                'label' => esc_html__('Button BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-custom' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button-Border-color',
            [
                'label' => esc_html__('Button Border Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-custom' => 'border-color: {{VALUE}}',
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
                    '{{WRAPPER}} .el-btn.btn-blue' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .button-custom:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Button-Hover-BG-color',
            [
                'label' => esc_html__('Button Hover BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-custom:hover' => 'background-color: {{VALUE}}'
                ],
            ]
        );
        $this->add_control(
            'Button-Hover-Border-color',
            [
                'label' => esc_html__('Button Hover Border Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-custom:hover' => 'border-color: {{VALUE}}'
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

    }

    public function lvgshop_woo_product_id()
    {
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1
        );

        $query = new WP_Query($args);
        $output = [];
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $output[get_the_ID()] = get_the_title();
            }
        }

        return $output;
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $time = $settings['due_date'];
        $date = date_create($time);


        if ('style_1' == $settings['Widget-Style']) {
            ?>
            <!-- deal count down section start -->
            <section class="deal-countdown-section ptb-100 mt-120 wow fadeInUp" data-wow-delay=".1s"
                     data-background="<?php echo $settings['section_bg_img']['url']; ?>">
                <div class="container container-xxxl">
                    <div class="row justify-content-end">
                        <div class="col-lg-6 col-xl-5">
                            <h2 class="wow fadeInUp subtitle_del" data-wow-delay=".1s">
                                <?php echo $settings['subtitle']; ?>
                            </h2>
                            <h3 class="mt-30 wow fadeInUp title_del" data-wow-delay=".2s">
                                <?php echo $settings['title']; ?>
                            </h3>

                            <div class="count-box countdown-timer mt-30 "
                                 data-date="<?php echo date_format($date, 'Y-n-d'); ?> 23:59:59">
                                <div class="single-countbox wow fadeInUp" data-wow-delay=".3s">
                                    <span class="days count-number">701</span>
                                    <span class="count-title">days</span>
                                </div>

                                <div class="single-countbox wow animate__fadeInDown" data-wow-delay=".3s">
                                    <span class="hours count-number">14</span>
                                    <span class="count-title">hours</span>
                                </div>
                                <div class="single-countbox wow fadeInUp" data-wow-delay=".3s">
                                    <span class="minutes count-number">32</span>
                                    <span class="count-title">mins</span>
                                </div>
                                <div class="single-countbox wow animate__fadeInDown" data-wow-delay=".3s">
                                    <span class="seconds count-number">07</span>
                                    <span class="count-title">secs</span>
                                </div>


                            </div>

                            <a class="btn-white el-btn rounded-0 mt-60 wow fadeInUp button-custom" data-wow-delay=".5s"
                               href="<?php echo $settings['button_link']['url']; ?>">
                                <?php echo $settings['button_title']; ?>
                                <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- deal count down section end -->
            <?php
        } elseif ('style_2' == $settings['Widget-Style']) {
            ?>
            <!--offer section start-->
            <section class="el2-offer-section overflow-hidden ptb-120 position-relative z-1">
                <img src="<?php echo $settings['section_shap']['url']; ?>" alt="circle shape"
                     class="position-absolute end-0 top-0 z--1 sharp-img-1">
                <div class="container-1440 position-relative z-1">
                    <img src="<?php echo $settings['section_main_product_image']['url']; ?>" alt="earphone"
                         class="earphone-shape wow fadeInUp sharp-img-2">
                    <img src="<?php echo $settings['section_main_product_offer']['url']; ?>" alt="badge"
                         class="off-badge wow fadeInUp sharp-img-3">
                    <span class="circle-shape-1 position-absolute"></span>
                    <span class="circle-shape-2 position-absolute"></span>
                    <div class="row justify-content-end">
                        <div class="col-xl-4 col-lg-6">
                            <div class="el2-section-title wow fadeInUp">
                                <span class="el2-section-subtitle wow fadeInUp subtitle_del"
                                      data-wow-delay=".1s"> <?php echo $settings['subtitle']; ?></span>
                                <h2 class="fw-semibold mt-1 mb-4 wow fadeInUp title_del" data-wow-delay=".2s">
                                    <?php echo $settings['title']; ?>
                                </h2>
                                <p class="mb-40 wow fadeInUp subtitle_del_dec" data-wow-delay=".3s">
                                    <?php echo $settings['decription_main_two']; ?>
                                </p>
                                <ul class="el2-offer-timer mb-40 wow fadeInUp countdown-timer "
                                    data-date="<?php echo date_format($date, 'Y-n-d'); ?> 23:59:59">
                                    <li class="wow fadeInUp" data-wow-delay=".1s">
                                        <h3 class="mb-0 fw-semibold days">262</h3>
                                        <span>Days</span>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay=".1s">
                                        <h3 class="mb-0 fw-semibold hours">17</h3>
                                        <span>Hours</span>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay=".1s">
                                        <h3 class="mb-0 fw-semibold minutes">09</h3>
                                        <span>Mins</span>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay=".1s">
                                        <h3 class="mb-0 fw-semibold seconds">45</h3>
                                        <span>Secs</span>
                                    </li>
                                </ul>
                                <a href="<?php echo $settings['button_link']['url']; ?>"
                                   class="btn-blue el-btn wow fadeInUp button-custom"
                                   data-wow-delay=".1s"><?php echo $settings['button_title']; ?><span
                                            class="ms-2"><i class="fas fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--offer section end-->
            <?php
        } elseif ('style_3' == $settings['Widget-Style']) {
            global $product, $post;
//            $sales_price_to   = date( "M j, Y", get_post_meta( $product->id, '_sale_price_dates_to', true ));


            $product = wc_get_product($settings['Select-Product-style']);
            $productID = new stdClass();
            // Added property to the object
            $productID->ID = $product->get_id();
            $nonce = wp_create_nonce("product_nonce");
            $sales_price_tos = date("M j, Y", get_post_meta($productID->ID, '_sale_price_dates_to', true)); // Get the
            $dates = date_create($sales_price_tos);


            ?>
            <!-- hot deal product -->
            <div class="sidebar-hot-deal-product mt-30 wow fadeInUp">
                <div class="el-single-product">
                    <img class="hot-deal-badge" src="<?php echo $settings['Select-Product-image']['url']; ?>" alt="">
<!--                    <img class="hot-deal-badge"-->
<!--                         src="--><?php //echo get_the_post_thumbnail_url($settings['Select-Product-style']); ?><!--" alt="img">-->
                    <div class="action-btns-wrapper">
                        <?php
                        lvgshop_add_quick_view_card();
                        ?>
                        <button class="action-btn">
                            <?php lvgshop__compare_icon_in_product_card(); ?>
                        </button>

                        <?php
                        if (class_exists('YITH_WCWL')) {
                            ?>

                            <?php
                            $wishNonce = wp_create_nonce("add_to_wishlist");
                            $like_link = admin_url('admin-ajax.php?nonce=' . $wishNonce);
                            $status = '';
                            $like_classes = 'text-body-default';

                            global $yith_wcwl;
                            if (empty($yith_wcwl->details['user_id'])) {
                                $yith_wcwl->details['user_id'] = '';
                            }
                            if ($yith_wcwl->is_product_in_wishlist($post->ID)) {
                                $status = 'remove-item';
                                $like_classes = 'nik-wishlist-full';
                            }

                            ?>
                            <a href="#" data-wishlist-link="<?php echo esc_url($like_link); ?>"
                               data-id="<?php echo esc_attr($post->ID); ?>"
                               class="lvgshop-add-to-wishlist <?php echo esc_attr($status); ?> action-btn">
                                <i class="btn-icon <?php echo esc_attr($like_classes); ?> ele-icon lvgshop-heart-2"></i>
                            </a>
                            <?php
                        }
                        ?>

                    </div>
                    <div class="product-img-wrapper">
                        <div class="img-box">
                            <a href="single-product-1.html">
                                <img src="<?php echo get_the_post_thumbnail_url($settings['Select-Product-style']); ?>"
                                     alt="product img" class="main-img">
                                <img src="<?php echo get_the_post_thumbnail_url($settings['Select-Product-style']); ?>"
                                     alt="product img" class="hover-img">
                            </a>
                        </div>
                    </div>
                    <div class="content-wrapper">

                        <?php
                        $terms = get_the_terms($product->get_id(), 'product_cat');
                        if (!empty($terms)) {
                            echo '<a href="' . esc_url(get_term_link($terms[0]->term_id)) . '">' . esc_html($terms[0]->name) . '</a>';
                        }

                        ?>
                        <a href="<?php the_permalink($settings['Select-Product-style']); ?>"
                           class="title title-h2 title_del"><?php echo get_the_title($settings['Select-Product-style']); ?></a>
                        <div class="btm-content-wrapper btm-content-wrapper-offer">
                            <?php do_action('lvgshop_product_add_to_cart_with_text', $productID, $product, $nonce); ?>
                            <div class="pricing-wrapper">
                                <?php $product = wc_get_product($settings['Select-Product-style']); ?>
                                <?php echo $product->get_price_html(); ?>

                            </div>
                            <div class="review-start-wrapper">
                                <?php lvgshop_get_star_rating(); ?>
                            </div>
                        </div>
                        <p class="offer-txt">Hurry Up! Special Offers end in:</p>


                        <?php
                        if ($product->is_on_sale() && $sales_price_tos != "") {
                            ?>
                            <div class="count-box countdown countdown-timer"
                                 data-date="<?php echo date_format($dates, 'Y-n-d'); ?> 23:59:59">

                                <div class="single-countbox" data-wow-delay=".3s">
                                    <span class="days count-number">20</span>
                                </div>

                                <div class="single-countbox" data-wow-delay=".3s">
                                    <span class="hours count-number">11</span>
                                </div>
                                <div class="single-countbox" data-wow-delay=".3s">
                                    <span class="minutes count-number">34</span>
                                </div>
                                <div class="single-countbox" data-wow-delay=".3s">
                                    <span class="seconds count-number">69</span>
                                </div>

                            </div>
                            <?php

                        }
                        ?>


                    </div>
                </div>
            </div>

            <?php
        }
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \lvgshop_deal_banner());

