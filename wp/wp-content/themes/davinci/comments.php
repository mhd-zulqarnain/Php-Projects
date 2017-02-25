<?php
/**
 * Created by PhpStorm.
 * User: Vitaly
 * Date: 20.07.2015
 * Time: 12:36
 */
?>
<?php if (comments_open()): ?>
    <div class="inner-box-comment-form">
		<?php dav_comment_form();?>
    </div>

    <div class="inner-box">
        <div class="controls">

            <?php

            $count_comments = wp_count_comments( $post->ID );
            $count_comments = $count_comments->approved;

            echo "<h2 class='count-comments'>";
                comments_number(
                    __('No Reviews', 'ami3'),
                    __('One Review', 'ami3'),
                    __('%s Reviews', 'ami3') );
            echo "</h2>";

        ?>

    </div>
    <ul class="all-com">
        <?php wp_list_comments( 'type=comment&callback=dav_list_comment&reverse_top_level=0' ); ?>
    </ul>
</div>

<?php endif; ?>