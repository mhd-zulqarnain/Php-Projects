<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 17.08.2015
 * Time: 9:55
 */
?>

<!-- CONTENT -->
<div class="container">
	<div class="row">
		<?php
		printf( '<div class="col-lg-%1$s b-content">',
			is_widget_social() ? '42' : '60' );
		?>
		<div class="row">

			<div class="col-lg-60">
				<?php
					$content = cz( 'tp_home_article' );
					echo apply_filters('the_content', $content);
				?>
			</div>

		</div>
	</div>
	<?php if ( is_widget_social() ): ?>
		<div class="col-lg-17 col-lg-offset-1">
			<?php get_template_part( 'b', 'social' ); ?>
		</div>
	<?php endif; ?>
</div>
</div>
