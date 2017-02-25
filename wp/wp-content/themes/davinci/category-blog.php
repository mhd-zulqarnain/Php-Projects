<?php get_header() ?>

	<!-- BLOG CAT -->
	<div class="page-content page-blog">
		<div class="page-blog__head"><?php bloginfo('name'); echo  '&nbsp;'; _e('Blog', 'ami3'); ?></div>
		<div class="container">
			<div class="container_cat-blog">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					?>
					<div class="item">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="blog_img">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'big-blog' ); ?>
								</a>
							</div>
						<?php } ?>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
						<div class="info">
							<span><?php _e('by', 'ami3'); ?> <?php the_author(); ?></span>
							<span class="cir">&#9899;</span><span><?php the_time('d, M Y H:i') ?></span>
							<span class="cir">&#9899;</span>
							<span class="fb-comments-count" data-href="<?php the_permalink(); ?>">0</span>
							<span> <?php _e('comments', 'ami3');?></span>
						</div>
					</div>

				<?php  endwhile; endif; ?>
				<?php dav_blog_pagination(); ?>
			</div>
		</div>
	</div>

<?php get_footer() ?>