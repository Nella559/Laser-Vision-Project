<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Laser_Vision
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="search">
	<div class="container">
		<?php get_search_form(); ?>
	</div>
</div>


<header class="site-header">
	<div class="container">
		<div class="nav-wrapper">
			<div class="logo">
				<?php if( has_custom_logo() ): ?>
						<?php the_custom_logo(); ?>
						<?php else: ?>
							<div class="site-name">
								<a href="<?php echo esc_url(get_home_url()); ?>">
								<?php bloginfo( 'name' ); ?>
								</a>
							</div>
						<?php endif; ?>
			</div>
			<div class="site-nav">
				<?php wp_nav_menu([
					'theme_location' => 'site-nav',
					'menu_class' => 'site-menu',
				]); ?>
			</div>
		</div>
	</div>
</header> 