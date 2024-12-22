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

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="container-fluid py-4">
					<div class="container">
						<div class="row">
						<!-- Start Left Column -->
						<div class="col-lg-6 mb-4 mb-lg-0">
							<h5 class="mb-3">Stef's Skin Studio</h5>
							<p>
							Stef's Skin Studio offers expert, personalized skincare services focused on helping clients achieve their best skin.
							</p>
							<div class="d-lg-none mb-3">
							<!-- Mobile-Only Section -->
							<p class="fw-bold mb-1">Our Location</p>
							<p>123 Skincare Lane<br>Mt. Pleasant, SC 29464</p>
							<p class="fw-bold mb-1">Hours of Operation</p>
							<p>Monday to Friday: 9 AM - 6 PM<br>Saturday: 10 AM - 4 PM</p>
							<p class="fw-bold mb-1">Contact Us</p>
							<p>
								<a href="tel:+18435307859">(843) 530-7859</a><br>
								<a href="mailto:stefanie@stefsskinstudio.com">stefanie@stefsskinstudio.com</a>
							</p>
							</div>
							<nav class="nav flex-column flex-lg-row">
							<a href="#" class="nav-link px-0 px-lg-2 text-dark">About Us</a>
							<a href="#" class="nav-link px-0 px-lg-2 text-dark">Our Services</a>
							<a href="#" class="nav-link px-0 px-lg-2 text-dark">Contact Us</a>
							<a href="#" class="nav-link px-0 px-lg-2 text-dark">Blog Posts</a>
							<a href="#" class="nav-link px-0 px-lg-2 text-dark">Book Now</a>
							</nav>
						</div>
						<!-- End Left Column -->

						<!-- Start Right Column -->
						<div class="col-lg-6">
							<div class="d-none d-lg-block mb-3">
							<!-- Desktop-Only Section -->
							<div class="row">
								<div class="col-4">
								<p class="fw-bold mb-1">Our Location</p>
								<p>123 Skincare Lane<br>Mt. Pleasant, SC 29464</p>
								</div>
								<div class="col-4">
								<p class="fw-bold mb-1">Hours of Operation</p>
								<p>Monday to Friday: 9 AM - 6 PM<br>Saturday: 10 AM - 4 PM</p>
								</div>
								<div class="col-4">
								<p class="fw-bold mb-1">Contact Us</p>
								<p>
									<a href="tel:+18435307859">(843) 530-7859</a><br>
									<a href="mailto:stefanie@stefsskinstudio.com">stefanie@stefsskinstudio.com</a>
								</p>
								</div>
							</div>
							</div>
							<h5 class="mb-3">Get the latest skincare tips, promotions, and exclusive offers!</h5>
							<form class="d-flex flex-column flex-sm-row mb-3">
							<input type="email" class="form-control mb-2 mb-sm-0 me-sm-2" placeholder="Enter your email" />
							<button type="submit" class="btn btn-primary">Sign Up</button>
							</form>
							<p class="small">
							By clicking Sign Up you're confirming that you agree with our
							<a href="#" class="text-dark">Terms and Conditions</a>.
							</p>
						</div>
						<!-- End Right Column -->

						</div>
						<hr>
						<div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center">
						<p class="mb-2 mb-lg-0 small">&copy; 2024 Stef's Skin Studio. All rights reserved | Website design and marketing by Marshlend Digital</p>
						<nav class="d-flex justify-content-center mb-2 mb-lg-0">
							<a href="#" class="text-dark me-3">Privacy Policy</a>
							<a href="#" class="text-dark me-3">Terms of Service</a>
							<a href="#" class="text-dark">Cookie Settings</a>
						</nav>
						<div class="d-flex justify-content-center">
							<a href="#" class="text-dark me-2"><i class="bi bi-facebook"></i></a>
							<a href="#" class="text-dark me-2"><i class="bi bi-instagram"></i></a>
							<a href="#" class="text-dark"><i class="bi bi-twitter"></i></a>
						</div>
						</div>
					</div>
				</footer>

			</div><!-- col -->

		</div><!-- .row -->

	</div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

