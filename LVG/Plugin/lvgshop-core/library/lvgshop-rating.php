<?php
//Create the rating interface.
add_action( 'comment_form_logged_in_after', 'lvgshop_comment_rating_rating_field' );
add_action( 'comment_form_after_fields', 'lvgshop_comment_rating_rating_field' );
function lvgshop_comment_rating_rating_field () {
    $display = 'no';
  if (is_singular('doctor')) {
		$display = 'yes';
	}
	
	
	
    if ($display == "yes"){
	?>
	<div class="lvgshop-rating-box">
	<fieldset class="comments-rating">
		<span class="rating-container">
			<?php for ( $i = 5; $i >= 1; $i-- ) : ?>
				<input type="radio" id="lvgshop_rating-<?php echo esc_attr( $i ); ?>" name="lvgshop_rating" value="<?php echo esc_attr( $i ); ?>" /><label for="lvgshop_rating-<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></label>
			<?php endfor; ?>
			<input type="radio" id="lvgshop_rating-0" class="star-cb-clear" name="lvgshop_rating" value="0" /><label for="lvgshop_rating-0">0</label>
		</span>
	</fieldset>
	</div>
	<?php
    }
}

//Save the rating submitted by the user.
add_action( 'comment_post', 'lvgshop_comment_rating_save_comment_rating' );
function lvgshop_comment_rating_save_comment_rating( $comment_id ) {
	if ( ( isset( $_POST['lvgshop_rating'] ) ) && ( '' !== $_POST['lvgshop_rating'] ) )
	if ( is_product() ){
	} elseif (is_single() && 'post' == get_post_type()) {
	} else {
	$rating = intval( $_POST['lvgshop_rating'] );
	add_comment_meta( $comment_id, 'lvgshop_rating', $rating );
	}
}

//Make the rating required.
//add_filter( 'preprocess_comment', 'lvgshop_comment_rating_require_rating' );
//function lvgshop_comment_rating_require_rating( $commentdata ) {
	//if ( ! is_admin() && ( ! isset( $_POST['lvgshop_rating'] ) || 0 === intval( $_POST['lvgshop_rating'] ) ) )
	//wp_die( __( 'Error: You did not add a rating. Hit the Back button on your Web browser and resubmit your comment with a rating.' ) );
	//return $commentdata;
//}

//Display the rating on a submitted comment.
add_filter( 'lvgshop-comment-rating-display-action', 'lvgshop_comment_rating_display_rating',10, 3);
function lvgshop_comment_rating_display_rating( $comment_text ){
	$display = 'no';

	if (is_singular('doctor')) {
		$display = 'yes';
	}

	if ($display =='yes') {
if ( $rating = get_comment_meta( get_comment_ID(), 'lvgshop_rating', true ) ) {
		$stars = '<p class="lvgshop-star-rating stars"> <span class="pivz-rating-title">Rating: </span>';
		for ( $i = 1; $i <= 5 ; $i ++ ) {
			if ( $i <= $rating ) {
				$stars .= '<span class="ri-star-fill lvgshop-rating-full"></span>';
			} else {
				$stars .= '<span class="ri-star-fill text-gray-400"></span>';
			}
		}
		$stars .= '</p>';
		$comment_text = $comment_text . $stars;
		return $comment_text;
	} else {
		return $comment_text;
	}
	}
	else {
		return $comment_text;
	}
}

//Get the average rating of a post.
function lvgshop_comment_rating_get_average_ratings( $id ) {
	$comments = get_approved_comments( $id );
	$display = 'no';

	if (is_singular('doctor')) {
		$display = 'yes';
	}
	if ($display =='yes') {
	if ( $comments ) {
		$i = 0;
		$total = 0;
		foreach( $comments as $comment ){
			$rate = get_comment_meta( $comment->comment_ID, 'lvgshop_rating', true );
			if( isset( $rate ) && '' !== $rate ) {
				$i++;
				$total += $rate;
			}
		}

		if ( 0 === $i ) {
			return false;
		} else {
			return round( $total / $i, 1 );
		}
	} else {
		return false;
	}
	
	}
}

//Display the average rating above the content.
function lvgshop_comment_rating_display_average_rating( $content ) {


	global $post;

	if ( true === lvgshop_comment_rating_get_average_ratings( $post->ID ) ) {
		return $content;
	}
	
	$stars   = '';
	$average = lvgshop_comment_rating_get_average_ratings( $post->ID );

	for ( $i = 1; $i <= $average + 1; $i++ ) {
		
		$width = intval( $i - $average > 0 ? 20 - ( ( $i - $average ) * 20 ) : 20 );

		if ( 0 === $width ) {
			continue;
		}

		$stars .= '<span style="overflow:hidden; width:' . $width . 'px" class="fas fa-star"></span>';

		if ( $i - $average > 0 ) {
			$stars .= '<span style="overflow:hidden; position:relative; left:-' . $width .'px;" class="far fa-star"></span>';
		}
	}
	
	$custom_content  = '<p class="average-rating"> ' . $stars .'( ' . lvgshop_post_review_count() .') </p>';
	$custom_content .= $content;
	return $custom_content;
}

function lvgshop_cr_display_fn( $content ) {
$lvgshop_cr_display = lvgshop_comment_rating_display_average_rating( $content );
return $lvgshop_cr_display;
}

add_shortcode( 'lvgshop-cr-display', 'lvgshop_cr_display_fn' );
/*
==========================================
  function to get total rating
==========================================
 */
function lvgshop_total_rating( $id ) {
	$comments = get_approved_comments( $id );

	if ( $comments ) {
		$total = 0;
		foreach( $comments as $comment ){
			$rate = get_comment_meta( $comment->comment_ID, 'lvgshop_rating', true );
			if( isset( $rate ) && '' !== $rate ) {
				$total++;
			}
		}
		return $total;
	}
	else {
		return "0";
	}
}
/*
==========================================
  function to get average rating
==========================================
 */
function lvgshop_average_rating( $id ) {
	$comments = get_approved_comments( $id );

	if ( $comments ) {
		$total = 0;
		$sum = 0;
		foreach( $comments as $comment ){
			$rate = get_comment_meta( $comment->comment_ID, 'lvgshop_rating', true );
			if( isset( $rate ) && '' !== $rate ) {
				$total++;
				$sum += $rate;
			}
		}

 		$get_avg = round($sum / $total, 1);
		return number_format((float)$get_avg, 1, '.', '');
	}
	else {
		return "0.0";
	}
}


/*
==========================================
  function to get single rating
==========================================
 */
function lvgshop_single_rating( $id, $rating ) {
	$comments = get_approved_comments( $id );

	// single rating counter
	if(isset($rating) && '' != $rating) {
	
			$single_rating = 0;
			foreach( $comments as $comment ){
				$rate = get_comment_meta( $comment->comment_ID, 'lvgshop_rating', true );
				if( isset( $rate ) && '' !== $rate && $rate == $rating) {
					$single_rating++;
				}
			}
		
		return $single_rating;
	}
	else {
		return "0";
	}
}

/*
==========================================
  shortcode - get dynamic items
==========================================
 */
add_shortcode( 'lvgshop_rating', 'lvgshop_rating_display_function' );
function lvgshop_rating_display_function( $atts, $content = null ) {

	// get attributes
   	extract( shortcode_atts( array(
      'type' => 'type',
      'rating' => 'rating'
      ), $atts ) );

	// get post id
	global $post;
	$id              = $post->ID;
	
	$total_rating    = lvgshop_total_rating($id);
	$average_rating  = lvgshop_average_rating($id);
	
	// single rating
	if(isset($rating) && "" != $rating) {
		$single_rating = lvgshop_single_rating($id, $rating);
	}

	// ratingbar
	$stars           = '';
	$get_int_part    = floor($average_rating);
	$fraction        = $average_rating - $get_int_part;
	$lvgshop_empty_star = round(5 - $average_rating);

	for ( $i = 0; $i < $get_int_part; $i++ ) {
		$stars .= '<span class="ri-star-fill lvgshop-rating-full"></span>';
	}
	if($lvgshop_empty_star !=0) {
		for ($i=0; $i < $lvgshop_empty_star; $i++) {
			$stars .= '<span class="ri-star-fill text-gray-400"></span>';
		}
	}
	
	$rating_bar_content  = '<span class="lvgshop-average-rating-bar">' . $stars .'</span>';

    // check what type user entered
	switch ($type) {
	    case "totalRating":
			return $total_rating;
        	break;
	    case "averageRating":
	        return $average_rating;
	        break;
	    case "singleRating":
	        	return $single_rating;
	        break;
	    case "ratingBar":
	        	return $rating_bar_content;
	        break;
	    default:
	        return "Please enter type: totalRating, averageRating, ratingBar, (singleRating, rating='5')";
	}

}