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
				<?php //the_content(); ?>
				
				<?php if(get_field('project_situation')): ?>
					<section class="project-content-section">
						<h2>The Situation</h2>
						<?php the_field('project_situation'); ?>
					</section>
				<?php endif; ?>
				
				<?php if(get_field('project_plan')): ?>
					<section class="project-content-section">
						<h2>The Plan</h2>
						<?php the_field('project_plan'); ?>
					</section>
				<?php endif; ?>
				
				<?php if(get_field('project_result')): ?>
					<section class="project-content-section">
						<h2>The Result</h2>
						<?php the_field('project_result'); ?>
					</section>
				<?php endif; ?>
				
				<?php if(get_field('project_location')): ?>
					<section class="project-content-section">
						<h2>Location</h2>
						<?php the_field('project_location'); ?>
					</section>
				<?php endif; ?>
				
				<?php if(get_field('project_testimonial')): ?>
					<blockquote class="project-testimonial">
						<?php the_field('project_testimonial'); ?>
						<cite>
							<em><?php the_field('project_testimonial_author'); ?></em>
							<?php the_field('project_testimonial_author_more_details'); ?>
						</cite>
					</blockquote>
				<?php endif; ?>
				
				<?php if(get_field('project_photos')): ?>
					<section class="project-photos gallery">
						<?php
							$project_photos = get_field('project_photos');
							foreach( $project_photos as $img ):
						?>
							<figure>
								<a href="<?php echo $img['url']; ?>" class="img" style="background-image: url(<?php echo $img['sizes']['large']; ?>)"></a>
							</figure>
						<?php
							endforeach;
						?>
					</section>
				<?php endif; ?>
				
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