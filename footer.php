<?php ?>
			</div>
		</main>
		<footer class='page-footer'>
		
		<div class="site-info">
			<?php $blog_info = get_bloginfo('name');
			if (!empty($blog_info)) { ?>
				<a class="site-name" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php echo $blog_info; ?></a>,
			<?php } ?>
			<a href="<?php echo esc_url('https://wordpress.org/'); ?>" class="imprint">
				<?php printf('Сайт работает на %s.', 'WordPress'); ?>
			</a>
			<?php
			if ( function_exists( 'the_privacy_policy_link' ) ) {
				the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
			}?>
			<p>test</p>
			<script type="text/javascript" src="http://localhost/wordpress/wp-content/themes/theme_3/js/test.js" id="wpb_test-js"></script>
		</footer>
		<?php wp_footer() ?>
	</body>
</html>
