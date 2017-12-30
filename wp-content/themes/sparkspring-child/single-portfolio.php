<?php get_header(); ?>

	<?php while( have_posts() ): the_post(); ?>

		<div class="container">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<?php if ( get_the_post_thumbnail_url() ): ?>
					<figure class="featured-image">
						<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="">
					</figure>
				<?php endif; ?>
				<?php the_content(); ?>
				<footer class="single-nav">
					<ul>
						<?php
							$all_projects = get_posts(array(
								'post_type' => 'portfolio',
								//'posts_per_page' => -1,
								'nopaging' => true,
								'orderby' => 'menu_order',
								'order' => 'ASC'
							));

							if( get_previous_post() ){
								$prev = get_previous_post();
							}
							else{
								$prev = array_values(array_slice($all_projects, -1))[0];
							}
						?>
						<li class="item prev">
							<a href="<?php echo get_permalink( $prev->ID ); ?>"><i class="fa fa-angle-left"></i> Previous Project</a>
						</li>
						<li class="item next">
							<?php

								if( get_next_post() ){
									$next = get_next_post();
								}
								else{
									$next = $all_projects[0];
								}
							?>
							<a href="<?php echo get_permalink( $next->ID ); ?>">Next Project <i class="fa fa-angle-right"></i></a>
						</li>
						<li class="back">
							<a href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>">Back To Portfolio</a>
						</li>
					</ul>
				</footer>
			</article>
		</div>
	<?php endwhile; ?>

<?php get_footer();