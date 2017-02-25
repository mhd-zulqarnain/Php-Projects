<?php
/**
 * Author: Vitaly Kukin
 * Date: 21.07.2015
 * Time: 14:09
 */
?>

<!-- COUNTDOWN -->
<?php if(cz('countdown')): ?>
<div class="content-countdown hidden-xs">
    <div class="container">
        <div class="top-plate clearfix">
            <div class="text text-center text-uppercase">
                    <?php _e(cz('countdown_text'), 'ami3');?>
            </div>
            <div id="clock" data-time="<?php dav_clock_time(); ?>"></div>
            <div id="clock-template" style="display: none;">
                <div class="clock text-center">
                    <div class="item">%D<span><?php _e('D', 'ami3');?></span></div>
                    <div class="item">%H<span><?php _e('H', 'ami3');?></span></div>
                    <div class="item">%M<span><?php _e('M', 'ami3');?></span></div>
                    <div class="item">%S<span><?php _e('S', 'ami3');?></span></div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php endif; ?>