<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>


	<?php wp_head(); ?>
</head>

<body>
	<div id="container">
		<header>
			<div class="container">
				<a href="<?php echo home_url(); ?>" class="logo">

				</a>
				<nav>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'container' => false
							)
						);
					?>
				</nav>
			</div>
        </header>