<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<div <?php echo is_page(104) ? "":'class="post"';?> id="post-<?php the_ID(); ?>">

			<h3><?php the_title(); ?></h3>

			<?php //include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="entry">

				<?php the_content(); ?>
				
				<?php if(is_page('114')){
					include 'php/signupform.php';
				}
				?>
				<?php //wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

		</div>
		
		<?php endwhile; endif; ?>
		
<?php if(!is_page(104)){
// Only get sidebar, when Page is not "List of Councils"
// because we need more space to display the table correctly
	get_sidebar(); 
	}
?>

<?php get_footer(); ?>