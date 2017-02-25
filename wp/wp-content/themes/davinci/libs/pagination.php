<?php
/**
 * Author: Vitaly Kukin
 * Date: 08.06.2015
 * Time: 9:42
 */

function dav_paging_nav()
{

    global $wp_query;

    $posts_per_page = ( isset( $wp_query->query_vars[ 'posts_per_page' ] ) &&
        intval( $wp_query->query_vars[ 'posts_per_page' ] ) ) ?
        $wp_query->query_vars[ 'posts_per_page' ] :
        intval( get_option( 'posts_per_page' ) );

    $big = 999999999;

    $paged = max( 1, get_query_var( 'paged' ) );
    $count = $wp_query->found_posts;
    $total = ceil( $count / $posts_per_page );
    $links = paginate_links(
        array(
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '/page/%#%',
            'total'     => $total,
            'current'   => $paged,
            'type'      => 'array',
            'prev_text' => '&laquo;',
            'next_text' => '&raquo;'
        )
    );

    $pagination = array();
    if ( $links ) {
        foreach ( $links as $link ) {
            $pagination[] = array(
                'active' => dav_search_current( $link ),
                'link'   => $link,
            );
        }
    }

    if ( count( $pagination ) ) {

        echo '<ul class="b-pagination" role="navigation">';
        foreach ( $pagination as $link ) {
            $class = '';
            if ( $link[ 'active' ] ) {
                $class = ' class="active" ';
            }
            echo '<li' . $class . '>' . $link[ 'link' ] . '</li>';
        }
        echo '</ul>';
    }
}

function dav_search_current( $string )
{

    if ( preg_match( '/(current)/', $string ) ) {
        return true;
    }

    return false;
}

function dav_blog_pagination()
{

    $arg = getDataMiniPagination();

    if ( $arg['total'] > 1 ):
        echo '<div class="mini-pagination" role="navigation">';
        printf( '<a href="%1$s" %2$s><span class="prev"><i></i></span></a>
		<span>%7$s %3$s %8$s %4$s</span>
		<a href="%5$s" %6$s><span class="next"><i></i></a></span>',
            $arg['link_previous'],
            $arg['paged'] == 1 ? 'disabled' : '',
            $arg['paged'],
            $arg['total'],
            $arg['link_next'],
            $arg['paged'] == $arg['total'] ? 'disabled' : '',
            __( 'Page', 'ami3' ),
            __( 'of', 'ami3' )
        );
        echo '</div>';
    endif;

}

function getDataMiniPagination()
{
    global $wp_query;

    $posts_per_page = ( isset( $wp_query->query_vars[ 'posts_per_page' ] ) &&
        intval( $wp_query->query_vars[ 'posts_per_page' ] ) ) ?
        $wp_query->query_vars[ 'posts_per_page' ] :
        intval( get_option( 'posts_per_page' ) );

    $paged = max( 1, get_query_var( 'paged' ) );
    $count = $wp_query->found_posts;
    $total = ceil( $count / $posts_per_page );

    $link_next     = getLink( get_next_posts_link() );
    $link_previous = getLink( get_previous_posts_link() );

    $arg[ 'link_previous' ] = $link_previous;
    $arg[ 'paged' ]         = $paged;
    $arg[ 'total' ]         = $total;
    $arg[ 'link_next' ]     = $link_next;

    return $arg;
}

function getLink( $str )
{
    preg_match( "/href=[\"']([^<>]*)[\"']/", $str, $match );

    return isset( $match[ 1 ] ) ? $match[ 1 ] : '';
}


