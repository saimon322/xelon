<?php get_header(); ?>
<div class="simple-page padding-15">
	<div class="container">
		<h1 class="like-h1"><?php the_title();?></h1>
		<div class="page-content">
			<?php while ( have_posts() ) : the_post(); ?>
			<?php
			$content = the_content();
			echo wpautop($content);
			?>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>