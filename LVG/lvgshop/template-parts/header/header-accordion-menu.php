      <?php
			wp_nav_menu( array(
				'theme_location' => 'main',
				'menu_id'        => 'primary-menu-mobile',
                'container_id' => 'lvgshopmenu',
                'walker' => new Lvgshop_Accordion_Walker(),
			) );
			?>