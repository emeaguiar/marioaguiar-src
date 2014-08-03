<?php
/**
 * Default template for displaying content
 * @package WordPress
 * @subpackage Mario_Aguiar
 * @since Mario Aguiar 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="metadata"><?php the_time('F jS, Y'); ?></div>
	</header>

	<div class="post-body">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'marioaguiar' ) ); ?>
	</div>

	<footer>
		<?php if ( comments_open() ) : ?>
		<div class="comments-link">
			<?php comments_popup_link( '<span class="leave-reply">' . __( 'No comments', 'marioaguiar' ) . '</span>', __( 'One comment', 'marioaguiar' ), __( '% comments', 'marioaguiar' ) ); ?>
		</div><!-- .comments-link -->
		<?php endif; ?>
		<?php if ( is_single() && get_the_author_meta( 'description' ) ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer>

</article>