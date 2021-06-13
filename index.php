<?php get_header();
sidebar_type();
if (have_posts()) {
	select_content_type('content');
} else {
	select_content_type('content-none');
}
get_footer();
