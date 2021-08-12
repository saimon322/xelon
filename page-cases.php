<?php
/**
 * Template Name: Cases
 */
get_header();
?>
<?php
$content = the_content();
echo wpautop($content);
?>
<?php get_footer(); ?>
