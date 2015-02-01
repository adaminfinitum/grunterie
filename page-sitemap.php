<?php
	/*
	Template Name: HTML Sitemap Page
	*/
	get_header();
?>

	<!-- Row for main content area -->
	<div class="small-12 large-8 columns" id="content" role="main" itemprop="mainContentOfPage">

	<?php
		/* Start loop */
		while (have_posts()) : the_post();
	?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
			</footer>
		</article>

	<?php
		endwhile;
		/* End loop */

		get_template_part('/partials/sitemap');
	?>

	</div>

<?php
	get_sidebar();
	get_footer();
?>
