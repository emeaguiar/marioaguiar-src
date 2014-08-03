<?php
/**
 * Functions and definitions
 * @package WordPress
 * @subpackage Mario_Aguiar
 * @since Mario Aguiar 1.0
 */

function marioaguiar_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
		wp_enqueue_style( 'marioaguiar-style', get_stylesheet_uri(), array(), '2013-08-21' );
		wp_enqueue_style( 'marioaguiar-fonts', 'http://fonts.googleapis.com/css?family=Droid+Sans+Mono|Droid+Serif:400,700,400italic,700italic' );

	wp_enqueue_script( 'marioaguiar-base', get_template_directory_uri() . '/js/base.js', array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'angularjs', '//ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js', array(), '1.2.15', true );
	wp_enqueue_script( 'angularjs-sanitize', '//ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular-sanitize.min.js', array( 'angularjs' ), '1.2.15', true );
	wp_enqueue_script( 'angularjs-route', '//ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular-route.min.js', array( 'angularjs' ), '1.2.15', true );
	wp_enqueue_script( 'marioaguiar-app', get_template_directory_uri() . '/js/app.js', array( 'angularjs' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'marioaguiar_scripts_styles' );

/**
 * Add constants to JS variables
 *
 * @since  Mario Aguiar 2.5
 */
function marioaguiar_print_js() {
	$options = array();
	$options['themePath'] = get_template_directory_uri();
?>
<script>
	<!--//--><![CDATA[//><!--
	ma = <?php echo json_encode($options); ?>;
	//--><!]]
</script>
<?php
}
add_action( 'wp_print_footer_scripts', 'marioaguiar_print_js' );

/**
 * Displays navigation to next/previous set of posts when applicable.
 *
 * @since Mario Aguiar 2.0
 *
 * @return void
 */
function marioaguiar_paging_nav() {
	global $wp_query;

	// Don't print if there's only one page
	if( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text hidden"><?php _e( 'Posts navigation', 'marioaguiar' ); ?></h1>
		<div class="nav-links clearfix">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

/**
 * Comments markup
 *
 * @since Mario Aguiar 2.0
 *
 * @return void
 */
function marioaguiar_comments( $comment, $args, $depth ) {
   $GLOBALS[ 'comment' ] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

    	<div class="comment-author vcard clearfix">
        	<?php echo get_avatar( $comment, $args[ 'avatar_size' ] ); ?>
			<div class="comment-meta">

        		<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>  -
        		<span class="reply">
					<span class="reply_for_ie6"></span>
	 				<?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</span><br>
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_date('F nS, Y'); ?></a> <?php edit_comment_link('- (' . __('Edit') . ')','  ','') ?>
			</div>
   	   		<?php if ($comment->comment_approved == '0') : ?>
   	    		<em><?php _e('- Your comment is awaiting moderation.') ?></em>
    		<?php endif; ?>
		</div>

    <?php comment_text() ?>

<?php
        }

/**
 * Custom Post Types
 * @since Mario Aguiar 1.0
 * @return void
 */
function marioaguiar_post_type() {
	register_post_type( 'marioaguiar_project',
		array(
			'labels' => array(
				'name' => __( 'Projects' ),
				'singular_name' => __( 'Product' )
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array(
				'comments',
				'thumbnail',
				'excerpt',
				'trackbacks'
			)
		)
	);
}
add_action( 'init', 'marioaguiar_post_type' );

/**
 * Register Menus
 * @since Mario Aguiar 1.0
 * @return Void
 */

function marioaguiar_register_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu', 'marioaguiar' ),
			'footer-menu' => __( 'Footer Menu', 'marioaguiar' )
		)
	);
}
add_action( 'init', 'marioaguiar_register_menus' );
