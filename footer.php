<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uveryhypoteky
 */

?>

	<footer class="site-footer">
		<div class="container">
			<div class="site-info">
				<?php
				echo "Copyright ".date("Y", strtotime("now")).' &bull; '.get_bloginfo("name");
				?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
