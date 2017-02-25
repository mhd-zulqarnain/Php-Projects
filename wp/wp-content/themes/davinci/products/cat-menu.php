
<div class="hidden-xs">
<?php
$class = cz('tp_menu_close') ? 'custom_close':'';
echo "<ul id='category-list' class='".$class."'>";
$product_cat_menu = wp_list_categories( array(
	'taxonomy' => 'product_cat',
	'show_count' => 1,
	'hide_empty' => 1,
	'echo'=> 0,
	'title_li' => sprintf('<h3>%s</h3>', __('Categories', 'ami3')),
	'link_before' => '<span class="main-el-icon"></span>'
) );
$product_cat_menu = preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)<\/a>\s*(\(.*\))?@i', '<li$1><a$2><span class="main-el-icon"></span><span class="main-el-text">$3<span class="main-el-count">$4</span></span></a>', $product_cat_menu);
echo $product_cat_menu;
echo "</ul>";
?>
</div>

<div class="visible-xs mobile_cat_menu">
	<?php $categories = listCategories(); ?>
	<div class="current"><?php echo $categories['active']; ?></div>
	<div class="name">
		<a role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><?php _e('All Categories', 'ami3') ?><span>(<?php echo $categories['count']; ?>)</span></a>
	</div>
	<div class="collapse" id="collapseExample">
			<ul class="list">
				<?php echo $categories['list']; ?>
			</ul>
	</div>
</div>


<?php

function listCategories(){
	/*переписать получение дыных о текущей категории*/
	$post_slug=get_query_var('product_cat', 'product');
	$categories = get_categories('taxonomy=product_cat');
	$select['count'] =count($categories);
	$select['list'] = '';
	$select['active'] = '';
	foreach($categories as $category) {
		if ( $category->count > 0 ) {
			if ( $category->slug == $post_slug ) {
				$select[ 'active' ] = $category->name;
			}
		}
	}

	$select['list'] = wp_list_categories( array(
		'taxonomy' => 'product_cat',
		'show_count' => 1,
		'hide_empty' => 1,
		'echo'=> 0,
		'title_li' => '',
		'link_before' => ''
	) );
	$select['list'] = preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)<\/a>\s*(\(.*\))?@i', '<li$1><a$2><span class="main-el-icon"></span><span class="main-el-text">$3<span class="main-el-count">$4</span></span></a>', $select['list']);
	return $select;
}
?>
