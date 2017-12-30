
<?php 
	$contact_data = get_field( 'contact_information', 'option' ); 
	$contact = $contact_data[ 0 ];
?>
		<footer class="site-footer">
			<div class="footer-cta" style="background-image: url(<?php echo get_field('footer_background','option')['url']; ?>)">
				<div class="container">
					<p><?php echo get_field('footer_text','option'); ?></p>
					<a href="<?php echo get_field('footer_button_link','option'); ?>" class="button"><?php echo get_field('footer_button_link_text','option'); ?></a>
				</div>
			</div>

			<div class="footer-bottom">
				<div class="container">
					<?php if ( $contact[ 'social_media_links' ] ): ?>
						<ul class="social">
							<?php foreach ( $contact[ 'social_media_links' ] as $social ): ?>
								<li><a href="<?php echo $social[ 'url' ]; ?>" target="_blank">
									<i class="fa <?php echo $social[ 'class' ]; ?>"></i>
									</a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<p class="copyright">&copy;<?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>.</p>
					<?php /*<a href="http://www.sparkspring.com" id="sparkspring-logo">
						<svg version="1.1"
							 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
							 x="0px" y="0px" width="101.1px" height="349.2px" viewBox="0 0 101.1 349.2" style="enable-background:new 0 0 101.1 349.2;"
							 xml:space="preserve">
								<path class="st0" d="M25.7,157C4.5,188.4-2.3,205.6,4.6,227.3c13.6,42.9,55.2,60.8,33.9,117.5c-0.4,1.1,2.7,5.3,3.4,4.2
									c16.3-24,24.6-39.7,25.2-55.1c30.7-46.2,40.3-72.2,29.9-104.9C76,122.4,11.5,94.8,44.5,6.8c0.6-1.7-4.2-8.2-5.3-6.5
									C4.3,51.4-6.9,78.3,4,112.9C9.3,129.5,17.2,143.7,25.7,157z M29.4,162.7c21.4,32.7,44.1,61.3,33.9,109.8
									C48.9,233.2,11.9,214.7,29.4,162.7z"/>
						</svg>
					</a>*/?>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>