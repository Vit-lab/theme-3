<?php get_header(); ?>

<main id="content">
<?php	
$description = get_the_archive_description(); ?>
<?php if (have_posts()) { ?>
<?php
$class_sidebar = get_theme_mod('left_sidebar_or_right_sidebar', 'right_sidebar');
if (is_active_sidebar('topbar') && !($class_sidebar === 'without')) {
	get_sidebar(); ?>
	<div id='content_div'>
<?php } else { ?>
	<div id='content_div' class='content_div_auto'>
<?php } ?>

	<header id="archive_header">
		<?php the_archive_title('<h1>', '</h1>');
		if ($description) { ?>
			<div><?php echo wp_kses_post(wpautop($description)); ?></div>
		<?php } ?>
	</header>
	
	<?php while (have_posts()) {
		the_post();
		get_template_part('content/content');
	}
} else {
	get_template_part('content/content-none');
}
?><?php
get_footer();
