<?php
/**
 * DOWNLOAD NOW - WooCommerce - Settings
 * 
 * The custom settings and setting outputs.
 * 
 * @version	2.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'admin_menu', 'somdn_add_admin_menu' );
add_action( 'admin_init', 'somdn_settings_init' );

function somdn_add_admin_menu() { 

	add_plugins_page( 'DOWNLOAD NOW - WooCommerce', 'Download Now', 'manage_options', 'download-now-woocommerce', 'somdn_options_page' );

}

function somdn_settings_init() { 

	register_setting( 'somdn_plugin_notify_settings', 'somdn_plugin_notify_settings' );

	add_settings_section(
		'somdn_plugin_notify_settings_section', 
		__( 'General Settings', 'download-now-woocommerce' ), 
		'somdn_plugin_notify_settings_section_callback', 
		'somdn_plugin_notify_settings'
	);

	add_settings_field( 
		'somdn_new_feature_pdf', 
		NULL, 
		'somdn_new_feature_pdf_callback', 
		'somdn_plugin_notify_settings', 
		'somdn_plugin_notify_settings_section'
	);

	register_setting( 'somdn_gen_settings', 'somdn_gen_settings' );

	add_settings_section(
		'somdn_gen_settings_section', 
		__( 'General Settings', 'download-now-woocommerce' ), 
		'somdn_gen_settings_section_callback', 
		'somdn_gen_settings'
	);

	add_settings_field( 
		'somdn_read_more_text', 
		__( 'Shop Button Text', 'download-now-woocommerce' ), 
		'somdn_read_more_text_render', 
		'somdn_gen_settings', 
		'somdn_gen_settings_section' 
	);

	add_settings_field( 
		'somdn_require_login', 
		__( 'Files', 'download-now-woocommerce' ), 
		'somdn_require_login_render', 
		'somdn_gen_settings', 
		'somdn_gen_settings_section' 
	);

	add_settings_field( 
		'somdn_include_archive_items', 
		NULL, 
		'somdn_include_archive_items_render', 
		'somdn_gen_settings', 
		'somdn_gen_settings_section' 
	);

	add_settings_field( 
		'somdn_include_sale_items', 
		NULL, 
		'somdn_include_sale_items_render', 
		'somdn_gen_settings', 
		'somdn_gen_settings_section' 
	);

	add_settings_field( 
		'somdn_indy_items', 
		NULL, 
		'somdn_indy_items_render', 
		'somdn_gen_settings', 
		'somdn_gen_settings_section' 
	);

	add_settings_field( 
		'somdn_button_css', 
		__( 'Button custom CSS', 'download-now-woocommerce' ), 
		'somdn_button_css_render', 
		'somdn_gen_settings', 
		'somdn_gen_settings_section'
	);

	add_settings_field( 
		'somdn_link_css', 
		__( 'Link custom CSS', 'download-now-woocommerce' ), 
		'somdn_link_css_render', 
		'somdn_gen_settings', 
		'somdn_gen_settings_section'
	);

	register_setting( 'somdn_single_settings', 'somdn_single_settings' );

	add_settings_section(
		'somdn_single_settings_section', 
		__( 'Single File Settings', 'download-now-woocommerce' ), 
		'somdn_single_settings_section_callback', 
		'somdn_single_settings'
	);

	add_settings_field( 
		'somdn_single_type', 
		__( 'Display method', 'download-now-woocommerce' ), 
		'somdn_single_type_render', 
		'somdn_single_settings', 
		'somdn_single_settings_section' 
	);

	add_settings_field( 
		'somdn_single_button_text', 
		__( 'Button text', 'download-now-woocommerce' ), 
		'somdn_single_button_text_render', 
		'somdn_single_settings', 
		'somdn_single_settings_section' 
	);


	register_setting( 'somdn_multi_settings', 'somdn_multi_settings' );

	add_settings_section(
		'somdn_multi_settings_section', 
		__( 'Multiple File Settings', 'download-now-woocommerce' ), 
		'somdn_multi_settings_section_callback', 
		'somdn_multi_settings'
	);

	add_settings_field( 
		'somdn_display_type', 
		__( 'Display method', 'download-now-woocommerce' ), 
		'somdn_display_type_render', 
		'somdn_multi_settings', 
		'somdn_multi_settings_section' 
	);

	add_settings_field( 
		'somdn_multi_button_text', 
		__( 'Button text', 'download-now-woocommerce' ), 
		'somdn_multi_button_text_render', 
		'somdn_multi_settings', 
		'somdn_multi_settings_section' 
	);
	
	add_settings_field( 
		'somdn_available_downloads_text', 
		__( 'File list text', 'download-now-woocommerce' ), 
		'somdn_available_downloads_text_render', 
		'somdn_multi_settings', 
		'somdn_multi_settings_section' 
	);

	add_settings_field( 
		'somdn_select_all', 
		__( 'Customise', 'download-now-woocommerce' ), 
		'somdn_select_all_render', 
		'somdn_multi_settings', 
		'somdn_multi_settings_section' 
	);

	add_settings_field( 
		'somdn_show_numbers', 
		NULL, 
		'somdn_show_numbers_render', 
		'somdn_multi_settings', 
		'somdn_multi_settings_section' 
	);

	register_setting( 'somdn_docviewer_settings', 'somdn_docviewer_settings' );

	add_settings_section(
		'somdn_docviewer_settings_section', 
		__( 'PDF Viewer Settings', 'download-now-woocommerce' ), 
		'somdn_docviewer_settings_section_callback', 
		'somdn_docviewer_settings'
	);

	add_settings_field( 
		'somdn_docviewer_enable', 
		__( 'Enable PDF Viewer', 'download-now-woocommerce' ), 
		'somdn_docviewer_enable_render', 
		'somdn_docviewer_settings', 
		'somdn_docviewer_settings_section' 
	);

	add_settings_field( 
		'somdn_docviewer_single_display', 
		__( 'Single file display', 'download-now-woocommerce' ), 
		'somdn_docviewer_single_display_render', 
		'somdn_docviewer_settings', 
		'somdn_docviewer_settings_section' 
	);

	add_settings_field( 
		'somdn_docviewer_single_link_text', 
		__( 'Link/Button Text', 'download-now-woocommerce' ), 
		'somdn_docviewer_single_link_text_render', 
		'somdn_docviewer_settings', 
		'somdn_docviewer_settings_section' 
	);

}

function somdn_plugin_notify_settings_section_callback() { 

	echo __( 'Settings Notifications', 'download-now-woocommerce' );

}

function somdn_gen_settings_section_callback() { 

	echo __( 'Customise the global plugin settings.', 'download-now-woocommerce' );

}

function somdn_read_more_text_render() { 

	$options = get_option( 'somdn_gen_settings' );
	$value = ( isset( $options['somdn_read_more_text'] ) && $options['somdn_read_more_text'] ) ? $options['somdn_read_more_text']: '' ; ?>
	
	<input type="text" name="somdn_gen_settings[somdn_read_more_text]" value="<?php echo $value; ?>" style="width: 300px; max-width: 100%;">
	<p class="description">On shop / archive pages. Blank = <strong>Read More</strong></p>
	<p class="description">If "Show download on shop pages" is enabled, Blank = <strong>Download</strong></p>
	<p class="description">PDF Viewer text will still show for PDF files, if enabled.</p>
	<?php

}

function somdn_include_archive_items_render() { 

	$options = get_option( 'somdn_gen_settings' ); ?>
	
	<label for="somdn_gen_settings[somdn_include_archive_items]">
	<input type="checkbox" name="somdn_gen_settings[somdn_include_archive_items]" id="somdn_gen_settings[somdn_include_archive_items]"
	<?php
		$checked = isset( $options['somdn_include_archive_items'] ) ? checked( $options['somdn_include_archive_items'], true ) : '' ;
	?>
		value="1">
	Allow download on shop / archive pages
	</label>
	<p class="description">Note: This will replace the "Read More" button.</p>
	<?php

}

function somdn_require_login_render() { 

	$options = get_option( 'somdn_gen_settings' ); ?>
	
	<label for="somdn_gen_settings[somdn_require_login]">
	<input type="checkbox" name="somdn_gen_settings[somdn_require_login]" id="somdn_gen_settings[somdn_require_login]"
	<?php
		$checked = isset( $options['somdn_require_login'] ) ? checked( $options['somdn_require_login'], true ) : '' ;
	?>
		value="1">
	Only show the button to logged in users
	</label>
	<p class="description">Note: No message will be displayed informing the user to log in.</p>
	<?php

}

function somdn_include_sale_items_render() { 

	$options = get_option( 'somdn_gen_settings' ); ?>

	<label for="somdn_gen_settings[somdn_include_sale_items]">
	<input type="checkbox" name="somdn_gen_settings[somdn_include_sale_items]" id="somdn_gen_settings[somdn_include_sale_items]"
	<?php
		$checked = isset( $options['somdn_include_sale_items'] ) ? checked( $options['somdn_include_sale_items'], true ) : '' ;
	?>
		value="1">
	Include paid items that are currently on sale for free
	</label>
	<p class="description">Not recommended if you use the "redirect" WooCommerce download method.</p>
	<?php

}

function somdn_indy_items_render() { 

	$options = get_option( 'somdn_gen_settings' ); ?>

	<label for="somdn_gen_settings[somdn_indy_items]">
	<input type="checkbox" name="somdn_gen_settings[somdn_indy_items]" id="somdn_gen_settings[somdn_indy_items]"
	<?php
		$checked = isset( $options['somdn_indy_items'] ) ? checked( $options['somdn_indy_items'], true ) : '' ;
	?>
		value="1">
	Include selected products only
	</label>
	<p class="description">Tick this box if you want to choose which products are included.</p>
	<?php

}

function somdn_button_css_render() { 

	$options = get_option( 'somdn_gen_settings' );
	$cssvalue = ( isset( $options['somdn_button_css'] ) && $options['somdn_button_css'] ) ? $options['somdn_button_css'] : '' ; ?>
	
	<input type="text" name="somdn_gen_settings[somdn_button_css]" value="<?php echo $cssvalue; ?>" style="width: 300px; max-width: 100%;">
	<p class="description">For theme styling the button uses the following CSS classes:<br>
	<code>somdn-download-button single_add_to_cart_button button</code></p>
	<?php

}

function somdn_link_css_render() { 

	$options = get_option( 'somdn_gen_settings' );
	$cssvalue = ( isset( $options['somdn_link_css'] ) && $options['somdn_link_css'] ) ? $options['somdn_link_css'] : '' ; ?>
	
	<input type="text" name="somdn_gen_settings[somdn_link_css]" value="<?php echo $cssvalue; ?>" style="width: 300px; max-width: 100%;">
	<p class="description">For theme styling the links use the following CSS class:<br>
	<code>somdn-download-link</code></p>
	<?php

}

function somdn_single_settings_section_callback() { 

	echo __( 'Customise how products with a single file are handled.', 'download-now-woocommerce' );

}

function somdn_single_type_render() {

	$options = get_option( 'somdn_single_settings' ); ?>

	<select name="somdn_single_settings[somdn_single_type]">
		<option value="1" <?php selected( $options['somdn_single_type'], 1 ); ?>>Button</option>
		<option value="2" <?php selected( $options['somdn_single_type'], 2 ); ?>>Link</option>
	</select>

	<?php

}

function somdn_single_button_text_render() { 

	$options = get_option( 'somdn_single_settings' ); ?>

	<input type="text" name="somdn_single_settings[somdn_single_button_text]" value="<?php
	
	echo $text = isset( $options['somdn_single_button_text'] ) ? $options['somdn_single_button_text'] : '' ;
	
	?>">
	<p class="description">Blank = <strong>Download Now</strong></p>
	<?php

}

function somdn_multi_settings_section_callback() { ?>

	<p>Customise how products with multiple files are handled.</p>
	
	<p>Allowing the downloading of multiple files at once means those files will be zipped, which requires the files be on this server, uploaded using WordPress. Therefore, external links would not be supported. If you use external files select "Links Only" for the display method. Otherwise, you can select any others.</p>
	
	
<?php
	
}

function somdn_display_type_render() {

	$options = get_option( 'somdn_multi_settings' );
	$type = ( isset( $options['somdn_display_type'] ) && $options['somdn_display_type'] ) ? $options['somdn_display_type'] : '1' ; ?>

	<select name="somdn_multi_settings[somdn_display_type]">
		<option value="1" <?php selected( $options['somdn_display_type'], 1 ); ?>>Links Only (default)</option>
		<option value="2" <?php selected( $options['somdn_display_type'], 2 ); ?>>Button Only (download all)</option>
		<option value="3" <?php selected( $options['somdn_display_type'], 3 ); ?>>Button + Checkboxes</option>
		<option value="4" <?php selected( $options['somdn_display_type'], 4 ); ?>>Button + Links</option>
		<option value="5" <?php selected( $options['somdn_display_type'], 5 ); ?>>Button + Filenames</option>
	</select>

	<?php

}

function somdn_available_downloads_text_render() { 

	$options = get_option( 'somdn_multi_settings' ); ?>

	<input type="text" name="somdn_multi_settings[somdn_available_downloads_text]" value="<?php
	
	echo $text = isset( $options['somdn_available_downloads_text'] ) ? $options['somdn_available_downloads_text'] : '' ;
	
	?>">
	<p class="description">Blank = <strong><span style="font-style: italic;" class="somdn-available-downloads">Available Downloads:</span></strong></p>
	<?php

}

function somdn_always_ZIP_render() { 

	$options = get_option( 'somdn_multi_settings' ); ?>
	
	<input type="checkbox" name="somdn_multi_settings[somdn_always_ZIP]"
	<?php
		$checked = isset( $options['somdn_always_ZIP'] ) ? checked( $options['somdn_always_ZIP'], true ) : '' ;
	?>
		value="1">
		
	<p class="description">Should download files always be zipped up, even if only 1 is selected?</p>
	<p>If more than 1 file downloaded, they will be zipped regardless.</p>
	<?php

}

function somdn_select_all_render() { 

	$options = get_option( 'somdn_multi_settings' ); ?>

	<label for="somdn_multi_settings[somdn_select_all]">
	<input type="checkbox" name="somdn_multi_settings[somdn_select_all]" id="somdn_multi_settings[somdn_select_all]"
	<?php
		$checked = isset( $options['somdn_select_all'] ) ? checked( $options['somdn_select_all'], true ) : '' ;
	?>
		value="1">
	Show Select All box
	</label>
	<p class="description">Only shows if Button + Checkboxes is the display method.</p>
	<?php

}

function somdn_show_numbers_render() { 

	$options = get_option( 'somdn_multi_settings' ); ?>

	<label for="somdn_multi_settings[somdn_show_numbers]">
	<input type="checkbox" name="somdn_multi_settings[somdn_show_numbers]" id="somdn_multi_settings[somdn_show_numbers]"
	<?php
		$checked = isset( $options['somdn_show_numbers'] ) ? checked( $options['somdn_show_numbers'], true ) : '' ;
	?>
		value="1">
	Show number next to filename
	</label>
	<p class="description">Only used when links or filenames are shown.</p>
	<?php

}

function somdn_multi_button_text_render() { 

	$options = get_option( 'somdn_multi_settings' ); ?>

	<input type="text" name="somdn_multi_settings[somdn_multi_button_text]" id="somdn_multi_settings[somdn_multi_button_text]" value="<?php
	
	echo $text = isset( $options['somdn_multi_button_text'] ) ? $options['somdn_multi_button_text'] : '' ;
	
	?>">
	<p class="description">Blank = <strong>Download All (.zip)</strong></p>
	<?php

}

function somdn_docviewer_settings_section_callback() { ?>

	<p>Rather than downloading a file as normal, PDF Viewer will open a preview of the PDF file attached to a product (regardless of your WooCommerce download settings). From there users can print or download the file. Visit the <a href="<?php echo somdn_get_plugin_link_full(); ?>&tab=support&section=settings#docs">Settings Explained</a> page for more info.</p>

<?php
	
}

function somdn_docviewer_enable_render() { 

	$options = get_option( 'somdn_docviewer_settings' ); ?>
	
	<label for="somdn_docviewer_settings[somdn_docviewer_enable]">
	<input type="checkbox" name="somdn_docviewer_settings[somdn_docviewer_enable]" id="somdn_docviewer_settings[somdn_docviewer_enable]"
	<?php
		$checked = isset( $options['somdn_docviewer_enable'] ) ? checked( $options['somdn_docviewer_enable'], true ) : '' ;
	?>
		value="1">
	</label>
	<?php

}

function somdn_docviewer_single_display_render() {

	$options = get_option( 'somdn_docviewer_settings' ); ?>

	<select name="somdn_docviewer_settings[somdn_docviewer_single_display]">
		<option value="1" <?php selected( $options['somdn_docviewer_single_display'], 1 ); ?>>Button</option>
		<option value="2" <?php selected( $options['somdn_docviewer_single_display'], 2 ); ?>>Link</option>
	</select>

	<?php

}

function somdn_docviewer_single_link_text_render() { 

	$options = get_option( 'somdn_docviewer_settings' );
	$value = ( isset( $options['somdn_docviewer_single_link_text'] ) && $options['somdn_docviewer_single_link_text'] ) ? $options['somdn_docviewer_single_link_text']: '' ; ?>
	
	<input type="text" name="somdn_docviewer_settings[somdn_docviewer_single_link_text]" value="<?php echo $value; ?>" style="width: 300px; max-width: 100%;">
	<p class="description">Blank = <strong>Download PDF</strong></p>
	<?php

}


function somdn_options_page() { 

	somdn_get_settings_header_content();
	
	$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'home';
	
	$active_section = isset( $_GET[ 'section' ] ) ? $_GET[ 'section' ] : 'general'; ?>
	
	<?php if ( $active_tab == 'home' ) { ?>
	
		<?php somdn_settings_home(); ?>
	
	<?php } elseif ( $active_tab == 'settings' ) {
	
		$active_section = isset( $_GET[ 'section' ] ) ? $_GET[ 'section' ] : 'general';
		
		if ( 'general' == $active_section ) { ?>
	
			<?php somdn_gen_settings_content(); ?>
			
		<?php } elseif ( 'single' == $active_section ) { ?>
	
			<?php somdn_single_settings_content(); ?>
		
		<?php } elseif ( 'multiple' == $active_section ) { ?>
	
			<?php somdn_multi_settings_content(); ?>

		<?php } elseif ( 'docviewer' == $active_section ) { ?>
	
			<?php somdn_docviewer_settings_content(); ?>
			
		<?php } ?>
	
	<?php } elseif ( $active_tab == 'support' ) {

		$active_section = isset( $_GET[ 'section' ] ) ? $_GET[ 'section' ] : 'guide';
		
		if ( 'guide' == $active_section ) { ?>
	
			<?php somdn_support_guide(); ?>

		<?php } elseif ( 'features' == $active_section ) { ?>
	
			<?php somdn_support_features(); ?>
			
		<?php } elseif ( 'settings' == $active_section ) { ?>
	
			<?php somdn_support_settings(); ?>
			
		<?php } elseif ( 'faq' == $active_section ) { ?>
	
			<?php somdn_support_faq(); ?>
		
		<?php } elseif ( 'more' == $active_section ) { ?>
	
			<?php somdn_support_more(); ?>
			
		<?php } ?>
	
	<?php } elseif ( $active_tab == 'more' ) { ?>

		<?php somdn_settings_more(); ?>
	
	<?php } ?>

	<?php somdn_get_settings_bottom_content(); ?>

	<?php

}

function somdn_get_settings_header_content() {

	somdn_get_admin_header(); ?>

	<div class="somdn-container">
		<div class="somdn-row">
			<div class="somdn-col-12 som-main-plugin-content">
				<h1>Download Now<br>for WooCommerce</h1>
			</div>
		</div>
	</div>
	
	<div class="somdn-container somdn-errors">
		<div class="somdn-row">
			<div class="somdn-col-12">
				<?php settings_errors(); ?>
			</div>
		</div>
	</div>
	
	<div class="somdn-container">
		<div class="somdn-row">
		
			<div class="somdn-col-12">
			
				<?php somdn_get_settings_tabs(); ?>
				
				<?php somdn_get_settings_sub_tabs(); ?>
	
			</div>
		</div>
	</div>

<?php

}

function somdn_get_settings_tabs() {

	$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'home'; ?>
		
	<h2 class="nav-tab-wrapper">
		<a href="<?php echo somdn_get_plugin_link_full(); ?>&tab=home" class="nav-tab <?php echo $active_tab == 'home' ? 'nav-tab-active' : ''; ?>">Home</a>
		<a href="<?php echo somdn_get_plugin_link_full(); ?>&tab=settings" class="nav-tab <?php echo $active_tab == 'settings' ? 'nav-tab-active' : ''; ?>">Settings</a>
		<a href="<?php echo somdn_get_plugin_link_full(); ?>&tab=support" class="nav-tab <?php echo $active_tab == 'support' ? 'nav-tab-active' : ''; ?>">Support</a>
		<a href="<?php echo somdn_get_plugin_link_full(); ?>&tab=more" class="nav-tab <?php echo $active_tab == 'more' ? 'nav-tab-active' : ''; ?>">More</a>
	</h2>

<?php

}

function somdn_get_settings_sub_tabs() {

	if ( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'settings' ) {
			
		$active_section = isset( $_GET[ 'section' ] ) ? $_GET[ 'section' ] : 'general'; ?>

		<ul class="subsubsub">
			<li><a href="<?php echo somdn_get_plugin_link_full(); ?>&tab=settings&section=general" class="<?php echo $active_section == 'general' ? 'current' : ''; ?>">General</a> | </li>
			<li><a href="<?php echo somdn_get_plugin_link_full(); ?>&tab=settings&section=single" class="<?php echo $active_section == 'single' ? 'current' : ''; ?>">Single Files</a> | </li>
			<li><a href="<?php echo somdn_get_plugin_link_full(); ?>&tab=settings&section=multiple" class="<?php echo $active_section == 'multiple' ? 'current' : ''; ?>">Multiple Files</a> | </li>
			<li><a href="<?php echo somdn_get_plugin_link_full(); ?>&tab=settings&section=docviewer" class="<?php echo $active_section == 'docviewer' ? 'current' : ''; ?>">PDF Viewer</a> <span class="somdn-ui-new" style="">New</span></li>
		</ul>
			
	<?php
	
		return;
	
	}
	
	if ( isset( $_GET[ 'tab' ] ) && $_GET[ 'tab' ] == 'support' ) {
			
		$active_section = isset( $_GET[ 'section' ] ) ? $_GET[ 'section' ] : 'guide'; ?>

		<ul class="subsubsub">
			<li><a href="<?php echo somdn_get_plugin_link_full(); ?>&tab=support&section=guide" class="<?php echo $active_section == 'guide' ? 'current' : ''; ?>">Guide</a> | </li>
			<li><a href="<?php echo somdn_get_plugin_link_full(); ?>&tab=support&section=features" class="<?php echo $active_section == 'features' ? 'current' : ''; ?>">Features</a> | </li>
			<li><a href="<?php echo somdn_get_plugin_link_full(); ?>&tab=support&section=settings" class="<?php echo $active_section == 'settings' ? 'current' : ''; ?>">Settings Explained</a> | </li>
			<li><a href="<?php echo somdn_get_plugin_link_full(); ?>&tab=support&section=faq" class="<?php echo $active_section == 'faq' ? 'current' : ''; ?>">FAQs</a> | </li>
			<li><a href="<?php echo somdn_get_plugin_link_full(); ?>&tab=support&section=more" class="<?php echo $active_section == 'more' ? 'current' : ''; ?>">More</a></li>
		</ul>
			
	<?php
	
		return;
	
	}

}

function somdn_get_settings_bottom_content() { ?>

	<div class="somdn-container somdn-message-footer">
		<div class="somdn-row">
			<div class="somdn-col-12">
				<p>If you like this plugin please leave us a <a href="https://wordpress.org/support/plugin/download-now-for-woocommerce/reviews/#new-post" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> review on WordPress.org!</p>
				<p>And if you're feeling generous feel free to send us a <a href="<?php echo somdn_get_donate_link(); ?>" target="_blank">donation</a> for this free plugin.</p>
			</div>
		</div>
	</div>

<?php

}

function somdn_settings_footer() {

	if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'download-now-woocommerce' ) {
		somdn_get_admin_footer();
	}

}

function somdn_get_admin_header() {
	include_once( SOMDN_PATH . 'includes/somdn-settings-header.php' );
}

function somdn_get_admin_footer() {
	include_once( SOMDN_PATH . 'includes/somdn-settings-footer.php' );
}

add_action( 'admin_footer', 'somdn_settings_footer' );

function somdn_settings_home() { ?>

	<div class="somdn-container" style="padding-top: 20px;">
		<div class="somdn-row">
		
			<div class="somdn-col-6">
	
				<p><strong>Download Now</strong> is the definitive plugin for offering free downloads on your WooCommerce store.</p>
				
				<p>It allows users to bypass the checkout to download free products, supports single and multiple files, and is highly customisable.</p>
				
				<p>This plugin is safe and rock-solid secure, and everything is handled by your server including authentication, so you don&#39;t have to worry.</p>
				
				<p><strong>Download Now</strong> is also fully integrated with the official Memberships and Subscriptions plugins for WooCommerce.</p>				
		
			</div>

			<?php $somdn_image_01 = plugins_url( '/assets/images/download-image-01.png', dirname(__FILE__) ); ?>
			
			<div class="somdn-col-6 somdn-guide">
			
				<div class="somdn-guide-img">
					<img src="<?php echo $somdn_image_01; ?>">
				</div>
			
			</div>

		</div>
	</div>

<?php

}

function somdn_gen_settings_content() { ?>

	<div class="somdn-container">
		<div class="somdn-row">
		
			<div class="somdn-col-12">
	
				<form action="options.php" class="somdn-settings-form" method="post">
			
					<div class="somdn-gen-settings-form-wrap">
			
					<?php
					settings_fields( 'somdn_gen_settings' );
					do_settings_sections( 'somdn_gen_settings' );
					submit_button();
					?>
			
					</div>
			
				</form>
		
			</div>

		</div>
	</div>

<?php

}

function somdn_single_settings_content() { ?>

	<div class="somdn-container">
		<div class="somdn-row">
		
			<div class="somdn-col-7">
	
				<form action="options.php" class="somdn-settings-form" method="post">
			
					<div class="somdn-gen-settings-form-wrap">
			
					<?php
					settings_fields( 'somdn_single_settings' );
					do_settings_sections( 'somdn_single_settings' );
					submit_button();
					?>
			
					</div>
			
				</form>
		
			</div>

		</div>
	</div>

<?php

}

function somdn_multi_settings_content() { ?>

	<div class="somdn-container">
		<div class="somdn-row">
		
			<div class="somdn-col-7">
	
				<form action="options.php" class="somdn-settings-form" method="post">
			
					<div class="somdn-gen-settings-form-wrap">
			
					<?php
					settings_fields( 'somdn_multi_settings' );
					do_settings_sections( 'somdn_multi_settings' );
					submit_button();
					?>
			
					</div>
			
				</form>
		
			</div>

			<?php $img_location = plugins_url( '/assets/images/', dirname(__FILE__) ); ?>
			
			<div class="somdn-col-5 somdn-guide somdn-multi-guide">
			
				<div class="somdn-guide-img">
					<h2>Display Methods</h2>
					<p class="description">Twenty Seventeen theme shown</p>
				</div>

				<div class="somdn-guide-img">
					<h3>Links</h3>
					<img src="<?php echo $img_location . 'multi-1.png'; ?>">
				</div>

				<div class="somdn-guide-img">
					<h3>Button Only</h3>
					<img src="<?php echo $img_location . 'multi-2.png'; ?>">
				</div>

				<div class="somdn-guide-img">
					<h3>Button + Checkboxes</h3>
					<img src="<?php echo $img_location . 'multi-3.png'; ?>">
				</div>

				<div class="somdn-guide-img">
					<h3>Button + Links</h3>
					<img src="<?php echo $img_location . 'multi-4.png'; ?>">
				</div>

				<div class="somdn-guide-img">
					<h3>Button + Filenames</h3>
					<img src="<?php echo $img_location . 'multi-5.png'; ?>">
				</div>

			</div>


		</div>
	</div>

<?php

}

function somdn_docviewer_settings_content() { ?>

	<div class="somdn-container">
		<div class="somdn-row">
		
			<div class="somdn-col-7">
	
				<form action="options.php" class="somdn-settings-form" method="post">
			
					<div class="somdn-gen-settings-form-wrap">
			
					<?php
					settings_fields( 'somdn_docviewer_settings' );
					do_settings_sections( 'somdn_docviewer_settings' );
					submit_button();
					?>
			
					</div>
			
				</form>
		
			</div>

		</div>
	</div>

<?php

}

function somdn_settings_more() {

	$disablelogo = plugins_url( '/assets/images/disable-repeat-purchase.png', dirname(__FILE__) );
	$responsive_youtube = plugins_url( '/assets/images/responsive-youtube.png', dirname(__FILE__) );

	?>

	<div class="somdn-container" style="padding-top: 10px;">
		<div class="somdn-row">
		
			<div class="somdn-col-12 somdn-guide">

				<p style="padding-bottom: 25px;">Looking for more plugins by <strong>Square One Media?</strong></p>

				<div class="somdn-plugin-other-wrap">

					<div class="somdn-plugin-other">
						<a class="somdn-plugin-other-link" href="https://wordpress.org/plugins/disable-downloadable-repeat-purchase-woocommerce/" target="_blank">
							<div class="somdn-plugin-other-img">
								<img src="<?php echo $disablelogo; ?>">
							</div>
							<div class="somdn-plugin-other-bottom">
								<h3>Disable Downloadable Repeat Purchase - WooCommerce</h3>
							</div>
						</a>
					</div>
					
					<div class="somdn-plugin-other">
						<a class="somdn-plugin-other-link" href="https://wordpress.org/plugins/responsive-youtube-videos/" target="_blank">
							<div class="somdn-plugin-other-img">
								<img src="<?php echo $responsive_youtube; ?>">
							</div>
							<div class="somdn-plugin-other-bottom">
								<h3>Responsive YouTube Videos</h3>
							</div>	
						</a>
					</div>
					

				</div>

			</div>

		</div>
	</div>

<?php

}

function somdn_settings_link( $links ) {
	$somdn_page = somdn_get_plugin_link_full();
	$url = get_admin_url() . 'plugins.php' . $somdn_page;
	$settings_link = '<a href="' . $url . '">' . __('Settings', 'download-now-woocommerce') . '</a>';
	array_unshift( $links, $settings_link );
	return $links;
}

function somdn_donate_link( $links ) {
	$links[] = '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VAYF6G99MCMHU" target="_blank">Donate</a>';
	return $links;
}

add_action ('after_setup_theme', 'somdn_after_setup_plugin');

function somdn_after_setup_plugin() {
	add_filter('plugin_action_links_' . SOMDN_PLUGIN_BASENAME, 'somdn_settings_link');
	//add_filter( 'plugin_action_links_' . SOMDN_PLUGIN_BASENAME, 'somdn_donate_link' );
}

add_filter( 'plugin_row_meta', 'somdn_plugin_row_meta', 10, 2 );

function somdn_plugin_row_meta( $links, $file ) {

	if ( SOMDN_PLUGIN_BASENAME== $file ) {
		$new_links = array(
			'donate' => '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VAYF6G99MCMHU" target="_blank">Donate</a>',
			'more' => '<a href="https://profiles.wordpress.org/squareonemedia/#content-plugins" target="_blank">More Plugins</a>'
				);
		
		$links = array_merge( $links, $new_links );
	}
	
	return $links;
}

function somdn_get_donate_link() {
	
	return 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VAYF6G99MCMHU';
	
}