<?php global $wealth_option; ?>

<div class="lp-footer-1" id="lp-footer"><!--footer-->  
  	<div class="container">
	    <div class="row">
	      	<div class="col-md-9">
	        	<p><?php echo esc_html($wealth_option['footer_text']); ?></p>
	      	</div>
	      	<div class="col-md-3 float-right social-footer">
	      		<?php if($wealth_option['facebook']!=''){ ?>                                    
                        <a target="_blank" href="<?php echo esc_url($wealth_option['facebook']); ?>"><i class="fa fa-facebook-square"></i></a>                                    
                <?php } ?>                
                <?php if($wealth_option['twitter']!=''){ ?>                                    
                        <a target="_blank" href="<?php echo esc_url($wealth_option['twitter']); ?>"><i class="fa fa-twitter-square"></i></a>                                    
                <?php } ?>
                <?php if($wealth_option['rss']!=''){ ?>                                    
                        <a target="_blank" href="<?php echo esc_url($wealth_option['rss']); ?>"><i class="fa fa-rss-square"></i></a>                                    
                <?php } ?>
                <?php if($wealth_option['google']!=''){ ?>                                    
                        <a target="_blank" href="<?php echo esc_url($wealth_option['google']); ?>"><i class="fa fa-google-plus-square"></i></a>                                    
                <?php } ?>
                <?php if($wealth_option['youtube']!=''){ ?>                                    
                        <a target="_blank" href="<?php echo esc_url($wealth_option['youtube']); ?>"><i class="fa fa-youtube-square"></i></a>                                    
                <?php } ?>
                <?php if($wealth_option['linkedin']!=''){ ?>
                        <a target="_blank" href="<?php echo esc_url($wealth_option['linkedin']); ?>"><i class="fa fa-linkedin-square"></i></a>
                <?php } ?>
                <?php if($wealth_option['skype']!=''){ ?>
                    <a target="_blank" href="<?php echo esc_attr($wealth_option['skype']); ?>"><i class="fa fa-skype"></i></a>
                <?php } ?>
                <?php if($wealth_option['dribbble']!=''){ ?>
                        <a target="_blank" href="<?php echo esc_url($wealth_option['dribbble']); ?>"><i class="fa fa-dribbble"></i></a>
                <?php } ?>
                <?php if($wealth_option['pinterest']!=''){ ?>
                        <a target="_blank" href="<?php echo esc_url($wealth_option['pinterest']); ?>"><i class="fa fa-pinterest-square"></i></a>
                <?php } ?>
                <?php if($wealth_option['instagram']!=''){ ?>
                        <a target="_blank" href="<?php echo esc_url($wealth_option['instagram']); ?>"><i class="fa fa-instagram"></i></a>
                <?php } ?>  
                <?php if($wealth_option['github']!=''){ ?>
                        <a target="_blank" href="<?php echo esc_url($wealth_option['github']); ?>"><i class="fa fa-github-square"></i></a>
                <?php } ?>
                <?php if($wealth_option['vimeo']!=''){ ?>
                    <a target="_blank" href="<?php echo esc_url($wealth_option['vimeo']); ?>"><i class="fa fa-vimeo-square"></i></a>
                <?php } ?>
                <?php if($wealth_option['tumblr']!=''){ ?>
                    <a target="_blank" href="<?php echo esc_url($wealth_option['tumblr']); ?>"><i class="fa fa-tumblr-square"></i></a>
                <?php } ?>
                <?php if($wealth_option['soundcloud']!=''){ ?>
                    <a target="_blank" href="<?php echo esc_url($wealth_option['soundcloud']); ?>"><i class="fa fa-soundcloud"></i></a>
                <?php } ?>
                <?php if($wealth_option['behance']!=''){ ?>
                    <a target="_blank" href="<?php echo esc_url($wealth_option['behance']); ?>"><i class="fa  fa-behance-square"></i></a>
                <?php } ?>
                <?php if($wealth_option['lastfm']!=''){ ?>
                    <a target="_blank" href="<?php echo esc_url($wealth_option['lastfm']); ?>"><i class="fa fa-lastfm-square"></i></a>
                <?php } ?>
                <?php if($wealth_option['social_extended']!=''){ ?>
                    <?php echo  htmlspecialchars_decode($wealth_option['social_extended']); ?>
                <?php } ?>
	      	</div>	      
	    </div>
  	</div>
</div>