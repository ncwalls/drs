<?php get_header(); ?>

	<?php while( have_posts() ): the_post(); ?>

		<div class="container">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<p class="post-meta">
					Posted on: <strong><?php the_time( 'F j, Y' ); ?></strong>
				</p>
				<?php the_content(); ?>
				<footer class="single-nav">
					<ul>
						<li class="item prev">
							<?php if( get_previous_post() ): $prev = get_previous_post(); ?>
								<a href="<?php echo get_permalink( $prev->ID ); ?>"><?php echo '<i class="fa fa-angle-left"></i><span class="text"> Previous</span>'; ?></a>
							<?php endif; ?>
						</li>
						<li class="item next">
							<?php if( get_next_post() ): $next = get_next_post(); ?>
							<a href="<?php echo get_permalink( $next->ID ); ?>"><?php echo '<span class="text">Next </span><i class="fa fa-angle-right"></i>'; ?></a>
							<?php endif; ?>
						</li>
						<li class="back">
							<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Back To Articles</a>
						</li>
					</ul>
				</footer>
			</article>
		</div>
	<?php endwhile; ?>

<?php get_footer();