<?php
/**
 * Functions
 */

/******************************************************************************
 * Included Functions
 ******************************************************************************/

// Helpers function
require_once get_stylesheet_directory() . '/inc/helpers.php';
// Install Recommended plugins
require_once get_stylesheet_directory() . '/inc/recommended-plugins.php';
// Walker modification
require_once get_stylesheet_directory() . '/inc/class-bootstrap-navigation.php';
// Home slider function
include_once get_stylesheet_directory() . '/inc/home-slider.php';
// Dynamic admin
include_once get_stylesheet_directory() . '/inc/class-dynamic-admin.php';
// SVG Support
include_once get_stylesheet_directory() . '/inc/svg-support.php';


/******************************************************************************
 * Global Functions
 ******************************************************************************/

// By adding theme support, we declare that this theme does not use a
// hard-coded <title> tag in the document head, and expect WordPress to
// provide it for us.
add_theme_support( 'title-tag' );

//  Add widget support shortcodes
add_filter( 'widget_text', 'do_shortcode' );

// Support for Featured Images
add_theme_support( 'post-thumbnails' );

// Custom Background
add_theme_support( 'custom-background', array( 'default-color' => 'fff' ) );

// Custom Header
add_theme_support( 'custom-header', array(
	'default-image' => get_template_directory_uri() . '/images/custom-logo.png',
	'height'        => '200',
	'flex-height'   => true,
	'uploads'       => true,
	'header-text'   => false
) );

// Custom Logo
add_theme_support( 'custom-logo', array(
	'height'      => '150',
	'flex-height' => true,
	'flex-width'  => true,
) );

function show_custom_logo() {
	if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
		$attachment_array = wp_get_attachment_image_src( $custom_logo_id, 'medium' );
		$logo_url         = $attachment_array[0];
	} else {
		$logo_url = get_stylesheet_directory_uri() . '/images/custom-logo.png';
	}
	$logo_image = '<img src="' . $logo_url . '" class="custom-logo" itemprop="siteLogo" alt="' . get_bloginfo( 'name' ) . '">';
	$html       = sprintf( '<a href="%1$s" class="navbar-brand" rel="home" title="%2$s" itemscope>%3$s</a>', esc_url( home_url( '/' ) ), get_bloginfo( 'name' ), $logo_image );
	echo apply_filters( 'get_custom_logo', $html );
}

// Add HTML5 elements
add_theme_support( 'html5', array(
	'comment-list',
	'search-form',
	'comment-form',
) );

// Register Navigation Menu
register_nav_menus( array(
	'header-menu' => 'Header Menu',
	'footer-menu' => 'Footer Menu'
) );

// Create pagination
function bootstrap_pagination( $query = '' ) {
	if ( empty( $query ) ) {
		global $wp_query;
		$query = $wp_query;
	}

	$big = 999999999;

	$links = paginate_links( array(
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'    => '?paged=%#%',
			'prev_next' => true,
			'prev_text' => '&laquo;',
			'next_text' => '&raquo;',
			'current'   => max( 1, get_query_var( 'paged' ) ),
			'total'     => $query->max_num_pages,
			'type'      => 'list'
		) );

	$pagination = str_replace( 'page-numbers', 'pagination', $links );

	echo $pagination;
}

// Register Sidebars
function bootstrap_widgets_init() {
	/* Sidebar Right */
	register_sidebar( array(
		'id'            => 'bootstrap_sidebar_right',
		'name'          => __( 'Sidebar Right' ),
		'description'   => __( 'This sidebar is located on the right-hand side of each page.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'id'            => 'footer_sidebar_01',
		'name'          => __( 'Sidebar Footer 01' ),
		'description'   => __( 'This sidebar is located in the footer.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'id'            => 'footer_sidebar_02',
		'name'          => __( 'Sidebar Footer 02' ),
		'description'   => __( 'This sidebar is located in the footer.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'id'            => 'footer_sidebar_03',
		'name'          => __( 'Sidebar Footer 03' ),
		'description'   => __( 'This sidebar is located in the footer.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'id'            => 'footer_sidebar_04',
		'name'          => __( 'Sidebar Footer 04' ),
		'description'   => __( 'This sidebar is located in the footer.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'id'            => 'header_sidebar_01',
		'name'          => __( 'Sidebar Header' ),
		'description'   => __( 'This sidebar is located in the right side of the header.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

}

add_action( 'widgets_init', 'bootstrap_widgets_init' );

// Remove #more anchor from posts
function remove_more_jump_link( $link ) {
	$offset = strpos( $link, '#more-' );
	if ( $offset ) {
		$end = strpos( $link, '"', $offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end - $offset );
	}

	return $link;
}

add_filter( 'the_content_more_link', 'remove_more_jump_link' );


/******************************************************************************************************************************
 * Enqueue Scripts and Styles for Front-End
 *******************************************************************************************************************************/

function bootstrap_scripts_and_styles() {
	if ( ! is_admin() ) {

		// Load Stylesheets
		//core
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', null, '6.3.0' );

		//plugins
		wp_enqueue_style( 'font-awesome.min', get_template_directory_uri() . '/css/plugins/font-awesome.min.css', null, '4.7.0' );
		wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/plugins/slick.css', null, '1.6.0' );
		wp_enqueue_style( 'jquery.fancybox', get_template_directory_uri() . '/css/plugins/jquery.fancybox.css', null, '2.1.5' );

		// //system
		wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css', null, null );/*3rd priority*/
		wp_enqueue_style( 'media-screens', get_template_directory_uri() . '/css/media-screens.css', null, null );/*2nd priority*/
		wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', null, null );/*1st priority*/
		// wp_enqueue_style( 'styles', get_template_directory_uri() . '/dist/styles.css', null, null );

		// Load JavaScripts
		//core
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', null, '6.3.0', true );

		// //plugins
		wp_enqueue_script( 'html5shiv-respond', get_template_directory_uri() . '/js/plugins/html5shiv_respond.js', null, null, false );
		wp_script_add_data( 'html5shiv-respond', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/plugins/slick.min.js', null, '1.6.0', true );
		wp_enqueue_script( 'jquery.matchHeight-min', get_template_directory_uri() . '/js/plugins/jquery.matchHeight-min.js', null, '0.7.0', true );
		wp_enqueue_script( 'jquery.fancybox.pack', get_template_directory_uri() . '/js/plugins/jquery.fancybox.pack.js', null, '2.1.5', true );
		wp_enqueue_script( 'google.maps.api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAs19C89zcw7bQ12hJEKgtPGK9Q8iuLkQ4&v=3.exp', null, null, true );

		//custom javascript
		wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', null, null, true ); /* This should go first */
		// wp_enqueue_script( 'scripts', get_template_directory_uri() . '/dist/scripts.js', null, null, true );

	}
}

add_action( 'wp_enqueue_scripts', 'bootstrap_scripts_and_styles' );


/******************************************************************************
 * Additional Functions
 *******************************************************************************/

// Enable revisions for all custom post types
add_filter( 'cptui_user_supports_params', function () {
	return array( 'revisions' );
} );

if ( function_exists( 'cptui_get_post_type_data' ) ) {
	add_filter( 'wp_revisions_to_keep', 'limit_revisions_number', 10, 2 );

	function limit_revisions_number( $num, $post ) {
		$custom_post_types = cptui_get_post_type_data();
		foreach ( $custom_post_types as $custom_post_type ) {
			$cpt_names[] = $custom_post_type['name'];
		}
		if ( in_array( $post->post_type, $cpt_names ) ) {
			$num = 15;
		}

		return $num;
	}
}

// Register Post Type Slider
function post_type_slider() {
	$post_type_slider_labels = array(
		'name'               => _x( 'Slider', 'post type general name' ),
		'singular_name'      => _x( 'Slide', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'slide' ),
		'add_new_item'       => __( 'Add New' ),
		'edit_item'          => __( 'Edit' ),
		'new_item'           => __( 'New ' ),
		'all_items'          => __( 'All' ),
		'view_item'          => __( 'View' ),
		'search_items'       => __( 'Search for a slide' ),
		'not_found'          => __( 'No slides found' ),
		'not_found_in_trash' => __( 'No slides found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Slider'
	);
	$post_type_slider_args   = array(
		'labels'        => $post_type_slider_labels,
		'description'   => 'Display Slider',
		'public'        => true,
		'menu_icon'     => 'dashicons-format-gallery',
		'menu_position' => 5,
		'supports'      => array(
			'title',
			'thumbnail',
			'page-attributes',
			'editor'
		),
		'has_archive'   => true,
		'hierarchical'  => true
	);
	register_post_type( 'slider', $post_type_slider_args );
}

add_action( 'init', 'post_type_slider' );

// Stick Admin Bar To The Top
if ( ! is_admin() ) {
	add_action( 'get_header', 'my_filter_head' );

	function my_filter_head() {
		remove_action( 'wp_head', '_admin_bar_bump_cb' );
	}

	function stick_admin_bar() {
		echo "
			<style type='text/css'>
				body.admin-bar {margin-top:32px !important}
				@media screen and (max-width: 782px) {
					body.admin-bar { margin-top:46px !important }
				}
			</style>
			";
	}

	add_action( 'admin_head', 'stick_admin_bar' );
	add_action( 'wp_head', 'stick_admin_bar' );
}

// Customize Login Screen
function wordpress_login_styling() {
	if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
		$custom_logo_img = wp_get_attachment_image_src( $custom_logo_id, 'medium' );
		$custom_logo_src = $custom_logo_img[0];
	} else {
		$custom_logo_src = 'wp-admin/images/wordpress-logo.svg?ver=20131107';
	}
	?>
	<style type="text/css">
		.login #login h1 a {
			background-image: url('<?php echo $custom_logo_src; ?>');
			background-size: contain;
			background-position: 50% 50%;
			width: auto;
			height: 120px;
		}

		body.login {
			background-color: #f1f1f1;
			<?php if ($bg_image = get_background_image()) {?>
			background-image: url('<?php echo $bg_image; ?>') !important;
			<?php } ?>
			background-repeat: repeat;
			background-position: center center;
		}
	</style>
<?php }

add_action( 'login_enqueue_scripts', 'wordpress_login_styling' );

function admin_logo_custom_url() {
	$site_url = get_bloginfo( 'url' );
	return ( $site_url );
}

add_filter( 'login_headerurl', 'admin_logo_custom_url' );

// ACF Pro Options Page

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );

}

// Set Google Map API key

function set_custom_google_api_key() {
	acf_update_setting( 'google_api_key', 'AIzaSyAs19C89zcw7bQ12hJEKgtPGK9Q8iuLkQ4' );
}

add_action( 'acf/init', 'set_custom_google_api_key' );

// Disable Emoji

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_wp_emojis_in_tinymce' );
function disable_wp_emojis_in_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

// Wrap any iframe and emved tag into div for responsive view

function iframe_wrapper( $content ) {
	// match any iframes
	$pattern = '~<iframe.*</iframe>|<embed.*</embed>~';
	preg_match_all( $pattern, $content, $matches );

	foreach ( $matches[0] as $match ) {
		// wrap matched iframe with div
		$wrappedframe = '<div class="responsive-embed widescreen">' . $match . '</div>';

		//replace original iframe with new in content
		$content = str_replace( $match, $wrappedframe, $content );
	}

	return $content;
}

add_filter( 'the_content', 'iframe_wrapper' );


// Dynamic Admin
if ( is_admin() ) {
	$dynamic_admin = new DynamicAdmin();
//	$dynamic_admin->addField( 'page', 'template', 'Page Template', 'template_detail_field_for_page' );

	$dynamic_admin->run();
}

/*********************** PUT YOU FUNCTIONS BELOW ********************************/

add_image_size( 'full_hd', 1920, 1080, array('center', 'center'));
add_image_size( 'img-630', 630, 630, array('center', 'center'));
add_image_size( 'img-630x550', 630, 550, array('center', 'center'));
add_image_size( 'img-630x400', 630, 400, array('center', 'center'));
add_image_size( 'img-525x460', 525, 460, array('center', 'center'));
add_image_size( 'img-420', 420, 420, array('center', 'center'));
add_image_size( 'img-480x420', 480, 420, array('center', 'center'));
add_image_size( 'img-397x350', 397, 350, array('center', 'center'));
add_image_size( 'img-397x200', 397, 200, array('center', 'center'));
add_image_size( 'img-350', 350, 350, array('center', 'center'));
add_image_size( 'img-320x280', 320, 280, array('center', 'center'));
// add_image_size( 'name', width, height, array('center','center'));

add_filter( 'gform_confirmation_anchor', '__return_false' );


/*******************************************************************************/


if(!class_exists('SocialsWidget')) {

  class SocialsWidget extends WP_Widget {

    public function __construct() {
      $widget_ops = array(
        'classname' => 'socials_widget',
        'description' => 'Socials Widget ',
      );
      parent::__construct( 'socials_widget', 'Socials', $widget_ops );
    }

    public function widget( $args, $instance ) {
      // outputs the content of the widget
	    if ( ! isset( $args['widget_id'] ) ) {
	        $args['widget_id'] = $this->id;
	    }

     	$widget_id = 'widget_' . $args['widget_id'];

      	if (have_rows('socials', $widget_id)) :
	      	echo '<ul id="'. $args['widget_id'] .'" class="social-icons">';
	      	while (have_rows('socials', $widget_id)) : the_row();
		      	$social_icon = get_sub_field('social_icon');
		      	$social_link = get_sub_field('social_link');

				$email = filter_var($social_link, FILTER_VALIDATE_EMAIL);
				$phone = filter_var($social_link, FILTER_VALIDATE_INT);

	      	?>
	      	<?php if ($email): ?>
	      		<li>
	      			<a href="<?php echo 'mailto:' . $social_link; ?>"><img src="<?php echo $social_icon['sizes']['thumbnail']; ?>" alt="<?php echo $social_icon['title']; ?>"></a>
	      		</li>
	      	<?php elseif ($phone): ?>
	      		<li>
	      			<a href="<?php echo 'tel:' . $social_link; ?>"><img src="<?php echo $social_icon['sizes']['thumbnail']; ?>" alt="<?php echo $social_icon['title']; ?>"></a>
	      		</li>
	      	<?php else: ?>
	      		<li>
	      			<a href="<?php echo $social_link; ?>" target="_blank"><img src="<?php echo $social_icon['sizes']['thumbnail']; ?>" alt="<?php echo $social_icon['title']; ?>" ></a>
	      		</li>
	      	<?php endif; ?>

	    	<?php endwhile;
	    	echo '</ul>';
	    endif;

    }

    public function form( $instance ) {
    	// outputs the options form on admin
    }

    public function update( $new_instance, $old_instance ) {
    	// processes widget options to be saved
    }

  }

}

function register_socials_widget()
{
  register_widget( 'SocialsWidget' );
}
add_action( 'widgets_init', 'register_socials_widget' );

?>
