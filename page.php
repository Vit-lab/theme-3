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
<?php while (have_posts()) {
	the_post();
	get_template_part('content/content-page');
	if (comments_open() || get_comments_number()) {
		comments_template();
	}
}
get_footer();
