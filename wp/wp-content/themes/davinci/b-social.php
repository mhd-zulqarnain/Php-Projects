<!--BLOCK SOCIAL-->
<div class="b-social" <?php if(!cz('s_link_fb') && !cz('s_in_name_api')){ echo 'style="display: none"';} ?>>
	<h3 class="b-social__head"><?php echo cz('s_title_social_box'); ?></h3>

	<div class="row">
		<div class="col-md-60  col-sm-30 b-social__item">
			<div class="fb-page" data-href="<?php echo cz('s_link_fb'); ?>"
				 data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
				 data-show-facepile="true" data-show-posts="false">
				<div class="fb-xfbml-parse-ignore">
					<blockquote cite="<?php echo cz('s_link_fb'); ?>">
						<a href="<?php echo cz('s_link_fb'); ?>" target="_blank"><?php echo cz('s_fb_name_widget'); ?></a>
					</blockquote>
				</div>
			</div>
		</div>
		<div class="col-md-60  col-sm-30 b-social__item">
			<?php if(cz('s_in_name_api')):?>
				<div class="widget iconosquare-widget"><iframe src="https://pro.iconosquare.com/widget/gallery?choice=myfeed&amp;username=<?php echo cz('s_in_name_api'); ?>&amp;hashtag=iconosquare&amp;linking=instagram&amp;show_infos=true&amp;width=323&amp;height=304&amp;mode=grid&amp;pace=10&amp;layout_x=3&amp;layout_y=2&amp;padding=10&amp;photo_border=true&amp;background=FFFFFF&amp;text=777777&amp;widget_border=true&amp;radius=5&amp;border-color=DDDDDD" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:323px; height:304px;"></iframe></div>
			<?php endif; ?>
		</div>
	</div>
</div>