<?php if ( ! defined( 'ABSPATH' )  ) { die; }

  CSF::createWidget( 'lvgshop_author_widget', array(
    'title'       => 'Lvgshop Author About',
    'classname'   => 'lvgshop-author',
    'description' => 'Lvgshop author details on sidebar.',
    'fields'      => array(

   
      array(
      'id'      => 'title',
      'type'    => 'text',
      'title'   => 'Title',
    ),
    

   array(
  'id'          => 'author_type',
  'type'        => 'select',
  'title'       => 'Author Type',
  'placeholder' => 'Select an option',
  'options'     => array(
    'pauthor' => 'Post Author',
    'selauthor' => 'Selected Author'
  ),
  'default'     => 'pauthor'
),
    
    
    // Select with CPT (custom post type) categories
array(
  'id'          => 'sel_author',
  'type'        => 'select',
  'title'       => 'Select Author',
  'placeholder' => 'Select a category',
  'options'     => 'users',
   'dependency' => array( 'author_type', '==', 'selauthor' ),
),
  
    )
  ) );

  //
  // Front-end display of widget example 1
  // Attention: This function named considering above widget base id.
  //
  if( ! function_exists( 'lvgshop_author_widget' ) ) {
    function lvgshop_author_widget( $args, $instance ) {
        global $post;
		
		$author_type = $instance['author_type'];
		$sel_author = $instance ['sel_author'];
		if ($author_type == "selauthor"){
		
		$author = $sel_author;
		} else {
		    
		   $author = $post->post_author; 
		}
		$authorID= get_the_author_meta( 'ID' );
        $signature = get_user_meta( $author, 'user_signature',true );
        $facebook = get_user_meta( $author, 'user_facebook',true );
        $twitter = get_user_meta( $author, 'user_twitter',true );
        $instgram = get_user_meta( $author, 'user_instagram',true );
        $linkedin = get_user_meta( $author, 'user_linkedin',true );
        $youtube = get_user_meta( $author, 'user_youtube',true );
        $pinterest = get_user_meta( $author, 'user_pinterest',true );
        
      echo $args['before_widget'];
      
      if ( ! empty( $instance['title'] ) ) { ?>
      <h2 class="widget-title"><?php echo $instance['title'];?></h2>
    <?php  }
?>
    <div class="lvgshop-author-widget">
       
       <a href="<?php echo get_author_posts_url($author);?>"><?php echo get_avatar( $author,145) ?></a>
       
       <h4><?php echo get_the_author_meta( 'display_name',$author);?></h4>
        <p class="med-author-descriptions"><?php echo esc_html(get_user_meta($author,'description',true)); ?></p>
       <div class="psv-author-social">
           <ul>
               <?php if($facebook){?>
               <li class="psv-a-facebook"><a href="<?php echo esc_url($facebook);?>"><i class="zil zi-facebook"></i></a></li>
               <?php } ?>
               
               <?php if($twitter){?>
               <li class="psv-a-twitter"><a href="<?php echo esc_url($twitter);?>"><i class="zil zi-twitter"></i></a></li>
               <?php } ?>
               
               <?php if($instgram){?>
               <li class="psv-a-instagram"><a href="<?php echo esc_url($instgram);?>"><i class="zil zi-instagram"></i></a></li>
               <?php } ?>
               
               <?php if($linkedin){?>
               <li class="psv-a-linkedin"><a href="<?php echo esc_url($linkedin);?>"><i class="zil zi-linked-in"></i></a></li>
               <?php } ?>
               
                 <?php if($youtube){?>
               <li class="psv-a-youtube"><a href="<?php echo esc_url($youtube);?>"><i class="zil zi-youtube"></i></a></li>
               <?php } ?>
               
                 <?php if($pinterest){?>
               <li class="psv-a-pinterest"><a href="<?php echo esc_url($pinterest);?>"><i class="zil zi-pinterest"></i></a></li>
               <?php } ?>
           </ul>
       </div>
         
          <div class="clearfix"></div>
          
    </div>
    
    
 

 <?php    echo $args['after_widget']; }
  }


