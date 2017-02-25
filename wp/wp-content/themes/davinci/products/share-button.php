<?php
/**
 * Author: Vitaly Kukin
 * Date: 21.07.2015
 * Time: 16:17
 */
?>

<div class="share-button">
    <ul>
        <li><a href="#"><span class="ic ic-fb" data-social="facebook" data-appid="<?php echo cz('s_fb_apiid'); ?>"></span></a></li>
        <li><a data-pin-do="buttonBookmark" data-pin-custom="true" data-pin-color="red"
               href="//www.pinterest.com/pin/create/button/">
                <img src="<?php echo get_template_directory_uri(); ?>/img/main/pinterest.png?1000" height="22"/></a></li>
        <li><a href="#"><span class="ic ic-tw" data-social="twitter" data-appid=""></span></a></li>
        <li><a href="#"><span class="ic ic-gl" data-social="google" data-appid=""></span></a></li>
    </ul>

    <div id="social-alert" style="display:none"></div>
</div>

<script async defer src="//assets.pinterest.com/js/pinit.js"></script>