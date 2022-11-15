<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' ); 
function theme_enqueue_styles() { 
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
} 

/* 最新記事取得 */
function new_list_func($atts){
  global $post;
  $arg   = array(
    'posts_per_page' => 4,
    'orderby'        => 'date', 
    'order'          => 'DESC',
  );
  $posts = get_posts($arg);
  $str = '';
  foreach($posts as $post):
    setup_postdata($post);
    $str.='<p>';
    $str.=home_url().'/?p=';
    $str.=get_the_ID(); 
    $str.='</p>';
  endforeach;
  wp_reset_postdata();
  return $str;
}
add_shortcode('new_list', 'new_list_func');