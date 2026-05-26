<div class="lvgshop-single-blog">
                       <?php if(has_post_thumbnail()){?>
                          <a href="<?php the_permalink(); ?>" class="lvgshop-post-thumbnail">
                             <?php the_post_thumbnail('lvgshop-default-post-st-one'); ?>
                          </a>
                          <?php } ?>
                          <div class="lvgshop-blog-meta">
                            <span class="meta-name"> <i class="zil zi-tag"></i>
                             <?php echo lvgshop_post_cat(); ?></span>
                            <span class="meta-date"> <i class="zil zi-clock"></i>
                             <?php lvgshop_posted_on(); ?></span>
                          </div>
                          
                             <h2 class="lvgshop-blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                          
                          <a href="<?php the_permalink(); ?>" class="readmore-btn"><?php echo esc_html( 'Read More', 'lvgshop' )?></a>
                    </div>