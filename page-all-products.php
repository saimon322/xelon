<?php
/**
 * Template Name: All products
 */
get_header(); ?>

<section class="s-allp-header">
  <div class="container">
    <h1><?php the_field('title'); ?></h1>
    <p><?php the_field('sub_title'); ?></p>
  </div>
</section>

<?php  require __DIR__ . '/components/blocks3.php' ?>

<?php require __DIR__ . '/components/testimonials.php' ?>

<?php get_footer(); ?>