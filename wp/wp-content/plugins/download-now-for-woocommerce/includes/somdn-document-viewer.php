<?php
/**
 * DOWNLOAD NOW - WooCommerce - Document Viewer
 * 
 * Displays documents such as .pdf files.
 * 
 * @version	2.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

<link rel="stylesheet" id="theme-styles"  href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />

<style type="text/css">
	html {height: 100%;}
	body {height: 100%;}
</style>
<style type="text/css" media="print">
	body *{ display: none;!important }
	iframe { display:block; width: 100%; height: 100%; }
</style>

<script type="text/javascript">
	function print_pdf() {
		var PDF = document.getElementById('somdn-pdf-vis'); PDF.focus(); PDF.contentWindow.print();
	}
</script>

</head>
<body>

	<button class="button woocommerce-Button" onclick="print_pdf()">Print</button>
	<button class="button woocommerce-Button" id="fileRequest">Download!</button>
	<div>
	</div>
	<div id="somdn-doc-wrap" style="position: relative; width:100%; height:100%;">
		<iframe id="somdn-pdf" src="<?php echo $file; ?>" style="width:0; height:0; position: absolute; left: -99999px;" frameborder="0" seamless=""></iframe>
		<iframe id="somdn-pdf-vis" src="<?php echo $google_path; ?>" style="width:100%; height:100%;" frameborder="0" seamless=""></iframe>
		<div style="width: 80px; height: 80px; position: absolute; opacity: 0; right: 0px; top: 0px;">&nbsp;</div>
	</div>

<script type"text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/jquery/jquery-migrate.min.js"></script>

</body>
