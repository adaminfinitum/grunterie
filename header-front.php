<!doctype html>
<html lang="en" dir="ltr" class="no-js">
<head>
	<meta charset="utf-8">
	<title><?php wp_title('|', true, 'right');?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
<?php wp_head(); ?>
</head>
<body <?php body_class('antialiased'); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
<header class="contain-to-grid" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	<!-- Starting the Top-Bar -->
	<nav class="top-bar" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" data-topbar>
	    <ul class="title-area">
	        <li class="name">
	        	<h1><a href="/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></h1>
	        </li>
			<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	    </ul>
	    <section class="top-bar-section">
	    <?php
	        wp_nav_menu( array(
	            'theme_location' => 'primary',
	            'container' => false,
	            'depth' => 0,
	            'items_wrap' => '<ul class="right">%3$s</ul>',
	            'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
	            'walker' => new reverie_walker( array(
	                'in_top_bar' => true,
	                'item_type' => 'li',
	                'menu_type' => 'main-menu'
	            ) ),
	        ) );
	    ?>
	    <?php
	    	// Uncomment the following to enable the left menu (additional menu)
	    	/*
	        wp_nav_menu( array(
	            'theme_location' => 'additional',
	            'container' => false,
	            'depth' => 0,
	            'items_wrap' => '<ul class="left">%3$s</ul>',
	            'walker' => new reverie_walker( array(
	                'in_top_bar' => true,
	                'item_type' => 'li',
	                'menu_type' => 'main-menu'
	            ) ),
	        ) );
	        */
	    ?>
	    </section>
	</nav>
	<!-- End of Top-Bar -->
</header>
<!-- Start the main container -->
<div class="container" role="document">
	<div class="row">
		<section id="hero" class="clearfix" role="banner">
			<div class="floating-banner">
				<img alt="Abacus and business spreadsheet on accountant's table" data-interchange="[<?php echo get_template_directory_uri(); ?>/img/govt-certifications-and-kids-with-dog-trimmed.jpg, (default)], [<?php echo get_template_directory_uri(); ?>/img/police-and-protection-dog-with-kids-blue-bg-banner-910x334.jpg, (medium)], [<?php echo get_template_directory_uri(); ?>/img/police-and-protection-dog-with-kids-blue-bg-banner-1020x375.jpg, (large)]">
				<noscript><img alt="Abacus and business spreadsheet on accountant's table" src="<?php echo get_template_directory_uri(); ?>/img/police-and-protection-dog-with-kids-blue-bg-banner-1020x375.jpg"/></noscript>
			</div>
			<!--
			<div class="row">
  				<div class="large-4 large-offset-8 columns abacus-advertising-info">
  					<a href="//abacusadvertising.com/" class="small radius button navy expand one-ten show-for-large-up"><span class="learn-more">Rebranding As: <br class="hide-for-medium"></span>Abacus Advertising »</a>
  				</div>
			</div>
			-->
			<div class="row">
  				<div class="large-4 columns call-to-action">
  					<a href="//abacusadvertising.com/" class="small radius button success expand one-ten"><span class="learn-more">Rebranding As: <br class="hide-for-medium"></span>Abacus Advertising »</a>
  					<!--
  					<a href="/police-k-9/" class="small button radius navy expand one-ten show-for-large-up"><span class="learn-more">Learn More About <br class="hide-for-medium"></span>Police K9 Training »</a>
					<a href="/police-k-9/" class="small button radius navy expand hide-for-large-up">Sign Up for Police K9 Training »</a>
  					-->
  				</div>
			</div>
		</section>

