<?php
/**
 * The sidebar template file.
 * @package RestImpo
 * @since RestImpo 1.0.0
*/
?>
<?php if (get_theme_mod('restimpo_display_sidebar', restimpo_default_options('restimpo_display_sidebar')) != 'Hide'){ ?>
<aside id="sidebar">
<?php if ( dynamic_sidebar( 'sidebar-1' ) ) : else : ?>
<?php endif; ?>
</aside> <!-- end of sidebar -->
<?php } ?>