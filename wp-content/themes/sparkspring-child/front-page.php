<?php get_header(); ?>


	<?php while( have_posts() ): the_post(); ?>
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>)">
				<div class="container">
					<h1><?php the_field('hero_title_part_1'); ?>
						<div class="hero-text-slider">
							<?php while( have_rows('hero_title_scrolling_text')): the_row(); ?>
								<div class="word"><div><?php the_sub_field('word'); ?></div></div>
							<?php endwhile; ?>
						</div>
						<?php the_field('hero_title_part_2'); ?></h1>
					<p><?php the_field('hero_subtitle'); ?></p>
				</div>
				<span class="hero-scroll fa fa-angle-down"></span>
			</div>
			
			<section class="home-about">
				<div class="container">
					<div class="about-content">
						<h2><?php the_field('home_about_title'); ?></h2>
						
						<?php the_field('home_about_content'); ?>
						
						<a href="<?php the_field('home_about_button_link'); ?>" class="button"><?php the_field('home_about_button_text'); ?></a>
					</div>
					<section class="home-team">
						<div class="team-slider">
							<?php //while(have_rows('team_slider')): the_row();
								$team = get_posts(array(
									'post_type' => 'team',
									'nopaging' => true,
									'orderby' => 'menu_order',
									'order' => 'ASC'
								));
								foreach( $team as $team_member ):
									$team_id = $team_member->ID; //get_sub_field('team_member'); ?>
									<div class="slide">
										<?php //if(get_the_post_thumbnail_url( $team_id )): ?>
											<?php
												if(get_field('team_member_static_image', $team_id)){
													$team_img = get_field('team_member_static_image', $team_id)['sizes']['medium'];
												}
												else{
													$team_img = get_the_post_thumbnail_url( $team_id, 'medium');
												}
											?>
											<figure>
												<a href="<?php echo get_permalink($team_id); ?>" class="img" style="background-image: url(<?php echo $team_img; ?>)"></a>
											</figure>
										<?php //endif; ?>
										<div class="content">
											<h3><a href="<?php echo get_permalink($team_id); ?>"><?php echo get_the_title($team_id); ?></a></h3>
											<p><?php echo get_field('position_title', $team_id); ?></p>
										</div>
									</div>
							<?php endforeach; ?>
						</div>
						<div class="team-description">
							<p><?php the_field('team_description'); ?></p>
							<a href="<?php the_field('team_button_link'); ?>" class="button"><?php the_field('team_button_text'); ?></a>
						</div>
					</section>
				</div>
			</section>
			
			<section class="home-projects">
				<div class="container">
					<h2><?php the_field('featured_projects_title'); ?></h2>
					<div class="featured-projects">
						<div class="tabs">
							<?php $tab_i = 0; while(have_rows('featured_projects')): the_row(); $tab_i++;?>
								<a href="#project-<?php echo $tab_i; ?>" data-action="project-tab" class="tab <?php echo $tab_i == 1 ? 'active' : ''; ?>"><?php echo get_sub_field('industry')->name; ?></a>
							<?php endwhile; ?>
						</div>
						<div class="projects">
							<?php $project_i = 0; while(have_rows('featured_projects')): the_row(); $project_i++;?>
								<div class="project <?php echo $project_i == 1 ? 'active' : ''; ?>" id="project-<?php echo $project_i; ?>">
									<?php $project_ID = get_sub_field('project')->ID; ?>
									<?php if(get_the_post_thumbnail_url( $project_ID )): ?>
										<figure style="background-image: url(<?php echo get_the_post_thumbnail_url( $project_ID, 'large' ); ?>)"></figure>
									<?php endif; ?>
									<div class="content">
										<h3><?php echo get_the_title($project_ID); ?></h3>
										<?php
											if( get_sub_field('short_description') ){
												echo get_sub_field('short_description');
											}
											else{
												echo '<p>' . SparkSpringChild::get_excerpt_by_id($project_ID, 30) . '</p>';
											}
										?>
										<div class="link">
											<a href="<?php echo get_permalink($project_ID); ?>" class="button">Project Details</a>
											<a href="<?php the_field('projects_button_link'); ?>" class="button ghost"><?php the_field('projects_button_text'); ?></a>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
					<?php /*<a href="<?php the_field('projects_button_link'); ?>" class="button"><?php the_field('projects_button_text'); ?></a>*/?>
				</div>
			</section>
			
			<section class="home-news">
				<div class="container">
					<h2><?php the_field('featured_news_title'); ?></h2>
					
					<?php
						$recent_posts = get_posts(array(
							'posts_per_page' => 3
						));
					?>
					<div class="news-slider">
						<?php foreach($recent_posts as $recent_post): ?>
							<article>
								<?php if(get_the_post_thumbnail_url( $recent_post->ID)): ?>
									<figure>
										<a href="<?php echo get_permalink($recent_post->ID); ?>">
											<img src="<?php echo get_the_post_thumbnail_url( $recent_post->ID, 'medium' ); ?>" alt="">
										</a>
									</figure>
								<?php endif; ?>
								<div class="content">
									<h3><a href="<?php echo get_permalink($recent_post->ID); ?>" title="<?php echo get_the_title($recent_post->ID); ?>"><?php echo get_the_title($recent_post->ID); ?></a></h3>
									<p class="categories">Categories:
										<?php
										$post_cats = wp_get_post_categories($recent_post->ID);
										$cat_count = count($post_cats);
										$cat_i = 0;
										foreach( $post_cats as $catID ): $cat_i++; ?>
											<a href="<?php echo get_category_link( $catID ); ?>"><?php echo get_cat_name( $catID ); ?></a><?php if($cat_i < $cat_count){ echo ','; } ?>
										<?php endforeach; ?>
									</p>
									<p><?php echo wp_trim_words( $recent_post->post_content, 50, '...' ); ?></p>
									<a href="<?php echo get_permalink($recent_post->ID); ?>" class="link">Read More <img src="<?php echo get_stylesheet_directory_uri() . '/images/link-arrow.png'; ?>" alt=""></a>
								</div>
							</article>
						<?php endforeach; ?>
					</div>
					<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="button">See All Articles</a>
				</div>
			</section>
		</article>
	<?php endwhile; ?>

<?php get_footer();