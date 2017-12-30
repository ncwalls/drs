<?php get_header(); ?>

	<div class="container">
		<h1><?php post_type_archive_title(); ?></h1>

		<div class="hentry-content">
			<?php the_field( 'our-team_content', 'option' ); ?>
		</div>

		<section class="team-list">
			<?php while( have_posts() ): the_post(); ?>
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<?php
						if(get_field('overview_page_static_image')){
							$static_img = get_field('overview_page_static_image')['sizes']['medium'];
						}
						else{
							$static_img = get_the_post_thumbnail_url(get_the_ID(), 'medium');
						}
					
						if(get_field('overview_page_hover_image')){
							$hover_img = get_field('overview_page_hover_image')['sizes']['medium'];
						}
						else{
							$hover_img = get_the_post_thumbnail_url(get_the_ID(), 'medium');
						}
					?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style="background-image: url(<?php echo $static_img; ?>)">
						<div class="hover" style="background-image: url(<?php echo $hover_img; ?>)">
							<p>Meet <?php the_title(); ?></p>
						</div>
						<div class="title-overlay">
							<h2>
								<?php 
									$string = get_the_title();

									if ( get_field( 'position_title' ) ){
										$string .= ', ' . get_field( 'position_title' ); 
									}

									echo $string;
								?>
							</h2>
						</div>
					</a>
				</article>
			<?php endwhile; ?>

			<?php // Callout ?>
			<?php if ( get_field( 'our-team_member_callout_button_link', 'option' ) && get_field( 'our-team_member_callout_header', 'option' ) ): ?>
				<div class="team-callout">
					<div class="inner" style="background-image: url(<?php echo get_field( 'our-team_member_callout_background_image', 'option' )[ 'sizes' ][ 'medium' ]; ?>)">
						<div class="content">
							<h3><?php the_field( 'our-team_member_callout_header', 'option' ); ?></h3>
							<?php the_field( 'our-team_member_callout_content', 'option' ); ?>

							<a class="button button-white" href="<?php the_field( 'our-team_member_callout_button_link', 'option' ); ?>">
								<?php the_field( 'our-team_member_callout_button_text', 'option' ); ?>
							</a>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</section>
	</div>

<?php get_footer();