<?php
/* Template Name: Design Gallery */
get_header(); ?>
	
	<?php while( have_posts() ): the_post(); ?>

		<div class="container">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<section class="gallery">
					<?php
						$gallery_images = get_field('gallery_images');
						foreach( $gallery_images as $img ):
					//print_r($img);
					?>
						<div class="img">
							<a href="<?php echo $img['url']; ?>" style="background-image: url(<?php echo $img['sizes']['medium']; ?>)"></a>
						</div>
					<?php endforeach; ?>
				</section>
			</article>
		</div>
	<?php endwhile; ?>

<?php get_footer();