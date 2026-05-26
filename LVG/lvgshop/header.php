<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LVG Shop by M7
 */
$stickybarenable =  cs_get_option('sticky_bar_enable');
$ldrebl = cs_get_option('enable_dbl_loader');
$favicon = cs_get_option( 'lvgshop-favicon','url');
$ldrtext = cs_get_option('ldr_main_txt');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <?php
	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {			
		if (!empty($favicon)){
		?>
			<link rel="shortcut icon" href="<?php echo esc_url($favicon); ?>" type="image/x-icon" />
			<?php
		}
		?>
		
		<?php

	}
	?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
 <?php if($ldrebl=="enabled"){?> 
 <!--preloader start-->
    <div class="preloader">
        <h1 class="display-1"><?php echo esc_html($ldrtext);?></h1>
        <div class="preload-progress">
            <span></span>
        </div>
    </div>
    <!--preloader end--> 
<?php } ?>
<?php wp_body_open(); ?>
<?php 
    if ($stickybarenable =='enabled'){
    get_template_part( 'template-parts/header/header', 'sticky-notification' );
    }
    
    ?>



<?php lvgshop_header_builder(); ?>

 <?php if ( class_exists( 'WooCommerce' ) ) { ?>
     <div class="lvgshop-notifications" aria-live="polite" aria-atomic="true">
         <div class="lvgshop-notifications-area">
         </div>
     </div>
 <?php } ?>
