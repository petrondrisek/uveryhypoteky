<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uveryhypoteky
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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'uveryhypoteky' ); ?></a>

	<header id="masthead" class="site-header">
		<section class="info_panel">
			<div class="container d-flex justify-content-around align-items-center">
				<div class="adress">	
					<?php
						if(get_theme_mod('uveryhypoteky_header_settings_adress')){
					?>
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 350 350" xml:space="preserve">
						<g id="icon" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(-1.9444444444444287 -1.9444444444444287) scale(3.89 3.89)" >
							<path d="M 45 0 C 27.395 0 13.123 14.272 13.123 31.877 c 0 7.86 2.858 15.043 7.573 20.6 L 45 81.101 l 24.304 -28.624 c 4.716 -5.558 7.573 -12.741 7.573 -20.6 C 76.877 14.272 62.605 0 45 0 z M 45 43.889 c -7.24 0 -13.11 -5.869 -13.11 -13.11 c 0 -7.24 5.869 -13.11 13.11 -13.11 s 13.11 5.869 13.11 13.11 C 58.11 38.02 52.24 43.889 45 43.889 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
							<path d="M 58.958 71.559 L 45 82.839 L 31.057 71.556 c -9.329 1.65 -15.682 4.901 -15.682 8.645 c 0 5.412 13.263 9.8 29.625 9.8 c 16.361 0 29.625 -4.388 29.625 -9.8 C 74.625 76.458 68.278 73.209 58.958 71.559 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
						</g>
					</svg>
					<div class="adress-slider">
						<?php
							$adress = explode(";", get_theme_mod('uveryhypoteky_header_settings_adress'));
							for($i = 0; $i < count($adress); $i++)
								echo '<p '.($i == 0 ? "class='active'" : "").'>'.$adress[$i].'</p>';
						?>
					</div>
					<?php
						}
					?>
				</div>
				<div class="text-right">
					<?php
					if(get_theme_mod('uveryhypoteky_header_settings_facebook')){
					?>
					<a href="<?=get_theme_mod('uveryhypoteky_header_settings_facebook')?>" target="_blank">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 155.139 155.139" height="20" width="20" style="enable-background:new 0 0 155.139 155.139;" xml:space="preserve">
						<g>
							<path d="M89.584,155.139V84.378h23.742l3.562-27.585H89.584V39.184
								c0-7.984,2.208-13.425,13.67-13.425l14.595-0.006V1.08C115.325,0.752,106.661,0,96.577,0C75.52,0,61.104,12.853,61.104,36.452
								v20.341H37.29v27.585h23.814v70.761H89.584z"/>
						</g>
					</svg>
					</a>
					<?php
					}
					
					if(get_theme_mod('uveryhypoteky_header_settings_instagram')){
					?>
						<a href="<?=get_theme_mod('uveryhypoteky_header_settings_instagram')?>" target="_blank"><svg height="20" viewBox="0 0 511 511.9" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m510.949219 150.5c-1.199219-27.199219-5.597657-45.898438-11.898438-62.101562-6.5-17.199219-16.5-32.597657-29.601562-45.398438-12.800781-13-28.300781-23.101562-45.300781-29.5-16.296876-6.300781-34.898438-10.699219-62.097657-11.898438-27.402343-1.300781-36.101562-1.601562-105.601562-1.601562s-78.199219.300781-105.5 1.5c-27.199219 1.199219-45.898438 5.601562-62.097657 11.898438-17.203124 6.5-32.601562 16.5-45.402343 29.601562-13 12.800781-23.097657 28.300781-29.5 45.300781-6.300781 16.300781-10.699219 34.898438-11.898438 62.097657-1.300781 27.402343-1.601562 36.101562-1.601562 105.601562s.300781 78.199219 1.5 105.5c1.199219 27.199219 5.601562 45.898438 11.902343 62.101562 6.5 17.199219 16.597657 32.597657 29.597657 45.398438 12.800781 13 28.300781 23.101562 45.300781 29.5 16.300781 6.300781 34.898438 10.699219 62.101562 11.898438 27.296876 1.203124 36 1.5 105.5 1.5s78.199219-.296876 105.5-1.5c27.199219-1.199219 45.898438-5.597657 62.097657-11.898438 34.402343-13.300781 61.601562-40.5 74.902343-74.898438 6.296876-16.300781 10.699219-34.902343 11.898438-62.101562 1.199219-27.300781 1.5-36 1.5-105.5s-.101562-78.199219-1.300781-105.5zm-46.097657 209c-1.101562 25-5.300781 38.5-8.800781 47.5-8.601562 22.300781-26.300781 40-48.601562 48.601562-9 3.5-22.597657 7.699219-47.5 8.796876-27 1.203124-35.097657 1.5-103.398438 1.5s-76.5-.296876-103.402343-1.5c-25-1.097657-38.5-5.296876-47.5-8.796876-11.097657-4.101562-21.199219-10.601562-29.398438-19.101562-8.5-8.300781-15-18.300781-19.101562-29.398438-3.5-9-7.699219-22.601562-8.796876-47.5-1.203124-27-1.5-35.101562-1.5-103.402343s.296876-76.5 1.5-103.398438c1.097657-25 5.296876-38.5 8.796876-47.5 4.101562-11.101562 10.601562-21.199219 19.203124-29.402343 8.296876-8.5 18.296876-15 29.398438-19.097657 9-3.5 22.601562-7.699219 47.5-8.800781 27-1.199219 35.101562-1.5 103.398438-1.5 68.402343 0 76.5.300781 103.402343 1.5 25 1.101562 38.5 5.300781 47.5 8.800781 11.097657 4.097657 21.199219 10.597657 29.398438 19.097657 8.5 8.300781 15 18.300781 19.101562 29.402343 3.5 9 7.699219 22.597657 8.800781 47.5 1.199219 27 1.5 35.097657 1.5 103.398438s-.300781 76.300781-1.5 103.300781zm0 0"/><path d="m256.449219 124.5c-72.597657 0-131.5 58.898438-131.5 131.5s58.902343 131.5 131.5 131.5c72.601562 0 131.5-58.898438 131.5-131.5s-58.898438-131.5-131.5-131.5zm0 216.800781c-47.097657 0-85.300781-38.199219-85.300781-85.300781s38.203124-85.300781 85.300781-85.300781c47.101562 0 85.300781 38.199219 85.300781 85.300781s-38.199219 85.300781-85.300781 85.300781zm0 0"/><path d="m423.851562 119.300781c0 16.953125-13.746093 30.699219-30.703124 30.699219-16.953126 0-30.699219-13.746094-30.699219-30.699219 0-16.957031 13.746093-30.699219 30.699219-30.699219 16.957031 0 30.703124 13.742188 30.703124 30.699219zm0 0"/></svg></a>
					<?php
					}

					if(get_theme_mod('uveryhypoteky_header_settings_linkedin')){
					?>
						<a href="<?=get_theme_mod('uveryhypoteky_header_settings_linkedin')?>" target="_blank"><svg enable-background="new 0 0 24 24" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg"><path d="m23.994 24v-.001h.006v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07v-2.185h-4.773v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243v7.801z"/><path d="m.396 7.977h4.976v16.023h-4.976z"/><path d="m2.882 0c-1.591 0-2.882 1.291-2.882 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909c-.001-1.591-1.292-2.882-2.882-2.882z"/></svg></a>
					<?php
					}
					?>
				</div>
			</div>
		</section>
		<div class="site-branding container d-flex justify-content-around align-items-center">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$uveryhypoteky_description = get_bloginfo( 'description', 'display' );
			if ( $uveryhypoteky_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $uveryhypoteky_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
			
			<div class="header__contact">
				<?php
				if(get_theme_mod('uveryhypoteky_header_settings_phone')){
				?>
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="30" width="30" viewBox="0 0 513.64 513.64" style="enable-background:new 0 0 513.64 513.64;" xml:space="preserve">
						<g>
							<path d="M499.66,376.96l-71.68-71.68c-25.6-25.6-69.12-15.359-79.36,17.92c-7.68,23.041-33.28,35.841-56.32,30.72
								c-51.2-12.8-120.32-79.36-133.12-133.12c-7.68-23.041,7.68-48.641,30.72-56.32c33.28-10.24,43.52-53.76,17.92-79.36l-71.68-71.68
								c-20.48-17.92-51.2-17.92-69.12,0l-48.64,48.64c-48.64,51.2,5.12,186.88,125.44,307.2c120.32,120.32,256,176.641,307.2,125.44
								l48.64-48.64C517.581,425.6,517.581,394.88,499.66,376.96z"/>
						</g>
				</svg>
				<div class="header__contact__info">
					<h1><?=get_theme_mod('uveryhypoteky_header_settings_phone')?></h1>
					<?php if(get_theme_mod('uveryhypoteky_header_settings_phone_info')) echo '<h3>'.get_theme_mod('uveryhypoteky_header_settings_phone_info').'</h3>';?>
				</div>
				<?php
				}
				?>
				<?php
				if(get_theme_mod('uveryhypoteky_header_settings_email')){
				?>
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="30"  width="30" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
					<g>
						<polygon points="339.392,258.624 512,367.744 512,144.896 		"/>
					</g>
					<g>
						<polygon points="0,144.896 0,367.744 172.608,258.624 		"/>
					</g>
					<g>
						<path d="M480,80H32C16.032,80,3.36,91.904,0.96,107.232L256,275.264l255.04-168.032C508.64,91.904,495.968,80,480,80z"/>
					</g>
					<g>
						<path d="M310.08,277.952l-45.28,29.824c-2.688,1.76-5.728,2.624-8.8,2.624c-3.072,0-6.112-0.864-8.8-2.624l-45.28-29.856
							L1.024,404.992C3.488,420.192,16.096,432,32,432h448c15.904,0,28.512-11.808,30.976-27.008L310.08,277.952z"/>
					</g>
				</svg>
				<div class="header__contact__info">
					<h1><?=get_theme_mod('uveryhypoteky_header_settings_email')?></h1>
				</div>
				<?php
				}
				?>
			</div>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<div class="container">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -53 384 384" width="20px"><path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/></svg>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'          => 'navbar'
					)
				);
				?>
				<?php
				if(get_theme_mod('uveryhypoteky_header_settings_navbar_a')){
					?>
					<a href="<?=get_theme_mod('uveryhypoteky_header_settings_navbar_a')?>" class="navbar-button"><button><?=get_theme_mod('uveryhypoteky_header_settings_navbar_text') ? get_theme_mod('uveryhypoteky_header_settings_navbar_text') : 'Tlačítko'?></button></a>
				<?php
				}
				?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

<div id="Main_Slider" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<?php
			$count = 0;
			for($i = 0; $i < 3; $i++)
				if(get_theme_mod('uveryhypoteky_header_settings_slider_'.$i.'_img')) $count++;

			if($count > 1) for($i = 0; $i < $count; $i++)
				echo '<li data-target="#Main_Slider" data-slide-to="'.$i.'" '.($i == 0 ? 'class="active"' : '').'></li>';
		?>
	</ol>
	<div class="carousel-inner">
		<?php
			for($i = 0; $i < $count; $i++){
		?>
				<div class="carousel-item <?=($i == 0 ? 'active' : '')?>">
					<img src="<?=wp_get_attachment_url(get_theme_mod('uveryhypoteky_header_settings_slider_'.$i.'_img'))?>" alt="Obrázek" />
					<div class="carousel-caption d-md-block">
						<h1>
							<?php
								$replace = array('/\[br\]/', '/\[(.*?)\]/');
								$to = array('<br/>', '<span class="red">$1</span>');
								echo preg_replace($replace, $to, get_theme_mod('uveryhypoteky_header_settings_slider_'.$i.'_text'));
							?>
						</h1>
						<?php
							if(get_theme_mod('uveryhypoteky_header_settings_slider_'.$i.'_button_href')){
						?>
								<a href="<?=get_theme_mod('uveryhypoteky_header_settings_slider_'.$i.'_button_href')?>"><button><?=(get_theme_mod('uveryhypoteky_header_settings_slider_'.$i.'_button_text') ? get_theme_mod('uveryhypoteky_header_settings_slider_'.$i.'_button_text') : 'Zobrazit více')?></button></a>
						<?php
							}

							if (get_theme_mod('uveryhypoteky_description')):
								?>
									<h3><?=preg_replace('/\[(.*?)\]/', '<span class="red">$1</span>', get_theme_mod('uveryhypoteky_site_branding_description'));?></h3>
								<?php
								endif;
						?>
					</div>
				</div>
		<?php
			}
		?>
	</div>
	<?php
		if($count > 1){
			?>
			<a class="carousel-control-prev" href="#Main_Slider" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#Main_Slider" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
	<?php
		}
	?>
</div>
