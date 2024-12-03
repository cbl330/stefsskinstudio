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
	<header class="site-header">
		<div class="container d-flex align-items-center justify-content-between">
			<!-- Logo -->
			<a href="<?php echo home_url(); ?>" class="site-logo">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="Site Logo">
			</a>

			<!-- Desktop Navigation -->
			<nav class="desktop-nav d-none d-lg-flex">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary_menu',
					'container'      => false,
					'menu_class'     => 'nav-list d-flex align-items-center',
					'fallback_cb'    => false,
					'depth'          => 2,
					//'walker'         => new WP_Bootstrap_Navwalker(), // Optional: Use Bootstrap Walker for advanced dropdowns
				));
				?>
			</nav>

			<!-- Book Now Button -->
			<a href="/book-now" class="btn btn-primary book-now-btn">Book Now</a>

			<!-- Mobile Hamburger Menu -->
			<button class="mobile-menu-toggle d-lg-none" aria-label="Toggle Menu">
				<span class="hamburger"></span>
			</button>
		</div>

		<!-- Mobile Navigation -->
		<nav class="mobile-nav d-lg-none">
			<div class="mobile-nav-header d-flex align-items-center justify-content-between">
				<a href="<?php echo home_url(); ?>" class="site-logo">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="Site Logo">
				</a>
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
	</header>

<style>
	/* Desktop Navigation */
.nav-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.nav-list li {
    position: relative;
    margin: 0 15px;
}

.nav-list .menu-item a {
    text-decoration: none;
    font-weight: 500;
    color: #333;
}

.nav-list .menu-item:hover > a {
    color: #e96a69;
}

/* Dropdown Menu */
.nav-list .sub-menu {
    position: absolute;
    top: 100%;
    left: 0;
    display: none;
    list-style: none;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 10px 0;
    z-index: 999;
    border-radius: 4px;
}

.nav-list .menu-item:hover .sub-menu {
    display: block;
}

.nav-list .sub-menu .menu-item a {
    padding: 10px 20px;
    display: block;
    font-size: 14px;
    color: #333;
}

.nav-list .sub-menu .menu-item a:hover {
    background-color: #f7f7f7;
}

/* Mobile Navigation */
.mobile-nav-list {
    list-style: none;
    margin: 0;
    padding: 20px;
}

.mobile-nav-list .menu-item {
    margin-bottom: 10px;
}

.mobile-nav-list .menu-item a {
    text-decoration: none;
    font-weight: bold;
    display: block;
    color: #333;
}

/* Submenu Indentation for Mobile */
.mobile-nav-list .sub-menu {
    margin-left: 20px;
}
</style>