<?php
/**
 * The template for displaying comments
 * @package WordPress
 * @subpackage Mario_Aguiar
 * @since Mario Aguiar 1.0
 */
if( post_password_required() )
	return;
?>

<div id="contact" class="container">
	<div id="comments" class="comments-area">
		<?php if ( have_comments() ) : ?>
			<h2 class="comments-title">
				<?php
					printf( _nx( 'One comment on <em>%2$s</em>', '%1$s comments on <em>%2$s</em>', get_comments_number(), 'comments title', 'marioaguiar' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
				?>
			</h2>
	
			<ul class="comment-list">
				<?php
					wp_list_comments( array(
						'style' => 'ul',
						'short_ping' => true,
						'avatar_size' => 45,
						'callback' => 'marioaguiar_comments'
					) );
				?>
			</ul>
	
			<?php
				// Are there comments to navigate through?
				if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			?>
	
			<nav class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text section-heading hidden"><?php _e( 'Comment navigation', 'marioaguiar' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'marioaguiar' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'marioaguiar' ) ); ?></div>
			</nav><!-- .comment-navigation -->
	
				<?php endif; ?>
	
			<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.' , 'marioaguiar' ); ?></p>
			<?php endif; ?>
	
		<?php endif; ?>
	
		<?php
			$fields = array(
				'author' => '<label class="screenReader" for="author">' . __( 'Name', 'marioaguiar' ) . '</label>' . ( $req ? '<span class="required screenReader">*</span>' : '' ) . '<input id="author" name="author" type="text" placeholder="Name*" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" ' . $aria_req . '>',
				'email' => '<label class="screenReader" for="email">' . __( 'Email', 'marioaguiar' ) . '</label>' . ( $req ? '<span class="required screenReader">*</span>' : '' ) . '<input id="email" name="email" type="text" placeholder="Email*" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" ' . $aria_req . '>',
				'url' => '<label class="screenReader" for="url">' . __( 'Website', 'marioaguiar' ) . '</label><input id="url" name="url" type="text" placeholder="Website" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '">'
			);
			comment_form( array(
				'fields' => $fields,
				'comment_field' => '<textarea id="mensaje" name="comment" aria-required="true"></textarea>',
				'comment_notes_before' => '<div class="form">',
				'comment_notes_after' => '</div><aside id="otherWay">
					<ul id="socialIcons">
					<li><a href="http://twitter.com/emeaguiar"><img src="' . get_template_directory_uri() . '/images/twitter.png" alt="Twitter" /></a></li>
					<li><a href="http://www.facebook.com/mario.aguiar"><img src="' . get_template_directory_uri() . '/images/facebook.png" alt="Facebook" /></a></li>
					<li><a href="http://www.linkedin.com/in/marioaguiar"><img src="' . get_template_directory_uri() . '/images/linkedin.png" alt="Linkedin" /></a></li>
					<li><a href="http://forr.st/-emeaguiar"><img src="' . get_template_directory_uri() . '/images/forrst.png" alt="forrst" /></a></li>
				</ul></aside>',
				'id_submit' => 'enviar',
				'title_reply' => __( 'Thoughts?' ),
				'title_reply_to' => __( 'Reply to %s' ),
				'cancel_reply_link' => __( 'Cancel' ),
				'label_submit' => __( 'Comment' )
			) );
		?>
	
	</div>
</div>