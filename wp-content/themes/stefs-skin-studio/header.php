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
		<nav class="navbar navbar-expand-lg" role="navigation">
			<div class="container-fluid container-header">

				<!-- Start Logo -->
				 <div class="wrap-logo">
					<?php
						if (function_exists('get_custom_logo') && has_custom_logo()) {
							echo get_custom_logo();
						} else {
							echo '<h1 class="site-title">' . get_bloginfo('name') . '</h1>';
						}
					?>
				 </div>
				<!-- End Logo -->

				<!-- Start Toggle Button -->
				<button class="navbar-toggler wrap-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#bs-navbar-collapse" aria-controls="bs-navbar-collapse" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
					<span class="bar bar-short bar-top"></span>
					<span class="bar bar-middle"></span>
					<span class="bar bar-short bar-bottom"></span>
				</button>
				<!-- End Toggle Button -->

				<!-- Start Navigation Menu -->
				<?php
					wp_nav_menu( array(
						'theme_location'    => 'header_menu',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'bs-navbar-collapse',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
						'walker'            => new Understrap_WP_Bootstrap_Navwalker(),
					) );
				?>
				<!-- End Navigation Menu -->

			</div>
		</nav>
	</header>
