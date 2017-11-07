<?php
/*
Template Name: Contact
*/
?>
<?php

$nameError = '';
$emailError = '';
$commentError = '';
$name = '';
$email = '';
$comments = '';

if(isset($_POST['submitted'])) {
        if(trim($_POST['contactName']) === '') {
                $nameError = true;
                $hasError = true;
        } else {
                $name = trim($_POST['contactName']);
        }

        if(trim($_POST['email']) === '')  {
                $emailError = true;
                $hasError = true;
        } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
                $emailError = 'You entered an invalid email address.';
                $hasError = true;
        } else {
                $email = trim($_POST['email']);
        }

        if(trim($_POST['comments']) === '') {
                $commentError = true;
                $hasError = true;
        } else {
                $comments = trim ($_POST[ 'comments' ]);
        }


        if(!isset($hasError)) {
                $emailTo = sanitize_email(of_get_option('gg_email_adress'));
                $subject = sanitize_text_field(of_get_option('gg_email_subject'));
                $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
                $headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

                mail($emailTo, $subject, $body, $headers);
                $emailSent = true;
        }
} ?>

<?php get_header(); ?>
                
<div class="box-nm">

<h1 class="pagetitle text-center"> <?php the_title(); ?> </h1>

<div class="page-content">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>                                    

      <div class="contact">
        
                <?php if(isset($emailSent) && $emailSent == true) { ?>
                        <div class="thanks">
                                <p><?php _e('Thanks, your email was sent successfully.', 'gxg_textdomain') ?></p>
                        </div>
                <?php } else { ?>
                        <?php the_content(); ?>
                        <?php if(isset($hasError) || isset($captchaError)) { ?>
                                <p class="error"><?php _e('Uh oh... an error occured.', 'gxg_textdomain') ?><p>
                        <?php } ?>

                <form action="<?php the_permalink(); ?>" id="contactform" method="post">
                <fieldset>
                        <ul>
                                <li>
                                        <input type="text" name="contactName" id="contactName" value="<?php echo sanitize_text_field($name); ?>" class="required requiredField" />
                                        <label for="contactName"><?php _e('Name', 'gxg_textdomain') ?></label>
                                        <?php if($nameError != '') { ?>
                                                <div class="error"><?php _e('&larr; Please enter your name.', 'gxg_textdomain') ?></div>
                                        <?php } ?>
                                </li>

                                <li>
                                        <input type="text" name="email" id="email"  value="<?php echo sanitize_email($email); ?>" class="required requiredField email" />
                                        <label for="email"><?php _e('Email', 'gxg_textdomain') ?></label>
                                        <?php if($emailError != '') { ?>
                                                <div class="error"><?php _e('&larr; Please enter a valid email address.', 'gxg_textdomain') ?></div>
                                        <?php } ?>
                                </li>

                                <li>
                                        <textarea name="comments" id="commentsText" rows="12" class="required requiredField">
                                        	<?php echo sanitize_textarea_field($comments); ?>
                                        </textarea>
                                        <label for="commentsText"><?php _e('Message', 'gxg_textdomain') ?></label>
                                        <?php if($commentError != '') { ?>
                                                <div class="error"><?php _e('&larr; Please enter a message.', 'gxg_textdomain') ?></div>
                                        <?php } ?>
                                </li>

                                <li>
                                        <input id="submitmail" class="button1" type="submit" value="<?php _e('Send', 'gxg_textdomain') ?>" />
                                </li>
                        </ul>
                        <input type="hidden" name="submitted" id="submitted" value="true" />
                 </fieldset>
                 </form>
                 <?php } ?>
                 
        </div><!-- .contact -->

        <?php endwhile; endif; ?>

</div> <!-- .page-content -->

</div> <!-- .box-nm -->

<?php  if ( is_active_sidebar( 'contact_sidebar' ) ) :  ?>
<div class="m-container js-masonry widget-area centered"> 
     <?php dynamic_sidebar( 'contact_sidebar' ); ?>
</div><!-- .widget-area -->
<?php endif; ?>

<?php get_footer(); ?>