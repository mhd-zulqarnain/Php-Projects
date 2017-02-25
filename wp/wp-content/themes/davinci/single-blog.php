<?php get_header() ?>
<?php /*
	<!-- BREADCRUMBS -->
	<div class="breadcrumbs">
		<div class="container">
			<?php dav_breadcrumbs() ?>
		</div>
	</div>
 */ ?>

<?php $id_post_show = array(); ?>

	<!-- SINGLE -->
	<div class="page-content page-blog">
		<div class="page-blog__head"><?php bloginfo('name'); echo  '&nbsp;' ; _e('Blog', 'ami3'); ?></div>
		<div class="container">
			<div class="row single-blog">
				<div class="col-md-43 left_blog">
					<?php
					if ( have_posts() ) : while ( have_posts() ) : the_post();
						$id_post_show[] = $post->ID;
						?>

						<h1><?php the_title() ?></h1>
						<div class="info">
							<span>
								<?php printf( '%1$s %2$s', __('by'),  get_the_author() ); ?></span>
							<span class="cir">&#9899;</span><span><?php echo get_the_date() ?></span>
							<span class="cir">&#9899;</span><span class="fb-comments-count" data-href="<?php echo get_the_permalink(); ?>">0</span>
							<span> <?php _e('comments', 'ami3');?></span>
							<?php get_template_part( 'products/share', 'button' ); ?>
						</div>

						<?php if ( has_post_thumbnail() ) { ?>
							<div class="blog_img">
								<?php the_post_thumbnail( 'big-blog' ); ?>
							</div>
						<?php } ?>
						<div class="page-blog_content">
							<?php the_content(); ?>
							<?php
							$blog_item = get_post_meta( $post->ID, 'blog_options', true );
							if(is_array($blog_item) && count($blog_item)){
								foreach($blog_item as $k=>$v){
									$img = wp_get_attachment_image( $v['img'], array( 185, 185 ) );
									printf('<div class="product_blog clearfix">%1$s<h3>%2$s</h3>%3$s</div>',
										$img,
										$v['title'],
										$v['desc']
										);
								}
							}
							?>
						</div>
						<div class="page-blog__nav">
							<?php

							$previous_link = get_previous_post_link( '%link', '< ' . __('Previous post', 'ami3'), true, '', 'category' );

							if ( !$previous_link ) {
								$last          = current(get_boundary_post( true, '', false ));
								$previous_link = sprintf( '<a href="%1$s" rel="prev">&lt; %2$s</a>',
									get_permalink( $last->ID ),
									__('Previous post', 'ami3')
								);
							}

							$next_link = get_next_post_link( '%link', __('Next post', 'ami3') . ' &gt;', true, '', 'category' );
							if ( !$next_link ) {
								$first_post = current(get_boundary_post( true, '' ));
								$next_link  = sprintf( '<a href="%1$s" rel="next">%2$s &gt;</a>',
									get_permalink( $first_post->ID ),
									__('Next post', 'ami3')
								);
							}
							?>
							<div class="previous_post_link"><?php echo $previous_link; ?></div>
							<div class="next_post_link"><?php echo $next_link; ?></div>
						</div>
					<?php endwhile; endif; ?>

					<?php if(cz('tm_show_blog_comment')): ?>
					<div class="fb-comments" data-href="<?php echo get_permalink(); ?>" data-numposts="5" data-width="100%"></div>
					<?php endif; ?>
				</div>
				<div class="col-md-15 col-sm-60 col-md-offset-2 right_blog">
					<div class="page-blog__head"><?php _e('Latest posts', 'ami3'); ?></div>
					<div class="">
						<?php
						$args = array(
							'post_type'      => 'post',
							'posts_per_page' => '3',
							'category_name'  => 'blog',
							'post__not_in'   => $id_post_show
						);

						$query = new WP_Query( $args );
						while ( $query->have_posts() ):$query->the_post(); ?>
							<div class="col-xs-50 col-xs-offset-5 col-sm-18 col-sm-offset-2 col-md-60 col-md-offset-0 blog_item">
								<?php if ( has_post_thumbnail() ) { ?>
									<div class="blog_img">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail( 'min-blog' ); ?>
										</a>
									</div>
								<?php } ?>
								<a class="blog_item__link" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
								<div class="info">
									<span><?php printf( '%1$s %2$s', __('by'),  get_the_author() ); ?></span>
									<span class="cir">&#9899;</span><span><?php echo get_the_date() ?></span>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
					<div class="col-xs-50 col-xs-offset-5 col-sm-60 col-sm-offset-0 col-md-60 col-md-offset-0">
						<?php get_template_part( 'b', 'social' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fb-root"></div>

	<script>(function ( d, s, id ) {
			var js, fjs = d.getElementsByTagName( s )[ 0 ];
			if ( d.getElementById( id ) ) return;
			js     = d.createElement( s );
			js.id  = id;
			js.src = "//connect.facebook.net/en_EN/sdk.js#xfbml=1&version=v2.5&appId=437427013129795";
			fjs.parentNode.insertBefore( js, fjs );
		}( document, 'script', 'facebook-jssdk' ));</script>

	<?php get_footer() ?>