<?php
/**
 * The template for displaying Archive pages.
 *
 * @package WordPress
 * @subpackage Mario_Aguiar
 * @since Mario Aguiar 1.0
 */

get_header(); ?>

	<div class="container">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'marioaguiar' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'marioaguiar' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'marioaguiar' ) ) );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'marioaguiar' ), get_the_date( _x( 'Y', 'yearly archives date format', 'marioaguiar' ) ) );
					else :
						_e( 'Archives', 'marioaguiar' );
					endif;
				?></h1>
			</header><!-- .archive-header -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php marioaguiar_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>