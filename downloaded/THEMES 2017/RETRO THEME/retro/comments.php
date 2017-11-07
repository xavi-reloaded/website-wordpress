<?php
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die( _e( 'Please do not load this page directly. Thanks!', 'retro' ) ); }

if ( post_password_required() ) {
	?>
	<p class="nocomments clearfix"><?php _e( 'This post is password protected. Enter the password to view comments.', 'retro' ); ?></p>
	<?php
	return;
}
?>




<?php if ( have_comments() ) : ?>
<div class="comments clearfix">
		<h3 id="comments"><?php printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'retro' ), number_format_i18n( get_comments_number() ) ); ?></h3>
		
		<ol class="commentlist">
	<?php wp_list_comments( 'callback=list_comments' ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through?  ?>
		<div class="pagination clearfix">
			<?php
			paginate_comments_links(array(
				'type' => 'list',
			))
			?>
		</div>
	<?php endif; // check for comment navigation  ?>

</div>

<?php else : // this is displayed if there are no comments so far  ?>

		<?php if ( 'open' == $post->comment_status ) : ?>
			<!-- If comments are open, but there are no comments. -->

		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->

	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<?php
	global $aria_req, $am_validate;
	wp_enqueue_script( 'validate' );
	$am_validate = true;
	$commenter = wp_get_current_commenter();
	$comment_args = array(
	'fields' => apply_filters('comment_form_default_fields', array(
		'author' =>
		'<div class="clearfix comment-form-indent"><div class="comment-form-item">' . '<span>' . __( 'Name','retro' ) . '<sup>*</sup></span><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' class="required">' . '</div>',
		'email' =>
		'<div class="comment-form-item">' . '<span>' . __( 'Email','retro' ) . '<sup>*</sup></span><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '"  size="30"' . $aria_req . ' class="required">' . '</div>',
		'url' =>
		'<div class="comment-form-item">' . '<span>' . __( 'Url','retro' ) . '<input id="url" name="url"  type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"  size="30"' . $aria_req . '>' . '</div></div>',
	)),

		'comment_field' =>
		'<span>' . __( 'Your message','retro' ) . '<sup>*</sup></span><p class="comment-form-comment">' .
			'<textarea id="comment" name="comment" cols="45" rows="16" aria-required="true" class="required"></textarea>' .
		'</p><p>' . __( 'You may use these HTML tags and attributes: &lt;a href="" title=""> &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt;','retro' ) . '</p>',
		'comment_notes_before' => '',
		'label_submit' => __( 'Add comment','retro' ),
		'comment_notes_after' => '',
	);
	comment_form( $comment_args );
	?>
<?php endif; ?>
