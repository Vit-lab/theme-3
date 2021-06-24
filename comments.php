<?php if (post_password_required()) {
	return;
}
/*$twenty_twenty_one_comment_count = get_comments_number();*/?>

	<?php if (have_comments()) { ?>
	<div class="<?php echo get_option('show_avatars') ? 'show-avatars' : ''; ?>">
		<h2 class="comments-title">Коментарии</h2>
		<ul class="comment-list">
			<?php wp_list_comments(
				array(
					'avatar_size' => 32,
					'style' => 'ul',
					'short_ping' => true,
				)
			); ?>
		</ul>
		<?php the_comments_pagination(
			array(
				'before_page_number' => 'Страница ',
				'mid_size' => 0,
				'prev_text' => '<span class="nav-prev-text">Старые комментарии</span>',
				'next_text' => '<span class="nav-next-text">Новые комметарии</span>'
			)
		);
		if ( ! comments_open() ) { ?>
			<p class="no-comments">Комментарии закрыты.</p>
		<?php }?>
		</div>
	<?php }
	?>
	
	<?php
	comment_form(
		array(
			'logged_in_as' => null,
			'title_reply' => 'Оставте коментарий',
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after' => '</h2>',
		)
	); ?>
