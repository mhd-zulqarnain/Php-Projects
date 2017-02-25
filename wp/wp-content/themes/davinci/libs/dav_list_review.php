<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 03.06.2016
 * Time: 15:18
 */

function dav_list_review( $comment, $args, $depth ) {
    $images = get_comment_meta($comment->comment_ID, 'images', true);//maybe_unserialize();
    $size = 'ads-thumb';
    $gallery = \ads\adsPost::get_gallery($images, $size);

    if (!$gallery) {
        $gallery = array();
    }

	?>
			<tr itemscope itemtype="http://schema.org/Review" <?php comment_class('feedback-one'); ?> id="li-comment-<?php comment_ID() ?>">
				<td class="b-review_table__star-text" itemprop="author" itemscope itemtype="http://schema.org/Person">
					<?php printf( '<b itemprop="name">%1$s</b>', $comment->comment_author); ?>
					<?php if($comment->flag AND cz('tp_comment_flag')){
						printf( '<img src="%1$s"/>',  pachFlag( $comment->flag ) . '?1000' );
					} ?>
					<div class="b-review_table__star--info">
						<?php printf( '<img class="img-responsive" src="%1$s"/>',  get_template_directory_uri() . '/img/main/vp.gif?1000' ); ?>
					</div>

				</td>
				<td class="b-review_table__star-text">
					<span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing">
					<meta itemprop="name" content="<?php the_title(); ?>"/>
					</span>

					<div class="stars_mini" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
						<meta itemprop="ratingValue" content="<?php echo $comment->star; ?>"/>
						<meta itemprop="bestRating" content="5.0"/>
						<?php  adsFeedBackTM::renderStarRating( $comment->star ); ?>
					</div>
				</td>
                <td class="b-review_table__date" itemprop="reviewBody">
					<?php
					printf( '<div class="date">%1$s</div><p >%2$s</p>', date_i18n( 'j M Y H:i', strtotime( $comment->comment_date ) ), $comment->comment_content ); ?>
	                <div class="gallery">
		                <?php foreach ($gallery as $image):?>
			                <a href="<?php echo $image['url']?>">
				                <img src="<?php echo $image[$size];?>" >
			                </a>
		                <?php endforeach; ?>
	                </div>
				</td>
			</tr>
	<?php
}

