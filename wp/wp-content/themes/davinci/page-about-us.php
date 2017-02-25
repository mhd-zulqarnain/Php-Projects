<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10.08.2015
 * Time: 16:43
 */
?>

<?php get_header() ?>

<!-- About -->
<div class="page-about">
	<div class="container-fluid abous_b1">
		<div class="container">
			<div class="row">
				<h1><?php echo cz('tp_about_b1_title'); ?></h1>

				<div class="col-xs-60 col-md-48 col-md-offset-6">
					<p><?php echo cz('tp_about_b1_description'); ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid abous_b2">
		<div class="container ">
			<div class="row">
				<h2><?php _e('Why Us', 'ami3'); ?></h2>

				<div class="col-md-60">
					<p>
						<?php _e('Our team is passionate about making it easier for you to shop online.', 'ami3'); ?> <br />
						<?php _e('We care about your time so we try our best to make your shopping experience pleasant, seamless and hassle-free.', 'ami3'); ?> <br />
						<?php _e('We\'re committed to offering the lowest prices and also frequent promotions and seasonal sales.', 'ami3'); ?> <br />
						<?php _e('We hope to build relationships with our customers so we\'ll do everything we can to ensure you’re satisfied.', 'ami3'); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid abous_b3">
		<div class="container">
			<div class="row">
				<h2><?php _e('Our Core Values', 'ami3'); ?></h2>
				<ul class="col-sm-60">
					<li class="col-sm-12 col-xs-60">
						<i class="ico_about ico1"></i>

						<div class=""><?php _e('Be Adventurous, Creative, and Open-Minded', 'ami3'); ?></div>
					</li>
					<li class="col-sm-12 col-xs-60">
						<i class="ico_about ico2"></i>

						<div class=""><?php _e('Create Long-Term Relationships with Our Customers', 'ami3'); ?></div>
					</li>
					<li class="col-sm-12 col-xs-60">
						<i class="ico_about ico3"></i>

						<div class=""><?php _e('Pursue Growth and Learning', 'ami3'); ?></div>
					</li>
					<li class="col-sm-12 col-xs-60">
						<i class="ico_about ico4"></i>

						<div class=""><?php _e('Inspire Happiness and Positivity', 'ami3'); ?></div>
					</li>
					<li class="col-sm-12 col-xs-60">
						<i class="ico_about ico5"></i>

						<div class=""><?php _e('Make Sure Our Customers are Pleased', 'ami3'); ?></div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container-fluid abous_b4">
		<div class="container">
			<div class="row">
				<div class="col-sm-20 col-sm-offset-5">
					<h2><?php _e('Our Partners', 'ami3'); ?></h2>

					<p><?php _e('For your convenience we’ve partnered with several organizations', 'ami3'); ?>.</p>
				</div>
				<div class="col-sm-30 col-sm-offset-5 abous_b4_bg1">
					<img src="<?php echo get_template_directory_uri(); ?>/img/about/ico_about.png?1000" alt="" class="img-responsive">
				</div>
			</div>
		</div>
	</div>

	<?php if(cz('meet_our_team')): ?>
	<div class="container-fluid abous_b5">
		<div class="container">
			<div class="row">
				<div class="col-md-60">
					<h2><?php echo cz('tp_about_b5_title'); ?></h2>

					<p><?php echo cz('tp_about_b5_description'); ?></p>
				</div>
				<div class="col-md-60 text-center">
					<ul>
						<li class="col-md-12">
							<div class="abous_b5__img">
								<img src="<?php echo cz('tp_mt1_img_1'); ?>?1000" alt="" class="img-responsive">
							</div>
							<div class="abous_b5_text">
								<div class="abous_b5_name"><?php echo cz('tp_mt1_name_1'); ?></div>
								<div class="abous_b5_position"><?php echo cz('tp_mt1_cus_1'); ?></div>
							</div>
						</li>
						<li class="col-md-12">
							<div class="abous_b5__img">
								<img src="<?php echo cz('tp_mt1_img_2'); ?>?1000" alt="" class="img-responsive">
							</div>
							<div class="abous_b5_text">
								<div class="abous_b5_name"><?php echo cz('tp_mt1_name_2'); ?></div>
								<div class="abous_b5_position"><?php echo cz('tp_mt1_cus_2'); ?></div>
							</div>
						</li>
						<li class="col-md-12">
							<div class="abous_b5__img abous_b5__img--big">
								<img src="<?php echo cz('tp_mt1_img_3'); ?>?1000" alt="" class="img-responsive">
							</div>
							<div class="abous_b5_text">
								<div class="abous_b5_name"><?php echo cz('tp_mt1_name_3'); ?></div>
								<div class="abous_b5_position"><?php echo cz('tp_mt1_cus_3'); ?></div>
							</div>
						</li>
						<li class="col-md-12">
							<div class="abous_b5__img">
								<img src="<?php echo cz('tp_mt1_img_4'); ?>?1000" alt="" class="img-responsive">
							</div>
							<div class="abous_b5_text">
								<div class="abous_b5_name"><?php echo cz('tp_mt1_name_4'); ?></div>
								<div class="abous_b5_position"><?php echo cz('tp_mt1_cus_4'); ?></div>
							</div>
						</li>
						<li class="col-md-12">
							<div class="abous_b5__img">
								<img src="<?php echo cz('tp_mt1_img_5'); ?>?1000" alt="" class="img-responsive">
							</div>
							<div class="abous_b5_text">
								<div class="abous_b5_name"><?php echo cz('tp_mt1_name_5'); ?></div>
								<div class="abous_b5_position"><?php echo cz('tp_mt1_cus_5'); ?></div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="container-fluid abous_b6">
		<div class="container">
			<div class="row">
				<div class="col-mg-20">
					<h2><?php _e('Keep in Contact with Us', 'ami3'); ?></h2>

					<p><?php _e('We\'re continually working on our online store and are open to any suggestions. If you have any questions or proposals, please do not hesitate to contact us.', 'ami3'); ?></p>
				</div>
				<div class="col-mg-20">
					<a class="btn btn_shopping btn-default btn-danger"
					   href="<?php echo esc_url( home_url('/product/') ) ?>"><?php _e('Start shopping', 'ami3'); ?></a>
					<a class="btn btn_contact btn-default btn-danger"
					   href="<?php echo esc_url( home_url('/contact-us/') ) ?>"><?php _e('Contact us', 'ami3'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer() ?>
