<?php
/**
 *  Add Dynamic css to header
 * @version    1.0
 * @author        Indigo Agency by M7
 * @URI        http://ia.marcellus7.com
 */




  /**
	 * Add extension CSS.
	 */
       function lvgshop_dynamic_css() {
           
           ob_start();
           $lvgshop_options = get_option( 'lvgshop_options' );
           $primarycolor = !empty($lvgshop_options['color-set']['primary_color'])? $lvgshop_options['color-set']['primary_color']: '#085330';
            $primarytxcolor = !empty($lvgshop_options['color-set']['primary-text-color'])? $lvgshop_options['color-set']['primary-text-color']: '';
            $secndcolor = !empty($lvgshop_options['color-set']['secondary-color'])? $lvgshop_options['color-set']['secondary-color']: '#1F7F38';
            $secndtxtcolor = !empty($lvgshop_options['color-set']['secondary-text-color'])? $lvgshop_options['color-set']['secondary-text-color']: '';
            
            $backtopborder = (! empty( $lvgshop_options['backto_top_bt_border'] ) ) ? $lvgshop_options['backto_top_bt_border'] : '';
            
            
             $globalwdth1400 = !empty($lvgshop_options['gloabal_width_1400'])? $lvgshop_options['gloabal_width_1400']: '';
             $globalwdth1200 = !empty($lvgshop_options['gloabal_width_1200'])? $lvgshop_options['gloabal_width_1200']: '';
             
              $altfontfamily = !empty($lvgshop_options['alt_typo']['font-family'] )? $lvgshop_options['alt_typo']['font-family'] : 'Jost';
              $bodyfontfamily = !empty($lvgshop_options['paragraph_typo']['font-family'] )? $lvgshop_options['paragraph_typo']['font-family'] : 'Jost';
              $maintxtcolor =  !empty($lvgshop_options['color-set']['main_text_colot'] )? $lvgshop_options['color-set']['main_text_colot'] : '#717171';
              
              $elementorwdthebl= !empty($lvgshop_options['elementor-width-overwrite'])? $lvgshop_options['elementor-width-overwrite'] : '';
              $elementorwdthmain= !empty($lvgshop_options['overwrite-elem-width'] )? $lvgshop_options['overwrite-elem-width'] : '';
             $srcbtnclr= !empty($lvgshop_options['elementor_content']['search_icon_clr'] )? $lvgshop_options['elementor_content']['search_icon_clr'] : '';
             
             
             $altcolortxt = !empty($lvgshop_options['alter_text_color'] )? $lvgshop_options['alter_text_color'] : '';
              $lightcolor = !empty($lvgshop_options['light_color'])? $lvgshop_options['light_color'] : '#f6f6f6';
              
              $headingcolor = !empty($lvgshop_options['gl_header_color'] )? $lvgshop_options['gl_header_color'] : '#085330';
              $lightred = !empty($lvgshop_options['gl_light_red_color'] )? $lvgshop_options['gl_light_red_color'] : '#fe4852';
              $redorange = !empty($lvgshop_options['gl_red_orange_color'] )? $lvgshop_options['gl_red_orange_color'] : '#fc5d2c';
              $yellow = !empty($lvgshop_options['gl_yellow_color'] )? $lvgshop_options['gl_yellow_color'] : '#ffd612';
              $blue = !empty($lvgshop_options['gl_blue_color'] )? $lvgshop_options['gl_blue_color'] : '#1F7F38';
              $green = !empty($lvgshop_options['gl_green_color'] )? $lvgshop_options['gl_green_color'] : '#1FC157';
              $dark = !empty($lvgshop_options['gl_dark_color'] )? $lvgshop_options['gl_dark_color'] : '#085330';
              $glborder = !empty($lvgshop_options['gl_border_color'] )? $lvgshop_options['gl_border_color'] : '#3d3d3d';
              $glbordergray = !empty($lvgshop_options['gl_border_gray_color'] )? $lvgshop_options['gl_border_gray_color'] : '#e8eaf2';
              $glborderdark = !empty($lvgshop_options['gl_border_dark_color'] )? $lvgshop_options['gl_border_dark_color'] : '#242424';
		?>
		
	
	:root {
    --body-font: <?php echo $bodyfontfamily;?>;
    --heading-font: <?php echo $altfontfamily;?>;
    --primary-color: <?php echo $primarycolor;?>;
    --secondary-color: <?php echo $secndcolor;?>;
    --text-color: <?php echo $maintxtcolor;?>;
    --heading-color: <?php echo $headingcolor;?>;
    --light-red-color: <?php echo $lightred;?>;
    --red-orange-color: <?php echo $redorange;?>;
    --yellow-color: <?php echo $yellow;?>;
    --blue-color: <?php echo $blue;?>;
    --dark-color: <?php echo $dark;?>;
    --green-color: <?php echo $green;?>;
    --border-color: <?php echo $glborder;?>;
    --border-gray: <?php echo $glbordergray;?>;
    --border-dark: <?php echo $glborderdark;?>;
    --light-stroke: #e8e8e8;
    --light-white-color: rgba(255, 255, 255, 0.2);
    --white-color: #ffffff;
    --light-color: <?php echo $lightcolor;?>;
    --gray-color: #f3f4f8;
    --gray-200: #efefef;
    --gray-100: #f1f1f1;
    --primary-overlay: rgba(18, 17, 17, 0.9);
    --primary-light-overlay: rgba(18, 17, 17, 0.6);
    --shadow-light: 0px 30px 23px rgba(0, 0, 0, 0.07);
    --box-shadow: 0px 12px 16px rgba(0, 0, 0, 0.04);
    --transition-base: all 0.3s;
    --ur3-stroke: #292828;
}
	 
@media (min-width: 1200px){
    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
        max-width: <?php echo esc_html($globalwdth1200);?>px;
    }
}

  @media (min-width: 1400px){
    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
        max-width: <?php echo esc_html($globalwdth1400);?>px;
    }
}

<?php if($elementorwdthebl){ ?>
.elementor-section.elementor-section-boxed > .elementor-container{
 max-width: <?php echo esc_html($elementorwdthmain);?>px !important;
 }
<?php } ?>

.progress-wrap{
    box-shadow: inset 0 0 0 2px <?php echo esc_html($backtopborder);?>;
}

	    <?php
		$output = ob_get_clean();

		if ( ! $output ) {
			return;
		}

		$css  = '<style id="lvgshop-swatches-css" type="text/css">';
		$css .= $output;
		$css .= '</style>';

		echo lvgshop_compress_css_lines( $css ); 
	}

add_action('wp_head', 'lvgshop_dynamic_css');