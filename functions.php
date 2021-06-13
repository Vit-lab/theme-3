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
	register_nav_menus(
		array(
			'primary' => 'Основное меню',
		)
	);
});

add_theme_support( 'customize-selective-refresh-widgets' );


add_action( 'widgets_init', function() {
	register_sidebar(
		array(
			'name' => 'LeftBar',
			'id' => 'topbar',
			'description' => 'TopBar',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
});

function special_nav_class($classes){
    $classes[] = 'first_li';
    return $classes;
}
add_filter('nav_menu_item_id', '__return_false');

add_filter('excerpt_length', function() {
	return 20;
});

add_action('customize_register', function( $wp_customize ) {
	$wp_customize->add_section(
		'excerpt_settings',
		array(
			'title' => 'Excerpt Settings',
			'capability' => 'edit_theme_options',
        	'description' => 'Выводить полный текст или обрезанный'
		)
	);
	$wp_customize->add_setting(
		'display_excerpt_or_full_post',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => 'excerpt',
			'sanitize_callback' => function( $value ) {
				return 'excerpt' === $value || 'full' === $value ? $value : 'excerpt';
			},
		)
	);
	$wp_customize->add_control(
		'display_excerpt_or_full_post',
		array(
			'type'    => 'radio',
			'section' => 'excerpt_settings',
			'label'   => 'On Archive Pages, posts show:',
			'choices' => array(
				'excerpt' => 'Summary',
				'full'    => 'Full text',
			),
		)
	);
});

add_action('customize_register', function($wp_customize) {
	$wp_customize->add_section(
		'sidebar_settings', 
		array(
			'title' => 'Настройка sidebar`а',
			'capability' => 'edit_theme_options',
        	'description' => 'Выбор размещения sidebar`а'
		)
	);
	$wp_customize->add_setting(
		'left_sidebar_or_right_sidebar',
		array(
			'capability' => 'edit_theme_options',
			'default' => 'right_sidebar',
			'sanitize_callback' => ''
		)
	);
	$wp_customize->add_control(
		'left_sidebar_or_right_sidebar',
		array(
			'type' => 'radio',
			'section' => 'sidebar_settings',
			'label' => 'On Archive Pages, posts show:',
			'choices' => array(
				'left_sidebar' => 'Sidebar с левой стороны',
				'right_sidebar' => 'Sidebar с правой стороны',
				'without' => 'Без sidebar`а'
			),
		)
	);
});

add_action('customize_register', function($wp_customize) {
	$wp_customize->add_section(
		'columns_settings', 
		array(
			'title' => 'Настройка колиества колонок',
			'capability' => 'edit_theme_options',
        	'description' => 'Выведение записей в одну или две колонки'
		)
	);
	$wp_customize->add_setting(
		'one_column_or_two_columns',
		array(
			'capability' => 'edit_theme_options',
			'default' => 'one_column',
			'sanitize_callback' => ''
		)
	);
	$wp_customize->add_control(
		'one_column_or_two_columns',
		array(
			'type' => 'radio',
			'section' => 'columns_settings',
			'label' => 'On Archive Pages, posts show:',
			'choices' => array(
				'one_column' => 'Одна колонка',
				'two_column' => 'Две колонки'
			),
		)
	);
});


function class_sidebar(){ 
	return get_theme_mod('left_sidebar_or_right_sidebar', 'right_sidebar');
}




function select_content_type($content) {
	while (have_posts()) {
		the_post();	
		switch ($content) {
			case 'content-page':
				test3();
				if (comments_open() || get_comments_number()) {
					comments_template();
				}
				break;
			case 'content':
				test4();
				break;
			case 'content-single':
				test5();
				if ( is_attachment() ) {
					the_post_navigation(
						array(
							'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
						)
					);
				}
				if ( is_singular( 'post' ) ) {
					the_post_navigation(
						array(
							'next_text' => '<span><svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    								<path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
    								<path d="M0 0h24v24H0z" fill="none"></path>
								</svg></span><span>Следующая запись</span><br/><span>%title</span>',
							'prev_text' => '<span>Предыдущая запись</span><br/><span>%title</span>',
						)		
					);
				}
				if (comments_open() || get_comments_number()) {
					comments_template();
				}
				break;
			case 'content-none':
				test6();
				break;
		}
	}
}

function test6() {
	printf("<section><header><h1>Ничего нет</h1></header><div><p>Ниодного поста небыло найдено</p></div></section>");
}

function test5() {
	printf("<article class='article-card-page'><header>");
	the_title('<h1>', '</h1>');
	printf("</header><div>");
	the_content();
	wp_link_pages(
		array(
			'before' => '<nav class="page-links">',
			'after' => '</nav>',
			'pagelink' => 'Page %',
		)
	);
	printf("</div><footer></footer></article>");
}

function test4() { 
	printf("<article class='article-card %s'><header>", get_theme_mod('one_column_or_two_columns', 'one_column'));
	if (is_singular()) {
		the_title('<h1>', '</h1>');
	} else {
		the_title(sprintf('<h2><a href="%s">', esc_url(get_permalink())), '</a></h2>');
	}
	printf("</header><div>");
	the_content();
	printf("</div><footer></footer></article>");
}

function test3() {
	printf("<article class='article-card-page'><header>");
	the_title('<h1>', '</h1>');
	printf("</header><div>");
	the_content();
	wp_link_pages(
		array(
			'before' => '<nav class="page-links">',
			'after' => '</nav>',
			'pagelink' => 'Page %',
		)
	);
	printf("</div><footer></footer></article>");
}


function archive_header(){
	printf("<header>");
	the_archive_title('<h1>', '</h1>');
		if (get_the_archive_description()) { 
			printf("<div>%s</div>", wp_kses_post(wpautop(get_the_archive_description())));
		}
		printf("</header>");
}

function sidebar_type_archive() {
	$description = get_the_archive_description();
	if (is_active_sidebar('topbar') && !(class_sidebar() === 'without')) {
		printf("<aside class='%s'>", class_sidebar());
		dynamic_sidebar('LeftBar');
		printf("</aside><div id='archive_div'>");
		printf("<header>");
		the_archive_title('<h1>', '</h1>');
		if ($description) { 
			printf("<div>%s</div>", wp_kses_post(wpautop($description)));
		}
		printf("</header><div id='archive_content_div'>");
	} else {
		printf("<div id='archive_div' class='archive_div_auto'>");
		printf("<header>");
		the_archive_title('<h1>', '</h1>');
		if ($description) { 
			printf("<div>%s</div>", wp_kses_post(wpautop($description)));
		}
		printf("</header><div id='archive_content_div'>");
	}
}
function sidebar_type() {
	if (is_active_sidebar('topbar') && !(class_sidebar() === 'without')) {
		printf("<aside class='%s'>", class_sidebar());
		dynamic_sidebar('LeftBar');
		printf("</aside><div id='content_div'>");
	} else {
		printf("<div id='content_div' class='content_div_auto'>");
	}
}

function my_site_title() {
	if (is_home()) {
		printf("<h1><a href='%s' rel='home'>%s</a></h1>", esc_url(home_url('/')), bloginfo('name'));
	} else { 
		printf("<p><a href='%s' rel='home'>%s</a></p>", esc_url(home_url('/')), bloginfo('name'));
	}
}

function my_site_description() {
	$description = get_bloginfo('description', 'display'); 
	if ( $description || is_customize_preview() ) {
		printf("<p>%s</p>", $description);
	}
}
	
function test_the_posts_navigation() {
	the_posts_pagination(
		array(
			'mid_size' => 2,
			'prev_text' => sprintf(
				'%s <span class="nav-prev-text">%s</span>',
				'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
    <path d="M0 0h24v24H0z" fill="none"></path>
</svg>',
				'Новые записи'
			),
			'next_text' => sprintf(
				'<span class="nav-next-text">%s</span> %s',
				'Старые записи',
				'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
    <path d="M0 0h24v24H0z" fill="none"></path>
</svg>'
			),
		)
	);
}
