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
	<style>.entry-content li{padding:.7em;}</style>
	<div class="small-12 large-8 columns" id="content" role="main">

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php _e('File Not Found', 'reverie'); ?></h1>
				<h2>Sorry, I can't find that page <small>(Error Code 404)</small></h2>
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
							echo "<p>Were you looking for one of the these posts or pages?</p>";
							echo "<ul>";
							foreach ($posts as $post) {
								echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
							}
							echo "</ul>";
							echo "<h6>If not, please try:</h6></li>";
						} else {
							echo "<p>No Worries! Try these:</p>";
							echo "<ol>";
						}
					?>
						<li>
							<label for="s"><b>Searching for it:</b> </label>
							<form style="display:inline;" action="<?php bloginfo('siteurl');?>">
							    <div class="row collapse">
							    	<div class="large-8 small-9 columns">
										<input type="text" value="<?php echo esc_attr($s); ?>" id="s" name="s"/>
									</div>
									<div class="large-4 small-3 columns">
										<input type="submit" value="Search" class="button postfix" />
									</div>
							    </div>
							</form>
						</li>
						<li>
							<b>If you typed in a URL double-check the spelling, punctuation and capitalization.</b>
						</li>
						<li>
							<b>Look for it in the <a href="<?php bloginfo('siteurl');?>/sitemap/">sitemap</a>.</b>
						</li>
						<li>
							<b>Start over on the <a href="<?php bloginfo('siteurl');?>">homepage</a></b> (and please contact me to say what went wrong, so I can fix it).
						</li>
					</ol>
					<h4>Sitemap Included</h4>
					<?php get_template_part('/partials/sitemap'); ?>

			</div>
		</article>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>

