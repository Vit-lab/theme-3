<?php

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

