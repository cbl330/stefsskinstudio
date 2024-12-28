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

				<section class="py-4 py-lg-3">
					<div class="container">
						<div class="row">
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
							<form>
							<div class="row mb-3">
								<div class="col-12 col-md-6">
								<label for="firstName" class="form-label">First name</label>
								<input type="text" class="form-control" id="firstName" placeholder="First name" required>
								</div>
								<div class="col-12 col-md-6">
								<label for="lastName" class="form-label">Last name</label>
								<input type="text" class="form-control" id="lastName" placeholder="Last name" required>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-12 col-md-6">
								<label for="email" class="form-label">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email" required>
								</div>
								<div class="col-12 col-md-6">
								<label for="phone" class="form-label">Phone number</label>
								<input type="tel" class="form-control" id="phone" placeholder="Phone number">
								</div>
							</div>
							<div class="mb-3">
								<label for="topic" class="form-label">Choose a topic</label>
								<select class="form-select" id="topic" required>
								<option value="" selected>Select one...</option>
								<option value="facials">Facials</option>
								<option value="skincare">Skincare Consultations</option>
								<option value="waxing">Waxing Services</option>
								</select>
							</div>
							<div class="mb-3">
								<label class="form-label">Which best describes you?</label>
								<div class="d-flex flex-wrap">
								<div class="form-check me-3">
									<input class="form-check-input" type="radio" name="description" id="option1" value="first" required>
									<label class="form-check-label" for="option1">First choice</label>
								</div>
								<div class="form-check me-3">
									<input class="form-check-input" type="radio" name="description" id="option2" value="second">
									<label class="form-check-label" for="option2">Second choice</label>
								</div>
								<div class="form-check me-3">
									<input class="form-check-input" type="radio" name="description" id="option3" value="third">
									<label class="form-check-label" for="option3">Third choice</label>
								</div>
								<div class="form-check me-3">
									<input class="form-check-input" type="radio" name="description" id="option4" value="fourth">
									<label class="form-check-label" for="option4">Fourth choice</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="description" id="option5" value="other">
									<label class="form-check-label" for="option5">Other</label>
								</div>
								</div>
							</div>
							<div class="mb-3">
								<label for="message" class="form-label">Message</label>
								<textarea class="form-control" id="message" rows="4" placeholder="Type your message..."></textarea>
							</div>
							<div class="mb-3 form-check">
								<input type="checkbox" class="form-check-input" id="terms" required>
								<label class="form-check-label" for="terms">I accept the Terms</label>
							</div>
							<button type="submit" class="btn btn-primary w-100">Submit</button>
							</form>
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
