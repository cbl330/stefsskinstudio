<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

	<footer id="footer" class="section-footer">
		<div class="container-footer pt-5">
			
			<!-- Start Footer - Top -->
			<div class="container container-top">
				<div class="row container row-footer-top">

					<!-- Start Left Column -->
					<div class="wrap-left col-lg-6 mb-lg-0">
						<div class="wrap-branding">
							<?php if ($logo = get_field('logo', 'option')): ?>
								<div class="wrap-logo">
									<img src="<?php echo esc_url($logo); ?>" alt="Stef's Skin Studio Logo" class="mb-3 mb-lg-0" />
								</div>
							<?php endif; ?>
							
							<?php if ($summary = get_field('summary', 'option')): ?>
								<div class="wrap-summary">
									<p><?php echo $summary; ?></p>
								</div>
							<?php endif; ?>
						</div>

						<!-- Start Mobile-Only Section -->
						<div class="wrap-all wrap-contact d-lg-none">
							<?php if ($location = get_field('location', 'option')): ?>
								<div class="mb location"><?php echo $location; ?></div>
							<?php endif; ?>

							<?php if ($hours = get_field('hours', 'option')): ?>
								<div class="mb hours"><?php echo $hours; ?></div>
							<?php endif; ?>

							<?php if ($contact_info = get_field('contact_info', 'option')): ?>
								<div class="contact-info"><?php echo $contact_info; ?></div>
							<?php endif; ?>
						</div>
						<!-- End Mobile-Only Section -->

						<div class="wrap-all wrap-nav">
							<p class="fw-bold mb-2 d-lg-none">Relevant Links</p>
								
							<!-- Footer Navigation -->
							<?php
								if (has_nav_menu('footer_menu')) :
									wp_nav_menu([
										'theme_location' => 'footer_menu',
										'menu_class'     => 'nav mb-3 mb-lg-0 flex-column flex-lg-row justify-content-between',
										'container'      => false,
										'link_before'    => '',
										'link_after'     => '',
										'fallback_cb'    => false,
										'depth'          => 1,
										'item_spacing'   => 'preserve',
									]);
								else :
									echo '<p class="text-muted">Add a Footer Menu in Appearance > Menus</p>';
								endif;
							?>

							<div class="wrap-social d-lg-none">
								<p class="fw-bold mb-2">Follow Us</p>
								<div class="social-group d-flex justify-content-start">
									<a href="#" class="facebook me-3"><i class="fab fa-facebook-f"></i></a>
									<a href="#" class="instagram me-3"><i class="fab fa-instagram"></i></a>
									<a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- End Left Column -->

					<!-- Start Right Column -->
					<div class="wrap-right col-lg-6">
						<div class="wrap-contact d-none d-lg-block">
							<!-- Start Desktop-Only Section -->
							<div class="row">
								<?php if ($location): ?>
									<div class="col-4">
										<p><?php echo $location; ?></p>
									</div>
								<?php endif; ?>

								<?php if ($hours): ?>
									<div class="col-4">
										<p><?php echo $hours; ?></p>
									</div>
								<?php endif; ?>

								<?php if ($contact_info): ?>
									<div class="col-4">
										<p><?php echo $contact_info; ?></p>
									</div>
								<?php endif; ?>
							</div>
							<!-- End Destop-Only Section -->
						</div>

						<div class="wrap-form">
							<?php if ($form_title = get_field('footer_form_title', 'option')): ?>
								<p class="fw-bold mb-3"><?php echo $form_title; ?></p>
							<?php endif; ?>
							<?php if (get_field('sign_up_form_shortcode', 'option')): ?>
								<div class="d-flex flex-column flex-md-row mb-3">
									<?php echo do_shortcode(get_field('sign_up_form_shortcode', 'option')); ?>
								</div>
							<?php endif; ?>
							<p class="small">
								By clicking Sign Up you're confirming that you agree with our
								<a href="#" class="terms">Terms and Conditions</a>.
							</p>
						</div>
					</div>
					<!-- End Right Column -->

				</div>
			</div>
			<!-- End Footer - Top -->

			<!-- Start Footer - Bottom -->
			<div class="container-bottom">
				<div class="container">
					<div class="container row-footer-bottom d-flex flex-column flex-lg-row align-items-lg-center">

						<!-- Start Copyright Wrap -->
						<div class="wrap-copyright">
							<p class="me-lg-3">&copy; <?php echo date('Y'); ?> Stef's Skin Studio. All rights reserved | Website design and marketing by <a href="#">Marshland Digital</a></p>
						</div>
						<!-- End Copyright Wrap -->

						<!-- Start Terms Wrap -->
						<nav class="wrap-terms d-flex justify-content-start">
							<a href="#" class="me-3">Privacy Policy</a>
							<a href="#" class="me-3">Terms of Service</a>
							<a href="#">Cookie Settings</a>
						</nav>
						<!-- End Terms Wrap -->

						<!-- Start Social Wrap -->
						<div class="wrap-social d-none d-lg-flex justify-content-end">
							<a href="#" class="facebook me-3"><i class="fab fa-facebook-f"></i></a>
							<a href="#" class="instagram me-3"><i class="fab fa-instagram"></i></a>
							<a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
						</div>
						<!-- End Social Wrap -->

					</div>
				</div>
			</div>
			<!-- End Footer - Bottom -->

		</div>
	</footer>

	<!-- Start Mobile Sticky Bar -->
	<?php
		// Get ACF fields
		$phone_number = get_field('phone_number', 'option');
		$email = get_field('email', 'option');
		$booking_link = get_field('booking_link', 'option');
	?>

	<div id="mobile-sticky-bar" class="sticky-bar">
		<div class="container-bar">
			<div class="wrap-icon-group">
				<?php if ($phone_number): ?>
					<div class="wrap-icon wrap-phone">
						<a href="tel:<?php echo esc_attr($phone_number); ?>" class="icon phone">
							<i class="fas fa-phone-alt"></i>
						</a>
					</div>
				<?php endif; ?>
				<?php if ($email): ?>
					<div class="wrap-icon wrap-mail">
						<a href="mailto:<?php echo esc_attr($email); ?>" class="icon email">
							<i class="fas fa-envelope"></i>
						</a>
					</div>
				<?php endif; ?>
				<?php if ($booking_link): ?>
					<div class="wrap-icon wrap-book">
						<a href="<?php echo esc_url($booking_link); ?>" class="icon calendar">
							<i class="fas fa-calendar-check"></i>
						</a>
					</div>
				<?php endif; ?>
			</div>
			<?php if ($booking_link): ?>
				<span class="consultation">Book Your Consultation</span>
			<?php endif; ?>
			<button class="close-btn"><i class="fas fa-times"></i></button>
		</div>
	</div>
	<!-- Mobile Sticky Bar -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

