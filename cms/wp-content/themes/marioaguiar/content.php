<?php
/**
 * Displays posts in the blog index
 * @package WordPress
 * @subpackage Mario_Aguiar
 * @since Mario Aguiar 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<header>
		<span class="metadata">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_time('F jS, Y'); ?>
		</span>
	</header>

	<div class="post-body">
		<?php the_excerpt(); ?>
	</div>

</article>