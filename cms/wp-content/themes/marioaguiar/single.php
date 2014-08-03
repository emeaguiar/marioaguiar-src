<?php
/**
 * The template for displaying all single posts
 * @package WordPress
 * @subpackage Mario_Aguiar
 * @since Mario Aguiar 1.0
 */

get_header(); ?>
	<div class="detailsTop"></div>
	<div class="container">
	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post() ?>

			<?php get_template_part( 'blog', get_post_format() ); ?>

		<?php endwhile; ?>

		<?php marioaguiar_paging_nav(); ?>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>
	</div>

<?php get_footer(); ?>