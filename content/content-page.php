<?php ?>
<article class='article-card-page'>
	<header>
		<?php the_title('<h1>', '</h1>'); ?>
	</header>
	<div>
		<?php the_content();
		wp_link_pages(
			array(
				'before'   => '<nav class="page-links">',
				'after'    => '</nav>',
				'pagelink' => 'Page %',
			)
		); ?>
	</div>
	<footer>
		<?php /*if (comments_open() || get_comments_number()) {
			comments_template();
		} */ ?>
	</footer>
</article>
