<?php get_header(); ?>


	<div class="container">
		<h1><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
		<?php /*<div class="filter-container">
			<div class="filter-label">Filter By</div>
			<div class="filter-dropdown">
				<div class="filter-display">
					<?php
						if(single_term_title('', false) ){ 
							single_term_title();
						}
						else {
							echo 'Fliter By';
						};
					?>
				</div>
				<ul>
					<li><a href="<?php echo get_permalink( get_option('page_for_posts' ) ); ?>">All</a></li>
					<?php
						$categories = get_categories( array(
							'orderby' => 'name',
							'order'   => 'ASC'
						) );

						foreach( $categories as $category ) {
							$caturl = get_category_link( $category->term_id );
							$catname = $category->name;

							echo '<li><a href="' . $caturl .'">' . $catname. '</a></li>';
						} 
					?>
				</ul>
			</div>
		</div>*/ ?>
		
		<?php echo get_field('blog_overview', get_option('page_for_posts')); ?>
		
		<div class="blog-list">
			<?php while( have_posts() ): the_post(); ?>
			
				<article>
					<?php if(get_the_post_thumbnail_url(get_the_ID())): ?>
						<figure>
							<a href="<?php the_permalink(); ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium' ); ?>);">
							</a>
						</figure>
					<?php endif; ?>
					<div class="content">
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<p class="date"><?php the_time( 'F j, Y' ); ?></p>
						<a href="<?php the_permalink(); ?>" class="link">Read More <img src="<?php echo get_stylesheet_directory_uri() . '/images/link-arrow.png'; ?>" alt=""></a>
					</div>
				</article>
			
			<?php endwhile; ?>
		</div>
		<nav class="archive-nav">
			<?php
				echo paginate_links( array(
					'prev_text' => '<i class="fa fa-angle-left"></i>',
					'next_text' => '<i class="fa fa-angle-right"></i>',
					'type' => 'plain',
					'end_size' => 1,
					'mid_size' => 1
				) );
			?>
		</nav>
	</div>

<?php get_footer();