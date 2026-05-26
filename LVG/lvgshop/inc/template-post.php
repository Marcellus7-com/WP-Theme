<?php
if ( ! function_exists( 'lvgshop_post_style_list_sidebar' ) ) {
	function lvgshop_post_style_list_sidebar() { ?>
		<li class="d-flex align-items-center gap-3 post-li">

              <div class="feature-image pe-1">
				<a href="<?php the_permalink();?>"> <?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('lvgshop-blog-side-square');
					} ?></a>
              </div>

			<div class="list-post-meta col-12 col-md-8 ">


				<h4 class="title"><a  href="<?php the_permalink();?>"><?php echo lvgshop_title_trim($maxchar= 38); ?></a></h4>

                <div class="old-price d-flex align-items-center gap-2">
                    <i class="fa-solid fa-calendar-days"></i>
                    <?php lvgshop_posted_on(); ?>
                </div>
			</div>
		</li>
	<?php } }