<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 25.01.2016
 * Time: 17:16
 */
?>
<?php

class blogMeta
{
	static  $name_options = 'blog_options';

	private $post_id;
	private $data         = array();

	static public function save_blog_meta_fields( $post_id )
	{

		$nonce = isset( $_POST[ 'custom_meta_blog_nonce' ]) ? $_POST[ 'custom_meta_blog_nonce' ]:null;
		if ( !wp_verify_nonce( $nonce, basename( __FILE__ ) ) ) {
			return $post_id;
		}
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		if ( 'page' == $_POST[ 'post_type' ] ) {
			if ( !current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}

		$img   = isset( $_POST[ 'blog-item-img' ] ) ? $_POST[ 'blog-item-img' ] : array();
		$title = isset( $_POST[ 'blog-item-title' ] ) ? $_POST[ 'blog-item-title' ] : array();
		$desc  = isset( $_POST[ 'blog-item-desc' ] ) ? $_POST[ 'blog-item-desc' ] : array();
		$new   = array();
		if ( count( $img ) ) {
			foreach ( $img as $k => $v ) {
				$new[] = array(
					'img'   => (int)$img[ $k ],
					'title' => $title[ $k ],
					'desc'  => $desc[ $k ]
				);
			}
		}
		update_post_meta( $post_id, self::$name_options, $new );
	}

	public function __construct()
	{
		global $post;

		if ( !current_user_can( 'publish_posts' ) ) {
			return;
		}

		wp_enqueue_script( 'blog-script', get_template_directory_uri() . '/libs/blog/js/script.js', array( 'jquery' ) );
		wp_enqueue_style( 'blog-style', get_template_directory_uri() . '/libs/blog/css/style.css', true );

		$this->post_id = $post->ID;

		$this->data = get_post_meta( $this->post_id, self::$name_options, true );
		$this->data = !empty($this->data)?$this->data:array();
		$this->show_blog_meta_box();
	}

	public function show_blog_meta_box()
	{
		$k = 0;
		echo '<input type="hidden" name="custom_meta_blog_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';
		echo '<table class="blog-item-main">';
		echo '<tbody>';

		if ( count( $this->data ) ) {
			foreach ( $this->data as $k => $item ) {
				$this->showFind( $item, $k );
			}
		}
		echo '</tbody>';
		echo '</table>';
		echo '<div><button class="add-blog-item" data-key="',$k,'">+</button></div>';
	}

	static public function showFind( $item, $k )
	{
		echo '<tr>
                <th><button class="blog-item-remote">&times;</button></th>
                <td>';
		self::showItem( $item, $k );
		echo '</td></tr>';
	}

	static public function item_blog(){

		$k = isset($_POST['key'])?(int)$_POST['key']:0;
		$item = array(
			'img'   => self::getImgAttachment(),
			'title' => '',
			'desc'  => ''
		);
		self::showFind( $item, $k );
		//echo '<textarea  id="blog-item-title-',$k,'"></textarea>';
		//echo '<textarea  id="blog-item-desc-',$k,'"></textarea>';
	}

	static public function showItem( $item, $k )
	{
		$srcImg = self::getImgAttachment( $item[ 'img' ] );
		echo '<div class="product_blog data-key="' . $k . '">';
		echo '<div class="product_blog_img">
				<input type="hidden" name="blog-item-img[]" value="' . $item[ 'img' ] . '"><img src="' . $srcImg . '" alt="" /></div>';
		echo '<div class="product_blog_content"><h3>' . __('Title', 'ami3') . '</h3>';
		wp_editor( $item[ 'title' ], 'blog-item-title-' . $k, array(
			'wpautop'          => 1,
			'media_buttons'    => 1,
			'textarea_name'    => 'blog-item-title[]',
			'textarea_rows'    => 3,
			'tabindex'         => null,
			'editor_css'       => '',
			'editor_class'     => '',
			'teeny'            => 1,
			'dfw'              => 0,
			'tinymce'          => 1,
			'quicktags'        => 1,
			'drag_drop_upload' => false
		) );
		echo '<h3>' . __('Description', 'ami3') . '</h3>';
		wp_editor( $item[ 'desc' ], 'blog-item-desc-' . $k, array(
			'wpautop'          => 1,
			'media_buttons'    => 1,
			'textarea_name'    => 'blog-item-desc[]',
			'textarea_rows'    => 5,
			'tabindex'         => null,
			'editor_css'       => '',
			'editor_class'     => '',
			'teeny'            => 1,
			'dfw'              => 0,
			'tinymce'          => 1,
			'quicktags'        => 1,
			'drag_drop_upload' => false
		) );

		echo '</div>';
		echo '</div>';

	}

	static function getImgAttachment( $id = 0)
	{
		$default = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAOwSURBVHja7JvRcdNAEIZ/MXlHHSAqQFQQuYI4FWAqgFTgpAJCBXEqwB1gKoipIKICQgXHAyey7NzJCrGxgr9/5ka2bi0r+m5v9/acIoQgNB494xEABAEEIAggAEEAAQgCCEAQQBBAAIIAAhAEEIAggAAEAQQBBCAIIABBAAEIAghAEEAQQACCAAIQtD0d7fsGiqLo655JeiHpm6SF65vH47WkNvG5Y0lVfL/K2Gl0/0EWQthr26DPkkJstb/12BpzrpR0Y/p8m43t7/ftKU1ZHwbYfIrg7iSdS5pIOo0eIklXDuD49IQ8xI9w7yHTHm/qYIV4TTxki15SZvqOTbxYJ/ov4rHpuQZZ1kAt4jRUmmDuVRsgKa0TtgD5S7WSLuPr92N+oIe0DrkwaWsqwN/FY5X5fJWwBcgj9dbEAa8vJrinYsTUwFgDZDtaSVpm+pYmzvjg35jYs2DK2q7OMlNOG/u6lfptTHFv4rGMnnEBkN0F+FQ2dhptyugZtembjDl+SFKx71rOhlrWY1S5WlZ2YQyQfwNkcKWCKQsBBCAIIABBW9fOt3CLoii7tUAIYRXP1W4lvdaftajKrTvaxKWbDf1WtaQT8/6LT4XtffZoHULY7TrmH2xANYobR+ac33hqzC3NXV+q3D41/Tcb1iL+u+zn6tR99rRm18/raCSeemxGbDPA/sSN/irhJWV86GX0vmW0qWJppdavXcSXievnFpK7X+Xv2UO6HyTYbdXg+uaJB93Z3PZ40ZWxKRPT3e9t4dx9HuIW7tqMcntse0bjzIzihTuXsksVI1f6VcqfhBAWBxXUN6g100htpquV8htN7+LxOtqdR9smM+0tM9dZ9CQinzMB/ewQ0l7rJa/i668Z28aA6mJCB+HNgO/yCUMoimKe+R7f6kPwkA7INAb2xpw7Sdi+MR5UG9smXqObnu5czHloMJ7sJaCPIKjPTf+tGbnexgfzIb9M/K7MrxX99Qnq6RSz2pByTs1IXbnWJtLhpZmmqkSmVh3kSv0B01btYkoumC90v1VrYX2Kx25Ncmbe37h1yNSkwj8GBnVJut51VjZGIF8zpY+u/2Oi3z/sy+hJr3X/e95ZIsP7GEK47CnLDF0wbq/UtOsdsw21LJv2Vq6uZW2GTGm1CeDrRF8j6bmvZXV//8BaVhtCaJ80EPT01iEIIABBAAEIAghAEEAAggCCAAIQBBCAIIAABAEEIAggCCAAQQABCAIIQBBAAIIAggACEAQQgCCA/Df6OQBwPL9lwL3p8AAAAABJRU5ErkJggg==';

		$image_attributes = wp_get_attachment_image_src( $id, array( 185, 185 ) );
		if ( $image_attributes ) {
			$src = $image_attributes[ 0 ];


		} else {
			$src = $default;
		}

		return $src;
	}

}


function cz_metabox_blog()
{
	$cat = get_the_category();

	foreach ( $cat as $k => $v )
		if ( $v->category_nicename == 'blog' ){

			add_meta_box(
				'blog_meta_box', //
				'Blog Meta Box', //
				create_function( '', '$settings_blog = new blogMeta();' ),
				'post',
				'normal',
				'high' );
		}
}

add_action( 'add_meta_boxes', 'cz_metabox_blog' );
add_action( 'save_post', array( 'blogMeta', 'save_blog_meta_fields' ) );
add_action( 'wp_ajax_item_blog', array('blogMeta', 'item_blog') );
