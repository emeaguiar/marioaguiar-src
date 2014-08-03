<?php
/**
 * The tenplate for displaying the footer
 * @package WordPress
 * @subpackage Mario_Aguiar
 * @since Mario Aguiar 1.0
 */
?>

		<?php if ( ! is_front_page() ) : ?>
			<div class="detailsBottom"></div>
			<footer>
				<div id="copyright">
					<small><?php printf( __('&copy; %d Coded by <strong>Mario Aguiar</strong> using <a href="http://wordpress.org">WordPress</a>.', 'marioaguiar'), date('Y') ); ?></small>
				</div>
			</footer>
		<?php endif; ?>

		<?php wp_footer(); ?>
	</body>
</html>