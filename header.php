<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package entirebud
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'entirebud' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			
		 ?>
		</div><!-- .site-branding -->

		<div id="main-nav" class="main-nav">
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php //esc_html_e( 'Primary Menu', 'entirebud' ); ?>
					<span class='screen-reader-text'><?= __( 'Menu główne', 'sputnik-wp-theme' ); ?></span>

					<span class="menu-toggle__line"></span>
					<span class="menu-toggle__line"></span>
					<span class="menu-toggle__line"></span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container' => false
					)
				);
				?>

			</nav><!-- #site-navigation -->
			<div class="cta" id="cta">
				<a class="fb" href="<?php echo get_field('fb_cta'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/app/public/images/fb.png"/>
				</a>
				<a class="phone" href="tel:<?php echo get_field('phone_cta', 'option'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/app/public/images/tel.png"/>
				</a>
			</div>
		</div>
	</header><!-- #masthead -->
