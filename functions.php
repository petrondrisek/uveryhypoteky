<?php
/**
 * uveryhypoteky functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package uveryhypoteky
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'uveryhypoteky_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function uveryhypoteky_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on uveryhypoteky, use a find and replace
		 * to change 'uveryhypoteky' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'uveryhypoteky', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'uveryhypoteky' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'uveryhypoteky_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'uveryhypoteky_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function uveryhypoteky_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'uveryhypoteky_content_width', 640 );
}
add_action( 'after_setup_theme', 'uveryhypoteky_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function uveryhypoteky_widgets_init() {
	register_sidebar(
		array(
			'name'		   => esc_html__('Hlavní stránka', 'uveryhypoteky'),
			'id'		   => 'main-site'
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'uveryhypoteky' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'uveryhypoteky' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'uveryhypoteky_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function uveryhypoteky_scripts() {
	wp_enqueue_style( 'uveryhypoteky-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'uveryhypoteky-style', 'rtl', 'replace' );

	wp_enqueue_script( 'uveryhypoteky-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_script( 'bootstrap-js' , get_template_directory_uri() . '/bootstrap/js/bootstrap.bundle.min.js', array('jquery') );

	wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/theme.css' );
	wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/theme.js', array('jquery'), time() );

	wp_enqueue_script( 'mapy-script', 'https://api.mapy.cz/loader.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'uveryhypoteky_scripts' );

/**
 * Register widget
 */
require get_template_directory() . '/inc/custom-widget.php';
register_widget('Page_widget');

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

function uveryhypoteky_theme_customizer( $wp_customize ){
	$wp_customize->add_section('uveryhypoteky_header_settings', array(
		'title'=> __('Nastavení šablony', 'uveryhypoteky'),
		'priority' => 1
	));

	//Adresa
	$wp_customize->add_setting('uveryhypoteky_header_settings_adress', array(
		'default'=>'',
		'sanitize_callback'=>'sanitize_custom_option'
	));

	$wp_customize->add_control('uveryhypoteky_header_settings_adress_control', array(
		'label'=>__('Adresa (více adres použitím ; středníku mezi adresy)', 'uveryhypoteky'),
		'type'=>'textarea',
		'section'=>'uveryhypoteky_header_settings',
		'settings'=>'uveryhypoteky_header_settings_adress'
	) );

	//Sociální sítě
	$wp_customize->add_setting('uveryhypoteky_header_settings_facebook', array(
		'default'=>'',
		'sanitize_callback'=>'sanitize_custom_option'
	));
	$wp_customize->add_setting('uveryhypoteky_header_settings_instagram', array(
		'default'=>'',
		'sanitize_callback'=>'sanitize_custom_option'
	));
	$wp_customize->add_setting('uveryhypoteky_header_settings_linkedin', array(
		'default'=>'',
		'sanitize_callback'=>'sanitize_custom_option'
	));

	$wp_customize->add_control('uveryhypoteky_header_settings_facebook_control', array(
		'label'=>__('Facebook URL', 'uveryhypoteky'),
		'type'=>'input',
		'section'=>'uveryhypoteky_header_settings',
		'settings'=>'uveryhypoteky_header_settings_facebook'
	) );
	$wp_customize->add_control('uveryhypoteky_header_settings_instagram_control', array(
		'label'=>__('Instagram URL', 'uveryhypoteky'),
		'type'=>'input',
		'section'=>'uveryhypoteky_header_settings',
		'settings'=>'uveryhypoteky_header_settings_instagram'
	) );
	$wp_customize->add_control('uveryhypoteky_header_settings_linkedin_control', array(
		'label'=>__('LinkedIn URL', 'uveryhypoteky'),
		'type'=>'input',
		'section'=>'uveryhypoteky_header_settings',
		'settings'=>'uveryhypoteky_header_settings_linkedin'
	) );

	//Site Description
	$wp_customize->add_setting('uveryhypoteky_description', array(
		'default'=>'',
		'sanitize_callback'=>'sanitize_custom_option'
	));
	$wp_customize->add_control('uveryhypoteky_description_control', array(
		'label'=>__('Popis stránky - slider ([text] = barva)', 'uveryhypoteky'),
		'type'=>'textarea',
		'section'=>'uveryhypoteky_header_settings',
		'settings'=>'uveryhypoteky_description'
	) );

	//Telefon
	$wp_customize->add_setting('uveryhypoteky_header_settings_phone', array(
		'default'=>'',
		'sanitize_callback'=>'sanitize_custom_option'
	));
	$wp_customize->add_setting('uveryhypoteky_header_settings_phone_info', array(
		'default'=>'',
		'sanitize_callback'=>'sanitize_custom_option'
	));

	$wp_customize->add_control('uveryhypoteky_header_settings_phone_control', array(
		'label'=>__('Telefon - číslo', 'uveryhypoteky'),
		'type'=>'input',
		'section'=>'uveryhypoteky_header_settings',
		'settings'=>'uveryhypoteky_header_settings_phone'
	) );
	$wp_customize->add_control('uveryhypoteky_header_settings_phone_info_control', array(
		'label'=>__('Telefon - informace', 'uveryhypoteky'),
		'type'=>'input',
		'section'=>'uveryhypoteky_header_settings',
		'settings'=>'uveryhypoteky_header_settings_phone_info'
	) );

	//Email
	$wp_customize->add_setting('uveryhypoteky_header_settings_email', array(
		'default'=>'',
		'sanitize_callback'=>'sanitize_custom_option'
	));

	$wp_customize->add_control('uveryhypoteky_header_settings_email_control', array(
		'label'=>__('Email', 'uveryhypoteky'),
		'type'=>'input',
		'section'=>'uveryhypoteky_header_settings',
		'settings'=>'uveryhypoteky_header_settings_email'
	) );

	//Navbar button
	$wp_customize->add_setting('uveryhypoteky_header_settings_navbar_a', array(
		'default'=>'',
		'sanitize_callback'=>'sanitize_custom_option'
	));
	$wp_customize->add_setting('uveryhypoteky_header_settings_navbar_text', array(
		'default'=>'',
		'sanitize_callback'=>'sanitize_custom_option'
	));

	$wp_customize->add_control('uveryhypoteky_header_settings_navbar_a_control', array(
		'label'=>__('Navigace tlačítko - odkaz', 'uveryhypoteky'),
		'type'=>'input',
		'section'=>'uveryhypoteky_header_settings',
		'settings'=>'uveryhypoteky_header_settings_navbar_a'
	) );
	$wp_customize->add_control('uveryhypoteky_header_settings_navbar_text_control', array(
		'label'=>__('Navigace tlačítko - text', 'uveryhypoteky'),
		'type'=>'input',
		'section'=>'uveryhypoteky_header_settings',
		'settings'=>'uveryhypoteky_header_settings_navbar_text'
	) );

	//Slider
	for($i = 0; $i < 3; $i++){
		$wp_customize->add_setting('uveryhypoteky_header_settings_slider_'.$i.'_img', array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'absint'
		));
		$wp_customize->add_setting('uveryhypoteky_header_settings_slider_'.$i.'_text', array(
			'default'=>'',
			'sanitize_callback'=>'sanitize_custom_option'
		));
		$wp_customize->add_setting('uveryhypoteky_header_settings_slider_'.$i.'_button_href', array(
			'default'=>'',
			'sanitize_callback'=>'sanitize_custom_option'
		));
		$wp_customize->add_setting('uveryhypoteky_header_settings_slider_'.$i.'_button_text', array(
			'default'=>'',
			'sanitize_callback'=>'sanitize_custom_option'
		));

		$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'uveryhypoteky_header_settings_slider_'.$i.'_img_control', array(
			'label'=>__('Slider '.$i.' - Obrázek', 'uveryhypoteky'),
			'section' => 'image',
			'mime_type' => 'image',
			'section'=>'uveryhypoteky_header_settings',
			'settings'=>'uveryhypoteky_header_settings_slider_'.$i.'_img'
		)));
		$wp_customize->add_control('uveryhypoteky_header_settings_slider_'.$i.'_text_control', array(
			'label'=>__('Slider '.$i.' - Text ([text] = barevně, [br] nový řádek)', 'uveryhypoteky'),
			'type'=>'textarea',
			'section'=>'uveryhypoteky_header_settings',
			'settings'=>'uveryhypoteky_header_settings_slider_'.$i.'_text'
		) );
		$wp_customize->add_control('uveryhypoteky_header_settings_slider_'.$i.'_button_href_control', array(
			'label'=>__('Slider '.$i.' - Tlačítko odkaz', 'uveryhypoteky'),
			'type'=>'input',
			'section'=>'uveryhypoteky_header_settings',
			'settings'=>'uveryhypoteky_header_settings_slider_'.$i.'_button_href'
		) );
		$wp_customize->add_control('uveryhypoteky_header_settings_slider_'.$i.'_button_text_control', array(
			'label'=>__('Slider '.$i.' - Tlačítko text', 'uveryhypoteky'),
			'type'=>'input',
			'section'=>'uveryhypoteky_header_settings',
			'settings'=>'uveryhypoteky_header_settings_slider_'.$i.'_button_text'
		) );
	}
}

function sanitize_custom_option($input){
	return filter_var($input, FILTER_SANITIZE_STRING);
}

add_action('customize_register', 'uveryhypoteky_theme_customizer');
