<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Intergalactic
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'intergalactic' ), 'Intergalactic', '<a href="http://wordpress.com/themes/intergalactic/" rel="designer">WordPress.com</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
