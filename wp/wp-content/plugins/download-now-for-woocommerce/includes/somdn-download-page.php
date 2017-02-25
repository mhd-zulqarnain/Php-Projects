<?php
/**
 * DOWNLOAD NOW - WooCommerce - Download Page
 * 
 * The function to display download links.
 * 
 * @version	2.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'woocommerce_single_product_summary', 'somdn_product_page', 31 );

if ( ! function_exists( 'woocommerce_template_loop_add_to_cart' ) ) {

	$genoptions = get_option( 'somdn_gen_settings' );
	$archive_enabled = ( isset( $genoptions['somdn_include_archive_items'] ) && $genoptions['somdn_include_archive_items'] ) ? true : false ;

	if ( ! $archive_enabled ) {
		return;
	}

	function woocommerce_template_loop_add_to_cart( $args = array() ) {

		global $product;

		$productID = $product->id;
		$downloadable = $product->downloadable;

		if ( somdn_is_product_valid( $productID, $downloadable ) ) {
			echo '<div style="text-align: center;">';
			echo somdn_product_page( true, $product );
			echo '</div>';
			return;
		} else {

			if ( $product ) {
				$defaults = array(
					'quantity' => 1,
					'class'    => implode( ' ', array_filter( array(
						'button',
						'product_type_' . $product->get_type(),
						$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
					) ) ),
				);
				$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );
				wc_get_template( 'loop/add-to-cart.php', $args );
	
			}
		
		}

	}
}

function somdn_product_page( $archive = false, $product = '' ) {
	
	if ( ! $product ) {
		$product = wc_get_product();
	}

	if ( ! $product ) {
		global $product;
	}


	if ( ! $product ) {
		return;
	}

	if ( ! $archive && ! is_product() && ! is_page() ) {
		return;
	}

	$productID = $product->id;
	$downloadable = $product->downloadable;

	if ( ! somdn_is_product_valid( $productID, $downloadable ) ) {
		return;
	}
	

	$downloads = $product->get_files();

	$downloads_count = count( $downloads );
	$is_single_download = ( 1 == $downloads_count ) ? true : false ;

	$genoptions = get_option( 'somdn_gen_settings' );
	$singleoptions = get_option( 'somdn_single_settings' );
	$multioptions = get_option( 'somdn_multi_settings' );
	$docoptions = get_option( 'somdn_docviewer_settings' );
	 
	$shownumber = ( isset( $multioptions['somdn_show_numbers'] ) && $multioptions['somdn_show_numbers'] ) ? true : false ;
	 
	$buttoncss = ( isset( $genoptions['somdn_button_css'] ) && $genoptions['somdn_button_css'] ) ? $genoptions['somdn_button_css'] : '' ;
	
	$linkcss = ( isset( $genoptions['somdn_link_css'] ) && $genoptions['somdn_link_css'] ) ? $genoptions['somdn_link_css'] : '' ;

	$pdfenabled = ( isset( $docoptions['somdn_docviewer_enable'] ) && $docoptions['somdn_docviewer_enable'] ) ? true : false ;

	if ( $is_single_download ) {
		$buttontext = ( isset( $singleoptions['somdn_single_button_text'] ) && $singleoptions['somdn_single_button_text'] ) ? $singleoptions['somdn_single_button_text'] : 'Download Now' ;
	} else {
		$buttontext = ( isset( $multioptions['somdn_multi_button_text'] ) && $multioptions['somdn_multi_button_text'] ) ? $singleoptions['somdn_single_button_text'] : 'Download All (.zip)' ;
	}
	
	$single_type = ( isset( $singleoptions['somdn_single_type'] ) && 2 == $singleoptions['somdn_single_type'] ) ? 2 : 1 ;
	
	$pdf_default = 'Download PDF';
	$pdf_output = false;

	$archive_enabled = ( isset( $genoptions['somdn_include_archive_items'] ) && $genoptions['somdn_include_archive_items'] ) ? true : false ;

	if ( $archive_enabled && $archive ) {
		$buttontext = ( isset( $options['somdn_read_more_text'] ) && $options['somdn_read_more_text'] ) ? $options['somdn_read_more_text']: 'Download' ;
		$single_type = 1;
	}
	
	if ( is_page() ) {
		echo somdn_hide_cart_style();
	}

	if ( $is_single_download ) { ?>
	
		<?php if ( is_single() ) do_action( 'woocommerce_before_add_to_cart_form' ); ?>

		<div class="somdn-download-wrap">
	
			<?php

				if ( $pdfenabled ) {

					foreach( $downloads as $key => $each_download )  {	
						$ext = somdn_get_ext_from_path( $each_download['file'] );
						if ( $ext == 'pdf' ) {
							$pdf_output = true;
							$buttontext = ( isset( $docoptions['somdn_docviewer_single_link_text'] ) && $docoptions['somdn_docviewer_single_link_text'] ) ? $docoptions['somdn_docviewer_single_link_text'] : $pdf_default ;
						} else {
							$pdf_output = false;
						}
					}
				}

			?>

			<form <?php if ( $archive_enabled && $archive ) echo ' class="somdn-archive-download-form" '; ?>action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" id="somdn-download-single-form">
				
					<?php if ( is_single() ) do_action( 'woocommerce_before_add_to_cart_button' ); ?>
							 
					<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
					<input type="hidden" name="action" value="somdn_download_single">
					<input type="hidden" name="product" value="<?php the_id(); ?>">
					
					<?php if ( $pdf_output ) { ?>
					<input type="hidden" name="pdf" value="true">
					<?php } ?>
					
					<?php

					if ( $pdf_output ) { ?>

						<?php if ( isset( $docoptions['somdn_docviewer_single_display'] ) && 2 == $docoptions['somdn_docviewer_single_display'] ) { ?>
						
							<?php if ( $archive_enabled && $archive ) { ?>
							
								<?php echo somdn_get_download_button( $buttontext, $buttoncss, $archive, get_the_id() ); ?>
							
							<?php } else { ?>
							
							<a id="somdn-sdbutton" href="#" class="somdn-download-link" style="<?php echo esc_attr( $linkcss ); ?>"><?php echo esc_html( $buttontext ); ?></a>
							<?php } ?>
							
						<?php } else { ?>

							<?php echo somdn_get_download_button( $buttontext, $buttoncss, $archive ); ?>

						<?php } ?>

					<?php } else { ?>

						<?php if ( $single_type == 2 ) { ?>
							<a id="somdn-sdbutton" href="#" class="somdn-download-link" style="<?php echo esc_attr( $linkcss ); ?>"><?php echo esc_html( $buttontext ); ?></a>
						<?php } else { ?>
							<?php echo somdn_get_download_button( $buttontext, $buttoncss, $archive ); ?>
						<?php } ?>

					<?php } ?>
					
					<?php if ( is_single() ) do_action( 'woocommerce_after_add_to_cart_button' ); ?>


			</form>
			
		</div>
		
		<?php if ( is_single() ) do_action( 'woocommerce_after_add_to_cart_form' ); ?>
		


		<?php return;
	 
	}
	 
	 
	$multi_type = ( isset( $multioptions['somdn_display_type'] ) && $multioptions['somdn_display_type'] ) ? $multioptions['somdn_display_type'] : '1' ;

	if ( $archive_enabled && $archive ) {
		$multi_type = 2;
	}

	/**
	 * 1. Links Only
	 */
	if ( 1 == $multi_type ) { ?>
	
		<?php if ( is_single() ) do_action( 'woocommerce_before_add_to_cart_form' ); ?>
		
		<?php if ( is_single() ) do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	
		<?php somdn_get_available_downloads_text(); ?>

		<div class="somdn-download-wrap">
		 
			<?php
							 
			$count = 0;
	 
			foreach( $downloads as $key => $each_download )  {
							 
				$count++;

				if ( $shownumber ) {
					$shownumber = $count . '. ';
				} else {
					$shownumber = '';
				}
				
				$ext = somdn_get_ext_from_path( $each_download['file'] );
				if ( $ext == 'pdf' && $pdfenabled ) {
					$pdf_output = true;
				} else {
					$pdf_output = false;
				}
				
				?>

				<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" id="somdn-md-form-<?php echo $count; ?>">
										 
					<div class="somdn-form-table-bottom">
																 
						<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
						<input type="hidden" name="action" value="somdn_download_multi_single">
						<input type="hidden" name="product" value="<?php the_id(); ?>">
						<input type="hidden" name="productfile" value="<?php echo $count; ?>">
						
						<?php if ( $pdf_output ) { ?>
						<input type="hidden" name="pdf" value="true">
						<?php } ?>

						<a id="somdn-md-link-<?php echo $count; ?>" href="#" class="somdn-download-link" style="<?php echo esc_attr( $linkcss ); ?>"><?php echo $shownumber . $each_download['name']; ?></a>
												 
					</div>
								 
				</form>               
					 
			<?php } ?>
			
			<?php if ( is_single() ) do_action( 'woocommerce_after_add_to_cart_button' ); ?>
							 
		</div>
		
		<?php if ( is_single() ) do_action( 'woocommerce_after_add_to_cart_form' ); ?>
			 
		<?php return;
	 
	}
	 
	/**
	 * 2. Button Only
	 */
	if ( 2 == $multi_type ) { ?>
	
		<?php if ( is_single() ) do_action( 'woocommerce_before_add_to_cart_form' ); ?>

		<div class="somdn-download-wrap">
	 
			<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post"<?php if ( $archive_enabled && $archive ) echo ' class="somdn-archive-download-form something"'; ?>>
							 
				<div class="somdn-form-table-bottom"<?php if ( $archive_enabled && $archive ) echo ' style="text-align: center!important;"'; ?>>
				
					<?php if ( is_single() ) do_action( 'woocommerce_before_add_to_cart_button' ); ?>
													 
					<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
					<input type="hidden" name="action" value="somdn_download_all_files">
					<input type="hidden" name="product" value="<?php the_id(); ?>">
					<input type="hidden" name="totalfiles" value="<?php echo count( $downloads ); ?>">
									
					<?php echo somdn_get_download_button( $buttontext, $buttoncss, $archive ); ?>
					
					<?php if ( is_single() ) do_action( 'woocommerce_after_add_to_cart_button' ); ?>
									
				</div>
					 
			</form>
			 
		</div>
		
		<?php if ( is_single() ) do_action( 'woocommerce_after_add_to_cart_form' ); ?>
			 
		<?php return;
	 
	}

	/**
	 * 3. Button + Checkboxes
	 */
	if ( 3 == $multi_type ) { ?>
	
		<?php if ( is_single() ) do_action( 'woocommerce_before_add_to_cart_form' ); ?>
		
		<?php if ( is_single() ) do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	
		<div class="somdn-download-wrap">
	 
			<?php somdn_get_available_downloads_text(); ?>
			 
			<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" id="somdn-checkbox-form">
							 
				<div class="somdn-form-table-bottom somdn-form-validate" style="display: none;">
					<p style="color: red;"><strong>Please select at least 1 checkbox</strong></p>
				</div>
													 
				<?php
								 
				$count = 0;
		 
						 
				foreach( $downloads as $key => $each_download )  {
						 
					$count++; ?>
								 
					<div class="somdn-form-table-bottom somdn-checkboxes-wrap">
						 
						<input style="display: inline-block;" type="checkbox" id="somdn-download-file-<?php echo $count; ?>" name="somdn-download-file-<?php echo $count; ?>" value="1">
						<label style="display: inline-block;" for="somdn-download-file-<?php echo $count; ?>"><?php echo $each_download['name']; ?></label>
								 
					</div>
				 
				<?php } ?>
						 
				<?php if ( isset( $multioptions['somdn_select_all'] ) && $multioptions['somdn_select_all'] ) { ?>
				 
					<div class="somdn-form-table-bottom somdn-checkboxes-wrap somdn-select-all-wrap">
							 
						<input style="display: inline-block;" type="checkbox" id="somdn-download-files-all" name="somdn-download-files-all">
						<label style="display: inline-block;" for="somdn-download-files-all">Select All</label>
									 
					</div>
						 
				<?php } ?>        
	
										 
				<div class="somdn-form-table-bottom somdn-checkboxes-button-wrap">
																 
					<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
					<input type="hidden" name="action" value="somdn_download_multi_checked">
					<input type="hidden" name="product" value="<?php the_id(); ?>">
					<input type="hidden" name="totalfiles" value="<?php echo count( $downloads ); ?>">
												
					<?php echo somdn_get_download_button( $buttontext, $buttoncss ); ?>
					
					<?php if ( is_single() ) do_action( 'woocommerce_after_add_to_cart_button' ); ?>
												
				</div>
							 
			</form>

		</div>
		
		<?php if ( is_single() ) do_action( 'woocommerce_after_add_to_cart_form' ); ?>
			 
		<?php return;
	 
	}
	 
	/**
	 * 4. Button + Links
	 */
	if ( 4 == $multi_type ) { ?>
	
		<?php if ( is_single() ) do_action( 'woocommerce_before_add_to_cart_form' ); ?>
		
		<?php if ( is_single() ) do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	 
		<?php somdn_get_available_downloads_text(); ?>

		<div class="somdn-download-wrap">

			<?php
							 
			$count = 0;
	 
			foreach( $downloads as $key => $each_download )  {
							 
				$count++;

				if ( $shownumber ) {
					$shownumber = $count . '. ';
				} else {
					$shownumber = '';
				}

				$ext = somdn_get_ext_from_path( $each_download['file'] );
				if ( $ext == 'pdf' && $pdfenabled ) {
					$pdf_output = true;
				} else {
					$pdf_output = false;
				}

				?>

				<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" id="somdn-md-form-<?php echo $count; ?>">
									 
					<div class="somdn-form-table-bottom">
															 
						<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
						<input type="hidden" name="action" value="somdn_download_multi_single">
						<input type="hidden" name="product" value="<?php the_id(); ?>">
						<input type="hidden" name="productfile" value="<?php echo $count; ?>">

						<?php if ( $pdf_output ) { ?>
						<input type="hidden" name="pdf" value="true">
						<?php } ?>
											
						<a id="somdn-md-link-<?php echo $count; ?>" href="#" class="somdn-download-link" style="<?php echo esc_attr( $linkcss ); ?>"><?php echo $shownumber . $each_download['name']; ?></a> 
											 
					</div>
							 
				</form>               
					 
			<?php } ?>

			<div style="padding-top: 15px">
			 
				<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" class="somdn-button-form">
									 
					<div class="somdn-form-table-bottom">
															 
						<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
						<input type="hidden" name="action" value="somdn_download_all_files">
						<input type="hidden" name="product" value="<?php the_id(); ?>">
						<input type="hidden" name="totalfiles" value="<?php echo count( $downloads ); ?>">
											
						<?php echo somdn_get_download_button( $buttontext, $buttoncss ); ?>
						
						<?php if ( is_single() ) do_action( 'woocommerce_after_add_to_cart_button' ); ?>
											
					</div>
							 
				</form>
					 
			</div>
							 
		</div>
		
		<?php if ( is_single() ) do_action( 'woocommerce_after_add_to_cart_form' ); ?>
			 
		<?php return;
	 
	}

	/**
	 * 5. Button & Filenames
	 */
	if ( 5 == $multi_type ) { ?>
	
		<?php if ( is_single() ) do_action( 'woocommerce_before_add_to_cart_form' ); ?>
		
		<?php if ( is_single() ) do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	
		<div class="somdn-download-wrap">
	 
			<?php somdn_get_available_downloads_text(); ?>
	 
			<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" class="somdn-button-form">
					 
				<p>
					 
					<?php
							 
					$count = 0;
								 
					foreach( $downloads as $key => $each_download )  {
								 
						$count++;
										 
						if ( $shownumber ) {
							$shownumber = $count . '. ';
						} else {
							$shownumber = '';
					} ?>
	
					<span style="display: inline-block;" class="somdn-download-filename"><?php echo $shownumber . $each_download['name']; ?></span><br>
						 
					<?php } ?>
							 
				</p>
							 
				<div class="somdn-form-table-bottom">
							 
					<?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>
					<input type="hidden" name="action" value="somdn_download_all_files">
					<input type="hidden" name="product" value="<?php the_id(); ?>">
					<input type="hidden" name="totalfiles" value="<?php echo count( $downloads ); ?>">

					<?php echo somdn_get_download_button( $buttontext, $buttoncss ); ?>
					
					<?php if ( is_single() ) do_action( 'woocommerce_after_add_to_cart_button' ); ?>
								
				</div>
					 
			</form>
			 
		</div>
		
		<?php if ( is_single() ) do_action( 'woocommerce_after_add_to_cart_form' ); ?>

		<?php return;
	 
	}
 
}

function somdn_get_download_button( $text, $css, $archive = false, $productID = '' ) {

	ob_start(); ?>
	
	<?php if ( $archive ) { ?>
	
		<a rel="nofollow" href="<?php echo get_the_permalink( $productID ); ?>" class="somdn-download-archive button product_type_simple add_to_cart_button"><?php echo $text; ?></a>
			
	<?php } else { ?>

	<button style="<?php echo esc_attr( $css ); ?>" type="submit" id="somdn-form-submit-button" class="somdn-download-button single_add_to_cart_button button"><?php echo $text; ?></button>
	
	<?php } ?>
		
	<?php
	
	$button = ob_get_clean();

	return $button;

}