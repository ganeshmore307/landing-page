<?php
/**
 * 13Xplay standalone front page shell.
 * All visible page content is native Elementor data stored on the Home page.
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<?php wp_head(); ?>
</head>
<body <?php body_class( 'x13-standalone' ); ?>>
<?php wp_body_open(); ?>
<main id="primary" class="x13-page-content">
<?php
while ( have_posts() ) :
    the_post();
    the_content();
endwhile;
?>
</main>
<?php wp_footer(); ?>
</body>
</html>
