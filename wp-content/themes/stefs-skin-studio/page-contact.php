<?php
/**
 * Template Name: Contact Us
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

		<?php
			get_template_part('template-parts/hero', 'interior-page');
		?>

			<?php
				// ACF Fields
				$location = get_field('location', 'option');
				$hours = get_field('hours', 'option');
				$contact_info = get_field('contact_info', 'option');
			?>

			<main class="site-main" id="main">

				<section id="contact-section" class="mt-5 py-4 py-lg-3">
					<div class="container">
						<div class="row row-contact">
							<!-- Map and Contact Info -->
							<div class="col-lg-5 mb-4 mb-lg-0">
								<!-- Google Map -->
								<div class="mb-4">
									<iframe 
										src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1000!2d-80.005!3d32.780!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x12345!2sSample+Location!5e0!3m2!1sen!2sus!4v1672538485396!5m2!1sen!2sus"
										width="100%"
										height="250"
										style="border:0; border-radius: 8px;"
										allowfullscreen=""
										loading="lazy">
									</iframe>
								</div>
								<!-- Contact Info -->
								<div class="wrap-contact">
									<div class="row">
										<?php if ($location): ?>
											<div class="col-md-6 mb-3">
												<p><?php echo $location; ?></p>
											</div>
										<?php endif; ?>

										<?php if ($hours): ?>
											<div class="col-md-6 mb-3">
												<p><?php echo $hours; ?></p>
											</div>
										<?php endif; ?>

										<?php if ($contact_info): ?>
											<div class="col-md-6 mb-3">
												<p><?php echo $contact_info; ?></p>
											</div>
										<?php endif; ?>

										<div class="wrap-social col-md-6 mb-3">
											<p class="fw-bold mb-2">Follow Us</p>
											<div class="social-group d-flex justify-content-start">
												<a href="#" class="facebook me-3"><i class="fab fa-facebook-f"></i></a>
												<a href="#" class="instagram me-3"><i class="fab fa-instagram"></i></a>
												<a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Contact Form -->
							<div class="col-lg-7">

								<?php if ($form = get_field('contact_form_shortcode')): ?>
									<div class="d-flex flex-column flex-md-row mb-3">
										<?php echo do_shortcode($form); ?>
									</div>
								<?php endif; ?>

							</div>
						</div>
					</div>
				</section>

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>

			</main>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();
