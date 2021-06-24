<?php

remove_action('wp_head', 'wp_generator');

add_action('wp_enqueue_scripts', function() {
	wp_enqueue_style('style', get_stylesheet_uri());
	}
);

add_action('wp_head', function () {
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo('pingback_url')));
	}
});

add_action('wp_head', function() {
	echo apply_filters(
		'generate_meta_viewport',
		'<meta name="viewport" content="width=device-width, initial-scale=1">'
		);
	}
);
	
add_action('after_setup_theme', function() {
	register_nav_menus([
		'primary' => 'Основное меню',
	]);
});

add_theme_support( 'customize-selective-refresh-widgets' );

add_filter('excerpt_length', function() {
	return 20;
});

function my_site_title() {
	if (is_home()) { ?>
		<h1><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1><?php
	} else { ?>
		<p><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p><?php
	}
}

function my_site_description() {
	$description = get_bloginfo( 'description', 'display' ); 
	if ( $description || is_customize_preview() ) { ?>
		<p><?php echo $description; ?></p>
	<?php }
	}	

function test_the_posts_navigation() {
	the_posts_pagination([
			'mid_size' => 2,
			'prev_text' => '<span class="material-icons  md-19">chevron_left</span> <span class="nav-prev-text">Новые записи</span>',
			'next_text' => '<span class="nav-next-text">Старые записи</span><span class="material-icons  md-19">chevron_right</span>'
	]);
}
add_action( 'wp_enqueue_scripts', function() {wp_enqueue_script('jquery');} );

	/*wp_enqueue_script( 'wpb_test', get_template_directory_uri() . '/js/test.js');*/

require get_template_directory() . '/inc/customize_theme_setting.php';
require get_template_directory() . '/inc/widget_setting.php';	
