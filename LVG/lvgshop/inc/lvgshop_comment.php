<?php
if (!function_exists('lvgshop_comments')) :
    function lvgshop_comments($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
                <div class="comment-body">
                    <?php esc_html_e('Pingback:', 'lvgshop'); ?><?php comment_author_link(); ?><?php edit_comment_link(esc_attr__('Edit', 'lvgshop'), '<span class="edit-link">', '</span>'); ?>
                </div>
            </li>
        <?php else : ?>

            <li id="comment-<?php comment_ID(); ?> single-comment" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
                <article id="div-comment-<?php comment_ID(); ?>" class="comment-body blog-comment-list">
                    <div class="comment-meta">
                        <div class="comment-author d-flex gap-4 flex-wrap flex-md-nowrap">
                            <div class="comment-avater">
                                <?php
                                $args['class'] = 'rounded-circle';
                                echo get_avatar($comment, 80, '', '', $args);
                                ?>
                            </div>
                            <div class="comment-details-meta">
                                <div class="comment-title-date-reply">
                                    <div class="comment-title-and-date">
                                        <div class="comment-title">
                                            <?php printf(esc_html__('%s', 'lvgshop'), sprintf('<h3 class="comment-author-title">%s</h3>', get_comment_author_link())); ?>
                                        </div>
                                        <div class="comment-date">
                                            <a class="fw-light fs-sm text-color" href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                                <time datetime="<?php comment_time('c'); ?>">
                                                    <?php printf(esc_html__('%1$s at %2$s', 'lvgshop'), get_comment_date(), get_comment_time()); ?>
                                                </time>
                                            </a>

                                        </div><!-- .comment-metadata -->
                                    </div>
                                    <div class="comment-reply-button">
                                        <?php
                                        comment_reply_link(array_merge($args, array(
                                            'add_below' => 'div-comment',
                                            'depth' => $depth,
                                            'max_depth' => $args['max_depth'],
                                            'before' => '<span class="comment-reply reply-btn"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_60_6051)">
                                                              <path
                                                                d="M9.33333 3V6C13.0153 6 16 8.98467 16 12.6667C16 12.8487 15.9933 13.0287 15.9787 13.2067C15.0033 11.3573 13.092 10.0793 10.8753 10.0033L10.6667 10H9.33333V13L4 8L9.33333 3ZM5.33333 3V4.82467L1.94667 8L5.33267 11.174L5.33333 13L0 8L5.33333 3ZM8 6.07733L5.94933 8L8 9.922V8.66667H10.6893L10.9207 8.67133C11.7773 8.7 12.6033 8.878 13.3713 9.182C12.3933 8.05 10.9467 7.33333 9.33333 7.33333H8V6.07733Z"
                                                                fill="#085330" />
                                                            </g>
                                                            <defs>
                                                              <clipPath id="clip0_60_6051">
                                                                <rect width="16" height="16" fill="white" />
                                                              </clipPath>
                                                            </defs>
                                                          </svg>',
                                            'after' => '</span>',
                                        )));
                                        ?>
                                    </div>
                                </div>

                            </div>

                        </div><!-- .comment-author-avatar -->



                        <div class="comment-content">

                            <?php if ('0' == $comment->comment_approved) : ?>
                                <p class="comment-awaiting-moderation "><?php esc_html_e('Your comment is awaiting moderation.', 'lvgshop'); ?></p>
                            <?php endif; ?>


                            <div class="comment-text fw-light text-color mb-0"><?php comment_text(); ?></div><!-- .comment-text -->


                            <?php edit_comment_link(esc_html__('Edit', 'lvgshop')); ?>

                            <div class="comment-separator"></div>

                        </div><!-- .comment-content -->

                    </div>


                </article><!-- .comment-body -->
            </li>
        <?php
        endif;
    }
endif; // ends check for lvgshop_comments()