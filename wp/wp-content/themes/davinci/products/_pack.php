<?php
global $product;
$pack = $product['pack'];

if (cz('tp_pack') && $pack ) : ?>
	<h2 class="colored text-uppercase"><?php _e( 'Packaging Details', 'ami3' ) ?></h2>
	<div class="row packing">
		<div class="col-xs-20 text-right">
			<b><?php _e( 'Type', 'ami3' ) ?>:</b>&nbsp;
		</div>
		<div class="col-xs-40">&nbsp;<?php echo $pack[ 'type' ] ?></div>
	</div>
	<div class="row packing">
		<div class="col-xs-20 text-right">
			<b><?php _e( 'Weight', 'ami3' ) ?>:</b>&nbsp;
		</div>
		<div class="col-xs-40"><?php echo $pack[ 'weight' ] ?></div>
	</div>
	<div class="row packing">
		<div class="col-xs-20 text-right">
			<b><?php _e( 'Size', 'ami3' ) ?>:</b>&nbsp;
		</div>
		<div class="col-xs-40"><?php echo $pack[ 'size' ];?></div>
	</div>
<?php endif; ?>