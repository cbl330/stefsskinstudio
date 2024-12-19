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

	<!-- ******************* The Navbar Area ******************* -->
	<header class="site-header" id="header">
		<div class="container-header">
			<!-- Start Logo Wrap -->
			<div class="wrap-logo">
				<a href="<?php echo home_url(); ?>" class="logo">
					<?php
						if (function_exists('get_custom_logo') && has_custom_logo()) {
							echo get_custom_logo();
						} else {
							echo '<h1 class="site-title">' . get_bloginfo('name') . '</h1>';
						}
					?>
				</a>
			</div>
			<!-- End Logo Wrap -->

			<!-- Start Navigation Wrap - DESKTOP -->
			<nav class="wrap-nav">
				<!-- Nav Menu -->
				<?php
				if (has_nav_menu('header_menu')) {
					wp_nav_menu(array(
						'theme_location' => 'header_menu',
						'container'      => false,
						'menu_class'     => 'nav-list',
						'fallback_cb'    => false,
						'aria_label'     => 'Main Navigation',
						'depth'          => 2,
						'walker'         => new Understrap_WP_Bootstrap_Navwalker(),
					));
				} else {
					echo '<p>Please assign a menu to the "Header Menu" location in Appearance > Menus.</p>';
				}
				?>
				
				<!-- Book Now Button -->
				<div class="wrap-btn-nav">
					<a href="/book-now" class="btn btn-nav">Book Now</a>
				</div>
			</nav>
			<!-- End Navigation Wrap - DESKTOP -->

			<!-- Start Mobile Menu Toggle -->
			<button
				class="wrap-menu-toggle mobile"
				aria-label="Toggle Menu"
				aria-expanded="false"
				aria-controls="wrap-nav"
			>
				<span class="bar bar-short bar-top"></span>
				<span class="bar bar-middle"></span>
				<span class="bar bar-short bar-bottom"></span>
			</button>
			<!-- End Mobile Menu Toggle -->

		</div>
	</header>
