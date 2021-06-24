<?php get_header();?>
<main id="content">
<?php
$class_sidebar = get_theme_mod('left_sidebar_or_right_sidebar', 'right_sidebar');
if (is_active_sidebar('topbar') && !($class_sidebar === 'without')) {
	get_sidebar(); ?>
	<div id='content_div'>
<?php } else { ?>
	<div id='content_div' class='content_div_auto'>
<?php } ?>
<?php if (have_posts()) {
	while (have_posts()) {
		the_post();
		get_template_part('content/content');
		
	}
	test_the_posts_navigation();
} else {
	get_template_part('content/content-none');
}
get_footer();
