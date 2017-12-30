<?php get_header(); ?>
	
	<?php while( have_posts() ): the_post(); ?>

		<div class="container">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</article>
		</div>
	<?php endwhile; ?>

<?php get_footer();