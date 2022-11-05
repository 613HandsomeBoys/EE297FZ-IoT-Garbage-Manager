<?php
/**
 * personalblogily functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package personalblogily
 */


if ( ! function_exists( 'personalblogily_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

function personalblogily_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on personalblogily, use a find and replace
		 * to change 'personalblogily' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'personalblogily', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 300 );

		add_image_size( 'personalblogily-grid', 350 , 230, true );
		add_image_size( 'personalblogily-slider', 850 );
		add_image_size( 'personalblogily-small', 300 , 180, true );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'	=> esc_html__( 'Primary', 'personalblogily' ),
			) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			) );

		// Set up the WordPress core custom background feature.
//		add_theme_support( 'custom-background', apply_filters( 'personalblogily_custom_background_args', array(
//			'default-color' => '#f1f1f1',
//		'default-image' => '',
			//'default-image' => '%1$s/images/bg.png',
//			) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'flex-width'  => true,
			'flex-height' => true,
			) );
	}
	endif;
	add_action( 'after_setup_theme', 'personalblogily_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function personalblogily_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'personalblogily_content_width', 640 );
}
add_action( 'after_setup_theme', 'personalblogily_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function personalblogily_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'personalblogily' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'personalblogily' ),
		'before_widget' => '<section id="%1$s" class="fbox swidgets-wrap widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
		'after_title'   => '</h3></div></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (1)', 'personalblogily' ),
		'id'            => 'footerwidget-1',
		'description'   => esc_html__( 'Add widgets here.', 'personalblogily' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (2)', 'personalblogily' ),
		'id'            => 'footerwidget-2',
		'description'   => esc_html__( 'Add widgets here.', 'personalblogily' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (3)', 'personalblogily' ),
		'id'            => 'footerwidget-3',
		'description'   => esc_html__( 'Add widgets here.', 'personalblogily' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		) );

}




add_action( 'widgets_init', 'personalblogily_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function personalblogily_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'personalblogily-style', get_stylesheet_uri() );
	wp_enqueue_script( 'personalblogily-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20170823', true );
	wp_enqueue_script( 'personalblogily-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170823', true );	
	wp_enqueue_script( 'personalblogily-script', get_template_directory_uri() . '/js/script.js', array(), '20160720', true );
wp_enqueue_script( 'personalblogily-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '20150423', true );
	wp_enqueue_script( 'blogrid-accessibility', get_template_directory_uri() . '/js/accessibility.js', array(), '20160720', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'personalblogily_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Google fonts, credits can be found in readme.
 */

function personalblogily_google_fonts() {

	wp_enqueue_style( 'personalblogily-google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700,900|Merriweather:400,700', false ); 
}

add_action( 'wp_enqueue_scripts', 'personalblogily_google_fonts' );


/**
 * Dots after excerpt
 */

function personalblogily_excerpt( $more ) {
	return '...';
}
add_filter('excerpt_more', 'personalblogily_excerpt');



/**
 * Blog Pagination 
 */
if ( !function_exists( 'personalblogily_numeric_posts_nav' ) ) {
	
	function personalblogily_numeric_posts_nav() {
		
		$prev_arrow = is_rtl() ? 'Previous' : 'Next';
		$next_arrow = is_rtl() ? 'Next' : 'Previous';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			if( !$current_page = get_query_var('paged') )
				$current_page = 1;
			if( get_option('permalink_structure') ) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}
			echo wp_kses_post(the_posts_pagination(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> 'Previous',
				'next_text'		=> 'Next',
				) ));
		}
	}

}
/**
 * Copyright and License for Upsell button by Justin Tadlock - 2016 © Justin Tadlock. customizer button https://github.com/justintadlock/trt-customizer-pro
 */
require_once( trailingslashit( get_template_directory() ) . 'justinadlock-customizer-button/class-customize.php' );


/**
 * Compare page CSS
 */

function personalblogily_comparepage_css($hook) {
	if ( 'appearance_page_personalblogily-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'personalblogily-custom-style', get_template_directory_uri() . '/css/compare.css' );
}
add_action( 'admin_enqueue_scripts', 'personalblogily_comparepage_css' );

/**
 * Compare page content
 */

add_action('admin_menu', 'personalblogily_themepage');
function personalblogily_themepage(){
	$theme_info = add_theme_page( __('PersonalBlogily','personalblogily'), __('PersonalBlogily','personalblogily'), 'manage_options', 'personalblogily-info.php', 'personalblogily_info_page' );
}

function personalblogily_info_page() {
	$user = wp_get_current_user();
	?>
	<div class="wrap about-wrap personalblogily-add-css">
		<div>
			<h1>
				<?php echo esc_html('Welcome to Personal Blogily!','personalblogily'); ?>
			</h1>

			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo esc_html("Contact Support", "personalblogily"); ?></h3>
						<p><?php echo esc_html("Getting started with a new theme can be difficult, if you have issues with Personalblogily then throw us an email.", "personalblogily"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/help-contact/', 'personalblogily'); ?>" class="button button-primary">
							<?php echo esc_html("Contact Support", "personalblogily"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo esc_html("Review Personal Blogily", "personalblogily"); ?></h3>
						<p><?php echo esc_html("Nothing motivates us more than feedback, are you are enjoying Personal Blogily? We would love to hear what you think!", "personalblogily"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://wordpress.org/support/theme/personalblogily/reviews/', 'personalblogily'); ?>" class="button button-primary">
							<?php echo esc_html("Submit A Review", "personalblogily"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo esc_html("Premium Edition", "personalblogily"); ?></h3>
						<p><?php echo esc_html("If you enjoy Personal Blogily and want to take your website to the next step, then check out our premium edition here.", "personalblogily"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/personalblogily/', 'personalblogily'); ?>" class="button button-primary">
							<?php echo esc_html("Read More", "personalblogily"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php echo esc_html("Free Vs Premium","personalblogily"); ?></h2>
		<div class="personalblogily-button-container">
			<a target="blank" href="<?php echo esc_url('https://superbthemes.com/personalblogily/', 'personalblogily'); ?>" class="button button-primary">
				<?php echo esc_html("Read Full Description", "personalblogily"); ?>
			</a>
			<a target="blank" href="<?php echo esc_url('https://superbthemes.com/demo/personalblogily/', 'personalblogily'); ?>" class="button button-primary">
				<?php echo esc_html("View Theme Demo", "personalblogily"); ?>
			</a>
		</div>


		<table class="wp-list-table widefat">
			<thead>
				<tr>
					<th><strong><?php echo esc_html("Theme Feature", "personalblogily"); ?></strong></th>
					<th><strong><?php echo esc_html("Basic Version", "personalblogily"); ?></strong></th>
					<th><strong><?php echo esc_html("Premium Version", "personalblogily"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php echo esc_html("Header Background Color/Image", "personalblogily"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Custom Header Logo Or Text", "personalblogily"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Hide Logo Text", "personalblogily"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
				</tr>

				<tr>
					<td><?php echo esc_html("Recent Posts Widget", "personalblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="<?php echo esc_html("No", "personalblogily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Easy Google Fonts", "personalblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="<?php echo esc_html("No", "personalblogily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Premium Support", "personalblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="<?php echo esc_html("No", "personalblogily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Fully SEO Optimized", "personalblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="<?php echo esc_html("No", "personalblogily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Replace Copyright Text", "personalblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="<?php echo esc_html("No", "personalblogily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Pagespeed Plugins", "personalblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="<?php echo esc_html("No", "personalblogily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
				</tr> 
				<tr>
					<td><?php echo esc_html("Customize Navigation Color", "personalblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="<?php echo esc_html("No", "personalblogily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Customize Footer Color", "personalblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="<?php echo esc_html("No", "personalblogily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Access All Child Themes", "personalblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="<?php echo esc_html("No", "personalblogily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo esc_html("Importable Demo Content", "personalblogily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/cross.png" alt="<?php echo esc_html("No", "personalblogily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/icons/check.png" alt="<?php echo esc_html("Yes", "personalblogily"); ?>" /></span></td>
				</tr>
			</tbody>
		</table>
		<div class="personalblogily-button-container">
			<a target="blank" href="<?php echo esc_url('https://superbthemes.com/personalblogily/', 'personalblogily'); ?>" class="button button-primary">
				<?php echo esc_html("GO PREMIUM", "personalblogily"); ?>
			</a>
		</div>
	</div>
	<?php
}





/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Personalblogily for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/tgm/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/tgm/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/tgm/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'personalblogily_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function personalblogily_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'      => 'Superb Helper',
			'slug'      => 'superb-helper',
			'required'  => false,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'personalblogily',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}


add_action('admin_init', 'personalblogily_spbThemesNotification');

function personalblogily_spbThemesNotification(){
	$notifications = include('inc/admin_notification/Autoload.php');
	$notifications->Add("personalblogily_notification", "Unlock All Features with Personal Blogily Premium – Limited Time Offer", "
		
		Take advantage of the up to <span style='font-weight:bold;'>40% discount</span> and unlock all features with Personal Blogily Premium. 
		The discount is only available for a limited time.

		<div>
		<a style='margin-bottom:15px;' class='button button-large button-secondary' target='_blank' href='https://superbthemes.com/personalblogily/'>Read More</a> <a style='margin-bottom:15px;' class='button button-large button-primary' target='_blank' href='https://superbthemes.com/personalblogily/'>Upgrade Now</a>
		</div>

		", "info");
	$notifications->Boot();
}