<?php ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>"/>
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head();?>
	</head>
	<body <?php body_class();?>>
<?php wp_body_open(); ?>
	<header id="header_page">
		<div id='wrap'>
			<div id='td'>
				<p class='text'><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
				<p class='text'><?php echo get_bloginfo('description', 'display'); ?></p>
			</div>
			<a id='sign_in' href="<?php echo wp_login_url(); ?>" rel="home">Вход</a> 
		</div>
		<?php if (has_nav_menu('primary')) {
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu' => '', 
					'container' => 'nav',
					'container_class' => '', 
					'container_id' => '',
					'menu_class' => 'first',
					'menu_id' => '',
					'echo' => true,
					'fallback_cb' => 'wp_page_menu',
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'items_wrap' => '<ul class="%2$s">%3$s</ul>',
					'depth' => 0,
					'walker' => '',
				)
			);
		} ?>
    </header>
	<main id="content">
	
		
