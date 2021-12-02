<?php
/**
 * Template Name: Front page
 */

get_header(); ?>

<?php $login_link = get_field('login_link', 'options'); 
      $signup_modal = get_field('signup_modal', 'options'); 
      $contacts_modal = get_field('contacts_modal', 'options'); 
      $consult_link = get_field('consult_link', 'options'); ?>

<div class="xln-page">
    <?php include 'template-parts/homepage/section-banner.php' ?>
    <?php include 'template-parts/homepage/section-customers.php' ?>
    <?php include 'template-parts/homepage/section-cases.php' ?>
    <?php include 'template-parts/homepage/section-info-block.php' ?>
    <?php include 'template-parts/homepage/section-about.php' ?>
    <?php include 'template-parts/homepage/section-certificates.php' ?>
    <?php include 'template-parts/homepage/section-news.php' ?>
    <?php include 'template-parts/homepage/section-ebook.php' ?>
</div>

<?php get_footer(); ?>
