<?php
/**
 * The template for homepage posts with "Chess" style
 *
 * @package WordPress
 * @subpackage HOVEREX
 * @since HOVEREX 1.0
 */

hoverex_storage_set('blog_archive', true);

get_header(); 

if (have_posts()) {

	hoverex_show_layout(get_query_var('blog_archive_start'));

	$hoverex_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$hoverex_sticky_out = hoverex_get_theme_option('sticky_style')=='columns' 
							&& is_array($hoverex_stickies) && count($hoverex_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($hoverex_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	if (!$hoverex_sticky_out) {
		?><div class="chess_wrap posts_container"><?php
	}
	while ( have_posts() ) { the_post(); 
		if ($hoverex_sticky_out && !is_sticky()) {
			$hoverex_sticky_out = false;
			?></div><div class="chess_wrap posts_container"><?php
		}
		get_template_part( 'content', $hoverex_sticky_out && is_sticky() ? 'sticky' :'chess' );
	}
	
	?></div><?php

	hoverex_show_pagination();

	hoverex_show_layout(get_query_var('blog_archive_end'));

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>