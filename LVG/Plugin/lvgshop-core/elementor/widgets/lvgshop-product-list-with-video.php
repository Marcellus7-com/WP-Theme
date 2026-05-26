<?php

/**
 * @author Indigo Agency by M7theme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Controls_Manager;
use Elementor\Icons_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class lvgshop_product_list_with_video extends \Elementor\Widget_Base
{

    public function get_name() {
        return 'lvgshop_product_list_with_video';
    }

    public function get_title() {
        return esc_html__('Lvgshop Product List With Video', 'lvgshop-core');
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
            'section-title',
            [
                'label' => esc_html__('Section Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Trending On This Week', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'button_title',
            [
                'label' => esc_html__('Button Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Explore Now', 'textdomain'),
                'placeholder' => esc_html__('Type your Button title here', 'textdomain'),
                'condition' => [
                    'Widget-Style' => 'style_1',
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
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $this->add_control(
            'item_per_row',
            [
                'label' => __('Items Per Row', 'lvgshop'),
                'type' => \Elementor\Controls_Manager::NUMBER,

                'step' => 1,
                'default' => 3,
            ]
        );
        $this->add_control(
            'category',
            array(
                'label' => esc_html__('Select Category', 'lvgshop'),
                'type' => Controls_Manager::SELECT2,
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
            'product_type',
            [
                'label' => __('Select Product Type', 'lvgshop'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'regular',
                'options' => [
                    'regular' => __('Latest', 'lvgshop'),
                    'featured' => __('Featured', 'lvgshop'),
                    'onsale' => __('On Sale', 'lvgshop'),
                    'bestseller' => __('Best Seller', 'lvgshop'),
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Video-Banner-Content',
            [
                'label' => esc_html__('Video Banner Content', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $this->add_control(
            'video_section_visible_switcher',
            [
                'label' => esc_html__('Video Enable/Disable Switcher', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'textdomain'),
                'label_off' => esc_html__('Hide', 'textdomain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'video_bg_img',
            [
                'label' => esc_html__('Video Banner Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'video_link',
            [
                'label' => esc_html__('Video Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'textdomain'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => 'https://youtu.be/LN6EuNqxOwE',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tagline',
            [
                'label' => esc_html__('Tagline', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('New Arrival', 'textdomain'),
                'placeholder' => esc_html__('Type your tagline here', 'textdomain'),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Playing Video Game', 'textdomain'),
                'placeholder' => esc_html__('Type your title here', 'textdomain'),
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'textdomain'),
                'label_block' => true,
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Up to 50% Off consumer electronics', 'textdomain'),
                'placeholder' => esc_html__('Type your Description here', 'textdomain'),
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
                    '{{WRAPPER}} .section_title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .sidebar-popular-items h4' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Section-Title-typography',
                'label' => esc_html__('Section Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .section_title,
                {{WRAPPER}} .sidebar-popular-items h4',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Button-style',
            [
                'label' => esc_html__('Button Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $this->add_control(
            'Button-color',
            [
                'label' => esc_html__('Button Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .normal-blue-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .normal-blue-btn svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Button-typography',
                'label' => esc_html__('Section Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .normal-blue-btn',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Product-style',
            [
                'label' => esc_html__('Product Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'Product-Category-color',
            [
                'label' => esc_html__('Product Category Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-single-trending-product .tag' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Product-Category-typography',
                'label' => esc_html__('Product Category Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-single-trending-product .tag',
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $this->add_control(
            'Product-Title-color',
            [
                'label' => esc_html__('Product Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el-single-trending-product .title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .sidebar-popular-items .single-sm-product .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Product-Title-typography',
                'label' => esc_html__('Product Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el-single-trending-product .title,
                {{WRAPPER}} .sidebar-popular-items .single-sm-product .title',
            ]
        );
        $this->add_control(
            'Product-Sale-Price-color',
            [
                'label' => esc_html__('Product Sale Price Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-wrapper' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .pricing-wrapper ins' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .sidebar_product_price ins' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .sidebar_product_price' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Product-Regular-Price-color',
            [
                'label' => esc_html__('Product Regular Price Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-wrapper del' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .sidebar_product_price del' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Video-Box-style',
            [
                'label' => esc_html__('Video Box Style', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Widget-Style' => 'style_1',
                ],
            ]
        );
        $this->add_control(
            'Video-Box-BG-color',
            [
                'label' => esc_html__('Video Box BG Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el3-trending-section .content-wrapper .trending-video .video-content' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Video-Play-Icon-color',
            [
                'label' => esc_html__('Video Play Icon Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .vdo-btn svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'Tagline-color',
            [
                'label' => esc_html__('Tagline Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el3-trending-section .content-wrapper .trending-video .video-content .tag-line' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Tagline-typography',
                'label' => esc_html__('Tagline Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el3-trending-section .content-wrapper .trending-video .video-content .tag-line',
            ]
        );
        $this->add_control(
            'Video-Box-Title-color',
            [
                'label' => esc_html__('Video Box Title Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el3-trending-section .content-wrapper .trending-video .video-content .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Video-Box-Title-typography',
                'label' => esc_html__('Video Box Title Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el3-trending-section .content-wrapper .trending-video .video-content .title',
            ]
        );
        $this->add_control(
            'Video-Box-Description-color',
            [
                'label' => esc_html__('Video Box Description Color', 'textdomain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .el3-trending-section .content-wrapper .trending-video .video-content .des' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'Video-Box-Description-typography',
                'label' => esc_html__('Video Box Description Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .el3-trending-section .content-wrapper .trending-video .video-content .des',
            ]
        );
        $this->end_controls_section();


    }


    protected function render() {
        $settings = $this->get_settings_for_display();

        $category = $settings['category'];
        $item_per_row = $settings['item_per_row'];
        $product_type = $settings['product_type'];
        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        if ($product_type == 'onsale') {
            $product_args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'paged' => $paged,
                'posts_per_page' => $item_per_row,
                'meta_query' => WC()->query->get_meta_query(),
                'post__in' => array_merge(array(0), wc_get_product_ids_on_sale())
            );

        } else {
            $product_args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'paged' => $paged,
                'posts_per_page' => $item_per_row,
            );
        }
        if (!empty($category[0])) {
            $product_args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'ids',
                    'terms' => $category
                )
            );
        }
        if ($product_type == 'featured') {
            $product_args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field' => 'name',
                    'terms' => 'featured',
                    'operator' => 'IN',
                )
            );
        }
        if ($product_type == 'bestseller') {
            $product_args['meta_query'] = array(

                array(
                    'key' => 'total_sales',
                    'value' => 0,
                    'compare' => '>',
                    'type' => 'numeric'
                )
            );
        }
        $the_query = new \WP_Query($product_args);

        ?>
        <?php
        if ($settings['Widget-Style'] == 'style_1') {
            ?>
            <!-- trending section start -->
            <div class="el3-trending-section mt-60 overflow-hidden">
                <!-- title bar -->
                <div class="row align-items-center mb-20 wow fadeInUp">
                    <div class="col-md-6">
                        <?php if ($settings['section-title']) { ?>
                            <h3 class="text-capitalize font-semibold wow fadeInUp section_title">
                                <?php echo $settings['section-title']; ?>
                            </h3>
                        <?php } ?>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <?php if ($settings['button_title']) { ?>
                            <a href="<?php echo $settings['button_link']['url']; ?>" class="normal-blue-btn">
                                <?php echo $settings['button_title']; ?>
                                <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M0.333496 6.27148C0.333496 5.95507 0.568624 5.69358 0.873687 5.65219L0.958496 5.64648L13.4585 5.64648C13.8037 5.64648 14.0835 5.92631 14.0835 6.27148C14.0835 6.5879 13.8484 6.84939 13.5433 6.89078L13.4585 6.89648L0.958496 6.89648C0.613318 6.89648 0.333496 6.61666 0.333496 6.27148Z"
                                            fill="#1F7F38"/>
                                    <path
                                            d="M7.976 1.69405C7.7314 1.4505 7.73055 1.05477 7.9741 0.81017C8.19551 0.587804 8.54269 0.566885 8.78775 0.747903L8.85798 0.808267L13.8996 5.82827C14.1227 6.05034 14.143 6.39877 13.9605 6.64383L13.8997 6.71401L8.85802 11.7348C8.61344 11.9784 8.21771 11.9776 7.97414 11.733C7.75271 11.5107 7.73325 11.1634 7.91531 10.9191L7.97597 10.8491L12.5727 6.27091L7.976 1.69405Z"
                                            fill="#1F7F38"/>
                                </svg>
                            </a>
                        <?php } ?>
                    </div>
                </div>

                <!-- main content -->
                <div class="content-wrapper">
                    <div class="trending-product-wrapper">
                        <?php
                        $i = 0;
                        while ($the_query->have_posts()) {
                            $i++;
                            $the_query->the_post();
                            $product = wc_get_product();
                            ?>
                            <div class="el-single-trending-product wow animate__fadeInLeft" data-wow-delay=".<?php echo $i; ?>s">
                                <div class="img-box">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="trending product">
                                    </a>
                                </div>
                                <div>
                                    <?php
                                    $terms = get_the_terms($product->get_id(), 'product_cat');
                                    if (!empty($terms)) {
                                        echo '<a href="' . esc_url(get_term_link($terms[0]->term_id)) . '" class="tag">' . esc_html($terms[0]->name) . '</a>';
                                    }
                                    ?>
                                    <a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>

                                    <div class="ratings">
                                        <?php lvgshop_get_star_rating(); ?>
                                    </div>
                                    <div class="pricing-wrapper">
                                        <?php
                                        echo $product->get_price_html();
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                    <?php if ('yes' == $settings['video_section_visible_switcher']) { ?>
                        <div class="trending-video wow animate__fadeIn" data-wow-delay=".2s">
                            <span class="left-side-bg" data-background="<?php echo $settings['video_bg_img']['url']; ?>"></span>
                            <?php if ($settings['video_link']['url']) { ?>
                                <a class="vdo-btn" data-fancybox href="<?php echo $settings['video_link']['url']; ?>">
                                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="30" cy="30" r="30" fill="white"/>
                                        <path
                                                d="M39 28.2679C40.3333 29.0377 40.3333 30.9623 39 31.7321L27 38.6603C25.6667 39.4301 24 38.4678 24 36.9282L24 23.0718C24 21.5322 25.6667 20.5699 27 21.3397L39 28.2679Z"
                                                fill="#FE4852"/>
                                    </svg>
                                </a>
                            <?php } ?>
                            <div class="video-content">
                                <?php if ($settings['tagline']) { ?>
                                    <span class="tag-line"><?php echo $settings['tagline']; ?></span>
                                <?php } ?>
                                <?php if ($settings['title']) { ?>
                                    <h3 class="title"><?php echo $settings['title']; ?></h3>
                                <?php } ?>
                                <?php if ($settings['description']) { ?>
                                    <span class="des"><?php echo $settings['description']; ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- trending section end -->
        <?php } else {
            ?>
            <!-- most popular itesm -->
            <div class="sidebar-popular-items theme-border-1 wow fadeInUp">
                <?php if ($settings['section-title']) { ?>
                    <h4><?php echo $settings['section-title']; ?></h4>
                <?php } ?>
                <div class="divider"></div>
                <ul>
                    <?php
                    $i = 0;
                    while ($the_query->have_posts()) {
                        $i++;
                        $the_query->the_post();
                        $product = wc_get_product();
                        ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" class="single-sm-product">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="product img">
                                <span class="contents">
                                  <span class="title">
                                      <?php echo wp_trim_words(get_the_title(),5); ?>
                                  </span>
                                  <span class="d-flex align-items-center sidebar_product_price">
                                    <?php
                                    echo $product->get_price_html();
                                    ?>
                                  </span>
                                </span>
                            </a>
                        </li>
                        <?php
                    }
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
            <?php
        } ?>
        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register(new \lvgshop_product_list_with_video());

