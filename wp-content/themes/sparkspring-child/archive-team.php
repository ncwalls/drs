<?php get_header(); ?>

	<div class="container">
		<h1><?php echo get_field( 'team_archive_title', 'option' ); ?></h1>

		<div class="hentry-content">
			<?php echo get_field( 'team_archive_overview', 'option' ); ?>
		</div>

		<section class="team-list">
			<?php while( have_posts() ): the_post(); ?>
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<?php
						if(get_field('team_member_static_image')){
							$static_img = get_field('team_member_static_image')['sizes']['medium'];
						}
						else{
							$static_img = get_the_post_thumbnail_url(get_the_ID(), 'medium');
						}
					
						if(get_field('team_member_hover_image')){
							$hover_img = get_field('team_member_hover_image')['sizes']['medium'];
						}
						else{
							$hover_img = get_the_post_thumbnail_url(get_the_ID(), 'medium');
						}
					?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<div class="img" style="background-image: url(<?php echo $static_img; ?>)">
							<div class="hover" style="background-image: url(<?php echo $hover_img; ?>)"></div>
						</div>
						<div class="title-overlay">
							<h2><?php the_title(); ?></h2>
							<?php if ( get_field( 'position_title' ) ){
									echo '<p>' . get_field( 'position_title' ) . '</p>'; 
								}
							?>
						</div>
					</a>
				</article>
			<?php endwhile; ?>
		</section>
	</div>

<?php get_footer();