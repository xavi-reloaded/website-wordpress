<?php

	// Do not delete these lines
        if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly.');

        if ( post_password_required() ) { ?>
        <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'gxg_textdomain') ?></p>
        <?php
        return;
        }
?>


<h6 id="comments-number"> <?php comments_number(__('No Comments', 'gxg_textdomain'), __('One Comment', 'gxg_textdomain'), __('% Comments', 'gxg_textdomain')); ?></h6>


<!-- Display the comments -->
<?php if ( have_comments() ) { ?>

	<?php $counter = 0; ?>
	
        <ol class="commentlist">
                <?php wp_list_comments('type=comment&callback=gg_comment'); ?>                
        </ol>
        
<?php }  ?>

<div class="nav_pagination_bottom">
        <?php paginate_comments_links(); ?>
</div>

<div class="clear"> </div>



<!-- Display the comment form -->
<?php 

$args = array(

	'comment_notes_before' => ' ',
	  
	'comment_field' =>  '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',

	'comment_notes_after' => '<div class="clear"> </div>',
	
	'fields' => apply_filters( 'comment_form_default_fields', array(
		
		    'author' =>
		      '<p class="comment-form-author">' .
		      '<label for="author">' . __( 'Name', 'gxg_textdomain' ) . '</label> ' .
		      '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		      '" size="30"' .  ' /></p>',
		
		    'email' =>
		      '<p class="comment-form-email"><label for="email">' . __( 'Email (will not be published) ', 'gxg_textdomain' ) . '</label> ' .
		      '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		      '" size="30"' . ' /></p>'

	  ) ),
);
	 
comment_form($args); 
?>