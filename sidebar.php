<?php
$class_sidebar = get_theme_mod('left_sidebar_or_right_sidebar', 'right_sidebar'); ?>
<aside class='<?php echo $class_sidebar ?>'><?php dynamic_sidebar('topbar'); ?></aside>
