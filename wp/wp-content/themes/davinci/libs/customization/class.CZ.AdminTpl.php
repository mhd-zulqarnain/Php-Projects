<?php

/**
 * Author: Vitaly Kukin
 * Date: 24.09.2014
 * Time: 12:14
 * Description: Build the admin area
 */
class czAdminTpl extends czOptions
{
	/**
	 * Message
	 * @access private
	 * @var string
	 */
	public $message = "";
	/**
	 * The title of admin interface
	 * @access public
	 * @var string
	 */
	public $title;

	/**
	 * The icon of title
	 * @access public
	 * @var string
	 */
	public $icon;

	/**
	 * Description of admin page
	 * @access public
	 * @var string
	 */
	public $description;
	/**
	 * The current page of plugin
	 * @access private
	 * @var string
	 */
	public $current;

	public function __construct()
	{
		parent::__construct();
		$this->current = $this->currentItemMenu();
		if ( array_key_exists( $this->current, $this->listMenu() ) ) {
			$this->catch_request();
		}
	}

	/**
	 *    create template for admin page
	 */
	function createTpl( $content )
	{

		$this->header();

		echo $content;

		$this->footer();
	}

	/**
	 * show current template
	 * @return bool or show template
	 */
	function getTemplate()
	{

		$current = $this->current;
		$args    = $this->listMenu();

		if ( !isset( $args[ $current ][ 'tmp' ] ) ) {
			return false;
		}

		$cancel = false;

		foreach ( $args as $key => $val ) {

			if ( $cancel ) {
				continue;
			}

			if ( $key == $current ) {
				$this->title       = $val[ 'title' ];
				$this->description = $val[ 'description' ];
				$this->icon        = $val[ 'icon' ];

				$cancel = true;
			}

			if ( isset( $val[ 'submenu' ] ) ) {

				foreach ( $val[ 'submenu' ] as $skey => $sval ) {

					if ( $skey == $current ) {
						$this->title       = $sval[ 'title' ];
						$this->description = $sval[ 'description' ];
						$this->icon        = $val[ 'icon' ];

						$cancel = true;
					}
				}
			}
		}

		$method = $args[ $current ][ 'tmp' ];

		if ( method_exists( $this, $method ) or function_exists( $method ) ) {

			ob_start();

			$this->renderTmpl( $method );

			$content = ob_get_contents();

			ob_end_clean();

			$this->createTpl( $content );

			return true;
		}

		return false;
	}

	/**
	 * List Menu
	 * @return mixed|string
	 */
	public function currentItemMenu()
	{

		$page = isset( $_GET[ 'czpage' ] ) ? $_GET[ 'czpage' ] : '';

		if ( !$page ) {

			$list = $this->listMenu();
			$page = key( $list );
		}

		return $page;
	}

	/**
	 * Admin form before
	 */
	private function header()
	{
		?>
		<div class="cz-wrap">
		<?php $this->sidebar() ?>

		<div class="cz-page-content">
		<div class="cz-page-head">
			<h2><span class="fa fa-<?php echo $this->icon ?>"></span> <?php echo $this->title ?></h2>
			<div class="description"><?php echo $this->description ?></div>
		</div>
		<?php
	}

	/**
	 * Admin form after
	 */
	private function footer()
	{
		?>
		</div>
		</div>
		<?php
	}

	/**
	 * Additional sidebar
	 */
	private function sidebar()
	{
		?>
		<div id="cz-admin-sidebar-back"></div>
		<div id="cz-admin-sidebar-wrap">
			<?php echo $this->createMenu() ?>
		</div>
		<?php
	}

	/**
	 * Walker to list menu
	 */
	private function createMenu()
	{

		$current = $this->currentItemMenu();
		$items   = $this->listMenu();

		if ( count( $items ) == 0 ) return false;

		$return = "<ul>";

		foreach ( $items as $slug => $args ) {

			$sub_result  = $class = '';
			$sub_current = false;

			$class = $current == $slug ? 'item-active' : '';

			if ( count( $args[ 'submenu' ] ) > 0 ) {

				$sub_result = '<ul class="sub-item">';

				foreach ( $args[ 'submenu' ] as $sub_slug => $sub_args ) {

					$sub_class = ( $current == $sub_slug ) ? 'item-active' : '';

					if ( $current == $sub_slug ) $sub_current = true;

					$sub_result .= '<li><a href="' . admin_url( 'admin.php?page=customization&czpage=' . $sub_slug ) .
						'" class="' . $sub_class . '">' . $sub_args[ 'title' ] . '</a></li>';
				}
				$sub_result .= '</ul>';
			}

			if ( $sub_current ) $class = 'item-active';

			$return .= '<li class="' . $class . '"><a href="' . admin_url( 'admin.php?page=customization&czpage=' .
					$slug ) . '" class="' . $class . '"><span class="fa fa-' . $args[ 'icon' ] . '"></span> ' .
				$args[ 'title' ] . '</a>' . $sub_result . '</li>';
		}

		$return .= "</ul>";

		return $return;
	}

	/**
	 * List of admin menu
	 * @return array
	 */
	public function listMenu()
	{
		return array();
	}

	public function textField( $name = '', $args = array(), $layout = false )
	{

		$defaults = array(
			'label'       => '',
			'placeholder' => '',
			'id'          => '',
			'value'       => $this->{$name},
			'description' => '',
			'readonly'    => false,
			'class'       => 'large-text',
			'maxlength'   => '',
			'screen'      => '',
		);

		$args = wp_parse_args( $args, $defaults );

		$readonly = ( $args[ 'readonly' ] ) ? 'readonly="readonly"' : '';

		$result = '<div class="cz-main-field">';

		$args[ 'label' ] .= $args[ 'label' ] ? ':' : '';

		$result .= '<label for="' . $args[ 'id' ] . '">' . $args[ 'label' ] . '</label>';
		$result .= sprintf('<input id="%1$s" type="text" value="%2$s" name="%3$s" class="%4$s" %5$s>',
			$args[ 'id' ],
			htmlentities( $args[ 'value' ], ENT_QUOTES, "UTF-8" ),
			$name,
			$args[ 'class' ],
			$readonly
			);
		$result .= ' <p class="description">' . $args[ 'description' ] . '</p>';
		$result .= '</div>';
		if ( $args[ 'screen' ] ) {
			$result .= '<div class="cz-screen-field"><img src="' . $args[ 'screen' ] . '" alt=""></div>';
		}

		if ( $layout )
			echo $result;

		return $result;

	}

	public function textTextArea( $name = '', $args = array(), $layout = false )
	{

		$defaults = array(
			'label'       => '',
			'id'          => '',
			'value'       => $this->{$name},
			'description' => '',
			'readonly'    => false,
			'rows'        => 2,
			'class'       => 'large-text',
			'screen'      => ''
		);

		$args = wp_parse_args( $args, $defaults );

		$readonly = ( $args[ 'readonly' ] ) ? 'readonly="readonly"' : '';

		$result = '<div class="cz-main-field">';

		$args[ 'label' ] .= $args[ 'label' ] ? ':' : '';

		$result .= '<label for="' . $args[ 'id' ] . '">' . $args[ 'label' ] . '</label>';

		$result .= '<textarea rows="' . $args[ 'rows' ] . '" id="' . $args[ 'id' ] . '" class="' . $args[ 'class' ] . '" name="' . $name . '" ' . $readonly . '>' . $args[ 'value' ] . '</textarea>
				<p class="description">' . $args[ 'description' ] . '</p>
					    ';
		$result .= '</div>';

		if ( $args[ 'screen' ] ) {
			$result .= '<div class="cz-screen-field"><img src="' . $args[ 'screen' ] . '" alt=""></div>';
		}

		if ( $layout )
			echo $result;

		return $result;

	}

	public function tinymce( $name = '', $args = array(), $layout = false )
	{

		$defaults = array(
			'label'       => '',
			'id'          => '',
			'value'       => $this->{$name},
			'description' => '',
			'readonly'    => false,
			'rows'        => 20,
			'class'       => 'large-text',
			'screen'      => ''
		);

		$args = wp_parse_args( $args, $defaults );

		$readonly = ( $args[ 'readonly' ] ) ? 'readonly="readonly"' : '';

		ob_start();

		$args[ 'id' ] = $args[ 'id' ] ? $args[ 'id' ] : $name;

		wp_editor( $args[ 'value' ], $args[ 'id' ], array(
			'wpautop'          => 1,
			'media_buttons'    => 1,
			'textarea_name'    => $name,
			'textarea_rows'    => $args[ 'rows' ],
			'tabindex'         => null,
			'editor_css'       => '',
			'editor_class'     => $args[ 'class' ],
			'teeny'            => 0,
			'dfw'              => 0,
			'tinymce'          => 1,
			'quicktags'        => 1,
			'drag_drop_upload' => true
		) );

		$wp_editor = ob_get_contents();

		ob_end_clean();

		$result = '<div class="cz-main-field">';

		$args[ 'label' ] .= $args[ 'label' ] ? ':' : '';

		$result .= '<label for="' . $args[ 'id' ] . '">' . $args[ 'label' ] . '</label>';

		$result .= '<p class="description">' . $args[ 'description' ] . '</p>';
		$result .= $wp_editor;
		$result .= '</div>';

		if ( $args[ 'screen' ] ) {
			$result .= '<div class="cz-screen-field"><img src="' . $args[ 'screen' ] . '" alt=""></div>';
		}

		if ( $layout )
			echo $result;

		return $result;

	}

	public function uploadImgField( $name = '', $args = array(), $layout = false )
	{

		$defaults = array(
			'label'       => '',
			'id'          => '',
			'value'       => $this->{$name},
			'description' => '',
			'readonly'    => false,
			'class'       => '',
			'width'       => '',
			'height'      => '',
			'screen'      => '',
			'align'       => 'left'
		);

		$args = wp_parse_args( $args, $defaults );

		$default = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAOwSURBVHja7JvRcdNAEIZ/MXlHHSAqQFQQuYI4FWAqgFTgpAJCBXEqwB1gKoipIKICQgXHAyey7NzJCrGxgr9/5ka2bi0r+m5v9/acIoQgNB494xEABAEEIAggAEEAAQgCCEAQQBBAAIIAAhAEEIAggAAEAQQBBCAIIABBAAEIAghAEEAQQACCAAIQtD0d7fsGiqLo655JeiHpm6SF65vH47WkNvG5Y0lVfL/K2Gl0/0EWQthr26DPkkJstb/12BpzrpR0Y/p8m43t7/ftKU1ZHwbYfIrg7iSdS5pIOo0eIklXDuD49IQ8xI9w7yHTHm/qYIV4TTxki15SZvqOTbxYJ/ov4rHpuQZZ1kAt4jRUmmDuVRsgKa0TtgD5S7WSLuPr92N+oIe0DrkwaWsqwN/FY5X5fJWwBcgj9dbEAa8vJrinYsTUwFgDZDtaSVpm+pYmzvjg35jYs2DK2q7OMlNOG/u6lfptTHFv4rGMnnEBkN0F+FQ2dhptyugZtembjDl+SFKx71rOhlrWY1S5WlZ2YQyQfwNkcKWCKQsBBCAIIABBW9fOt3CLoii7tUAIYRXP1W4lvdaftajKrTvaxKWbDf1WtaQT8/6LT4XtffZoHULY7TrmH2xANYobR+ac33hqzC3NXV+q3D41/Tcb1iL+u+zn6tR99rRm18/raCSeemxGbDPA/sSN/irhJWV86GX0vmW0qWJppdavXcSXievnFpK7X+Xv2UO6HyTYbdXg+uaJB93Z3PZ40ZWxKRPT3e9t4dx9HuIW7tqMcntse0bjzIzihTuXsksVI1f6VcqfhBAWBxXUN6g100htpquV8htN7+LxOtqdR9smM+0tM9dZ9CQinzMB/ewQ0l7rJa/i668Z28aA6mJCB+HNgO/yCUMoimKe+R7f6kPwkA7INAb2xpw7Sdi+MR5UG9smXqObnu5czHloMJ7sJaCPIKjPTf+tGbnexgfzIb9M/K7MrxX99Qnq6RSz2pByTs1IXbnWJtLhpZmmqkSmVh3kSv0B01btYkoumC90v1VrYX2Kx25Ncmbe37h1yNSkwj8GBnVJut51VjZGIF8zpY+u/2Oi3z/sy+hJr3X/e95ZIsP7GEK47CnLDF0wbq/UtOsdsw21LJv2Vq6uZW2GTGm1CeDrRF8j6bmvZXV//8BaVhtCaJ80EPT01iEIIABBAAEIAghAEEAAggCCAAIQBBCAIIAABAEEIAggCCAAQQABCAIIQBBAAIIAggACEAQQgCCA/Df6OQBwPL9lwL3p8AAAAABJRU5ErkJggg==';
		if ( $args[ 'value' ] ) {
			$image_attributes = wp_get_attachment_image_src( $args[ 'value' ], array( $args[ 'width' ], $args[ 'height' ] ) );
			if ( $image_attributes ) {
				$src = $args[ 'value' ] = $image_attributes[ 0 ];


			} else {
				$src = $args[ 'value' ];
			}

		} else {
			$src = $default;
		}
		$src = ads_is_url( $src ) ? $src : $default;

		$result = '<div class="cz-main-field" align="' . $args[ 'align' ] . '">';
		$result .= '<label for="' . $args[ 'id' ] . '">' . $args[ 'label' ] . ' (' . __( 'size:', 'ami3' ) . ' ' . $args[ 'width' ] . 'x' . $args[ 'height' ] . '):</label>';
		$result .= '<p class="description">' . $args[ 'description' ] . '</p>';
		$result .= '<div class="select-img">
							<img style="margin-bottom: 20px;max-width: 100%;height: auto;" data-src="' . $default . '" src=\'' . $src . '\' />
							<div>
								<input type="hidden" name="' . $name . '" id="' . $name . '" value=\'' . $args[ 'value' ] . '\' style="width: 100%;margin-bottom: 20px;"/>
								<button type="submit" class="btn btn-upload  cz_upload_file">' . __( 'Upload', 'ami3' ) . '</button>
								<button type="submit" class="btn btn-remove cz_remove_file">&times;</button>
							</div>
						</div>';
		$result .= '</div>';
		if ( $args[ 'screen' ] ) {
			$result .= '<div class="cz-screen-field"><img src="' . $args[ 'screen' ] . '" alt=""></div>';
		}

		if ( $layout )
			echo $result;

		return $result;

	}

	public function colorField( $name = '', $args = array(), $layout = false )
	{

		$defaults = array(
			'label'       => '',
			'placeholder' => '',
			'id'          => '',
			'value'       => $this->{$name},
			'description' => '',
			'readonly'    => false,
			'class'       => 'large-text',
			'maxlength'   => '',
			'screen'      => '',
			'inline'      => true
		);

		$args = wp_parse_args( $args, $defaults );

		$readonly = ( $args[ 'readonly' ] ) ? 'readonly="readonly"' : '';

		$result = '<tr valign="top">
					    <th scope="row">
						    <label for="' . $args[ 'id' ] . '">' . $args[ 'label' ] . ':</label>
					    </th>
					    <td>
						    <input id="' . $args[ 'id' ] . '" type="text" value=\'' . $args[ 'value' ] . '\' name="' . $name . '" class="cz_color ' . $args[ 'class' ] . '" ' . $readonly . '>
						    <p class="description">' . $args[ 'description' ] . '</p>
					    </td>
				    </tr>';


		$inline = $args[ 'inline' ] ? 'inline' : '';

		$result = '<div class="cz-main-field">';
		$result .= '<label class="' . $inline . '" for="' . $args[ 'id' ] . '">' . $args[ 'label' ] . ':</label>
						<input id="' . $args[ 'id' ] . '" type="text" value=\'' . $args[ 'value' ] . '\' name="' . $name . '" class="cz_color ' . $args[ 'class' ] . '" ' . $readonly . '>';
		if ( $args[ 'description' ] )
			$result .= '<p class="description">' . $args[ 'description' ] . '</p>';
		$result .= '</div>';
		if ( $args[ 'screen' ] ) {
			$result .= '<div class="cz-screen-field"><img src="' . $args[ 'screen' ] . '" alt=""></div>';
		}

		if ( $layout )
			echo $result;

		return $result;

	}

	public function Button( $name = '', $args = array(), $layout = false )
	{

		$defaults = array(
			'label'       => '',
			'id'          => '',
			'value'       => $this->{$name},
			'description' => '',
			'readonly'    => false,
			'rows'        => 2,
			'class'       => 'large-text',
			'text'        => '',
			'screen'      => '',
			'inline'      => true
		);

		$args = wp_parse_args( $args, $defaults );

		$inline = $args[ 'inline' ] ? 'inline' : '';

		$result = '<div class="cz-main-field">';
		$result .= '<label class="' . $inline . '" for="' . $args[ 'id' ] . '">' . $args[ 'label' ] . ':</label>
						<button class="btn btn-blue" name="' . $name . '" value="' . $args[ 'value' ] . '">' . $args[ 'text' ] . '</button>';
		if ( $args[ 'description' ] )
			$result .= '<p class="description">' . $args[ 'description' ] . '</p>';
		$result .= '</div>';
		if ( $args[ 'screen' ] ) {
			$result .= '<div class="cz-screen-field"><img src="' . $args[ 'screen' ] . '" alt=""></div>';
		}

		if ( $layout )
			echo $result;

		return $result;

	}

	public function checkboxField( $name = '', $args = array(), $layout = false )
	{

		$defaults = array(
			'label'       => '',
			'id'          => '',
			'value'       => $this->{$name},
			'description' => '',
			'readonly'    => false,
			'rows'        => 2,
			'class'       => '',
			'screen'      => '',
			'inline'      => true
		);

		$args    = wp_parse_args( $args, $defaults );
		$checked = $args[ 'value' ] ? 'checked' : '';

		$inline = $args[ 'inline' ] ? 'inline' : '';

		$result = '<div class="cz-main-field">';
		$result .= '<label class="' . $inline . '" for="' . $args[ 'id' ] . '">' . $args[ 'label' ] . ':</label>
						<input type="hidden" name="' . $name . '"  value=""/>
					    <input type="checkbox" name="' . $name . '"  ' . $checked . '/>';

		if ( $args[ 'description' ] )
			$result .= '<p class="description">' . $args[ 'description' ] . '</p>';
		$result .= '</div>';

		if ( $args[ 'screen' ] ) {
			$result .= '<div class="cz-screen-field"><img src="' . $args[ 'screen' ] . '" alt=""></div>';
		}

		if ( $layout )
			echo $result;

		return $result;

	}

	public function dropDownField( $name = '', $args = array(), $layout = true )
	{

		$defaults = array(
			'label'       => '',
			'selected'    => '',
			'id'          => '',
			'value'       => $this->{$name} ? $this->{$name} : array(),
			'description' => '',
			'readonly'    => false,
			'class'       => 'large-select',
		);

		$args = wp_parse_args( $args, $defaults );

		$readonly = ( $args[ 'readonly' ] ) ? 'readonly="readonly"' : '';

		$result = '<tr valign="top">
					    <th scope="row">
						    <label for="' . $args[ 'id' ] . '">' . $args[ 'label' ] . ':</label>
					    </th>
					    <td>
						    <select id="' . $args[ 'id' ] . '" name="' . $name . '" class="' . $args[ 'class' ] . '" ' . $readonly . '>';

		if ( count( $args[ 'value' ] ) )
			foreach ( $args[ 'value' ] as $key => $val ) {

				$selected = $key == $args[ 'selected' ] ? 'selected="selected"' : '';

				$result .= '<option value=\'' . $key . '\' ' . $selected . '>' . $val . '</option>';
			}

		$result .= '</select>
		            <p class="description">' . $args[ 'description' ] . '</p>
					    </td>
				    </tr>';

		if ( $layout )
			echo $result;

		return $result;

	}

	/*
	 * settings fields
	 * */
	public function Title( $text = '', $args = array() )
	{

		$defaults = array(
			'text'    => $text,
			'id'      => '',
			'rows'    => 2,
			'class'   => '',
			'colspan' => 2,

		);

		$args = wp_parse_args( $args, $defaults );

		$result = '<tr valign="top">
					    <td scope="row" colspan="' . $args[ 'colspan' ] . '">
						    <h2 class="' . $args[ 'class' ] . '">' . $args[ 'text' ] . '</h2>
					    </td>
				    </tr>';

		echo $result;
	}

	public function Line( $args = array(), $layout = false )
	{

		$defaults = array(
			'type'    => 'solid',
			'color'   => '#eee',
			'id'      => '',
			'rows'    => 2,
			'class'   => '',
			'colspan' => 2,

		);

		$args = wp_parse_args( $args, $defaults );

		$result = '<hr style="border-top: 1px ' . $args[ 'type' ] . ' ' . $args[ 'color' ] . ';">';

		if ( $layout )
			echo $result;

		return $result;
	}

	public function row( $fields = array(), $args = array(), $layout = false )
	{
		if ( !$fields ) return;

		if ( !is_array( $fields ) )
			$fields = array( $fields );

		$defaults = array(
			'class' => ''
		);

		$args = wp_parse_args( $args, $defaults );

		$width = round( 100 / count( $fields ), 6 );

		$result = '<table><tr valign="top" class="row ' . $args[ 'class' ] . '">';

		foreach ( $fields as $field ) {
			$result .= '<td width="' . $width . '%">';
			$result .= $field;
			$result .= '</td>';
		}

		$result .= '</tr></table>';

		if ( $layout )
			echo $result;

		return $result;
	}

	public function col( $fields = array(), $args = array(), $layout = false )
	{
		if ( !$fields ) return;

		if ( !is_array( $fields ) )
			$fields = array( $fields );

		$defaults = array(
			'class' => ''
		);

		$args = wp_parse_args( $args, $defaults );


		$result = '<table><tr valign="top" class="row ' . $args[ 'class' ] . '"><td width="100%">';
		foreach ( $fields as $field ) {
			$result .= '<div>';
			$result .= $field;
			$result .= '</div>';
		}

		$result .= '</td></tr></table>';

		if ( $layout )
			echo $result;

		return $result;
	}

	public function block( $rows = array(), $args = array(), $layout = true )
	{
		if ( !$rows ) return;

		if ( !is_array( $rows ) )
			$rows = array( $rows );

		$defaults = array(
			'class' => '',
			'title' => ''
		);

		$args   = wp_parse_args( $args, $defaults );
		$result = '';

		$result .= '<tr valign="top">';
		$result .= '<td><div class="block ' . $args[ 'class' ] . '"> ';
		if ( !empty( $args[ 'title' ] ) ) {
			$result .= '<h2 class="block-title">' . $args[ 'title' ] . '</h2>';
		}
		$result .= '<table><tr><td>';


		foreach ( $rows as $row ) {
			$result .= $row;
		}

		$result .= '</tr></td></table></div></td></tr>';

		if ( $layout )
			echo $result;

		return $result;
	}

	//TODO в разработке
	public function tabs( $tabs = array(), $args = array(), $layout = true )
	{
		if ( !$tabs ) return;

		if ( !is_array( $tabs ) )
			$tabs = array( $tabs );

		$defaults = array(
			'class' => '',
			'title' => ''
		);

		$args   = wp_parse_args( $args, $defaults );
		$result = '';

		$result .= '<tr valign="top">';
		$result .= '<td><div class="block ' . $args[ 'class' ] . '"> ';
		if ( !empty( $args[ 'title' ] ) ) {
			$result .= '<h2 class="block-title">' . $args[ 'title' ] . '</h2>';
		}
		$result .= '<table><tr><td>';


		foreach ( $tabs as $tab ) {
			$result .= $tab;
		}

		$result .= '</tr></td></table></div></td></tr>';

		if ( $layout )
			echo $result;

		return $result;
	}

	function renderTmpl( $method )
	{

		echo $this->message;
		?>
		<div class="cz-content-inner">
			<form action="" method="POST">
				<?php
				wp_nonce_field( 'cz_setting_action', 'cz_setting' ); ?>
				<table class="cz-content-table">
					<?php
					if ( method_exists( $this, $method ) )
						$this->$method();
					else
						$method();
					?>
				</table>
				<button class="btn btn-save"><?php _e( 'Save Settings', 'ami3' ) ?></button>
				<button class="btn btn-default" name="default"><?php _e( 'Default', 'ami3' ) ?></button>
			</form>
		</div>
		<?php
	}

	/*
	 * success
	 * warning
	 * danger
	 * info
	 * */
	public function setMessage( $ms, $status = 0 )
	{

		$stat   = array( 'success', 'warning', 'danger', 'info' );
		$status = $stat[ $status ];

		$this->message = '<div data-example-id="dismissible-alert-js">
  <div class="cz-message alert alert-' . $status . ' alert-dismissible fade in" role="alert">
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">×</span></button>
    <h4>' . $ms . '</h4></div> </div>';

	}


	public function __set( $name, $value )
	{
		if ( array_key_exists( $name, $this->get_defaults() ) ) {
			$this->data[ $name ] = htmlentities( $value, ENT_QUOTES, "UTF-8" );
		} else {
			throw new \Exception( 'Setting unknown property:' . $name );
		}
	}

	public function save() {

		$defaults = $this->get_defaults();

		$data = $this->_parse_args( $this->data, $defaults );

		$data = $this->filterSave($data);

		return update_option( $this->field_options, $data );
	}

	private function filterSave( $data ){
		if ( is_array( $data ) ) {
			foreach ( $data as $k => $v ) {
				$data[ $k ] = $this->filterSave( $v );
			}
		} else {
			$data = preg_replace('/^http(s)?:(\/\/.*\.\w+$)/', '$2', $data );
		}

		return $data;
	}

	/**
	 *    Catch request from form
	 */
	public function catch_request()
	{

		if ( isset( $_POST[ 'cz_setting' ] ) && wp_verify_nonce( $_POST[ 'cz_setting' ], 'cz_setting_action' ) ) {
			$options = $this->get_defaults();

			foreach ( $options as $k => $v ) {
				if ( isset( $_POST[ $k ] ) )
					$this->$k = isset( $_POST[ 'default' ] ) ? $v : $this->clearData( $_POST[ $k ] );
			}

			if ( $this->save() ) {
				$this->setMessage(__( 'The сhanges have been saved', 'ami3' ));
			} else {
				$this->setMessage(__( 'No changes have been made', 'ami3'), 1);
			}

		}
	}

	private function clearData( $str )
	{
		$str = trim( $str );

		return $str;
	}
}