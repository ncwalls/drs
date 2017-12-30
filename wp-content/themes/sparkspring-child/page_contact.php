<?php
/*
 * Template Name: Contact
 */
get_header(); ?>


<?php 
	$contact_data = get_field( 'contact_information', 'option' ); 
	$contact = $contact_data[ 0 ];
?>

	<div class="container">
		<?php while( have_posts() ): the_post(); ?>
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				
				<div class="contact-links">
					<?php if( $contact[ 'phone_number' ] ): ?>
						<p class="phone">Phone: <a href="tel:<?php echo $contact[ 'phone_number' ]; ?>" class="footer-phone"><?php echo $contact[ 'phone_number' ]; ?></a></p>
					<?php endif; ?>
					
					<?php if( $contact[ 'email_address' ] ): ?>
						<p class="email">Email: <a href="mailto:<?php echo $contact[ 'email_address' ]; ?>"><?php echo $contact[ 'email_address' ]; ?></a></p>
					<?php endif; ?>
					
					<?php if( $contact[ 'social_media_links' ] ): ?>
						<p class="social">
							<?php foreach ( $contact[ 'social_media_links' ] as $social ): ?>
								<a href="<?php echo $social[ 'url' ]; ?>" target="_blank">
									<i class="fa <?php echo $social[ 'class' ]; ?>"></i>
								</a>
							<?php endforeach; ?>
						</p>
					<?php endif; ?>
				</div>
				<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="false"]'); ?>
			</article>
		<?php endwhile; ?>
	</div>

<?php get_footer();