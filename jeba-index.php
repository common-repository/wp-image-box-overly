<?php
/*
Plugin Name: Image Box Overly 
Plugin URI: http://prowpexpert.com
Description: This is Image Box wordpress Overly plugin really looking awesome sliding. Everyone can use the Image Box Overly  plugin easily like other wordpress plugin. Here everyone can Image Box Overly from post, page or other custom post. Also can use Image Box Overly  from every category. By using [imagebox] shortcode use the imagebox every where post, page and template.
Author: Md Sohel
Version: 1.0
Author URI: http://prowpexpert.com/
*/
function imagebox_wp_latest_jquery_d() {
	wp_enqueue_script('jquery');
}
add_action('init', 'imagebox_wp_latest_jquery_d');

function plugin_function_jeba_imagebox() {
    wp_enqueue_script( 'easing-js-d', plugins_url( '/js/easing.js', __FILE__ ), true);
    wp_enqueue_script( 'bootstrap-js-d', plugins_url( '/js/bootstrap.js', __FILE__ ), true);
    wp_enqueue_script( 'functions-js-d', plugins_url( '/js/functions.js', __FILE__ ), true);
    wp_enqueue_style( 'jeba-css-d', plugins_url( '/css/bootstrap.css', __FILE__ ));
    wp_enqueue_style( 'style-css-d', plugins_url( '/style.css', __FILE__ ));
}

add_action('init','plugin_function_jeba_imagebox');

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function jeba_imagebox_shortcode_d($atts){
	extract( shortcode_atts( array(
		'category' => '',
		'post_type' => 'imagebox-eitems',
		'count' => '5',
	), $atts) );
	
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => $post_type, 'category_name' => $category)
        );		
		
		$plugins_url = plugins_url();
		
	$list = '  		
                 <div id="imagebox">
                        <div class="row">
				 ';
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$jeba_img_large = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'imagebox-thumb' );
		
		$list .= '
			
			
			
			<div class="col-md-3 bottom-sm-30">
				<div class="imagebox">
					<div class="imagebox-img">
						<img class="img-responsive" alt="" src="'.$jeba_img_large[0].'">
					</div>
					<span class="imagebox-mark" style="opacity: 0;"></span>
					<div class="imagebox-content" style="bottom: -101px; opacity: 0;">
						<h4 class="imagebox-heading bottom-10"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>
						<p>'.get_the_excerpt().'</p>
					</div>
				</div>
			</div>

		';        
	endwhile;
	$list.= '
				</div>
			</div>';
	wp_reset_query();
	return $list;
}
add_shortcode('imagebox', 'jeba_imagebox_shortcode_d');

function imagebox_pro_shortcode_d($atts){
	extract( shortcode_atts( array(
		'category' => '',
		'post_type' => 'imagebox-eitems',
		'count' => '5',
	), $atts) );
	
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => $post_type, 'category_name' => $category)
        );		
		
		$plugins_url = plugins_url();
		
	$list = '  		
                
					<div class="top-30" id="probox">
                        <div class="row">
				 ';
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$jeba_img_large = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'imagebox-thumb' );
		
		$list .= '
			
			 <div class="col-md-3 bottom-sm-30">
				<div class="probox">
					<div class="probox-image">
						<img class="img-responsive" alt="" src="'.$jeba_img_large[0].'">
					</div>
					<div class="probox-heading" style="bottom: -94px;">
						<div class="probox-title">
							<h5 class="bottom-0"><a href="'.get_permalink().'">'.get_the_title().'</a></h5>
						</div>
						<div class="probox-desc" style="opacity: 0;">
						   <p>'.get_the_excerpt().'</p>
						</div>
					</div>
				</div>
			</div>
			

		';        
	endwhile;
	$list.= '
				</div>
			</div>';
	wp_reset_query();
	return $list;
}
add_shortcode('probox', 'imagebox_pro_shortcode_d');



add_action( 'init', 'jeba_imagebox_custom_post_d' );
function jeba_imagebox_custom_post_d() {

	register_post_type( 'imagebox-eitems',
		array(
			'labels' => array(
				'name' => __( 'Imagebox' ),
				'singular_name' => __( 'Imagebox' )
			),
			'public' => true,
			'supports' => array('title', 'editor', 'thumbnail'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'imag-box'),
			'taxonomies' => array('category', 'post_tag') 
		)
	);	
	}

add_theme_support( 'post-thumbnails', array( 'post', 'imagebox-eitems' ) );

add_image_size( 'imagebox-thumb', 250, 295, true );
?>