<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to X in this file.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

define( 'ELEXIA_TEMPLATE_PATH', get_stylesheet_directory() );

// Enqueue Parent Stylesheet
// =============================================================================

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );

function defer_parsing_of_js ( $url ) {
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return "$url' defer ";
}

//add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );

function _remove_script_version( $src ){
    $parts = explode( '?ver', $src );
    return $parts[0];
}

add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );



add_action( 'init', 'elexia_init' );

function elexia_init() {
  require_once( ELEXIA_TEMPLATE_PATH . "/elements/hero-section.php" );
  require_once( ELEXIA_TEMPLATE_PATH . "/elements/hero-section-image.php" );
}


// Additional Functions
// =============================================================================

/**
 * Enqueue scripts and styles.
 */

add_action( 'wp_enqueue_scripts', 'elexia_scripts' ); 
 
function elexia_scripts() {	

	wp_enqueue_style( 'themify-icons', get_stylesheet_directory_uri() . '/icons/themify-icons/themify-icons.css');
    wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Montserrat:500|Open+Sans:300');
	//wp_enqueue_script( 'elexia-fontawesome', 'https://use.fontawesome.com/9521dfc1d2.js', array(), '1.0.0', true );
	
}

if( is_admin() ) {
 
 //   add_filter( 'script_loader_tag', 'tp_theme_filter_overrides' , 10, 4 );
 
}
 
function tp_theme_filter_overrides( $tag, $handle ) {
 
    return str_replace( 'defer', '', $tag );

}

// Custom Social Output
//
//
// =============================================================================
/*
if ( ! function_exists( 'x_social_global' ) ) :
  function x_social_global() {

    $facebook    = x_get_option( 'x_social_facebook', '' );
    $twitter     = x_get_option( 'x_social_twitter', '' );
    $google_plus = x_get_option( 'x_social_googleplus', '' );
    $linkedin    = x_get_option( 'x_social_linkedin', '' );
    $xing        = x_get_option( 'x_social_xing', '' );
    $foursquare  = x_get_option( 'x_social_foursquare', '' );
    $youtube     = x_get_option( 'x_social_youtube', '' );
    $vimeo       = x_get_option( 'x_social_vimeo', '' );
    $instagram   = x_get_option( 'x_social_instagram', '' );
    $pinterest   = x_get_option( 'x_social_pinterest', '' );
    $dribbble    = x_get_option( 'x_social_dribbble', '' );
    $flickr      = x_get_option( 'x_social_flickr', '' );
    $behance     = x_get_option( 'x_social_behance', '' );
    $tumblr      = x_get_option( 'x_social_tumblr', '' );
    $whatsapp    = x_get_option( 'x_social_whatsapp', '' );
    $soundcloud  = x_get_option( 'x_social_soundcloud', '' );
    $rss         = x_get_option( 'x_social_rss', '' );

    $output = '<div class="x-social-global">';

      if ( $facebook )    : $output .= '<a href="' . $facebook    . '" class="facebook" title="Facebook" target="_blank"><i class="x-icon-facebook-square" data-x-icon-b="&#xf082;" aria-hidden="true"></i></a>'; endif;
      if ( $twitter )     : $output .= '<a href="' . $twitter     . '" class="twitter" title="Twitter" target="_blank"><i class="x-icon-twitter-square" data-x-icon-b="&#xf081;" aria-hidden="true"></i></a>'; endif;
      if ( $google_plus ) : $output .= '<a href="' . $google_plus . '" class="google-plus" title="Google+" target="_blank"><i class="x-icon-google-plus-square" data-x-icon-b="&#xf0d4;" aria-hidden="true"></i></a>'; endif;
      if ( $linkedin )    : $output .= '<a href="' . $linkedin    . '" class="linkedin" title="LinkedIn" target="_blank"><i class="x-icon-linkedin-square" data-x-icon-b="&#xf08c;" aria-hidden="true"></i></a>'; endif;
      if ( $xing )        : $output .= '<a href="' . $xing        . '" class="xing" title="XING" target="_blank"><i class="x-icon-xing-square" data-x-icon-b="&#xf169;" aria-hidden="true"></i></a>'; endif;
      if ( $foursquare )  : $output .= '<a href="' . $foursquare  . '" class="foursquare" title="Foursquare" target="_blank"><i class="x-icon-foursquare" data-x-icon-b="&#xf180;" aria-hidden="true"></i></a>'; endif;
      if ( $youtube )     : $output .= '<a href="' . $youtube     . '" class="youtube" title="YouTube" target="_blank"><i class="x-icon-youtube-square" data-x-icon-b="&#xf431;" aria-hidden="true"></i></a>'; endif;
      if ( $vimeo )       : $output .= '<a href="' . $vimeo       . '" class="vimeo" title="Vimeo" target="_blank"><i class="x-icon-vimeo-square" data-x-icon-b="&#xf194;" aria-hidden="true"></i></a>'; endif;
      if ( $instagram )   : $output .= '<a href="' . $instagram   . '" class="instagram" title="Instagram" target="_blank"><i class="x-icon-instagram" data-x-icon-b="&#xf16d;" aria-hidden="true"></i></a>'; endif;
      if ( $pinterest )   : $output .= '<a href="' . $pinterest   . '" class="pinterest" title="Pinterest" target="_blank"><i class="x-icon-pinterest-square" data-x-icon-b="&#xf0d3;" aria-hidden="true"></i></a>'; endif;
      if ( $dribbble )    : $output .= '<a href="' . $dribbble    . '" class="dribbble" title="Dribbble" target="_blank"><i class="x-icon-dribbble" data-x-icon-b="&#xf17d;" aria-hidden="true"></i></a>'; endif;
      if ( $flickr )      : $output .= '<a href="' . $flickr      . '" class="flickr" title="Flickr" target="_blank"><i class="x-icon-flickr" data-x-icon-b="&#xf16e;" aria-hidden="true"></i></a>'; endif;
      if ( $github )      : $output .= '<a href="' . $github      . '" class="github" title="GitHub" target="_blank"><i class="x-icon-github-square" data-x-icon-b="&#xf092;" aria-hidden="true"></i></a>'; endif;
      if ( $behance )     : $output .= '<a href="' . $behance     . '" class="behance" title="Behance" target="_blank"><i class="x-icon-behance-square" data-x-icon-b="&#xf1b5;" aria-hidden="true"></i></a>'; endif;
      if ( $tumblr )      : $output .= '<a href="' . $tumblr      . '" class="tumblr" title="Tumblr" target="_blank"><i class="x-icon-tumblr-square" data-x-icon-b="&#xf174;" aria-hidden="true"></i></a>'; endif;
      if ( $whatsapp )    : $output .= '<a href="' . $whatsapp    . '" class="whatsapp" title="Whatsapp" target="_blank"><i class="x-icon-whatsapp" data-x-icon-b="&#xf232;" aria-hidden="true"></i></a>'; endif;
      if ( $soundcloud )  : $output .= '<a href="' . $soundcloud  . '" class="soundcloud" title="SoundCloud" target="_blank"><i class="x-icon-soundcloud" data-x-icon-b="&#xf1be;" aria-hidden="true"></i></a>'; endif;
      if ( $rss )         : $output .= '<a href="' . $rss         . '" class="rss" title="RSS" target="_blank"><i class="x-icon-rss-square" data-x-icon-s="&#xf143;" aria-hidden="true"></i></a>'; endif;

    $output .= '</div>';

    echo $output;

  }
  
endif;
*/

if ( ! function_exists('elexia_custom_post_type') ) {

// Register Custom Post Type
function elexia_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Testimonies', 'Post Type General Name', '__x__' ),
		'singular_name'         => _x( 'Testimony', 'Post Type Singular Name', '__x__' ),
		'menu_name'             => __( 'Testimonies', '__x__' ),
		'name_admin_bar'        => __( 'Testimonies', '__x__' ),
		'archives'              => __( 'All Testimonies', '__x__' ),
		'attributes'            => __( 'Item Attributes', '__x__' ),
		'parent_item_colon'     => __( 'Parent Item:', '__x__' ),
		'all_items'             => __( 'All Testimonies', '__x__' ),
		'add_new_item'          => __( 'Add New Testimony', '__x__' ),
		'add_new'               => __( 'Add New', '__x__' ),
		'new_item'              => __( 'New Testimony', '__x__' ),
		'edit_item'             => __( 'Edit Testimony', '__x__' ),
		'update_item'           => __( 'Update Testimony', '__x__' ),
		'view_item'             => __( 'View Testimony', '__x__' ),
		'view_items'            => __( 'View Testimonies', '__x__' ),
		'search_items'          => __( 'Search Testimonies', '__x__' ),
		'not_found'             => __( 'Testimony Not found', '__x__' ),
		'not_found_in_trash'    => __( 'Testimonies Not found in Trash', '__x__' ),
		'featured_image'        => __( 'Featured Image', '__x__' ),
		'set_featured_image'    => __( 'Set featured image', '__x__' ),
		'remove_featured_image' => __( 'Remove featured image', '__x__' ),
		'use_featured_image'    => __( 'Use as featured image', '__x__' ),
		'insert_into_item'      => __( 'Insert into item', '__x__' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', '__x__' ),
		'items_list'            => __( 'Items list', '__x__' ),
		'items_list_navigation' => __( 'Items list navigation', '__x__' ),
		'filter_items_list'     => __( 'Filter items list', '__x__' ),
	);
	$rewrite = array(
		'slug'                  => 'testimony',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Testimony', '__x__' ),
		'description'           => __( 'Testimonies from the clients', '__x__' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
	);
	register_post_type( 'testimonies', $args );

}
add_action( 'init', 'elexia_custom_post_type', 0 );

}

// Declare function to remove the X hook during initialization
function remove_x_actions() {
    remove_action( 'woocommerce_before_shop_loop_item_title', 'x_woocommerce_shop_product_thumbnails', 10 );
    remove_action( 'woocommerce_before_shop_loop_item', 'x_woocommerce_before_shop_loop_item', 5 );
}

// Register the action that will remove the X hook during initialization
add_action( 'init', 'remove_x_actions' );

//
//----- Shop
//
 
function update_product_tabs( $tabs ) {
    
    //$tabs['description']['title'] = 'Product Benefits';
    unset( $tabs['description'] ); 
    unset( $tabs['additional_information'] ); 
    
    return $tabs;
}

add_filter( 'woocommerce_product_tabs', 'update_product_tabs', 98 );

//
// Shop product thumbnails.
//

function elexia_woocommerce_before_shop_loop_item_title() {
  echo '<div class="entry-wrap x-column x-sm x-2-3"><header class="entry-header">';
}

function elexia_woocommerce_shop_product_thumbnails() {

  GLOBAL $product;

  $id     = get_the_ID();
  $thumb  = 'entry';
  $rating = $product->get_rating_html();

  woocommerce_show_product_sale_flash();
  echo '<div class="entry-featured x-column x-sm x-1-3">';
    echo '<a href="' . get_the_permalink() . '">';
      echo get_the_post_thumbnail( $id, $thumb );
      if ( ! empty( $rating ) ) {
        echo '<div class="star-rating-container aggregate">' . $rating . '</div>';
      }
    echo '</a>';
  echo "</div>";

}

add_action( 'woocommerce_before_shop_loop_item_title', 'elexia_woocommerce_shop_product_thumbnails', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'elexia_woocommerce_before_shop_loop_item_title', 10 );

function elexia_excerpt_in_product_archives() {
    the_excerpt();
}

// Add Sale Badge
// -----------------

add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

if ( ! function_exists( 'woocommerce_template_loop_price' ) ) {

    /**
     * Get the product price for the loop.
     *
     * @subpackage  Loop
     */
    function woocommerce_template_loop_price() {
        wc_get_template( 'loop/price.php' );
        echo '<p class=\'product-description\'>' .get_the_excerpt() .'</p>';
    }
}


// Add Social Sharing after the single post content
// =============================================================================

function x_add_social_sharing ( $content ) {
  if ( is_singular('post') ) {
    echo do_shortcode('[share title="Share this Post" facebook="true" twitter="true" google_plus="true" linkedin="true" pinterest="true" reddit="true" email="true"]');
  }
}

add_action('x_before_the_content_end', 'x_add_social_sharing');

add_filter( 'woocommerce_cart_needs_shipping_address', '__return_true', 50 );

// Add scripts to wp_head()
function child_theme_head_script() { ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122331297-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-122331297-1');
</script>
<?php }
//add_action( 'wp_head', 'child_theme_head_script' );

/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}

add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );