<?php get_header(); ?>
<?php
if (function_exists('bitcat_404__record')) {
    bitcat_404__record();
}

?>
<div class="simple-page padding-15">
	<div class="container text-center">
		<h1 class="like-h1">Oops..</h1>
            <h3> The page you are looking for no longer exists or moved to another URL</h3>
		<div class="page-content">
            <p>There is nothing to see here.
            <br>What about to try from <a href="/">HOMEPAGE</a>?
            </p>
		</div>
	</div>
</div>
<?php get_footer(); ?>
