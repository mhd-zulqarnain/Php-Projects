<?php
/**
 * DOWNLOAD NOW - WooCommerce - Support Settings
 * 
 * Support guide, FAQ, etc.
 * 
 * @version	2.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function somdn_support_guide() {

	?>

	<div class="somdn-container">
		<div class="somdn-row">
		
			<div class="somdn-col-7 somdn-guide">
					
					
				<h2>Quick Guide</h2>

				<p>Once enabled any free downloadable products in your store will be downloadable by visitors without needing to go through the checkout process. "Add to Cart" buttons will be replaced with "Download Now" buttons, or for products with multiple files attached, a list of files or a single button will be displayed, depending on which settings you choose. On pages that list multiple products such as your store home, or in "Related Products" sections for example, the button will say "Read More", taking the user to the product page.</p>

				<p><strong>Download Now</strong> includes implicit support for the official <strong>Memberships</strong> and <strong>Subscriptions</strong> plugins from Woo.</p>

				<p>The download button and links should be styled by your current theme automatically, so won't look out of place with the rest of your content.</p>

				<p>There are several ways you can customise your experience with this plugin. To get started go to the <a href="plugins.php<?php echo somdn_get_plugin_link_full(); ?>&tab=settings">settings tab</a>, or read through the <a href="plugins.php<?php echo somdn_get_plugin_link_full(); ?>&tab=support&section=features">features</a> section or <a href="plugins.php<?php echo somdn_get_plugin_link_full(); ?>&tab=support&section=settings">settings explained</a> page. Be sure to check out the <a href="plugins.php<?php echo somdn_get_plugin_link_full(); ?>&tab=support&section=faq">FAQ</a> for more info.</p>

			</div>

		</div>
	</div>

<?php

}

function somdn_support_features() { ?>

	<div class="somdn-container">
		<div class="somdn-row">
		
			<div class="somdn-col-12 somdn-guide somdn-guide-features">
					
				<h2>Main Features</h2>
				<p>There are tonnes of customisations available on the <a href="plugins.php<?php echo somdn_get_plugin_link_full(); ?>&tab=settings">settings</a> tab.</p>
				<ul>
					<li>
						<h3>Checkout-free Downloading</h3>
						<p>If a product is free and downloadable, this plugin will remove the <em>add to cart</em> functionality for that product and allow your visitors to download it straight away without going through the checkout. By default this only includes items that are priced at 0, but you can also customise it to include items that are free because they're on sale.</p>
						<p>You can also offer this functionality only to logged in users, but no message will display informing the user to log in.</p>
						<p>Products with single or multiple files are supported, with several ways you can customise how they're displayed, but currently products with variations are not supported.</p>
						<p>If you want to include only specific products rather than affecting all that meet the requirements, on the <a href="plugins.php<?php echo somdn_get_plugin_link_full(); ?>&tab=settings">settings</a> page you can choose <em>Include selected products only</em>. With this setting turned on, only products you choose will be available without checkout. Go to the product page and in the <strong>Download Now</strong> box on the right, tick the box to include that product.</p>
						<?php $somdn_image_01 = plugins_url( '/assets/images/indy-product.png', dirname(__FILE__) ); ?>
						<div class="somdn-guide-img">
							<img src="<?php echo $somdn_image_01; ?>">
						</div>
					</li>
					<li>
						<h3>Download Tracking</h3>
						<p>As a consequence of bypassing the checkout, no orders are created. As such you cannot report on how many downloads you've had through the usual WooCommerce ways. Because of this <strong>Download Now</strong> keeps a count of how many times a product has been downloaded (only shown in the admin area).</p>
						<p>This can be viewed on the products list page in the columns, and on the indiviual product page itself in the sidebar area. See below screenshots.</p>

						<div class="somdn-guide-img-group">
							<?php $somdn_count_01 = plugins_url( '/assets/images/count-list.png', dirname(__FILE__) ); ?>
							<div class="somdn-guide-img half-col">
								<a href="<?php echo $somdn_count_01 ; ?>" target="_blank"><img src="<?php echo $somdn_count_01 ; ?>"></a>
							</div>
							
							<?php $somdn_count_02 = plugins_url( '/assets/images/count-product.png', dirname(__FILE__) ); ?>
							<div class="somdn-guide-img half-col">
								<a href="<?php echo $somdn_count_02 ; ?>" target="_blank"><img src="<?php echo $somdn_count_02 ; ?>"></a>
							</div>
						</div>

					</li>
					<li>
						<h3>PDF Viewer</h3>
						<p>Instead of being downloaded, any PDF file will be opened for the visitor to preview, and from there they can download or print the document. This feature, once enabled, will check automatically if the file attached to a product has the <em>.pdf</em> extension. It uses Google Drive online viewer, so visitors can even save the file to their Drive account. For this feature to work, the file needs to be uploaded to your WordPress site, for example using the WooCommerce <strong>Choose File</strong> option.</p>
						<p>As a security feature if the file is uploaded to your website server, it will be temporarily duplicated and that file used for the preview. If the file is on an external server, or isn't duplicated correctly, the normal download process will apply.</p>
						<p>As witht he dynamically created ZIP files for multiple file downloads, these temporary PDF files will be deleted every hour or so.</p>

						<?php $somdn_pdf = plugins_url( '/assets/images/pdf-viewer.png', dirname(__FILE__) ); ?>
						<div class="somdn-guide-img">
							<a href="<?php echo $somdn_pdf ; ?>" target="_blank"><img src="<?php echo $somdn_pdf ; ?>"></a>
						</div>

					</li>
				</ul>

			</div>

		</div>
	</div>

<?php

}

function somdn_support_settings() { ?>

	<div class="somdn-container">
		<div class="somdn-row">
		
			<div class="somdn-col-8 somdn-guide">
					
				<h2>General</h2>
				<ul>
					<li>
						<h3>Read More text</h3>
						<p>The text that displays on pages that list products, which link to the product page. This is only applicable to products affected by this plugin.</p>
						<p>If <em>Allow download on shop / archive pages</em> is enabled, it is recommended you leave blank, which will label the button with "Download". This is because the shop pages tend to have small buttons, so won't fit much text. If <em>PDF Viewer</em> is enabled, the button will use the text set in those settings.</p>
					</li>
					<li>
						<h3>Allow download on shop / archive pages</h3>
						<p>If you want to allow users to download files directly from your shop or archive pages, rather than only from the product page.</p>
					</li>
					<li>
						<h3>Only show the button to logged in users</h3>
						<p>If a user is not logged in, no free files will be downloadable. No message is displayed informing the user to log in to download for free. If users are not logged in to your site, the "Add to Cart" buttons will show.</p>
					</li>
					<li>
						<h3>Include paid items that are currently on sale for free</h3>
						<p>If you have a paid product that is on sale for free, it will be included by this plugin. This is not recommended if you use the "Redirect" WooCommerce download method.</p>
					</li>
					<li>
						<h3>Include selected products only</h3>
						<p>Tick this box if you want to pick which products are to be included, rather than all free downloadable products. You can choose if a product should be included on the product page, using the Download Now settings box on the right hand side (as below).</p>
						<?php $somdn_image_01 = plugins_url( '/assets/images/indy-product.png', dirname(__FILE__) ); ?>
						<div class="somdn-guide-img" style="text-align: left; padding-bottom: 5px;">
							<img src="<?php echo $somdn_image_01; ?>">
						</div>
					</li>
					<li>
						<h3>Button custom CSS</h3>
						<p>Apply custom CSS styles to the download button. For example:</p>
						<p><code>background-color: #333;</code></p>
						<p>Buttons should style automatically to match your current theme with the following classes:</p>
						<p><code>somdn-download-button single_add_to_cart_button button</code></p>
					</li>
					<li>
						<h3>Link custom CSS</h3>
						<p>Apply custom CSS styles to the download link. For example:</p>
						<p><code>font-size: 16px;</code></p>
						<p>Links should style automatically to match your current theme. The link also has the following CSS class:</p>
						<p><code>somdn-download-link</code></p>
					</li>
				</ul>
				
				<hr id="single">
				<div class="somdn-settings-spacer-sm"></div>
				
				<h2>Single Files</h2>
				<p class="description">Products that only have 1 file attached to them.</p>
				<ul>
					<li>
						<h3>Display method</h3>
						<p>How the download link will be displayed on the product page. Default is a Button. You can also select a Link.</p>
					</li>
					<li>
						<h3>Button text</h3>
						<p>What the text should be on the download button. Default is "Download Now". If a Link is the chosen display method, the download filename will be the text.</p>
					</li>
				</ul>

				<hr id="multiple">
				<div class="somdn-settings-spacer-sm"></div>

				<h2>Multiple Files</h2>
				<p class="description">Products that have more than 1 file attached to them.</p>
				<p class="description"><strong>Note: Any display method with a Button requires the download file be uploaded to this website, for example using the WooCommerce "Choose File" option when adding a downloadable product. External download links will not work. If you use external links for your files, leave the display method as Links Only, which is the default.</strong></p>
				<ul>
					<li>
						<h3>Display method</h3>
						<p>How the download link will be displayed on the product page. Default is <strong>Links Only</strong>.</p>
						<p class="description">The <a href="plugins.php<?php echo somdn_get_plugin_link_full(); ?>&tab=settings&section=multiple">multiple files</a> settings page shows a preview of each option.</p>
						<ol>
							<li>
								<h3>Links Only (default)</h3>
								<p>For each file available a link will be displayed. The filename entered into the product "Downloadable Files" section will be the link text.</p>
							</li>
							<li>
								<h3>Button Only (download all)</h3>
								<p>A single button will show which will download a dynamically created ZIP file for the user. The ZIP will contain all files for that product.</p>
							</li>
							<li>
								<h3>Button + Checkboxes</h3>
								<p>A list of all available files will show with checkboxes. A single button will display which will download a dynamically created ZIP file for the user. The ZIP will contain all files for that product that the user selected.</p>
							</li>
							<li>
								<h3>Button + Links</h3>
								<p>A list of all available files will show as individual links and the user can download an individual file. A button will also display which will download a dynamically created ZIP file for the user. The ZIP will contain all files for that product.</p>
							</li>
							<li>
								<h3>Button + Filenames</h3>
								<p>A list of all available files will be displayed as text. A button will display which will download a dynamically created ZIP file for the user. The ZIP will contain all files for that product.</p>
							</li>
						</ol>
					</li>
					<li>
						<h3>Button text</h3>
						<p>What the text should be on the download button. Default is "Download All (.ZIP)".</p>
					</li>
					<li>
						<h3>File list text</h3>
						<p>What the text should be above the list of available file links or filenames. Default is "Available Downloads:".</p>
					</li>
					<li>
						<h3>Show Select All box</h3>
						<p>If Button + Checkboxes is the chosen display method, tick this box if you want to include a Select All checkbox.</p>
					</li>
					<li>
						<h3>Show number next to filename</h3>
						<p>If the display method shows a list of links or filenames, tick this box if you want them to be numbered.</p>
					</li>
				</ul>

				<hr id="docs">
				<div class="somdn-settings-spacer-sm"></div>

				<h2>PDF Viewer</h2>
				
				<p class="description">PDF Viewer will only work for files attached to products that have the .pdf extension.</p>				

				<p>PDF Viewer applies to products that have only a single file attached, or for products with multiple files when your chosen display method includes links. Any other situation and the normal download process will apply.</p>

				<p>Although this feature makes use of the online Google Docs preview service, the file link will be viewable in the URL address bar for the PDF preview. However, in order to protect your files <strong>Download Now</strong> will create a duplicate of your original PDF file, and use that duplicate for the URL. Like the dynamically created ZIP files for multiple file downloads, these will be deleted from your server every hour.</p>

				<p class="description"><strong>Note: This duplication security feature will only work for files uploaded to this website, not external links. External files will be downloaded the usual way.</strong></p>

				<ul>
					<li>
						<h3>Enable PDF Viewer</h3>
						<p>Enable or disable this feature. Default is disabled.</p>
					</li>
					<li>
						<h3>Single file display</h3>
						<p>How the download link will be displayed on the product page. Default is a Button. You can also select a Link. Only applies to products with a single file.</p>
					</li>
					<li>
						<h3>Link/Button Text</h3>
						<p>What the text should be on the download button/link. Default is "Download Now". Only applies to products with a single file.</p>
					</li>
				</ul>

			</div>

		</div>
	</div>

<?php

}

function somdn_support_faq() { ?>

	<div class="somdn-container">
		<div class="somdn-row">
		
			<div class="somdn-col-7 somdn-guide">
					
				<h2>Frequently Asked Questions</h2>
				<ol>
					<li>
						<h3>How are files downloaded?</h3>
						<p>The short answer is the plugin uses a safe and secure form on the front-end which requests the file. A second round of security checks is performed, and if everything is ok the file is downloaded using the WooCommerce download script; as well as using the download method you set for WooCommerce <strong>(Force Downloads, X-Accel-Redirect/X-Sendfile, or Redirect)</strong>.</p>
					</li>
					<li>
						<h3>How are the dynamically created ZIP files handled?</h3>
						<p>The product files must have been uploaded to your WordPress site, for example using the WooCommerce <strong>Choose File</strong> option, otherwise the ZIP file will be empty. They will not be included if they are external links.</p>
						<p>Once created with either all the files for a product or a selection of the files, it is temporarily saved in a folder on your server. Every hour that folder is emptied. If you deactivate this plugin, that folder and its contents will be removed.</p>
						<p>If you use external file links it is recommended that you use the <strong>Links Only</strong> <a href="plugins.php<?php echo somdn_get_plugin_link_full(); ?>&tab=settings&section=multiple">display method</a>, if you have products with multiple files.</p>
					</li>
					<li>
						<h3>Are the full links to files visible to a user?</h3>
						<p>It depends on your WooCommerce settings.</p>
						<p>If you use the <strong>Force Downloads</strong> or <strong>X-Accel-Redirect/X-Sendfile</strong> download methods (found in the WooCommerce settings, Products, Downloadable Products) for your store downloading, the file paths and URLs will be hidden. If there are multiple files downloaded as a dynamically created ZIP file, regardless of setting, the URLs will be hidden.</p>
						<p>If you use the <strong>Redirect</strong> download method, the full URL may be visible for single files. For example, a PDF. This is the same as it would be without this plugin.</p>
						<p>If in doubt and you're worried test it yourself on your own site, or please don't hesitate to <a href="https://wordpress.org/support/plugin/download-now-for-woocommerce/" target="_blank">get in touch</a>.</p>
					</li>
					<li>
						<h3>Are WooCommerce Memberships and/or Subscriptions supported?</h3>
						<p>Yes, implicitly. The official Memberships and Subscriptions plugins from Woo are supported. If you have a free product that requires a user have a membership to purchase, that free product will only be available to download if the user is a member.</p>
					</li>
					<li>
						<h3>What other plugins are supported?</h3>
						<p><strong>Download Now</strong> should be compatible with most plugins. If you have a problem please get in touch and we will include support if possible.</p>
						<p>Below is a list of explicitly supported plugins:</p>
						<ul class="somdn-square-ul">
							<li>TI WooCommerce Wishlist</li>
						</ul>
					</li>
					<li>
						<h3>Where should files be hosted for the PDF Viewer to work?</h3>
						<p>It is recommended that the files are uploaded to your WordPress site, for example using the WooCommerce <strong>Choose File</strong> option. External links will only work for products with a single file attached.</p>
					</li>
				</ol>

			</div>

		</div>
	</div>

<?php

}

function somdn_support_more() { ?>

	<div class="somdn-container">
		<div class="somdn-row">
		
			<div class="somdn-col-12 somdn-guide">

				<h2>More Support</h2>
				<p>If you need further support please visit the support forum for this plugin over at <a href="https://wordpress.org/support/plugin/download-now-for-woocommerce/" target="_blank">WordPress.org</a>.</p>

			</div>

		</div>
	</div>

<?php

}