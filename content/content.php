<?php ?>
<article class='article-card <?php echo get_theme_mod('one_column_or_two_columns', 'one_column'); ?>'>
	<header class='article-header'>
		<?php if (is_singular()) { 
			the_title('<h1>', '</h1>');
		} else {
			the_title(sprintf('<h2><a href="%s">', esc_url(get_permalink())), '</a></h2>');
		} ?>
	</header>
	<div class='article-content'>
		<?php the_content(); ?>
	</div>
	<footer>
	</footer>
</article>
