<?php

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
