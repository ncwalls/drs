<?php get_header(); ?>


	<?php while( have_posts() ): the_post(); ?>
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>)">
				<div class="container">
					<h1><?php the_field('hero_title_part_1'); ?>
						<div class="hero-text-slider">
							<?php while( have_rows('hero_title_scrolling_text')): the_row(); ?>
								<div class="word"><?php the_sub_field('word'); ?></div>
							<?php endwhile; ?>
						</div>
						<?php the_field('hero_title_part_2'); ?></h1>
					<p><?php the_field('hero_subtitle'); ?></p>
				</div>
			</div>
			
			<div class="news">
				<div class="container">
					<h2><?php the_field('news_title'); ?></h2>
					<div class="news-content">
						<?php the_field('news_content'); ?>
					</div>
					
					<?php
						$recent_posts = get_posts(array(
							'posts_per_page' => 5
						));
					?>
					<div class="blog-list">
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
									<ul class="post-meta">
										<li><?php echo get_the_time( 'F j, Y', $recent_post->ID ); ?></li>
										<li><?php echo SparkSpringFramework::read_time($recent_post->ID); ?></li>
									</ul>
									<a href="<?php echo get_permalink($recent_post->ID); ?>" class="plus-button"></a>
								</div>
							</article>
						<?php endforeach; ?>
					</div>
					<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="all">See All</a>
				</div>
			</div>
		</article>
	<?php endwhile; ?>

<?php get_footer();