<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'understrap_bootstrap_version', 'bootstrap4' );
$navbar_type       = get_theme_mod( 'understrap_navbar_type', 'collapse' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">
adf
	<!-- ******************* The Navbar Area ******************* -->
	<header class="site-header">
		<div class="container row">
			<!-- Start Logo Wrap -->
			<div class="logo-wrap col-4">
				<a href="<?php echo home_url(); ?>" class="site-logo">
					<?php
						// Display the site logo dynamically
						if (function_exists('get_custom_logo') && has_custom_logo()) {
							echo get_custom_logo();
						} else {
							// Fallback to site title if no logo is set
							echo '<h1 class="site-title">' . get_bloginfo('name') . '</h1>';
						}
					?>
				</a>
			</div>
			<!-- End Logo Wrap -->

			<!-- Start Navigation Wrap - Desktop -->
			<div class="nav-wrap col-4">
				<nav class="desktop-nav d-none d-lg-flex">
					<?php
						if (has_nav_menu('header_menu')) {
							wp_nav_menu(array(
								'theme_location' => 'header_menu',
								'container'      => false,
								'menu_class'     => 'header-nav-list',
								'fallback_cb'    => false,
								'aria_label'     => 'Main Navigation',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							));
						} else {
							echo '<p>Please assign a menu to the "Header Menu" location in Appearance > Menus.</p>';
						}
					?>
				</nav>
			</div>
			<!-- End Navigation Wrap - Desktop -->

			<!-- Start Book Now Button Wrap -->
			<div class="nav-btn-wrap col-4">
				<a href="/book-now" class="btn btn-primary book-now-btn">Book Now</a>
			</div>
			<!-- End Book Now Button Wrap -->

			<!-- Mobile Hamburger Menu -->
			<button class="mobile-menu-toggle d-lg-none" aria-label="Toggle Menu">
				<span class="hamburger"></span>
			</button>

			<!-- Start Navigation Wrap - Mobile -->
			<div class="nav-wrap col-4">
				<nav class="desktop-nav d-none d-lg-flex">
					<div class="mobile-nav-header d-flex align-items-center justify-content-between">
						<button class="mobile-menu-close" aria-label="Close Menu">&times;</button>
					</div>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'mobile_menu',
						'container'      => false,
						'menu_class'     => 'mobile-nav-list',
						'fallback_cb'    => false,
						'depth'          => 2,
					));
					?>
					<a href="/book-now" class="btn btn-primary book-now-btn">Book Now</a>
				</nav>
			</div>
			<!-- End Navigation Wrap - Mobile -->
		</div>
	</header>