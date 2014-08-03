<?php
/**
 * Template Name: Blog
 * The blog index template file
 * @package WordPress
 * @subpackage Mario_Aguiar
 * @since Mario Aguiar 2.0
 */

get_header(); ?>
		
	<div class="container blog">
	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post() ?>

			<?php get_template_part( 'blog', get_post_format() ); ?>

		<?php endwhile; ?>

		<?php marioaguiar_paging_nav(); ?>

	<?php else : ?>

		<?php get_template_part( 'blog', 'none' ); ?>

	<?php endif; ?>
	</div>
	<div class="detailsBottom"></div>

<?php get_footer(); ?>