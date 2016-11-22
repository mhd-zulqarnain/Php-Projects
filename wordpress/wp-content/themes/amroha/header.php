<?php
if(isset($_POST['form_name']) && $_POST['form_name']=="signup-form"){
	include 'php/signupform_process.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.9.0.min.js"></script>
	
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-ui-1.9.2.custom.min.js"></script>
	
	<script src="<?php bloginfo('template_url'); ?>/js/jscroller2-1.61-src.js"></script>

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
	<div id="page-wrap">
		<div id="header">
                <div id="user-options-div">
					<span class="user-options">
						<a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('template_url'); ?>/images/home.png"  /></a>
					</span>
					<span class="user-options" style="margin-left:10px;">
						<a href="<?php echo get_option('home'); ?>/login">Login</a>
					</span>
                </div>
                <div id="header-text">
                    <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
                </div>
                <div id="top-nav-bar">
					<?php
					  wp_nav_menu( array(
						'theme_location' => 'main-menu', // Setting up the location for the main-menu, Main Navigation.
						'menu_class' => 'dropdown', //Adding the class for dropdowns
						'container_id' => 'navwrap', //Add CSS ID to the containter that wraps the menu.
						'fallback_cb' => 'wp_page_menu', //if wp_nav_menu is unavailable, WordPress displays wp_page_menu function, which displays the pages of your blog.
						)
						  );
					?>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="slider-wrapper theme-default" style="float:left;border-bottom: 1px solid #000000;">
				<?php if (function_exists("easing_slider")){ easing_slider(); }; ?>
            </div>
			<div class="latest-news" style="float:left;">
				<h2>Latest News</h2>
				<?php $args = array(  'numberposts'     => 5,
						'offset'          => 0,
						'category'        => 4);
				$posts_array = get_posts( $args ); ?>
				
				<div id="scroller_container">
					<div id="content1" class="jscroller2_up jscroller2_speed-50 jscroller2_mousemove jscroller2_ignoreleave">
						<ul>
							<?php foreach( $posts_array as $post ) : ?>
								<li><?php echo $post->post_content; ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div id="content2" class="jscroller2_up_endless">
						<ul>
							<?php foreach( $posts_array as $post ) : ?>
								<li><?php echo $post->post_content; ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<script>
					ByRei_jScroller2.init.main();
				</script>
			</div>
            <div id="content">
