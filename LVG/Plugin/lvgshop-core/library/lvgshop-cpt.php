<?php
// Register Taxonomy Category
function lvgshop_team_cat_tax() {

	$labels = array(
		'name'              => _x( 'Departments', 'taxonomy general name', 'lvgshop-core' ),
		'singular_name'     => _x( 'Department', 'taxonomy singular name', 'lvgshop-core' ),
		'search_items'      => __( 'Search Departments', 'lvgshop-core' ),
		'all_items'         => __( 'All Departments', 'lvgshop-core' ),
		'parent_item'       => __( 'Parent Department', 'lvgshop-core' ),
		'parent_item_colon' => __( 'Parent Department:', 'lvgshop-core' ),
		'edit_item'         => __( 'Edit Department', 'lvgshop-core' ),
		'update_item'       => __( 'Update Department', 'lvgshop-core' ),
		'add_new_item'      => __( 'Add New Department', 'lvgshop-core' ),
		'new_item_name'     => __( 'New Department Name', 'lvgshop-core' ),
		'menu_name'         => __( 'Department', 'lvgshop-core' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( '', 'lvgshop-core' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
		'show_in_rest' => true,
	);
	register_taxonomy( 'department', array('team'), $args );

}
add_action( 'init', 'lvgshop_team_cat_tax' );
// Register Custom Post Type Team
function lvgshop_team_cpt() {

	$labels = array(
		'name' => _x( 'Teams', 'Post Type General Name', 'lvgshop-core' ),
		'singular_name' => _x( 'Team', 'Post Type Singular Name', 'lvgshop-core' ),
		'menu_name' => _x( 'Teams', 'Admin Menu text', 'lvgshop-core' ),
		'name_admin_bar' => _x( 'Team', 'Add New on Toolbar', 'lvgshop-core' ),
		'archives' => __( 'Team Archives', 'lvgshop-core' ),
		'attributes' => __( 'Team Attributes', 'lvgshop-core' ),
		'parent_item_colon' => __( 'Parent Team:', 'lvgshop-core' ),
		'all_items' => __( 'All Teams', 'lvgshop-core' ),
		'add_new_item' => __( 'Add New Team', 'lvgshop-core' ),
		'add_new' => __( 'Add New', 'lvgshop-core' ),
		'new_item' => __( 'New Team', 'lvgshop-core' ),
		'edit_item' => __( 'Edit Team', 'lvgshop-core' ),
		'update_item' => __( 'Update Team', 'lvgshop-core' ),
		'view_item' => __( 'View Team', 'lvgshop-core' ),
		'view_items' => __( 'View Teams', 'lvgshop-core' ),
		'search_items' => __( 'Search Team', 'lvgshop-core' ),
		'not_found' => __( 'Not found', 'lvgshop-core' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'lvgshop-core' ),
		'featured_image' => __( 'Featured Image', 'lvgshop-core' ),
		'set_featured_image' => __( 'Set featured image', 'lvgshop-core' ),
		'remove_featured_image' => __( 'Remove featured image', 'lvgshop-core' ),
		'use_featured_image' => __( 'Use as featured image', 'lvgshop-core' ),
		'insert_into_item' => __( 'Insert into Team', 'lvgshop-core' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Team', 'lvgshop-core' ),
		'items_list' => __( 'Teams list', 'lvgshop-core' ),
		'items_list_navigation' => __( 'Teams list navigation', 'lvgshop-core' ),
		'filter_items_list' => __( 'Filter Teams list', 'lvgshop-core' ),
	);
	$args = array(
		'label' => __( 'Team', 'lvgshop-core' ),
		'description' => __( '', 'lvgshop-core' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-businessman',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'page-attributes', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'team', $args );

}
add_action( 'init', 'lvgshop_team_cpt', 0 );




// Get block id by ID or slug.
function lvgshop_get_block_id( $post_id ) {
  global $wpdb;

  if ( empty ( $post_id ) ) {
    return null;
  }

  // Get post ID if using post_name as id attribute.
  if ( ! is_numeric( $post_id ) ) {
    $post_id = $wpdb->get_var(
      $wpdb->prepare(
        "SELECT ID FROM $wpdb->posts WHERE post_type = 'lvgshop_block' AND post_name = %s",
        $post_id
      )
    );
  }

  // Polylang support.
  if ( function_exists( 'pll_get_post' ) ) {
    if ( $lang_id = pll_get_post( $post_id ) ) {
      $post_id = $lang_id;
    }
  }

  // WPML Support.
  if ( function_exists( 'icl_object_id' ) ) {
    if ( $lang_id = icl_object_id( $post_id, 'lvgshop_block', false, ICL_LANGUAGE_CODE ) ) {
      $post_id = $lang_id;
    }
  }

  return $post_id;
}
// Register Custom Post Type lvgshop_block
function lvgshop_create_block_cpt() {

	$labels = array(
		'name' => _x( 'Lvgshop Blocks', 'Post Type General Name', 'lvgshop-core' ),
		'singular_name' => _x( 'Lvgshop Block', 'Post Type Singular Name', 'lvgshop-core' ),
		'menu_name' => _x( 'Lvgshop Block', 'Admin Menu text', 'lvgshop-core' ),
		'name_admin_bar' => _x( 'Lvgshop Block', 'Add New on Toolbar', 'lvgshop-core' ),
		'archives' => __( 'Block Archives', 'lvgshop-core' ),
		'attributes' => __( 'Block Attributes', 'lvgshop-core' ),
		'parent_item_colon' => __( 'Parent lvgshop_block:', 'lvgshop-core' ),
		'all_items' => __( 'Lvgshop Blocks', 'lvgshop-core' ),
		'add_new_item' => __( 'Add New Block', 'lvgshop-core' ),
		'add_new' => __( 'Add New Block', 'lvgshop-core' ),
		'new_item' => __( 'New Block', 'lvgshop-core' ),
		'edit_item' => __( 'Edit Block', 'lvgshop-core' ),
		'update_item' => __( 'Update Block', 'lvgshop-core' ),
		'view_item' => __( 'View Block', 'lvgshop-core' ),
		'view_items' => __( 'View Block', 'lvgshop-core' ),
		'search_items' => __( 'Search Block', 'lvgshop-core' ),
		'not_found' => __( 'Not found', 'lvgshop-core' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'lvgshop-core' ),
		'featured_image' => __( 'Featured Image', 'lvgshop-core' ),
		'set_featured_image' => __( 'Set featured image', 'lvgshop-core' ),
		'remove_featured_image' => __( 'Remove featured image', 'lvgshop-core' ),
		'use_featured_image' => __( 'Use as featured image', 'lvgshop-core' ),
		'insert_into_item' => __( 'Insert into Block', 'lvgshop-core' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Block', 'lvgshop-core' ),
		'items_list' => __( 'Block list', 'lvgshop-core' ),
		'items_list_navigation' => __( 'Block list navigation', 'lvgshop-core' ),
		'filter_items_list' => __( 'Filter Block list', 'lvgshop-core' ),
	);
	$args = array(
		'label' => __( 'Block', 'lvgshop-core' ),
		'description' => __( '', 'lvgshop-core' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-editor-ul',
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => 'lvgshop-admin-menu',
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => false,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => true,
		'show_in_rest' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'lvgshop_block', $args );

}
add_action( 'init', 'lvgshop_create_block_cpt', 0 );
function my_edit_lvgshop_block_columns() {
	$columns = array(
		'cb'        => '<input type="checkbox" />',
		'title'     => __( 'Title', 'lvgshop-core' ),
		'shortcode' => __( 'Shortcode', 'lvgshop-core' ),
		'date'      => __( 'Date', 'lvgshop-core' ),
	);

	return $columns;
}

add_filter( 'manage_edit-lvgshop_block_columns', 'my_edit_lvgshop_block_columns' );

function my_manage_lvgshop_block_columns( $column, $post_id ) {
	$post_data = get_post( $post_id, ARRAY_A );
	$slug      = $post_data['post_name'];
	add_thickbox();
	switch ( $column ) {
		case 'shortcode':
			echo '<textarea style="min-width: 60%;
    max-height: 27px;
    background: #FBEEE6;
    border-color: #FBEEE6;
    color: #28170E;
    font-size: 14px;
    margin-top: 5px;
">[lvgshop_block id="' . $slug . '"]</textarea>';
			break;
	}
}

add_action( 'manage_lvgshop_block_posts_custom_column', 'my_manage_lvgshop_block_columns', 10, 2 );


/**
 * Disable gutenberg support for now.
 *
 * @param bool   $use_lvgshop_block_editor Whether the post type can be edited or not. Default true.
 * @param string $post_type        The post type being checked.
 *
 * @return bool
 */
function lvgshop_block_disable_gutenberg( $use_lvgshop_block_editor, $post_type ) {
	return $post_type === 'lvgshop_block' ? false : $use_lvgshop_block_editor;
}

add_filter( 'use_lvgshop_block_editor_for_post_type', 'lvgshop_block_disable_gutenberg', 10, 2 );
add_filter( 'gutenberg_can_edit_post_type', 'lvgshop_block_disable_gutenberg', 10, 2 );


/**
 * Update lvgshop_block preview URL
 */
function setec_lvgshop_block_scripts() {
	global $typenow;
	if ( 'lvgshop_block' == $typenow && isset( $_GET["post"] ) ) {
		?>
		<script>
          jQuery(document).ready(function ($) {
            var lvgshop_block_id = $('input#post_name').val()
            $('#submitdiv').
              after('<div class="postbox"><h2 class="hndle">Shortcode</h2><div class="inside"><p><textarea style="width:100%; max-height:30px;">[lvgshop_block id="' + lvgshop_block_id +
                '"]</textarea></p></div></div>')
          })
		</script>
		<?php
	}
}

add_action( 'admin_head', 'setec_lvgshop_block_scripts' );

function setec_lvgshop_block_frontend() {
	if ( isset( $_GET["lvgshop_block"] ) ) {
		?>
		<script>
          jQuery(document).ready(function ($) {
            $.scrollTo('#<?php echo esc_attr( $_GET["lvgshop_block"] );?>', 300, {offset: -200})
          })
		</script>
		<?php
	}
}

add_action( 'wp_footer', 'setec_lvgshop_block_frontend' );

function lvgshop_block_shortcode( $atts, $content = null ) {
	global $post;

	extract( shortcode_atts( array(
			'id' => '',
		),
			$atts
		)
	);

	// Abort if ID is empty.
	if ( empty ( $id ) ) {
		return '<p><mark>No lvgshop_block ID is set</mark></p>';
	}



	if ( is_home() ) $post = get_post( get_option('page_for_posts') );

	$post_id  = lvgshop_get_block_id( $id );
	$the_post = $post_id ? get_post( $post_id, OBJECT, 'display' ) : null;

	if ( $the_post ) {
	      if (  did_action( 'elementor/loaded' ) ) {
	        $html = \Elementor\Plugin::$instance->frontend->get_builder_content( intval($post_id) );
	    } else {
		$html = $the_post->post_content;
	    }

		if ( empty( $html ) ) {
			$html = '<p class="lead shortcode-error">Open this in Elementor to add and edit content</p>';
		}

		// Add edit link for admins.
		if ( isset( $post ) && current_user_can( 'edit_pages' )
		     && ! is_customize_preview()
		     && function_exists( 'setec_builder_is_active' )
		     && ! setec_builder_is_active() ) {
			$edit_link         = setec_builder_edit_url( $post->ID, $post_id );
			$edit_link_backend = admin_url( 'post.php?post=' . $post_id . '&action=edit' );
			$html              = '<div class="lvgshop_block-edit-link" data-title="Edit Block: ' . get_the_title( $post_id ) . '"   data-backend="' . esc_url( $edit_link_backend )
			                     . '" data-link="' . esc_url( $edit_link ) . '"></div>' . $html . '';
		}
	} else {
		$html = '<p class="text-center"><mark>Block <b>"' . esc_html( $id ) . '"</b> not found</mark></p>';
	}

	return do_shortcode( $html );
}

add_shortcode( 'lvgshop_block', 'lvgshop_block_shortcode' );


if ( ! function_exists( 'lvgshop_block_categories' ) ) {
	/**
	 * Add lvgshop_block categories support
	 */
	function lvgshop_block_categories() {
		$args = array(
			'hierarchical'      => true,
			'public'            => false,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
		);
		register_taxonomy( 'lvgshop_block_categories', array( 'lvgshop_block' ), $args );

	}

	// Hook into the 'init' action
	add_action( 'init', 'lvgshop_block_categories', 0 );
}
// Register Custom Post Type Pricing Table
function lvgshop_pricingtable_cpt() {

	$labels = array(
		'name' => _x( 'Pricing Tables', 'Post Type General Name', 'lvgshop-core' ),
		'singular_name' => _x( 'Pricing Table', 'Post Type Singular Name', 'lvgshop-core' ),
		'menu_name' => _x( 'Pricing Tables', 'Admin Menu text', 'lvgshop-core' ),
		'name_admin_bar' => _x( 'Pricing Table', 'Add New on Toolbar', 'lvgshop-core' ),
		'archives' => __( 'Pricing Table Archives', 'lvgshop-core' ),
		'attributes' => __( 'Pricing Table Attributes', 'lvgshop-core' ),
		'parent_item_colon' => __( 'Parent Pricing Table:', 'lvgshop-core' ),
		'all_items' => __( 'All Pricing Tables', 'lvgshop-core' ),
		'add_new_item' => __( 'Add New Pricing Table', 'lvgshop-core' ),
		'add_new' => __( 'Add New', 'lvgshop-core' ),
		'new_item' => __( 'New Pricing Table', 'lvgshop-core' ),
		'edit_item' => __( 'Edit Pricing Table', 'lvgshop-core' ),
		'update_item' => __( 'Update Pricing Table', 'lvgshop-core' ),
		'view_item' => __( 'View Pricing Table', 'lvgshop-core' ),
		'view_items' => __( 'View Pricing Tables', 'lvgshop-core' ),
		'search_items' => __( 'Search Pricing Table', 'lvgshop-core' ),
		'not_found' => __( 'Not found', 'lvgshop-core' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'lvgshop-core' ),
		'featured_image' => __( 'Featured Image', 'lvgshop-core' ),
		'set_featured_image' => __( 'Set featured image', 'lvgshop-core' ),
		'remove_featured_image' => __( 'Remove featured image', 'lvgshop-core' ),
		'use_featured_image' => __( 'Use as featured image', 'lvgshop-core' ),
		'insert_into_item' => __( 'Insert into Pricing Table', 'lvgshop-core' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Pricing Table', 'lvgshop-core' ),
		'items_list' => __( 'Pricing Tables list', 'lvgshop-core' ),
		'items_list_navigation' => __( 'Pricing Tables list navigation', 'lvgshop-core' ),
		'filter_items_list' => __( 'Filter Pricing Tables list', 'lvgshop-core' ),
	);
	$args = array(
		'label' => __( 'Pricing Table', 'lvgshop-core' ),
		'description' => __( '', 'lvgshop-core' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-list-view',
		'supports' => array('title', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'pricingtable', $args );

}
add_action( 'init', 'lvgshop_pricingtable_cpt', 0 );


// Register Custom Post Type Project
function lvgshop_project_cpt() {

	$labels = array(
		'name' => _x( 'Projects', 'Post Type General Name', 'lvgshop-core' ),
		'singular_name' => _x( 'Project', 'Post Type Singular Name', 'lvgshop-core' ),
		'menu_name' => _x( 'Projects', 'Admin Menu text', 'lvgshop-core' ),
		'name_admin_bar' => _x( 'Project', 'Add New on Toolbar', 'lvgshop-core' ),
		'archives' => __( 'Project Archives', 'lvgshop-core' ),
		'attributes' => __( 'Project Attributes', 'lvgshop-core' ),
		'parent_item_colon' => __( 'Parent Project:', 'lvgshop-core' ),
		'all_items' => __( 'All Projects', 'lvgshop-core' ),
		'add_new_item' => __( 'Add New Project', 'lvgshop-core' ),
		'add_new' => __( 'Add New', 'lvgshop-core' ),
		'new_item' => __( 'New Project', 'lvgshop-core' ),
		'edit_item' => __( 'Edit Project', 'lvgshop-core' ),
		'update_item' => __( 'Update Project', 'lvgshop-core' ),
		'view_item' => __( 'View Project', 'lvgshop-core' ),
		'view_items' => __( 'View Projects', 'lvgshop-core' ),
		'search_items' => __( 'Search Project', 'lvgshop-core' ),
		'not_found' => __( 'Not found', 'lvgshop-core' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'lvgshop-core' ),
		'featured_image' => __( 'Featured Image', 'lvgshop-core' ),
		'set_featured_image' => __( 'Set featured image', 'lvgshop-core' ),
		'remove_featured_image' => __( 'Remove featured image', 'lvgshop-core' ),
		'use_featured_image' => __( 'Use as featured image', 'lvgshop-core' ),
		'insert_into_item' => __( 'Insert into Project', 'lvgshop-core' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Project', 'lvgshop-core' ),
		'items_list' => __( 'Projects list', 'lvgshop-core' ),
		'items_list_navigation' => __( 'Projects list navigation', 'lvgshop-core' ),
		'filter_items_list' => __( 'Filter Projects list', 'lvgshop-core' ),
	);
	$args = array(
		'label' => __( 'Project', 'lvgshop-core' ),
		'description' => __( '', 'lvgshop-core' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-excerpt-view',
		'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'project', $args );

}
add_action( 'init', 'lvgshop_project_cpt', 0 );

