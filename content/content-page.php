<?php ?>
<article class='article-card-page'>
	<header class='article-header'>
		<?php the_title("<h1 class='header-h1'>", "</h1>"); ?>
	</header>
	<div class='article-content'>
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
	</footer>
</article>
