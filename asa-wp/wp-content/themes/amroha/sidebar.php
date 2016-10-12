<div id="sidebar">
	<h2>Related Links</h2>
    <?php if(is_front_page()){?>
		<ul>
			<li><a href="<?php echo network_site_url();?>/download.php?file=Education_Award_Registration_Form.jpg">Education award registration form</a></li>
			<li><a href="<?php echo network_site_url();?>/download.php?file=Education_Award_Advertise.jpg">Rules and schedule of educational award</a></li>
        	<li><a href="<?php echo get_permalink(27); ?>">List of presidents</a></li>
			<li><a href="<?php echo get_permalink(100); ?>">List of mohallas</a></li>
			<li><a href="<?php echo get_permalink(104); ?>">List of council members</a></li>
        	<!--li>list of mohallas (translate the provided jpg into table form and link here)</li>
        	<li>list of executive members (to be provided latter on)</li>
        	<li>list of council members ((to be provided latter on)</li-->
		</ul>
	<?php } ?>
	<?php /* if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->

    	<?php get_search_form(); ?>
    
    	<?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>
    
    	<h2>Archives</h2>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>
        
        <h2>Categories</h2>
        <ul>
    	   <?php wp_list_categories('show_count=1&title_li='); ?>
        </ul>
        
    	<?php wp_list_bookmarks(); ?>
    
    	<h2>Meta</h2>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
    		<?php wp_meta(); ?>
    	</ul>
    	
    	<h2>Subscribe</h2>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
    	</ul>
	
	<?php endif; */ ?>

</div>