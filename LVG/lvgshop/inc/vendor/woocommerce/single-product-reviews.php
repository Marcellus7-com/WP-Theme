<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

if (!comments_open()) {
    return;
}


global $product;
$ratings = $product->get_rating_count();
$rating_item = array(
    5 => $product->get_rating_count(5),
    4 => $product->get_rating_count(4),
    3 => $product->get_rating_count(3),
    2 => $product->get_rating_count(2),
    1 => $product->get_rating_count(1)
);

$count = $product->get_review_count();

$reviewForm = (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->get_id())) ? true : false;

$classStatistic = 'lvgshop-statistic-ratings';
if (!$reviewForm) :
    $classStatistic .= ' fullwidth';
endif;

?>
<div id="reviews" class="woocommerce-Reviews main-details-des-review-tab-section pb-100 wow fadeInUp">
    <div class="row">
        <div class="col-xl-6 col-xxl-5">
            <div class="review-box mb-30">
                <h5 class="review-title">Customer Reviews</h5>
                <!-- ratings info -->
                <div class="ratings-wrapper mb-30">
                    <span class="average-ratings me-2">  <?php echo 0 < $count ? $product->get_average_rating() : '0.00'; ?> </span>
                    <?php
                    if (!wc_review_ratings_enabled()) {
                        return;
                    }

                    $rating_count = $product->get_rating_count();
                    $average = $product->get_average_rating();

                    if ($rating_count > 0) : ?>

                        <div class="woocommerce-product-rating sm:flex">
                            <?php echo wc_get_rating_html($average, $rating_count); // WPCS: XSS ok. ?>
                        </div>
                    <?php
                    endif;
                    ?>
                    <span class="common-txt ms-2">( <?php echo sprintf(esc_html__('%s reviews', 'lvgshop'), $count); ?>)</span>
                </div>
                <div class="progressbar-wrapper">
                    <?php for ($i = 5; $i >= 1; $i--): ?>
                        <?php
                        echo '<!-- ' . $i . ' stars -->';
                        $per = ($ratings > 0 && isset($rating_item[$i])) ? round($rating_item[$i] / $ratings * 100, 2) : 0;
                        $width = $i / 5 * 100;
                        ?>
                        <div class="single-wrapper">
                            <span class="ratings-number me-3 common-txt"> <?php echo esc_html($i); ?> star</span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-width="<?php echo esc_attr($per); ?>%"
                                     aria-valuenow="<?php echo esc_attr($per); ?>"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="ratings-number ms-3 common-txt"><?php echo esc_attr($per); ?>%</span>
                        </div>
                    <?php endfor; ?>

                </div>

            </div>
            <div class="comment-box mb-40">
                <div class="single-comment">

                    <?php if (have_comments()) : ?>
                        <ol class="commentlist">
                            <?php wp_list_comments(apply_filters('woocommerce_product_review_list_args', array('callback' => 'woocommerce_comments'))); ?>
                        </ol>

                        <?php
                        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
                            echo '<nav class="woocommerce-pagination">';

                            paginate_comments_links(
                                apply_filters('woocommerce_comment_pagination_args', array(
                                    'prev_text' => '<span class="pe7-icon pe-7s-angle-left"></span>',
                                    'next_text' => '<span class="pe7-icon pe-7s-angle-right"></span>',
                                    'type' => 'list'
                                ))
                            );

                            echo '</nav>';
                        endif;
                        ?>
                    <?php else : ?>
                        <p class="woocommerce-noreviews"><?php esc_html_e('There are no reviews yet.', 'lvgshop'); ?></p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="offset-xxl-1 col-xl-6 mt-30 mt-xl-0">
            <div class="submit-ratings-wrapper">
                <h2>Review This Product
                </h2>
<!--                --><?php //echo esc_html__('Your email address will not be published. Required fields are marked *', 'lvgshop'); ?>
<div class="form-wrapper">
    <?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(),                       $product->get_id())) : ?>
        <div id="review_form_wrapper">
            <div id="review_form">
                <?php

                $commenter = wp_get_current_commenter();
                $comment_form = array(

                    /* translators: %s is product title */
                    'title_reply' => have_comments() ? esc_html__('Add a review', 'lvgshop') : sprintf(esc_html__('Be the first to review &ldquo;%s&rdquo;', 'lvgshop'), get_the_title()),
                    /* translators: %s is product title */
                    'title_reply_to' => esc_html__('Leave a Reply to %s', 'lvgshop'),
                    'title_reply_before' => '<span id="reply-title" class="comment-reply-title">',
                    'title_reply_after' => '</span>',
                    'comment_notes_after' => '',
                    'label_submit' => esc_html__('Submit', 'lvgshop'),
                    'logged_in_as' => '',
                    'comment_field' => '',
                );
                if (wc_review_ratings_enabled()) {
                    $comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__('Your rating', 'lvgshop') . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__('Rate&hellip;', 'lvgshop') . '</option>
						<option value="5">' . esc_html__('Perfect', 'lvgshop') . '</option>
						<option value="4">' . esc_html__('Good', 'lvgshop') . '</option>
						<option value="3">' . esc_html__('Average', 'lvgshop') . '</option>
						<option value="2">' . esc_html__('Not that bad', 'lvgshop') . '</option>
						<option value="1">' . esc_html__('Very poor', 'lvgshop') . '</option>
					</select></div>';
                }
                $name_email_required = (bool)get_option('require_name_email', 1);
                $fields = array(
                    'author' => array(
                        'label' => __('Name', 'lvgshop'),
                        'type' => 'text',
                        'value' => $commenter['comment_author'],
                        'required' => $name_email_required,
                    ),
                    'email' => array(
                        'label' => __('Email', 'lvgshop'),
                        'type' => 'email',
                        'value' => $commenter['comment_author_email'],
                        'required' => $name_email_required,
                    ),
                );

                $comment_form['fields'] = array();

                foreach ($fields as $key => $field) {
                    $field_html = '<p class="comment-form-' . esc_attr($key) . '">';
                    $field_html .= '<label for="' . esc_attr($key) . '">' . esc_html($field['label']);

                    if ($field['required']) {
                        $field_html .= '&nbsp;<span class="required">*</span>';
                    }

                    $field_html .= '</label><input id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" type="' . esc_attr($field['type']) . '" value="' . esc_attr($field['value']) . '" size="30" ' . ($field['required'] ? 'required' : '') . '  placeholder="' . esc_attr($field['label']) . '*" /></p>';

                    $comment_form['fields'][$key] = $field_html;
                }

                $account_page_url = wc_get_page_permalink('myaccount');
                if ($account_page_url) {
                    /* translators: %s opening and closing link tags respectively */
                    $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf(esc_html__('You must be %1$slogged in%2$s to post a review.', 'lvgshop'), '<a href="' . esc_url($account_page_url) . '">', '</a>') . '</p>';
                }


                $comment_form['comment_field'] .= '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" required placeholder="Your Reviews*"></textarea></p>';

                comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
                ?>
            </div>
        </div>
    <?php else : ?>
        <p class="woocommerce-verification-required"><?php esc_html_e('Only logged in customers who have purchased this product may leave a review.', 'lvgshop'); ?></p>
    <?php endif; ?>
</div>

            </div>
        </div>
    </div>


    <div class="clear"></div>
</div>


