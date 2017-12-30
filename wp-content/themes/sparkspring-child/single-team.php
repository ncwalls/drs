<?php get_header(); ?>

	<div class="container">
		<?php while( have_posts() ): the_post(); ?>
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="left">
					<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" alt="<?php the_title(); ?>">
				</div>
				<div class="right">
					<h1><?php the_title(); ?></h1>
					<?php if(get_field( 'position_title' )): ?>
						<h3><?php the_field( 'position_title' ); ?></h3>
					<?php endif; ?>
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>

		<footer class="single-nav">
			<ul>
				<?php
					$all_team = get_posts(array(
						'post_type' => 'team',
						//'posts_per_page' => -1,
						'nopaging' => true,
						'orderby' => 'menu_order',
						'order' => 'ASC'
					));

					if( get_previous_post() ){
						$prev = get_previous_post();
					}
					else{
						$prev = array_values(array_slice($all_team, -1))[0];
					}
				?>
				<li class="item prev">
					<a href="<?php echo get_permalink( $prev->ID ); ?>"><i class="fa fa-angle-left"></i> <?php echo $prev->post_title; ?></a>
				</li>
				<li class="item next">
					<?php
						
						if( get_next_post() ){
							$next = get_next_post();
						}
						else{
							$next = $all_team[0];
						}
					?>
					<a href="<?php echo get_permalink( $next->ID ); ?>"><?php echo $next->post_title; ?> <i class="fa fa-angle-right"></i></a>
				</li>
				<li class="back">
					<a href="<?php echo get_post_type_archive_link( 'team' ); ?>">Back To Team</a>
				</li>
			</ul>
		</footer>
	</div>

<?php get_footer();