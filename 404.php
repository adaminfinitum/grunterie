<?php
/**
 *
 * Commandeered from Joost de Valk, read more here:
 * http://yoast.com/wordpress-404-error-pages/
 */

/**
 * Because of using post_type=any we have to manually weed out the attachments from the query_posts results.
 *
 * @return WHERE statement that strips out attachment
 * @author Joost De Valk
 **/
function yst_strip_attachments($where) {
	$where .= ' AND post_type != "attachment"';
	return $where;
}
add_filter('posts_where','yst_strip_attachments');
get_header();
?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" id="content" role="main">

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php _e('File Not Found', 'reverie'); ?></h1>
				<h2>Sorry, I can't find that page (Error 404).</h2>
			</header>
			<div class="entry-content">
				<div class="error">
					<p class="bottom"><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'reverie'); ?></p>
				</div>
				<p>Let's see if any of these help:</p>

						<?php
						$s = preg_replace("/(.*)-(html|htm|php|asp|aspx)$/","$1",$wp_query->query_vars['name']);
						$posts = query_posts('post_type=any&name='.$s);
						$s = str_replace("-"," ",$s);
						if (count($posts) == 0) {
							$posts = query_posts('post_type=any&s='.$s);
						}
						if (count($posts) > 0) {
							echo "<ol><li>";
							echo "<p>Were you looking for <strong>one of the following</strong> posts or pages?</p>";
							echo "<ul>";
							foreach ($posts as $post) {
								echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
							}
							echo "</ul>";
							echo "<p>If not, don't worry, I've got a few more tips for you to find it:</p></li>";
						} else {
							echo "<p><strong>Don't worry though!</strong> I've got a few tips for you to find it:</p>";
							echo "<ol>";
						}
					?>
						<li>
							<label for="s"><strong>Search</strong> for it:</label>
							<form style="display:inline;" action="<?php bloginfo('siteurl');?>">
								<input type="text" value="<?php echo esc_attr($s); ?>" id="s" name="s"/> <input type="submit" value="Search"/>
							</form>
						</li>
						<li>
							<strong>If you typed in a URL...</strong> make sure the spelling, cApitALiZaTiOn, and punctuation are correct. Then try reloading the page.

						</li>
						<li>
							<strong>Look</strong> for it in the <a href="<?php bloginfo('siteurl');?>/sitemap/">sitemap</a>.

						</li>
						<li>
							<strong>Start over again</strong> at my <a href="<?php bloginfo('siteurl');?>">homepage</a> (and please contact me to say what went wrong, so I can fix it).
						</li>
					</ol>
					<h4>Sitemap Included</h4>
					<?php get_template_part('/partials/sitemap'); ?>

				<!--
				<ul>
					<li><?php _e('Check your spelling', 'reverie'); ?></li>
					<li><?php printf(__('Return to the <a href="%s">home page</a>', 'reverie'), home_url()); ?></li>
					<li><?php _e('Click the <a href="javascript:history.back()">Back</a> button', 'reverie'); ?></li>
				</ul>
				-->
			</div>
		</article>

	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>
