<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<div class="post" id="post-<?php the_ID(); ?>">

			<?php //include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="entry">
				<div id="president-home" class="same-height-home">
				<h3>About President</h3>
					<?php $president = get_post( 89 ); 
						//var_export($president);
						echo get_the_post_thumbnail( $president->ID,array(67,100));
					?>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean posuere tincidunt odio, ac cursus est commodo ut. Aliquam vitae enim ac tellus porttitor varius. Etiam adipiscing magna lacinia augue rutrum blandit. Vestibulum accumsan, lorem a pulvinar tristique, lectus arcu sagittis arcu, eget tincidunt nulla lacus sit amet lacus. Donec vel ipsum quam, pulvinar pulvinar lacus. Integer dapibus lobortis urna, at pharetra justo pellentesque non. Sed at pharetra eros. Ut a metus enim. Aenean quis ultrices quam.</p><a href="<?php echo get_permalink($president ->ID); ?>">Read more...</a>
				</div>
				<div id="anjuman-home" class="same-height-home">
					<h3>Anjuman</h3>
					<?php $anjuman = get_post( 15 ); 
						//var_export($anjuman); ?>
						<p>The elders of Sadat-e-Amroha, who had a rich history of culture, education and literature, migrated to Pakistan in the early days of its creation, did a great blessing to their next generation by establishing an institution, which made a tremendous impact on their lives. This is the institution which is now well known to everybody throughout the region and is known as Anjuman Sadat-e- Amroha. The aims and objectives are to work for the betterment and welfare for the citizens of Pakistan who have migrated from Amroha India after Partition. Initially a land was obtained in Federal B. Area Block 13 for the establishment of a centre for the activities of the Anjuman. At this place, a huge beautiful centre was established named as "Markaz Sadat-e-Amroha".</p>
						<a href="<?php echo get_permalink($anjuman ->ID); ?>">Read more...</a>
				</div>
				
				<?php the_content(); ?>

				<?php //wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

		</div>
		
		<?php endwhile; endif; ?>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				var highestCol = Math.max($('#president-home').height(),$('#anjuman-home').height());
				$('.same-height-home').height(highestCol);
			});
		</script>
<?php get_sidebar(); ?>

<?php get_footer(); ?>