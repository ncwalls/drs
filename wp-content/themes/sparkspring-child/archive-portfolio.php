<?php get_header(); ?>

	<div class="container">
		<h1><?php echo get_field( 'portfolio_archive_title', 'option' ); ?></h1>

		<div class="main-content">
			<div class="hentry-content">
				<?php echo get_field( 'portfolio_archive_overview', 'option' ); ?>
			</div>
			<div class="filters">
				<p>Filter:</p>
				<div class="filter-container">
					<div class="filter-dropdown">
						<div class="filter-display">
							<?php
								if( single_term_title( '', false ) ){
									single_term_title();
								} else {
									echo 'Industry';
								}
							?>
						</div>
						<ul>
							<li><a href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>">All</a></li>
							<?php
								$categories = get_terms( array(
									'orderby' => 'name',
									'order'   => 'ASC',
									'taxonomy' => 'industry'
								) );

								foreach( $categories as $category ) {
									$caturl = get_term_link( $category->term_id );
									$catname = $category->name;

									echo '<li><a href="' . $caturl .'">' . $catname. '</a></li>';
								}
							?>
						</ul>
					</div>
				</div>
				<div class="filter-container">
					<div class="filter-dropdown">
						<div class="filter-display">
							<?php
								if( single_term_title( '', false ) ){
									single_term_title();
								} else {
									echo 'Service';
								}
							?>
						</div>
						<ul>
							<li><a href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>">All</a></li>
							<?php
								$categories = get_terms( array(
									'orderby' => 'name',
									'order'   => 'ASC',
									'taxonomy' => 'service'
								) );

								foreach( $categories as $category ) {
									$caturl = get_term_link( $category->term_id );
									$catname = $category->name;

									echo '<li><a href="' . $caturl .'">' . $catname. '</a></li>';
								}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<section class="projects-list">
			<?php while( have_posts() ): the_post(); ?>
				<?php
					//if ( get_the_post_thumbnail_url() ){
						$img = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
					//} elseif ( get_field( 'projects_default_featured_image', 'option' ) ){
					//	$img = get_field( 'projects_default_featured_image', 'option' )[ 'sizes' ][ 'medium' ];
					//} 
				?>

				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style="background-image: url(<?php echo $img; ?>)">
						<div class="hover-overlay">
							<h2 class="button"><?php the_title(); ?></h2>
						</div>
					</a>
				</article>
			<?php endwhile; ?>
		</section>
		
		<div class="archive-nav">
			<?php
				echo paginate_links( array(
					'prev_text' => '<i class="fa fa-angle-left"></i>',
					'next_text' => '<i class="fa fa-angle-right"></i>',
					'type' => 'plain'
				) );
			?>
		</div>
	</div>

<?php get_footer();