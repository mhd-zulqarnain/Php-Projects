		            </div>
            <div id="footer">
                    <div id="bottom-nav-bar">
					<?php
					  wp_nav_menu( array(
						'theme_location' => 'footer-menu', // Setting up the location for the main-menu, Main Navigation.
						'menu_class' => '', //Adding the class for dropdowns
						'container_id' => 'navwrap', //Add CSS ID to the containter that wraps the menu.
						'fallback_cb' => 'wp_page_menu', //if wp_nav_menu is unavailable, WordPress displays wp_page_menu function, which displays the pages of your blog.
						)
						  );
					?>
                    </div>
                    <div id="copyright">
                            Copyright &copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?>. All rights reserved.
                    </div>
            </div>
            <div style="clear:both;"></div>
        </div>
		
	<?php wp_footer(); ?>

	<!-- Don't forget analytics -->
	
</body>

</html>
