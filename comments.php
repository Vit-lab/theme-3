<?php if (post_password_required()) {
	return;
}
$twenty_twenty_one_comment_count = get_comments_number(); ?>
<div class="<?php echo get_option('show_avatars') ? 'show-avatars' : ''; ?>">
	<?php if (have_comments()) { ?>
		<h2 class="comments-title">
			<?php if ( '1' === $twenty_twenty_one_comment_count ) {
			    esc_html_e( '1 comment', 'twentytwentyone' );
			} else {
			    printf(
					esc_html(_nx('%s comment', '%s comments', $twenty_twenty_one_comment_count, 'Comments title', 'twentytwentyone')),
					esc_html(number_format_i18n($twenty_twenty_one_comment_count))
				);
			} ?>
		</h2>
		<ol class="comment-list">
			<?php wp_list_comments(
				array(
					'avatar_size' => 60,
					'style' => 'ol',
					'short_ping' => true,
				)
			); ?>
		</ol>
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
		<?php }
	}
	comment_form(
		array(
			'logged_in_as' => null,
			'title_reply' => 'Оставте коментарий',
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after' => '</h2>',
		)
	); ?>
</div>
