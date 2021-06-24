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
	the_post(); ?>
	<?php 
	get_template_part( 'content/content-single' );
	
	

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
				'next_text' => '<span>Следующая запись</span><br/><span>%title</span>',
				'prev_text' => '<span>Предыдущая запись</span><br/><span>%title</span>',
			)
		);
	}

if (comments_open() || get_comments_number()) {
		comments_template();
	}
	
}

get_footer();
