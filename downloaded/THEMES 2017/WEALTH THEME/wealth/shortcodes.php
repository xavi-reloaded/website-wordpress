<?php 
// Custom Heading
add_shortcode('heading','heading_func');

function heading_func($atts, $content = null){

	extract(shortcode_atts(array(
		'text'			=>	'',
		'tag'			=> 	'',
		'size'			=>	'',
		'color'			=>	'',
		'align'			=>	'',		
		'class'			=>	'',
		'font'			=>	'',
		'fontw'			=>	'',
		'spacing'		=>	'',
		'css'			=>	'',

	), $atts));
	$fontw1 = (!empty($fontw) ? 'font-weight: '.$fontw.';' : '');
	$spacing1 = (!empty($spacing) ? 'letter-spacing: '.$spacing.'px;' : '');
	$fontf = (!empty($font) ? ''.$font.'' : 'font1');
	$size1 = (!empty($size) ? 'font-size: '.$size.'px;' : '');
	$color1 = (!empty($color) ? 'color: '.$color.';' : '');
	$align1 = (!empty($align) ? 'text-align: '.$align.';' : '');	
	$cl = (!empty($class) ? ' class= "'.$fontf.' '.vc_shortcode_custom_css_class( $css ).' '.$class.'"' : ' class= "'.$fontf.' '.vc_shortcode_custom_css_class( $css ).'"');
	ob_start(); ?>
	
	<?php echo htmlspecialchars_decode('<'. $tag . $cl .' style="'. $spacing1 . $fontw1 . $size1 . $align1 . $color1 . $bot .'" > '. $text .'</'.$tag.'>'); ?>
	
<?php
    return ob_get_clean();
}

// Our Team
add_shortcode('team', 'team_func');
function team_func($atts, $content = null){
	extract(shortcode_atts(array(
		'photo'				=> 	'',
		'name'				=>	'',		
		'icon1'				=>	'',
		'icon2'				=>	'',
		'icon3'				=>	'',
		'icon4'				=>	'',
		'infomation1'		=>	'',
		'infomation2'		=>	'',
		'infomation3'		=>	'',
		'infomation4'		=>	'',
		'link1'				=>	'',
		'link2'				=>	'',
		'link3'				=>	'',
		'link4'				=>	'',
		'style'				=>	'',
		'job'				=>	'',
		'number'			=>	'',
	), $atts));

	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];
	$stylist = (!empty($style) ? $style : style1);
	ob_start(); ?>

	<?php if($stylist=='style1'){ ?>
	    <div class="team-block"><!--team-block-->
	      <div class="team-pic"> <img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive"> </div>
	      <div class="team-info">
	        <h3><?php echo htmlspecialchars_decode($name); ?></h3>
	        <ul>
	          <?php if($infomation1){ ?><li><i class="<?php echo esc_attr($icon1); ?>"></i> <?php echo htmlspecialchars_decode($infomation1); ?></li><?php } ?>
	          <?php if($infomation2){ ?><li><i class="<?php echo esc_attr($icon2); ?>"></i> <?php echo htmlspecialchars_decode($infomation2); ?></li><?php } ?>
	          <?php if($infomation3){ ?><li><i class="<?php echo esc_attr($icon3); ?>"></i> <?php echo htmlspecialchars_decode($infomation3); ?></li><?php } ?>
	          <?php if($infomation4){ ?><li><i class="<?php echo esc_attr($icon4); ?>"></i> <?php echo htmlspecialchars_decode($infomation4); ?></li><?php } ?>
	        </ul>
	      </div>
	    </div>
	<?php } ?>
	<?php if($stylist=='style2'){ ?> 
		<div class="team-blocks"><!--team-block-->
          <div class="team-pic"> <img src="<?php echo esc_url($img); ?>" alt="" class="img-circle">
            <h3><?php echo htmlspecialchars_decode($name); ?></h3>
            <small><?php echo htmlspecialchars_decode($job); ?></small> </div>
        </div><!--/.team-block-->
	<?php } ?> 
	<?php if($stylist=='style3'){ ?>
		<div class="doctor-profile"> <div class="bg-profile"> <img src="<?php echo esc_url($img); ?>" alt=""></div>
	        <h3> <?php echo htmlspecialchars_decode($name); ?> </h3>
	        <strong><?php echo htmlspecialchars_decode($job); ?><?php if($number){ ?>     |      <?php echo htmlspecialchars_decode($number); ?> <?php } ?></strong>
	        <?php if($content){ ?><p><?php echo htmlspecialchars_decode($content); ?></p><?php } ?>
	        <div class="social"> 
	        	<?php if($icon1){ ?><a href="<?php echo esc_url($link1); ?>"><i class="fa-size <?php echo esc_attr($icon1); ?>"> </i></a><?php } ?> 
	        	<?php if($icon2){ ?><a href="<?php echo esc_url($link2); ?>"><i class="fa-size <?php echo esc_attr($icon2); ?>"> </i></a><?php } ?> 
	        	<?php if($icon3){ ?><a href="<?php echo esc_url($link3); ?>"><i class="fa-size <?php echo esc_attr($icon3); ?>"> </i></a><?php } ?> 
	        	<?php if($icon4){ ?><a href="<?php echo esc_url($link4); ?>"><i class="fa-size <?php echo esc_attr($icon4); ?>"> </i></a><?php } ?> 	
	    	</div>
      	</div>
	<?php } ?>
	<?php if($stylist=='style4'){ ?>
		<div class="team-pool">
        	<div class="team-info"><!--team-info-->
          		<h2><?php echo htmlspecialchars_decode($name); ?></h2>
          		<p><?php echo htmlspecialchars_decode($content); ?></p>
        	</div>
        	<!--/.team-info-->
        	<div class="down-arrow"></div>
        	<div class="team-pic"><img src="<?php echo esc_url($img); ?>" alt="" class="img-circle"> </div>
      	</div>
	<?php } ?>  
	<?php if($stylist=='style5'){ ?>
		<div class="team-single-fitness">
            <div class="team-pic-fitness"> <img src="<?php echo esc_url($img); ?>" class="img-circle img-responsive" alt=""> </div>
            <h3><?php echo esc_attr($name); ?></h3>
            <span class="highlight"><?php echo esc_attr($job); ?></span> 
        </div>
	<?php } ?>

	<?php

    return ob_get_clean();
}

// Team Silder

add_shortcode('teamslide','teamslide_func');

function teamslide_func($atts, $content = null){

	extract(shortcode_atts(array(
		'visible'	=>	'',
	), $atts));	
	$visible1 = (!empty($visible) ? $visible : 2);
	ob_start(); ?>
	
    <div id="owl-demo-dating" class="member-block-dating"><!--member block start-->
    	<?php

			$args = array(
				'post_type' => 'team',
				'posts_per_page' => -1,
			);

			$team = new WP_Query($args);
			if($team->have_posts()) : while($team->have_posts()) : $team->the_post();
		?>
    	<div class="block-dating item"><!--member profile start-->
        	<div class="thumbnail">
        		<?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
            </div>
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>
        </div><!--member profile close-->
        <?php endwhile; wp_reset_postdata(); endif; ?> 
  	</div> 
  	<script>
		(function($) { "use strict";
			
			  	$("#owl-demo-dating").owlCarousel({
 
			      autoPlay: 3000, //Set AutoPlay to 3 seconds
			 
			      items : <?php echo esc_attr($visible1); ?>,
			      itemsDesktop : [1140,3],
			      itemsDesktopSmall : [979,3]
			 
  				});
					
		})(jQuery); 
	</script>

<?php
    return ob_get_clean();
}


// Call To Action 
add_shortcode('callto', 'callto_func');
function callto_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>	'',
		'stitle'	=>	'',
		'linkbox1'	=>	'',
		'linkbox2'	=>	'',
		'style'		=>	'',
		'icon1'		=>	'',
		'icon2'		=>	'',
		'photo'		=>	'',
		'photo2'	=>	'',
		'photo3'	=>	'',
	), $atts));
	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];
	$img2 = wp_get_attachment_image_src($photo2,'full');
	$img2 = $img2[0];
	$img3 = wp_get_attachment_image_src($photo3,'full');
	$img3 = $img3[0];
	$stylist = (!empty($style) ? $style : style1);
	ob_start(); ?>
	
	<?php if($stylist=='style1'){ ?>
		<div class="col-md-offset-1 col-md-4 app-pic-carbooking"> <img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive"> </div>
	    <div class="col-md-6 app-info-carbooking">
		    <h1><?php echo htmlspecialchars_decode($title); ?></h1>
		    <p><?php echo htmlspecialchars_decode($stitle); ?></p>
	    	<?php if($linkbox1){ ?><a href="<?php echo esc_url($linkbox1); ?>"><img src="<?php echo esc_url($img2); ?>" class="" alt=""></a><?php } ?> <?php if($linkbox2){ ?><a href="<?php echo esc_url($linkbox2); ?>"><img src="<?php echo esc_url($img3); ?>" class="" alt=""></a><?php } ?>      
	    </div>
    <?php } ?>
    <?php if($stylist=='style2'){ ?>
    	<div class="col-md-4 size-150"> <i class="<?php echo esc_attr($icon1); ?>"></i> <i class="<?php echo esc_attr($icon2); ?>"></i></div>

	    <div class="col-md-8 app-info-fitness">
		    <h1><?php echo htmlspecialchars_decode($title); ?></h1>
		    <p><?php echo htmlspecialchars_decode($stitle); ?></p>
	    	<?php if($linkbox1){ ?><a href="<?php echo esc_url($linkbox1); ?>"><img src="<?php echo esc_url($img2); ?>" class="" alt=""></a><?php } ?> <?php if($linkbox2){ ?><a href="<?php echo esc_url($linkbox2); ?>"><img src="<?php echo esc_url($img3); ?>" class="" alt=""></a><?php } ?>      
	    </div>
    <?php } ?>

	<?php
    return ob_get_clean();
}

// Question
add_shortcode('question', 'question_func');
function question_func($atts, $content = null){
	extract(shortcode_atts(array(
		'question'		=>	'',
		'style'			=>	'',				
	), $atts));
		$stylist = (!empty($style) ? $style : style1);
	ob_start(); ?>
	
	<?php if($stylist=='style1'){ ?>
		<div class="que"><!-- que -->
	    	<h4><?php echo htmlspecialchars_decode($question); ?></h4>
	        <p><?php echo htmlspecialchars_decode($content); ?></p>
	    </div> 
	<?php } ?> 
	<?php if($stylist=='style2'){ ?>
		<div class="lp-section-block-carbooking-3"><!--lp-section-block-->
          	<div class="question-block"><!--question-block--> 
            	<span class="square">Q</span>
            	<h3 class="question"><?php echo htmlspecialchars_decode($question); ?></h3>
          	</div>
          	<p><?php echo htmlspecialchars_decode($content); ?></p>
        </div>
	<?php } ?> 
	<?php if($stylist=='style3'){ ?>
		<div class="faq-block-carwash"><!-- faq block -->
        	<h2><span>Q</span> <?php echo htmlspecialchars_decode($question); ?></h2>
        	<p class="lead-carwash"><?php echo htmlspecialchars_decode($content); ?></p>
      	</div>
	<?php } ?>

	<?php
    return ob_get_clean();
}

// Pricing Table
add_shortcode('pricingtable', 'pricingtable_func');
function pricingtable_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>	'',
		'stitle'	=>	'',
		'price'		=>	'',	
		'feature'	=>	'',	
		'style'		=>	'',
		'linkbox'	=>	'',
		'unit'		=>	'',
		'photo'		=>	'',
		'per'		=>	'',
	), $atts));
	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];
	$url = vc_build_link( $linkbox );
	$stylist = (!empty($style) ? $style : style1);
	ob_start(); ?>
	
	<?php if($stylist=='style1'){ ?>
	   	<div class="price-block <?php if($feature=='yes'){echo 'price-block-dark';} ?>"><!--price-block-->
          <h2 class="font19"><?php echo htmlspecialchars_decode($title); ?></h2>
          <?php echo htmlspecialchars_decode($content); ?>
          <h1><small><?php echo esc_attr($unit); ?></small><?php echo htmlspecialchars_decode($price) ?></h1>
        </div>
    <?php } ?>
    <?php if($stylist=='style2'){ ?>
    	<div class="lp-price-blk <?php if($feature=='yes'){echo 'hot-tubs';} ?>">
          <div class="lp-price-title">
            <h2><?php echo htmlspecialchars_decode($title); ?></h2>
          </div>
          <div class="price-ctn">
            <?php echo htmlspecialchars_decode($content); ?>
          </div>
          <div class="price-box"><!-- price-box -->
            <h1><span class="dlr"><?php echo esc_attr($unit); ?></span><?php echo htmlspecialchars_decode($price); ?></h1>
            <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
			echo '<a class="btn lp-btn-default-pool page-scroll" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
			} ?>
        	</div>
        </div>
    <?php } ?>
    <?php if($stylist=='style3'){ ?>
    	<div class="pricing-block-wedding">
          	<div class="lp-pic"> 
            	<img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive"> 
            </div>
          	<div class="pricing-info"> 
            	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
            	<div class="amt"> <small><?php echo esc_attr($unit); ?></small><?php echo esc_attr($price); ?> </div>
            	<?php echo htmlspecialchars_decode($content); ?>            
          	</div>
        </div>
    <?php } ?>
    <?php if($stylist=='style4'){ ?>
    	<div class="price-block-edu"><!--price-block-->
          	<div class="basic"><!--basic -->
            	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
            	<small><?php echo htmlspecialchars_decode($stitle); ?></small> 
            </div>
          	<div class="price-info-edu"><!--price-info-->
            	<h1><span><?php echo esc_attr($unit); ?></span><?php echo esc_attr($price); ?></h1>
            	<div class="month"><!--month--> 
              		<small><?php echo esc_attr($per); ?></small> 
              	</div>
	            <?php echo htmlspecialchars_decode($content); ?>
	            <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
				echo '<a class="btn lp-btn-default-edu page-scroll" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
				} ?>            	 
            </div>
        </div>
    <?php } ?>
    <?php if($stylist=='style5'){ ?>
		<div class="pricing-block-fitness <?php if($feature=='yes'){echo 'pricing-block-feature-fitness';} ?>"><!-- section black -->
          	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
          	<div class="icon-circle-fitness"><!-- icon circle -->
            	<h1><small><?php echo esc_attr($unit); ?></small><?php echo esc_attr($price); ?></h1>
            	<p><?php echo esc_attr($per); ?></p>
          	</div>
          	<?php echo htmlspecialchars_decode($content); ?>
          	<?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
				echo '<a class="btn lp-btn-grey-fitness page-scroll" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
			} ?>  
        </div>
	<?php } ?>
	<?php if($stylist=='style6'){ ?>
		<div class="pricing-block-carbooking">
        	<div class="pricing-info-carbooking"><!--taxi-info-->
          		<h3>Taxi Start</h3>
        	</div>
        	<div class="icon-circle-carbooking"><!--icon-circle-->
          		<h1><small><?php echo esc_attr($unit); ?></small> <?php echo esc_attr($price); ?></h1>
        	</div>
        	<div class="pricing-ctn-carbooking"><!--taxi-ctn-->
          		<p><?php echo htmlspecialchars_decode($content); ?></p>
        	</div> 
      	</div>
	<?php } ?>
	<?php if($stylist=='style7'){ ?>
      	<div class="price-info-handyman"><!-- price info -->
        	<div class="lp-white-box"><!--lp-white-box-->
          		<h3><?php echo esc_attr($title); ?></h3>
          		<p><?php echo htmlspecialchars_decode($content); ?></p>
        	</div>
        	<div class="amt-handyman"><!--amt-->
          		<p><span><?php echo esc_attr($unit); ?></span><?php echo esc_attr($price); ?></p>
        	</div>
      	</div>
	<?php } ?>
	<?php if($stylist=='style8'){ ?>
		<div class="pricing-block-hotel"><!-- pricing block -->
	        <div class="pricing-pic-hotel"><!-- pricing pic --> 
	          	<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt="">
	          	<div class="pricing-caption-hotel"><!-- pricing caption -->
	           		<h2><span><?php echo esc_attr($unit); ?></span><?php echo esc_attr($price); ?></h2>
	          	</div>
	        </div>
	        <div class="pricing-info-hotel"><!-- pricing info -->
	          	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
	          	<p><?php echo htmlspecialchars_decode($content); ?></p>
	          	<?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
					echo '<a class="btn lp-btn-primary-hotel page-scroll" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
				} ?>
	        </div> 
      	</div>
	<?php } ?>
	<?php if($stylist=='style9'){ ?>
		<div class="booking-block-rental">
        	<div class="booking-pic-rental">
          		<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt=""> 
        	</div>
        	<div class="booking-info-rental box-color-rental">
         		<h3><?php echo htmlspecialchars_decode($title); ?></h3>
          		<p><?php echo htmlspecialchars_decode($content); ?></p>
        	</div>
        	<div class="price-box-rental"> 
          		<span class="amount-rental"><?php echo esc_attr($price); ?><small> <?php echo esc_attr($per); ?></small></span> 
        	</div>
      	</div>
	<?php } ?>
	<?php if($stylist=='style10'){ ?>
		<div class="price-block-carwash"><!-- price block -->
	        <div class="box-color-carwash price-title-carwash"><!-- box color -->
	          	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
	        </div>
	        <div class="box-color-carwash price-info-carwash"><!-- box color -->
	          	<?php echo htmlspecialchars_decode($content); ?>
	          	<div class="price-carwash"><?php echo esc_attr($unit); ?><?php echo esc_attr($price); ?></div>
	        </div> 
      	</div>
	<?php } ?>

	<?php
    return ob_get_clean();
}

// Buttons
add_shortcode('button', 'button_func');
function button_func($atts, $content = null){

	extract(shortcode_atts(array(
		'linkbox' 		=> '',		
		'size'			=>	'',
		'fontw'			=>	'',
		'color'			=>	'',
		'align'			=>	'',
		'spacing'		=>	'',
		'icon_check'	=>	'',
		'icon'			=>	'',
		'css'			=>	'',
	), $atts));
	$url 	= vc_build_link( $linkbox );
	$stylist = (!empty($style) ? $style : style1);
	$fontw1 = (!empty($fontw) ? 'font-weight: '.$fontw.';' : '');
	$size1 = (!empty($size) ? 'font-size: '.$size.'px;' : '');
	$color1 = (!empty($color) ? 'color: '.$color.';' : '');
	$spacing1 = (!empty($spacing) ? 'letter-spacing: '.$spacing.'px;' : '');
	$icon1 = (!empty($icon) ? '<i class="'.$icon.'"></i>' : '');
	ob_start(); ?>			
	
	
		<?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
			echo '<a class="page-scroll '. vc_shortcode_custom_css_class( $css ) .'" style="'. $fontw1 . $color1 . $size1 . $spacing1 .'" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) .$icon1. '</a>';
		} ?>
	
	
	<?php 
	return ob_get_clean();
}

// Gallery

add_shortcode('galeryposts', 'galeryposts_func');
function galeryposts_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
		'style'			=>	'',
		'visible'		=>	'',
	), $atts));
	$stylist = (!empty($style) ? $style : style1);
	$visible1 = (!empty($visible) ? $visible : 1);
	ob_start(); ?>
	
	<?php if($stylist=='style1'){ ?>
		<div id="gallery-photo" class="gallery-photo"><!-- gallery-->
			<?php 
				$img_ids = explode(",",$gallery);
				foreach( $img_ids AS $img_id ){
				$image_src = wp_get_attachment_image_src($img_id,''); 
				$attachment = get_post( $img_id );
			?>
	      	<div class="item">
		        <div class="lp-section-block"><!--lp-section-block-->
		          	<div class="col-md-12">
		          	 	<img src="<?php echo esc_url( $image_src[0] ); ?>" alt="" class="img-responsive"> 
	          	 	</div>
		        </div><!--/.lp-section-block-->
	      	</div>
	      	<?php } ?>      
	    </div><!--/.gallery-->
	    <script>
			(function($) { "use strict";
				/* Quote Carousel */
				$(document).ready(function() {
	 				$("#gallery-photo").owlCarousel({
					 	autoPlay: 3000, //Set AutoPlay to 3 seconds
					 	items : <?php echo esc_attr($visible1); ?>,
						itemsDesktop : [1199,<?php echo esc_attr($visible1); ?>],
						itemsDesktopSmall : [979,2],
						navigation : true,
						pagination : false						

					});				  
				});			
			})(jQuery); 
		</script>
	<?php } ?>
	<?php if($stylist=='style2'){ ?>
		<div id="gallery-diet">
			<?php 
				$img_ids = explode(",",$gallery);
				foreach( $img_ids AS $img_id ){
				$image_src = wp_get_attachment_image_src($img_id,''); 
				$attachment = get_post( $img_id );
			?>
      		<div class="item">
      			<img src="<?php echo esc_url( $image_src[0] ); ?>" alt="" class="img-responsive"> 
      		</div>	
      		<?php } ?>	    
    	</div>
    	<script>
			(function($) { "use strict";
				$("#gallery-diet").owlCarousel({
 					autoPlay: 5000, //Set AutoPlay to 5 seconds
 	 				items : <?php echo esc_attr($visible1); ?>,
	 				itemsMobile : [479,1],
      				itemsDesktop : [1199,<?php echo esc_attr($visible1); ?>],
      				itemsDesktopSmall : [979,2],	   
				});
			})(jQuery);
		</script>
	<?php } ?>
	<?php if($stylist=='style4'){ ?>
		<div id="gallery-moving" class="gallery-moving">
			<?php 
				$img_ids = explode(",",$gallery);
				foreach( $img_ids AS $img_id ){
				$image_src = wp_get_attachment_image_src($img_id,''); 
				$attachment = get_post( $img_id );
			?>
			<div class="item">
				<img src="<?php echo esc_url( $image_src[0] ); ?>" alt="" class="img-responsive">
			</div>
			<?php } ?>
		</div>
		<script>
			(function($) { "use strict";
				var owl = $("#gallery-moving");
 
			  	owl.owlCarousel({
			      	items : <?php echo esc_attr($visible1); ?>, //10 items above 1000px browser width
			     	itemsDesktop : [1000,<?php echo esc_attr($visible1); ?>], //5 items between 1000px and 901px
			      	itemsDesktopSmall : [900,2], // betweem 900px and 601px
			      	itemsTablet: [600,1], //2 items between 600 and 0
			      	itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
				  	autoPlay:true,
			  	});
			})(jQuery);
		</script>
	<?php } ?>
	<?php if($stylist=='style3'){ ?>
		<div id="gallery-makeup">
			<?php 
				$img_ids = explode(",",$gallery);
				foreach( $img_ids AS $img_id ){
				$image_src = wp_get_attachment_image_src($img_id,''); 
				$attachment = get_post( $img_id );
			?>
			<div class="item">
				<img src="<?php echo esc_url( $image_src[0] ); ?>" alt="" class="img-responsive">
			</div>
			<?php } ?>
		</div>
		<script>
			(function($) { "use strict";
				var owl = $("#gallery-makeup");
 
			  	owl.owlCarousel({
			      	items : <?php echo esc_attr($visible1); ?>, //10 items above 1000px browser width
			     	itemsDesktop : [1000,<?php echo esc_attr($visible1); ?>], //5 items between 1000px and 901px
			      	itemsDesktopSmall : [900,<?php echo esc_attr($visible1); ?>], // betweem 900px and 601px
			      	itemsTablet: [600,2], //2 items between 600 and 0
			      	itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
				  	autoPlay:true,
			  	});
			})(jQuery);
		</script>
	<?php } ?>
	<?php if($stylist=='style5'){ ?>
		<div id="gallery-wedding" class="gallery-wedding">
			<?php 
				$img_ids = explode(",",$gallery);
				foreach( $img_ids AS $img_id ){
				$image_src = wp_get_attachment_image_src($img_id,''); 
				$attachment = get_post( $img_id );
			?>
      		<div class="item">
      			<img src="<?php echo esc_url( $image_src[0] ); ?>" alt="" class="img-responsive"> 
      		</div>	
      		<?php } ?>	    
    	</div>
    	<script>
			(function($) { "use strict";
				$("#gallery-wedding").owlCarousel({
 					autoPlay: 5000, //Set AutoPlay to 5 seconds
 	 				items : <?php echo esc_attr($visible1); ?>,
	 				itemsMobile : [479,1],
      				itemsDesktop : [1199,<?php echo esc_attr($visible1); ?>],
      				itemsDesktopSmall : [979,2],	   
				});
			})(jQuery);
		</script>
	<?php } ?>


<?php
    return ob_get_clean();
}

// Testimonial
add_shortcode('testimonial','testimonial_func');

function testimonial_func($atts, $content = null){

	extract(shortcode_atts(array(
		'icon'		=>	'',
		'photo'		=>	'',
		'name'		=>	'',
		'job'		=>	'',
		'style'		=>	'',
	), $atts));	
	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];
	$stylist = (!empty($style) ? $style : style1);	
	ob_start(); ?>

	<?php if($stylist=='style1'){ ?>
		<div class="testimonial-block-diet">
	        <h3><?php echo htmlspecialchars_decode($content); ?></h3>
	        <div class="testi-pic">
	            <img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive"> </div>
	        <div class="name">  
	            <span><?php echo esc_attr($name); ?></span><?php if($job){ ?><small><?php echo esc_attr($job); ?></small> <?php } ?>
	        </div>
	    </div>
	<?php } ?>
	<?php if($stylist=='style2'){ ?>
		<div class="testimonial-life">
			<div class="col-md-4"> <img src="<?php echo esc_url($img); ?>" class="img-circle client-circle" alt="pic-4"> </div>
			<div class="col-md-8">
	          <p> <?php echo htmlspecialchars_decode($content); ?> </p>
	          <span> - <?php echo htmlspecialchars_decode($name); ?><?php if($job){ ?><span>  ( <?php echo htmlspecialchars_decode($job); ?> ) </span><?php } ?> </span>
	        </div>
	    </div>
	<?php } ?>
	<?php if($stylist=='style3'){ ?>
		<div class="testimonial-block-travel">
        	<div class="info-bg">
          		<p><?php echo htmlspecialchars_decode($content); ?></p>
        	</div>
        	<div class="customers-details"><!-- customers details -->
          		<div class="lp-pic"><!-- pic --> 
            		<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt="">
            	</div>
          		<div class="customers-name">
            		<h2><?php echo htmlspecialchars_decode($name) ?></h2>
            		<br>
            		<?php if($job){ ?><small>(<?php echo htmlspecialchars_decode($job); ?>)</small> <?php } ?>
            	</div>
        	</div>
        </div>
	<?php } ?>
	<?php if($stylist=='style4'){ ?>
		<div class="testimonial-block-room">
          	<div class="testimonial-info">
            	<p><?php echo htmlspecialchars_decode($content); ?></p>
          	</div>
          	<div class="testimonial-img">
            	<img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive">
            </div>
          	<div class="testimonial-name">
            	<span><?php echo htmlspecialchars_decode($name); ?></span><br>
            	<?php if($job){ ?><small>(<?php echo htmlspecialchars_decode($job); ?>)</small> <?php } ?>
            </div>
        </div>
	<?php } ?>
	<?php if($stylist=='style5'){ ?>
		<div class="testimonial-block-edu"><!--testimonial-block-->
          	<div class="testimonial-info-edu"><!--testimonial-info-->
            	<h3><?php echo htmlspecialchars_decode($content); ?> </h3>
          	</div>
          	<div class="testimonial-pic-edu"><!--testimonial-pic--> 
            	<img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive"> 
            </div>
          	<div class="name-edu"><!--name-->
           	 	<h2><?php echo esc_attr($name); ?></h2>
            	<?php if($job){ ?><small>(<?php echo esc_attr($job); ?>)</small><?php } ?> 
            </div>
        </div>
	<?php } ?>
	<?php if($stylist=='style6'){ ?>
		<div class="testimonial-block-carre"><!-- testimonial block -->
        	<div class="testimonial-info-carre"><!-- testimonial info -->
          		<p><?php echo htmlspecialchars_decode($content); ?></p>          		
          	</div>
        	<div class="testimonial-info-arrow-carre"></div>
        	<div class="testimonial-detail-carre"><!-- testimonial detail --> 
          		<img src="<?php echo esc_url($img); ?>" class="img-circle" alt="">
          		<h3><?php echo htmlspecialchars_decode($name); ?></h3>
          		<?php if($job){ ?><span>(<?php echo htmlspecialchars_decode($job); ?>)</span> <?php } ?>
          	</div>
      	</div>
	<?php } ?>
	<?php if($stylist=='style7'){ ?>
		<div class="testimonial-block-rental box-color-rental"><!-- testimonial block -->
          	<div class="testimonial-pic-rental"><!-- testimonial pic --> 
            	<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt=""> 
            </div>
          	<div class="testimonial-info-rental"><!-- testimonial info -->
            	<p><?php echo htmlspecialchars_decode($content); ?></p>
            	<span class="name"> <?php echo esc_attr($name); ?><?php if($job){ ?>, <small><?php echo esc_attr($job); ?></small><?php } ?></span> 
            </div>
        </div>
	<?php } ?>
	<?php if($stylist=='style8'){ ?>
		<div class="testimonial-block-carwash"><!-- testimonial block -->
	    	<div class="box-color-carwash"><!-- box color -->
	          	<p><?php echo htmlspecialchars_decode($content); ?></p>
	        </div>
	        <div class="client-say-carwash"><!-- client say -->
	          	<div class="client-img-carwash"><!-- client img --> 
	            	<img src="<?php echo esc_url($img); ?>" class="img-circle" alt=""> </div>
	          	<div class="client-info-carwash"><!-- client info -->
	            	<p><?php echo esc_attr($name); ?></p>
	            	<?php if($job){ ?><span><?php echo esc_attr($job); ?></span> <?php } ?>
	            </div> 
	        </div>
      	</div>
	<?php } ?>
	<?php if($stylist=='style9'){ ?>
		<div class="testimonial-dating"><!--success story -->
        	<div class="story-bg story-bg-bottom">
            	<img src="<?php echo esc_url($img); ?>" class="img-circle" alt="">
            </div>
            <div class="ts-ct">
            	<p><?php echo htmlspecialchars_decode($content); ?></p>
                <p class="couple-name-dating"><?php echo htmlspecialchars_decode($name); ?></p>
                <?php if($job){ ?><span><?php echo htmlspecialchars_decode($job); ?></span><?php } ?>
            </div>
        </div>
	<?php } ?>

<?php
    return ob_get_clean();
}

// Testimonial Slider

add_shortcode('testslide','testslide_func');

function testslide_func($atts, $content = null){

	extract(shortcode_atts(array(

		'style'		=>	'',
		'visible'	=>	'',

	), $atts));

	$stylist = (!empty($style) ? $style : style1);	
	$visible1 = (!empty($visible) ? $visible : 1);

	ob_start(); ?>

	<?php if($stylist=='style1'){ ?>
	    <div id="testimonial-broker" class="lp-testimonial">
	    	<?php

				$args = array(

					'post_type' => 'testimonial',

					'posts_per_page' => -1,

				);

				$testimonial = new WP_Query($args);

				if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();
				$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
			?>
	        <div class="item testimonial-block">
		        <?php the_content(); ?>
		        <h2><?php the_title(); ?></h2>
		        <span><?php echo htmlspecialchars_decode($job); ?></span>
	        </div>
	        <?php endwhile; wp_reset_postdata(); endif; ?>      
	    </div>
	    <script>
			(function($) { "use strict";
				/* Quote Carousel */
				$(document).ready(function() {
	 
				  $("#testimonial-broker").owlCarousel({
				     
				    navigation: false,
				    pagination:true, 
				    slideSpeed : 300,
					autoPlay : 3000,
				    items : <?php echo esc_attr($visible1); ?>,
					itemsDesktop : [1199,<?php echo esc_attr($visible1); ?>],
					itemsDesktopSmall : [979,1],
				 
				  });
				});			
			})(jQuery); 
		</script>
    <?php } ?>
    <?php if($stylist=='style2'){ ?>
    	<div id="testimonial-photo" class="testimonial-photo"><!--testimonial-->
    		<?php

				$args = array(
					'post_type' => 'testimonial',
					'posts_per_page' => -1,
				);

				$testimonial = new WP_Query($args);
				if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();
				$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
			?>
		    <div class="item">
		        <div class="lp-section-block"><!--lp-section-block-->
		          	<div class="col-md-3">
		          		<!--testimonial-pic-->
			            <div class="testimonial-pic">
			            	<?php the_post_thumbnail( 'full', array( 'class' => 'img-circle' ) ); ?>
			            </div><!--/.testimonial-pic-->
		          	</div>
		          	<div class="col-md-9">
		            	<div class="testimonial-info-photo"><!--testimonial-info-->
		              		<?php the_content(); ?>
		              		<span><?php the_title(); ?><?php if($job){ ?>,<?php } ?></span><?php if($job){ ?><small>(<?php echo esc_attr($job); ?>)</small> <?php } ?>
		              	</div><!--/.testimonial-info-->
		          	</div>
		        </div>
		    </div>
		    <?php endwhile; wp_reset_postdata(); endif; ?>
		</div><!--/.testimonial-->	
		<script>
			(function($) { "use strict";
				/* Quote Carousel */
				$(document).ready(function() {
	 
				  $("#testimonial-photo").owlCarousel({
				     
				    navigation: false,
				    pagination:true, 
				    slideSpeed : 300,
					autoPlay : 3000,
				    items : <?php echo esc_attr($visible1); ?>,
					itemsDesktop : [1199,<?php echo esc_attr($visible1); ?>],
					itemsDesktopSmall : [979,1],			 
				  });
				});			
			})(jQuery); 
		</script>	
    <?php } ?>
    <?php if($stylist=='style3'){ ?>
    	<div id="owl-demo" class="style3"> 
    		<?php

				$args = array(
					'post_type' => 'testimonial',
					'posts_per_page' => -1,
				);

				$testimonial = new WP_Query($args);
				if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();			
			?>               
            <div class="item">
            	<?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
                <div class="lp-testimonial-info">
                    <?php echo the_content(); ?>
                    <span> - <?php the_title(); ?></span> 
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>                
        </div>
        <script>
			(function($) { "use strict";
				$(document).ready(function() {	 
				  $("#owl-demo").owlCarousel({				     
				    navigation: false,
				    pagination:true, 
				    slideSpeed : 300,
					autoPlay : 3000,
				    items : <?php echo esc_attr($visible1); ?>,
					itemsDesktop : [1199,<?php echo esc_attr($visible1); ?>],
					itemsDesktopSmall : [979,1],			 
				  });
				});			
			})(jQuery); 
		</script>	
    <?php } ?> 
    <?php if($stylist=='style4'){ ?>
    	<div id="testimonial-wedding">
    		<?php
				$args = array(
					'post_type' => 'testimonial',
					'posts_per_page' => -1,
				);
				$testimonial = new WP_Query($args);
				if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();
				$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
				$address = get_post_meta(get_the_ID(),'_cmb_address_testi', true);
			
			?> 
          	<div class=" item testimonial-block-wedding"> <!--testimonial-block-->
            	<h3><?php the_content(); ?></h3>
            	<div class="name"> 
              		<span><?php the_title(); ?> </span> <small>(<?php echo esc_attr($job); ?>)</small> 
              	</div>
          	</div>
          	<?php endwhile; wp_reset_postdata(); endif; ?>           
        </div>
        <script>
			(function($) { "use strict";
				$("#testimonial-wedding").owlCarousel({
				 	autoPlay: 3000, //Set AutoPlay to 3 seconds
				 	items : <?php echo esc_attr($visible1); ?>,
					itemsDesktop : [1199,<?php echo esc_attr($visible1); ?>],
					itemsDesktopSmall : [979,1],
					pagination:false,
					navigation:true,
				    navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
				});		
			})(jQuery); 
		</script>
    <?php } ?> 
    <?php if($stylist=='style5'){ ?>
    	<div id="testimonial-makeup" class="testimonial-block-makeup">
    		<?php
				$args = array(
					'post_type' => 'testimonial',
					'posts_per_page' => -1,
				);
				$testimonial = new WP_Query($args);
				if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();
				$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
				$address = get_post_meta(get_the_ID(),'_cmb_address_testi', true);			
			?> 
          	<div class="item">
            	<div class="testimonial-pic">
	            	<?php the_post_thumbnail( 'full', array( 'class' => 'img-circle' ) ); ?>
            	</div>
        		<p><?php the_content(); ?></p>
        		<h3><?php the_title(); ?></h3>
          	</div>
          	<?php endwhile; wp_reset_postdata(); endif; ?> 
        </div>
        <script>
			(function($) { "use strict";
				$("#testimonial-makeup").owlCarousel({
				 	autoPlay: 3000, //Set AutoPlay to 3 seconds
				 	items : <?php echo esc_attr($visible1); ?>,
					itemsDesktop : [1199,<?php echo esc_attr($visible1); ?>],
					itemsDesktopSmall : [979,1],
					navigation : false
				});	
			})(jQuery); 
		</script>
    <?php } ?> 
    <?php if($stylist=='style6'){ ?>
    	<div id="testimonials-fitness">
    		<?php
				$args = array(
					'post_type' => 'testimonial',
					'posts_per_page' => -1,
				);
				$testimonial = new WP_Query($args);
				if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();
				$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
				$address = get_post_meta(get_the_ID(),'_cmb_address_testi', true);		
			?> 
          	<div class="item">
            	<?php the_content(); ?>
            	<div class="client"><!-- client -->
              		<div class="client-img"><?php the_post_thumbnail( 'full', array( 'class' => 'img-circle' ) ); ?></div>
              		<p class="client-name"><?php the_title(); ?><br><small><?php if($address){ ?><?php echo esc_attr($address); ?><?php } ?><?php if($job){ ?><?php echo esc_attr($job); ?><?php } ?></small></p>
            	</div> 
          	</div>
          	<?php endwhile; wp_reset_postdata(); endif; ?> 
        </div>
        <script>
			(function($) { "use strict";
				$("#testimonials-fitness").owlCarousel({
				 	autoPlay: 3000, //Set AutoPlay to 3 seconds
				 	items : <?php echo esc_attr($visible1); ?>,
					itemsDesktop : [1199,<?php echo esc_attr($visible1); ?>],
					itemsDesktopSmall : [979,1]
				});
			})(jQuery); 
		</script>
    <?php } ?>
    <?php if($stylist=='style7'){ ?>
    	<div id="testimonial-handyman" class="row testimonial-handyman">
    		<?php
				$args = array(
					'post_type' => 'testimonial',
					'posts_per_page' => -1,
				);
				$testimonial = new WP_Query($args);
				if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();
				$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
				$address = get_post_meta(get_the_ID(),'_cmb_address_testi', true);			
			?> 
    		<div class="item"><!--item-->
          		<div class="customer-block-handyman"><!--customer-block-->
            		<div class="lp-white-box"><!--lp-white-box-->
              			<?php the_content(); ?>
              			<?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
              			<h3>- <?php the_title(); ?> , <small> <?php echo esc_attr($job); ?></small></h3>
            		</div> 
          		</div>
        	</div>
        	<?php endwhile; wp_reset_postdata(); endif; ?> 
    	</div>
    	<script>
			(function($) { "use strict";
				$("#testimonial-handyman").owlCarousel({
				 	autoPlay: 3000, //Set AutoPlay to 3 seconds
				 	items : <?php echo esc_attr($visible1); ?>,
					itemsDesktop : [1199,<?php echo esc_attr($visible1); ?>],
					itemsDesktopSmall : [979,1]
				});
			})(jQuery); 
		</script>
    <?php } ?> 
    <?php if($stylist=='style8'){ ?>
    	<div id="owl-demo-insurance" class="insurance">
    		<?php
				$args = array(
					'post_type' => 'testimonial',
					'posts_per_page' => -1,
				);
				$testimonial = new WP_Query($args);
				if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();
				$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
				$address = get_post_meta(get_the_ID(),'_cmb_address_testi', true);			
			?> 
          	<div class="item"><!--testimonial start-->
            	<h2><?php the_content(); ?></h2>
       			<div class="authoe-name"><?php the_title(); ?> &#8211; <?php echo esc_attr($job); ?> <?php echo esc_attr($address); ?></div>
          	</div><!--testimonial close-->
          	<?php endwhile; wp_reset_postdata(); endif; ?>  
        </div>
        <script>
			(function($) { "use strict";
				$("#owl-demo-insurance").owlCarousel({ 
			      	autoPlay: 3000, //Set AutoPlay to 3 seconds				 
			      	items : <?php echo esc_attr($visible1); ?>,
				    itemsDesktop : [1140,<?php echo esc_attr($visible1); ?>],
				    itemsDesktopSmall : [979,1],				 
			  });
			})(jQuery); 
		</script>
    <?php } ?>
    <?php if($stylist=='style9'){ ?>
    	<div id="testimonial-foot" class="testimonial-foot">
    		<?php
				$args = array(
					'post_type' => 'testimonial',
					'posts_per_page' => -1,
				);
				$testimonial = new WP_Query($args);
				if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();
				$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
				$address = get_post_meta(get_the_ID(),'_cmb_address_testi', true);				
			?>
        	<div class="col-md-offset-2 col-md-8 testimonial-block-foot item"><!-- testimonial block -->
          		<div class="testimonial-pic-foot"><!-- testimonial pic --> 
            		<?php the_post_thumbnail( 'full', array( 'class' => 'img-circle' ) ); ?> 
            	</div>
          		<div class="testimonial-cta-foot"><!-- testimonial cta --> 
            		<span class="customer-name-foot"><?php the_title(); ?>, <?php if($address){ ?>  <small><?php echo esc_attr($address); ?></small><?php } ?></span>
            		<?php the_content(); ?>
          		</div> 
        	</div>
        	<?php endwhile; wp_reset_postdata(); endif; ?>        
      	</div>
      	<script>
			(function($) { "use strict";
				$("#testimonial-foot").owlCarousel({ 
			      	autoPlay: 3000, //Set AutoPlay to 3 seconds				 
			      	items : <?php echo esc_attr($visible1); ?>,
				    itemsDesktop : [1140,<?php echo esc_attr($visible1); ?>],
				    itemsDesktopSmall : [979,1],				 
			  });
			})(jQuery); 
		</script>
    <?php } ?>
    <?php if($stylist=='style10'){ ?>
    	<div id="testimonial-cake" class="testimonial-cake center">
    		<?php
				$args = array(
					'post_type' => 'testimonial',
					'posts_per_page' => -1,
				);
				$testimonial = new WP_Query($args);
				if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();
				$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
				$address = get_post_meta(get_the_ID(),'_cmb_address_testi', true);			
			?>
        	<div class="item">
              	<?php the_content(); ?>
                <h2>- <?php the_title(); ?> <small> ( <?php echo esc_attr($job); ?>) </small> </h2>                
          	</div>
        	<?php endwhile; wp_reset_postdata(); endif; ?>        
      	</div>
      	<script>
			(function($) { "use strict";
				$("#testimonial-cake").owlCarousel({ 
			      	autoPlay: 3000, //Set AutoPlay to 3 seconds				 
			      	items : <?php echo esc_attr($visible1); ?>,
				    itemsDesktop : [1140,<?php echo esc_attr($visible1); ?>],
				    itemsDesktopSmall : [979,1],
				    pagination: true,				 
			  });
			})(jQuery); 
		</script>
    <?php } ?>
    <?php if($stylist=='style11'){ ?>
    	<div id="testimonial-hardware" class="testimonial-hardware">
    		<?php
				$args = array(
					'post_type' => 'testimonial',
					'posts_per_page' => -1,
				);
				$testimonial = new WP_Query($args);
				if($testimonial->have_posts()) : while($testimonial->have_posts()) : $testimonial->the_post();
				$job = get_post_meta(get_the_ID(),'_cmb_job_testi', true);
				$address = get_post_meta(get_the_ID(),'_cmb_address_testi', true);			
			?>
    		<div class="item">
            	<div class="testimonial-pic-hardware"><!-- testimonal pic -->
            		<?php the_post_thumbnail( 'full', array( 'class' => 'img-circle' ) ); ?>
                </div><!-- /.testimonal pic -->
                <div class="testimonial-info-hardware"><!-- testimonial info -->
                    <?php the_content(); ?>
                    <h2><?php the_title(); ?></h2><br>
                    <?php if($job){ ?><small>(<?php echo esc_attr($job); ?>)</small><?php } ?>
                </div><!-- /.testimoial info -->
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?> 
    	</div>
    	<script>
			(function($) { "use strict";
				$("#testimonial-hardware").owlCarousel({ 
			      	autoPlay: 3000, //Set AutoPlay to 3 seconds				 
			      	items : <?php echo esc_attr($visible1); ?>,
				    itemsDesktop : [1140,<?php echo esc_attr($visible1); ?>],
				    itemsDesktopSmall : [979,1],
				    pagination: true,				 
			  });
			})(jQuery); 
		</script>
    <?php } ?>

<?php
    return ob_get_clean();
}


// Quick View
add_shortcode('quick', 'quick_func');
function quick_func($atts, $content = null){
	extract(shortcode_atts(array(
		'photo'		=> 	'',	
		'title'		=>	'',
		'style'		=>	'',
		'price'		=>	'',
		'ratting'	=>	'',
		'number'	=>	'',
		'linkbox'	=>	'',
	), $atts));

	$stylist = (!empty($style) ? $style : style1);
	$ratting1 = (!empty($ratting) ? $ratting : 0);
	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];
	$url = vc_build_link( $linkbox );

	ob_start(); ?>
	
	<?php if($stylist=='style1'){ ?>
		<div class="col-md-6">
	    	<div class="about-pic"><!-- about pic -->
	        	<img src="<?php echo esc_url($img); ?>" class="img-circle img-responsive" alt="">
	        </div><!-- /.about pic --> 
	    </div>
	    <div class="col-md-6 about-info"><!-- about info -->
	    	<?php if($title){ ?><h1><?php echo htmlspecialchars_decode($title); ?></h1><?php } ?>
	        <?php if($content){ ?><p class="lp-lead"><?php echo htmlspecialchars_decode($content); ?></p><?php } ?>
	        <?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
				echo '<a class="btn lp-btn-primary page-scroll" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
			} ?>
	        <?php if($number){ ?><div class="calls"><?php echo esc_attr($number); ?></div><?php } ?>
	    </div>
	<?php } ?>
	<?php if($stylist=='style2'){ ?>
		<div class="col-md-6">
        	<h1 class="diet"><?php echo htmlspecialchars_decode($title); ?> </h1>
        	<div class="combo-box"> 
          		<div class="amt"> 
            		<p><?php echo htmlspecialchars_decode($price); ?></p>
          		</div>
          		
          		<?php if($ratting1=='0'){ ?>
	          		
	           	<?php } ?>
	           	<?php if($ratting1=='0.5'){ ?>
	           		<div class="rating">          			
	           			<i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 
	           		</div>
	           	<?php } ?>
	           	<?php if($ratting1=='1'){ ?>
	           		<div class="rating">          			
	           			<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 
	           		</div>
	           	<?php } ?>
	           	<?php if($ratting1=='1.5'){ ?>
	           		<div class="rating">          			
	           			<i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 
	           		</div>
	           	<?php } ?>
	           	<?php if($ratting1=='2'){ ?>
	           		<div class="rating">          			
	           			<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 
	           		</div>
	           	<?php } ?>
	           	<?php if($ratting1=='2.5'){ ?>
	           		<div class="rating">          			
	           			<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 
	           		</div>
	           	<?php } ?>
	           	<?php if($ratting1=='3'){ ?>
	           		<div class="rating">          			
	           			<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> 
	           		</div>
	           	<?php } ?>
	           	<?php if($ratting1=='3.5'){ ?>
	           		<div class="rating">          			
	           			<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i> 
	           		</div>
	           	<?php } ?>
	           	<?php if($ratting1=='4'){ ?>
	           		<div class="rating">          			
	           			<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i> 
	           		</div>
	           	<?php } ?>
	           	<?php if($ratting1=='4.5'){ ?>
	           		<div class="rating">          			
	           			<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i> 
	           		</div>
	           	<?php } ?>
	           	<?php if($ratting1=='5'){ ?>
	           		<div class="rating">          			
	           			<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
	           		</div>
	           	<?php } ?>
          		
          		<div class="combo-info">
            		<?php echo htmlspecialchars_decode($content); ?>
          		</div>
          		
        	</div>
        	
      	</div>
      	<div class="col-md-offset-1 col-md-5">
	        <div class="combo-img"> 
		        <!--combo-img--> 
		        <img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive"> 
	        </div>
	        <!--/.combo-img--> 
      	</div>
	<?php } ?>

<?php
    return ob_get_clean();
}

// Quick View Video
add_shortcode('quickvideo', 'quickvideo_func');
function quickvideo_func($atts, $content = null){
	extract(shortcode_atts(array(
		'photo'			=> 	'',	
		'title'			=>	'',
		'stitle'		=>	'',		
		'video_link'	=>	'',
		'linkbox'		=>	'',
	), $atts));

	$stylist = (!empty($style) ? $style : style1);
	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];
	$url = vc_build_link( $linkbox );

	ob_start(); ?>
	
		<div class="col-md-6">
        	<div class="lp-section-block-fitness2"><!-- section block --> 
          		<span class="highlight-fitness"><?php echo htmlspecialchars_decode($stitle); ?></span>
          		<h1><?php echo htmlspecialchars_decode($title); ?></h1>
          		<p><?php echo htmlspecialchars_decode($content); ?></p>
          		<?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
					echo '<a class="btn lp-btn-primary-fitness page-scroll" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) . '</a>';
				} ?>
          	</div>
        <!-- /.section block --> 
      	</div>
      	<div class="col-md-6">
        	<div class="trainer-video"><!-- trainer video --> 
          		<a href="javascript:void(0)" class="open"><img src="<?php echo esc_url($img); ?>" class="img-responsive" alt=""></a> 
          	</div>
        <!-- /.trainer video --> 
      	</div>
    	<div class="row open-now">
      		<div class="close-sign">
      			<a href="javascript:void(0)" class="close-video"> <i class="fa fa-times"> Close Video</i></a>
      		</div>
  			<div class="col-md-12">
    			<div class="embed-responsive embed-responsive-16by9">      				
      					<iframe class="embed-responsive-item" src="<?php echo esc_url($video_link); ?>" frameborder="0" allowfullscreen></iframe>    				
    			</div>
  			</div>
		</div>
		<script>
	    	(function($) { "use strict";
				$(".open").click(function(){
			        $(".open-now").show(300);
			    });
				$(".close-video").click(function(){
			        $(".open-now").hide(300);
			    });
			})(jQuery);
	    </script>

<?php
    return ob_get_clean();
}

// Services
add_shortcode('quickview', 'quickview_func');
function quickview_func($atts, $content = null){
	extract(shortcode_atts(array(
		'photo'		=> 	'',		
		'title'		=>  '',
		'icon'		=>	'',
		'color'		=>	'',
		'style'		=>	'',
		'css'		=>	'',
	), $atts));
	$color1 = (!empty($color) ? 'border-bottom: 5px solid'.$color.';' : '');
	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];
	ob_start(); ?>
	<?php if($style=='style2'){ ?>
		<div class="benefit-block <?php echo vc_shortcode_custom_css_class( $css ); ?>"><!--benefit-block-->
	      <div class="square-icon"> <i class="<?php echo esc_attr($icon); ?>"></i> </div>
	      <div class="benefit-info">
	        <h2><?php echo htmlspecialchars_decode($title); ?></h2>
	        <p><?php echo htmlspecialchars_decode($content); ?></p>
	      </div>
	    </div>
	<?php }elseif($style=='style3'){ ?>
		<div class="feature-block <?php echo vc_shortcode_custom_css_class( $css ); ?>"><!-- feature block -->
	        <div class="feature-icon"><!-- feature icon --> 
	          <img src="<?php echo esc_url($img); ?>" class="img-responsive" alt=""> </div>
	        <!-- /.feature icon -->
	        <h2><?php echo esc_attr($title); ?></h2>
	        <p><?php echo htmlspecialchars_decode($content); ?></p>
	    </div>
	<?php }elseif($style=='style4'){ ?>
		<div class="green-icon <?php echo vc_shortcode_custom_css_class( $css ); ?>"> <i class="<?php echo esc_attr($icon); ?> fa-4x"> </i>
          <h3> <?php echo htmlspecialchars_decode($title); ?> </h3>
          <p> <?php echo htmlspecialchars_decode($content); ?> </p>
        </div>
    <?php }elseif($style=='style5'){ ?>  
    	<div class="service-blk"><!--service-blk-->
      		<div class="service-img">
      			<img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive">
        	</div>
        	<div class="service-info">
          		<h2><?php echo htmlspecialchars_decode($title); ?></h2>
          		<p><?php echo htmlspecialchars_decode($content); ?></p>
        	</div>
        </div>
    <?php }elseif($style=='style6'){ ?>
    	<div class="service-block-wedding">
          	<div class="lp-pic">
            	<a href=""> <img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive"> </a>
            </div>
          	<div class="service-info"> 
            	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
            	<p><?php echo htmlspecialchars_decode($content); ?></p>
          	</div>
        </div>
    <?php }elseif($style=='style7'){ ?>
    	<div class="service-block-makeup <?php echo vc_shortcode_custom_css_class( $css ); ?>">
        	<div class="lp-pic-makeup">
          		<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt=""> 
          	</div>
        	<div class="service-info">
          		<h2><?php echo htmlspecialchars_decode($title); ?></h2>
          		<p><?php echo htmlspecialchars_decode($content); ?></p>
        	</div> 
      	</div>
    <?php }elseif($style=='style8'){ ?>  
    	<div class="skill-block-edu <?php echo vc_shortcode_custom_css_class( $css ); ?>"><!--skill-block-->
          	<div class="skill-icon-edu"><!--skill-icon--> 
            	<img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive"> 
            </div>
          	<div class="skill-info-edu"><!--skill-info-->
            	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
            	<p><?php echo htmlspecialchars_decode($content); ?></p>
          	</div>
        </div>
    <?php }elseif($style=='style9'){ ?>
    	<div class="lp-section-block-carbooking <?php echo vc_shortcode_custom_css_class( $css ); ?>"><!--lp-section-block--> 
          	<i class="<?php echo esc_attr($icon); ?>"></i>
          	<h3><?php echo esc_attr($title); ?></h3>
        </div>
    <?php }elseif($style=='style10'){ ?> 
    	<div class="lp-section-block-moving <?php echo vc_shortcode_custom_css_class( $css ); ?>">
          	<div class="col-md-5 service-img-moving"><!-- service img --> 
            	<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt=""> 
            </div>
          	<div class="col-md-7"><!-- service info -->
	            <div class="service-info-moving">
	              	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
	              	<p><?php echo htmlspecialchars_decode($content); ?></p>
	            </div>
          	</div>
        </div>
    <?php }elseif($style=='style11'){ ?> 
    	<div class="advice-block-mortgage <?php echo vc_shortcode_custom_css_class( $css ); ?>"><!-- advice block -->
        	<div class="box-color-mortgage"><!-- box color -->
          		<h3><i class="<?php echo esc_attr($icon); ?>"></i> <?php echo htmlspecialchars_decode($title); ?></h3>
        	</div>
        	<div class="box-color-mortgage"><!-- box color -->
          		<p><?php echo htmlspecialchars_decode($content); ?></p>
        	</div> 
      	</div>
    <?php }elseif($style=='style12'){ ?>
    	<div class="feature-box-rental <?php echo vc_shortcode_custom_css_class( $css ); ?>">
          	<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt="">
          	<h3><?php echo htmlspecialchars_decode($title); ?></h3>
        </div>
    <?php }elseif($style=='style13'){ ?>
    	<div class="service-block-carwash <?php echo vc_shortcode_custom_css_class( $css ); ?>"><!-- service block -->
        	<div class="service-icon-carwash"><!-- service icon --> 
          		<img src="<?php echo esc_url($img); ?>" class="img-circle" alt=""> 
          	</div>
        	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
        	<p><?php echo htmlspecialchars_decode($content); ?></p>
      	</div>
    <?php }elseif($style=='style14'){ ?>
    	<div class="insurance-box <?php echo vc_shortcode_custom_css_class( $css ); ?>"><!--insurance box start-->
          	<div class="pic"><img src="<?php echo esc_url($img); ?>" class="img-responsive" alt=""></div>
          	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
          	<p><?php echo htmlspecialchars_decode($content); ?></p>
        </div><!--insurance box close-->
    <?php }elseif($style=='style15'){ ?>
    	<div class="service-block-harware <?php echo vc_shortcode_custom_css_class( $css ); ?>"><!-- service block -->
        	<div class="lp-pic-hardware"><!-- pic -->
            	<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt="">
            </div><!-- /.pic -->
            <div class="service-info-hardware"><!-- service info -->
            	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
                <p><?php echo htmlspecialchars_decode($content); ?></p>
            </div><!-- /.service info -->
        </div>
	<?php }else{ ?>
		<div class="service-block <?php echo vc_shortcode_custom_css_class( $css ); ?>">
          	<div class="lp-pic"> <img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive"> </div>
          	<div class="service-caption">
            	<h3><?php echo htmlspecialchars_decode($title); ?></h3>
          	</div>
        </div>
	<?php } ?>

<?php
    return ob_get_clean();
}

// Service Silder

add_shortcode('serviceslider','serviceslider_func');

function serviceslider_func($atts, $content = null){

	extract(shortcode_atts(array(

		'style'		=>	'',
		'visible'	=>	'',

	), $atts));

	$stylist = (!empty($style) ? $style : style1);	
	$visible1 = (!empty($visible) ? $visible : 1);

	ob_start(); ?>

	<?php if($stylist=='style1'){ ?>
	    <div id="service-handyman" class="service-handyman">
	    	<?php

				$args = array(

					'post_type' => 'service',

					'posts_per_page' => -1,

				);

				$service = new WP_Query($args);

				if($service->have_posts()) : while($service->have_posts()) : $service->the_post();
				
			?>
	        <div class="item-handyman"><!--item-->
              	<div class="service-block-handyman"><!-- service block -->
                	<div class="lp-white-box"><!-- white box -->
                  		<h3><?php the_title(); ?></h3>
                  		<p><?php the_content(); ?></p>
                	</div>
          		</div>
          	</div>
	        <?php endwhile; wp_reset_postdata(); endif; ?>      
	    </div>
	    <script>
			(function($) { "use strict";
				$("#service-handyman").owlCarousel({
				 	autoPlay: 3000, //Set AutoPlay to 3 seconds
				 	items : <?php echo esc_attr($visible); ?>,
					itemsDesktop : [1199,<?php echo esc_attr($visible); ?>],
					itemsDesktopSmall : [979,1]
				});		
			})(jQuery); 
		</script>
    <?php } ?> 
    <?php if($stylist=="style2"){ ?>
    	<div id="owl-demo-law" class="law">
    		<?php

				$args = array(

					'post_type' => 'service',

					'posts_per_page' => -1,

				);

				$service = new WP_Query($args);

				if($service->have_posts()) : while($service->have_posts()) : $service->the_post();
				
			?>
            <div class="item"><!--practice block start-->
              <h2><?php the_title(); ?></h2>
              <p><?php the_content(); ?></p>
            </div><!--practice block close--> 
            <?php endwhile; wp_reset_postdata(); endif; ?>           
      	</div>
      	<script>
			(function($) { "use strict";
				$("#owl-demo-law").owlCarousel({
				 	autoPlay: 3000, //Set AutoPlay to 3 seconds
				 	items : <?php echo esc_attr($visible); ?>,
					itemsDesktop : [1199,<?php echo esc_attr($visible); ?>],
					itemsDesktopSmall : [979,1]
				});		
			})(jQuery); 
		</script>
    <?php } ?>   

<?php
    return ob_get_clean();
}

// Price List
add_shortcode('pricelist', 'pricelist_func');
function pricelist_func($atts, $content = null){
	extract(shortcode_atts(array(		
		'title'		=>  '',
		'name1'		=>	'',
		'name2'		=>	'',
		'name3'		=>	'',
		'name4'		=>	'',
		'price1'	=>	'',
		'price2'	=>	'',
		'price3'	=>	'',
		'price4'	=>	'',
		'sname1'	=>	'',
		'sname2'	=>	'',
		'sname3'	=>	'',
		'sname4'	=>	'',
	), $atts));
	ob_start(); ?>

	<div class="menu-block-foot"><!-- menu block -->
      	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
        <div class="menu-info-foot"><!-- menu info -->
	        <h3><?php echo htmlspecialchars_decode($name1); ?> <span class="price-foot"><?php echo esc_attr($price1); ?></span></h3>
	        <p><?php echo htmlspecialchars_decode($sname1) ?></p>
        </div>
        <div class="menu-info-foot"><!-- menu info -->
	        <h3><?php echo htmlspecialchars_decode($name2) ?> <span class="price-foot"><?php echo esc_attr($price2); ?></span></h3>
	        <p><?php echo htmlspecialchars_decode($sname2) ?></p>
        </div>
        <div class="menu-info-foot <?php if(!$name4){echo 'menu-info-foot:last-child';} ?>"><!-- menu info -->
            <h3><?php echo htmlspecialchars_decode($name3) ?> <span class="price-foot"><?php echo esc_attr($price3); ?></span> </h3>
            <p><?php echo htmlspecialchars_decode($sname3) ?></p>
        </div>
        <?php if($name4){ ?>
	        <div class="menu-info-foot menu-info-foot:last-child"><!-- menu info -->
	            <h3><?php echo htmlspecialchars_decode($name4) ?> <span class="price-foot"><?php echo esc_attr($price4); ?></span> </h3>
	            <p><?php echo htmlspecialchars_decode($sname4) ?></p>
	        </div>
        <?php } ?>
    </div>

<?php
    return ob_get_clean();
}

// Packages
add_shortcode('package', 'package_func');
function package_func($atts, $content = null){
	extract(shortcode_atts(array(
		'photo'		=> 	'',		
		'title'		=>  '',
		'quantity'	=>	'',
		'price'		=>	'',
		'date'		=>	'',
		'note'		=>	'',
		'style'		=>	'',
		'code'		=>	'',
	), $atts));
	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];
	$stylist = (!empty($style) ? $style : style1);
	ob_start(); ?>

	<?php if($stylist=='style1'){ ?>
		<div class="tour-block"><!-- tour block -->
	        <div class="lp-pic"><!-- pic --> 
	          	<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt=""> </div>
	        <div class="package-info"><!-- package info -->
	          	<h2><?php echo htmlspecialchars_decode($title) ?> <small>(<?php echo htmlspecialchars_decode($quantity); ?>)</small><span><?php echo esc_attr($price); ?></span></h2>
	          	<span class="date"><?php echo htmlspecialchars_decode($date); ?></span>
	          	<p><?php echo htmlspecialchars_decode($content); ?></p>
	        </div>
	    </div>
	<?php } ?>	
	<?php if($stylist=='style2'){ ?>
		<div class="room-block"> 
          	<div class="room-pic"> 
            	<div class="lp-pic-room">
              		<img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive"> 
              	</div>
            	<div class="img-caption"> 
              		<span><?php echo htmlspecialchars_decode($note); ?></span> 
              	</div>
          	</div>
          	<div class="room-info"> 
            	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
            	<p><?php echo htmlspecialchars_decode($content); ?></p>
          	</div>
          	<div class="grey-box"> 
            	<span><?php echo htmlspecialchars_decode($price); ?></span> 
            </div>
        </div>
	<?php } ?>
	<?php if($stylist=='style3'){ ?>
		<div class="pricing-block-makeup">
        	<div class="pricing-info bg-ptn" style="background-image:url(<?php echo esc_url($img); ?>)"><!--pricing-info-->
          		<h2><?php echo htmlspecialchars_decode($title); ?></h2>
        	</div>
        	<div class="icon-circle"><!--icon-circle-->
          		<h1><?php echo esc_attr($price); ?></h1>
          		<small><?php echo esc_attr($note); ?></small> 
          	</div>
        	<div class="pricing-ctn"><!--pricing-ctn-->
         		<?php echo htmlspecialchars_decode($content); ?>
        	</div> 
      	</div>
	<?php } ?>
	<?php if($stylist=='style4'){ ?>
		<div class="service-block-rental"><!-- service block -->
          	<div class="service-pic-rental"><!-- service pic --> 
            	<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt=""> 
           	</div>
          	<div class="service-info-rental box-color-rental"><!-- service info -->
            	<h3><?php echo htmlspecialchars_decode($title); ?></h3>
	            <p><?php echo htmlspecialchars_decode($content); ?></p>
          	</div>
        </div>
	<?php } ?>
	<?php if($stylist=='style5'){ ?>
		<div class="coupons-block-carwash"><!-- coupons block -->           	
          	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
          	<h1><?php echo esc_attr($note); ?></h1>
          	<p class="price"><?php echo esc_attr($price); ?></p>
          	<p><?php echo htmlspecialchars_decode($content); ?></p>
          	<small><?php echo esc_attr($code); ?></small> 
        </div>
	<?php } ?>

<?php
    return ob_get_clean();
}

// Packages Slider
add_shortcode('packageslider', 'packageslider_func');
function packageslider_func($atts, $content = null){
	extract(shortcode_atts(array(
		'visible'	=>	'',
		'style'		=>	'',
	), $atts));
	$stylist = (!empty($style) ? $style : style1);
	$visible1 = (!empty($visible) ? $visible : 2);
	ob_start(); ?>
	
	<?php if($stylist=='style1'){ ?>
		<div id="gallery-holiday" class="owl-carousel holiday">
			<?php

				$args = array(
					'post_type' => 'holiday',
					'posts_per_page' => -1,
				);

				$holiday = new WP_Query($args);
				if($holiday->have_posts()) : while($holiday->have_posts()) : $holiday->the_post();
				$link = get_post_meta(get_the_ID(),'_cmb_link_package', true);
			?>
        	<div class="item holiday-block"><!-- hoilday block -->
         		<div class="lp-pic"><!-- pic --> 
            		<a href="<?php echo esc_url($link); ?>"><?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?></a>
            	</div>
          		<h2><?php the_title(); ?> <small><?php the_content(); ?></small></h2>
        	</div>
        	<?php endwhile; wp_reset_postdata(); endif; ?>
      	</div>
		
      	<script>
	    	(function($) { "use strict";
				$("#gallery-holiday").owlCarousel({
				 	autoPlay: 30000, //Set AutoPlay to 3 seconds
				 	items : <?php echo esc_attr($visible1); ?>,
					itemsDesktop : [1199,<?php echo esc_attr($visible1); ?>],
					itemsDesktopSmall : [979,2],
					navigation : false
				});	
			})(jQuery);
    	</script>
	<?php } ?>
	<?php if($stylist=='style2'){ ?>
		<div id="gallery-room" class="gallery-room">
			<?php

				$args = array(
					'post_type' => 'room',
					'posts_per_page' => -1,
				);

				$room = new WP_Query($args);
				if($room->have_posts()) : while($room->have_posts()) : $room->the_post();
				$link = get_post_meta(get_the_ID(),'_cmb_link_package', true);
			?>
			<div class="item">
      			<div class="gallery-pic-room"><!-- gallery pic --> 
      				<?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
        		</div>
      			<div class="gallery-caption-room"><!-- gallery caption -->
        			<h2><?php the_title(); ?></h2>
        			<p><?php the_content(); ?></p>
      			</div> 
    		</div>
        	<?php endwhile; wp_reset_postdata(); endif; ?>
		</div>
		<script>
	    	(function($) { "use strict";
				$("#gallery-room").owlCarousel({
				 	autoPlay: 30000, //Set AutoPlay to 3 seconds
				 	items : <?php echo esc_attr($visible1); ?>,
					itemsDesktop : [1199,<?php echo esc_attr($visible1); ?>],
					itemsDesktopSmall : [979,2],
					navigation : false
				});	
			})(jQuery);
    	</script>
	<?php } ?>

<?php
    return ob_get_clean();
}

// Feature
add_shortcode('feature', 'feature_func');
function feature_func($atts, $content = null){
	extract(shortcode_atts(array(
		'photo'		=> 	'',		
		'title'		=>  '',
		'icon'		=>	'',
		'style'		=>	'',
		'css'		=>	'',
		'link'		=>	'',
	), $atts));

	$img = wp_get_attachment_image_src($photo,'full');
	$img = $img[0];
	ob_start(); ?>
	
	<?php if($style=='style2'){ ?>
		<div class="feature-block <?php echo vc_shortcode_custom_css_class( $css ); ?>">
			<div class="circle">
	        	<i class="<?php echo esc_attr($icon); ?>"></i>
	        </div>
	        <h2><?php echo htmlspecialchars_decode($title); ?></h2>
	    </div>
	<?php }elseif($style=='style3'){ ?>
		<div class="feature-block-diet <?php echo vc_shortcode_custom_css_class( $css ); ?>"> 
	        <!--feature-block-->
	        <div class="circle"> 
	         	<!--circle--> 
	            <i class="<?php echo esc_attr($icon); ?>"></i> </div>
	        <!--/.circle-->
	        <h3><?php echo htmlspecialchars_decode($title); ?></h3>
        </div>
    <?php }elseif($style=='style4'){ ?>
    	<div class="benefit-point <?php echo vc_shortcode_custom_css_class( $css ); ?>">
            <div class="circle-benefit">
              	<i class="<?php echo esc_attr($icon); ?>"></i> </div>
            	<p><?php echo htmlspecialchars_decode($title); ?></p>
        </div> 
    <?php }elseif($style=='style5'){ ?>
    	<div class="result-point <?php echo vc_shortcode_custom_css_class( $css ); ?>"> 
            <i class="<?php echo esc_attr($icon); ?>"></i>
            <h2><?php echo htmlspecialchars_decode($title); ?></h2>
        </div>
    <?php }elseif($style=='style6'){ ?>
    	<div class="feature-life <?php echo vc_shortcode_custom_css_class( $css ); ?>">
	    	<div class="col-md-4 box-icon"> <i class="<?php echo esc_attr($icon); ?> fa-4x"> </i> </div>
	      	<div class="col-md-8 box-ct">
	        	<h3> <?php echo htmlspecialchars_decode($title); ?> </h3>
	        	<?php if($content){ ?><p> <?php echo htmlspecialchars_decode($content); ?> </p><?php } ?>
	        </div>
	    </div>
	<?php }elseif($style=='style7'){ ?>  	
		<div class="green-icon-life3 <?php echo vc_shortcode_custom_css_class( $css ); ?>">
	        <div class="col-md-2 feature-block"> <i class="<?php echo htmlspecialchars_decode($icon); ?> fa-4x"> </i> </div>
	        <div class="col-md-10">
	            <h2> <?php echo htmlspecialchars_decode($title); ?></h2>
	            <?php if($content){ ?><p> <?php echo htmlspecialchars_decode($content); ?></p><?php } ?>
        	</div>
        </div>
    <?php }elseif($style=='style8'){ ?>
    	<div class="lp-feature-box <?php echo vc_shortcode_custom_css_class( $css ); ?>">
        	<div class="lp-feature-cir"><i class="<?php echo esc_attr($icon); ?>"></i></div>
        	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
        	<?php if($content){ ?><p><?php echo htmlspecialchars_decode($content); ?></p><?php } ?>
      	</div>
    <?php }elseif($style=='style9'){ ?> 
    	<div class="feature-block-travel <?php echo vc_shortcode_custom_css_class( $css ); ?>">
          	<div class="circle-travel"> 
            	<i class="<?php echo esc_attr($icon); ?>"></i> 
           	</div>
          	<h3><?php echo htmlspecialchars_decode($title); ?></h3>
        </div>
    <?php }elseif($style=='style10'){ ?> 
        <div class="feature-block-travel2 <?php echo vc_shortcode_custom_css_class( $css ); ?>">
          	<div class="lp-pic">          		
            	<?php if($link){ ?><a href="#"><?php } ?><img src="<?php echo esc_url($img); ?>" class="" alt=""><?php if($link){ ?></a><?php } ?> 
            </div>
          	<div class="info-bg">
            	<h1><?php echo htmlspecialchars_decode($title); ?></h1>
            	<?php if($content){ ?><p><?php echo htmlspecialchars_decode($content); ?></p><?php } ?>
          	</div> 
        </div>
    <?php }elseif($style=='style11'){ ?> 
    	<div class="benefit-block-room <?php echo vc_shortcode_custom_css_class( $css ); ?>"><!--benefit-block-->
          	<div class="square"><i class="<?php echo esc_attr($icon); ?>"></i> </div>          
          	<div class="benefit-info-room"><!--benefit-info-->
            	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
          	</div>          
        </div>
    <?php }elseif($style=='style12'){ ?> 
    	<div class="<?php echo vc_shortcode_custom_css_class( $css ); ?> point-block-carre"><!-- point block -->
        	<div class="circle-carre"> <i class="fa fa-check-square-o"></i> </div>
        	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
        	<p><?php echo htmlspecialchars_decode($content); ?></p>
      	</div>
    <?php }elseif($style=='style13'){ ?>
    	<div class="lp-section-block-fitness <?php echo vc_shortcode_custom_css_class( $css ); ?>"><!-- section block -->
          	<div class="icon-circle-fitness"><!-- circle --> 
            	<img src="<?php echo esc_url($img); ?>" class="img-circle" alt=""> 
            </div>
          	<h2><?php echo esc_attr($title); ?></h2>
          	<p><?php echo htmlspecialchars_decode($content); ?></p>
        </div> 
    <?php }elseif($style=='style14'){ ?>
    	<div class="lp-section-block-carbooking-2 <?php echo vc_shortcode_custom_css_class( $css ); ?>"><!-- section block-->
          	<h3><i class="<?php echo esc_attr($icon); ?>"></i><?php echo esc_attr($title); ?></h3>
          	<p><?php echo htmlspecialchars_decode($content); ?></p>
        </div>
    <?php }elseif($style=='style15'){ ?>
    	<div class="feature-block-moving <?php echo vc_shortcode_custom_css_class( $css ); ?>"><!-- feature block --> 
            <img src="<?php echo esc_url($img); ?>" class="img-responsive" alt="">
            <h2><?php echo htmlspecialchars_decode($title); ?></h2>
            <p class="lead-moving"><?php echo htmlspecialchars_decode($content); ?></p>
        </div>
    <?php }elseif($style=='style16'){ ?>
    	<div class="about-feature-rental <?php echo vc_shortcode_custom_css_class( $css ); ?>"><!-- about feature --> 
        	<i class="<?php echo esc_attr($icon); ?>"></i>
        	<h3><?php echo htmlspecialchars_decode($title); ?></h3>
        	<p><?php echo htmlspecialchars_decode($content); ?></p>
      	</div>
    <?php }elseif($style=='style17'){ ?>
    	<div class="features-block-carwash <?php echo vc_shortcode_custom_css_class( $css ); ?>"><!-- features block -->
          <div class="circle-carwash"><!-- circle --> 
            <i class="<?php echo esc_attr($icon); ?>"></i> </div>
          <h3><?php echo htmlspecialchars_decode($title); ?></h3>
        </div>
    <?php }else{ ?>
		<div class="cacke-block <?php echo vc_shortcode_custom_css_class( $css ); ?>"><!-- cacke block -->
        	<div class="lp-pic"><!-- pic -->
            	<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt="">
            </div><!-- /.pic -->
            <div class="cacke-info"><!-- cacke-info -->
            	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
                <?php if($content){ ?><p><?php echo htmlspecialchars_decode($content); ?></p><?php } ?>
            </div><!-- /.cacke-info -->
    	</div>
	<?php } ?>

<?php
    return ob_get_clean();
}

// Social
add_shortcode('social', 'social_func');
function social_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon'		=>  '',
		'link'		=>	'',
		'size'		=>	'',
		'css'		=>	'',
	), $atts));
	$size1 = (!empty($size) ? 'font-size: '.$size.';' : '');
	ob_start(); ?>

	<a href="<?php echo esc_url($link); ?>" class="social-room <?php echo vc_shortcode_custom_css_class( $css ); ?>"> <i class="<?php echo esc_attr($icon); ?>" style="<?php echo esc_attr($size1); ?>"></i> </a>

<?php
    return ob_get_clean();
}

// Step
add_shortcode('step', 'step_func');
function step_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>  '',
		'number'	=>	'',
		'style'		=>	'',
		'photo'		=>	'',
	), $atts));
		$stylist = (!empty($style) ? $style : style1);
		$img = wp_get_attachment_image_src($photo,'full');
		$img = $img[0];
	ob_start(); ?>

	<?php if($stylist=='style1'){ ?>
		<div class="order-online">
			<div class="circle"><?php echo esc_attr($number); ?></div>
		    <h2><?php echo htmlspecialchars_decode($title); ?></h2>
		</div>
	<?php } ?>
	<?php if($stylist=='style2'){ ?>
		<div class="work-block">
          	<div class="circles-border">
	            <div class="circles">
	              	<h1><?php echo esc_attr($number); ?></h1>
	            </div> 
          	</div>
          	<div class="work-info">
            	<h3><?php echo htmlspecialchars_decode($title); ?></h3>
          	</div>
        </div>
	<?php } ?>
	<?php if($stylist=='style3'){ ?>
		<div class="work-block-wedding">
          	<div class="circle-wedding">
            	<h1><?php echo esc_attr($number); ?></h1>
          	</div>
          	<div class="work-info">
            	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
            	<?php if($content){ ?><p><?php echo htmlspecialchars_decode($content); ?></p><?php } ?>
          	</div>
        </div>
	<?php } ?>
	<?php if($stylist=='style4'){ ?>
		<div class="work-pic-moving"><!-- work pic --> 
          	<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt="">
          	<div class="work-caption-moving"><!-- work caption -->
            	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
          	</div>
          	<div class="circle-moving"><?php echo esc_attr($number); ?></div>
        </div>
	<?php } ?>
	<?php if($stylist=='style5'){ ?>
		<div class="step-loss">
            <div class="col-md-2">
              	<div class="circle-loss img-circle"><?php echo esc_attr($number); ?></div>
            </div>
            <div class="col-md-10">
              	<h2><?php echo htmlspecialchars_decode($title); ?></h2>
              	<p><?php echo htmlspecialchars_decode($content); ?></p>
            </div>
        </div>
	<?php } ?>
	<?php if($stylist=='style6'){ ?>
		<div class="start-dating"><!--join dating block start-->
        	<div class="col-md-4">
            	<div class="circle-dating img-circle"><?php echo esc_attr($number); ?></div>
            </div>
            <div class="col-md-8">
                <h2><?php echo htmlspecialchars_decode($title); ?></h2>
                <p class="lead-dating"><?php echo htmlspecialchars_decode($content); ?></p>                
            </div>
        </div><!--join dating block close-->        
	<?php } ?>

<?php
    return ob_get_clean();
} 

// Address
add_shortcode('address', 'address_func');
function address_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>  '',
		'photo'		=>	'',
		'icon'		=>	'',
	), $atts));
		$img = wp_get_attachment_image_src($photo,'full');
		$img = $img[0];
	ob_start(); ?>

	<div class="area-img-moving"><!-- area img --> 
      	<img src="<?php echo esc_url($img); ?>" class="img-responsive" alt="">
      	<div class="area-caption-moving"><!-- area caption -->
       		<p><i class="<?php echo esc_attr($icon); ?>"></i> <?php echo htmlspecialchars_decode($title); ?></p>
      	</div>
    </div>

<?php
    return ob_get_clean();
}

// Products
add_shortcode('products', 'products_func');
function products_func($atts, $content = null){
	extract(shortcode_atts(array(
		'photo'			=>  '',
		'price'			=>	'',	
		'borderright'	=>	'',	
	), $atts));
		$img = wp_get_attachment_image_src($photo,'full');
		$img = $img[0];
	ob_start(); ?>

	<div class="price-block-diet <?php if(!empty($borderright)){echo ' bdr-right';} ?>">
        <div class="price-img"> 
            <img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive"> 
        </div>
        <h1><?php echo htmlspecialchars_decode($price); ?></h1>
    </div>

<?php
    return ob_get_clean();
}

// Contact
add_shortcode('contact', 'contact_func');
function contact_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'			=>  '',
	), $atts));

	ob_start(); ?>

	<div class="contact-photo">
		<h3 class="highlight"><?php echo htmlspecialchars_decode($title); ?></h3>
		<p><?php echo htmlspecialchars_decode($content); ?></p>
	</div>

<?php
    return ob_get_clean();
}

// Infomation

add_shortcode('infomation','infomation_func');
function infomation_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>	'',
		'photo'     =>	'',
		'note'		=>	'',
		'sale'		=>	'',
		'icon1'		=>	'',
		'icon2'		=>	'',
		'icon3'		=>	'',
		'icon4'		=>	'',
		'infomation1'	=>	'',
		'infomation2'	=>	'',
		'infomation3'	=>	'',
		'infomation4'	=>	'',
		'description1'	=>	'',
		'description2'	=>	'',
		'description3'	=>	'',
		'description4'	=>	'',
	), $atts));
		$img = wp_get_attachment_image_src($photo,'full');
		$img = $img[0];
	ob_start(); ?>	
	
    <div class="listing-block"><!--listing-block-->
      <div class="listing-img"> <img src="<?php echo esc_url($img); ?>" alt="" class="img-responsive">
        <div class="<?php if(!empty($sale)){echo 'img-caption';}else{echo 'img-caption-blk';} ?>"> <span><?php echo esc_attr($note); ?></span> </div>
      </div>
      <div class="listing-info">
        <h2><?php echo htmlspecialchars_decode($title); ?></h2>
        <?php if($infomation1){ ?>
	        <div class="listing-icon">
	          	<div class="icon"> <i class="<?php echo esc_attr($icon1); ?>"></i></div>
	          	<p><?php echo htmlspecialchars_decode($infomation1); ?></p>
	          	<small><?php echo htmlspecialchars_decode($description1); ?></small> 
	        </div>
        <?php } ?>
         <?php if($infomation2){ ?>
        <div class="listing-icon">
          	<div class="icon"><i class="<?php echo esc_attr($icon2); ?>"></i></div>
          	<p><?php echo htmlspecialchars_decode($infomation2); ?></p>
          	<small><?php echo htmlspecialchars_decode($description1); ?></small>
      	</div>
      	<?php } ?>
      	 <?php if($infomation3){ ?>
        <div class="listing-icon">
          	<div class="icon"> <i class="<?php echo esc_attr($icon3); ?>"></i></div>
          	<p><?php echo htmlspecialchars_decode($infomation3); ?></p>
          	<small><?php echo htmlspecialchars_decode($description3); ?></small>
      	</div>
      	<?php } ?>
      	<?php if($infomation4){ ?>
      	<div class="listing-icon">
          	<div class="icon"> <i class="<?php echo esc_attr($icon4); ?>"></i></div>
          	<p><?php echo htmlspecialchars_decode($infomation4); ?></p>
          	<small><?php echo htmlspecialchars_decode($description4); ?></small>
      	</div>
      	<?php } ?>
      </div>
    </div>
    
	<?php

    return ob_get_clean();

}


// Our Facts
add_shortcode('ourfacts', 'ourfacts_func');
function ourfacts_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=> 	'',
		'number'    => 	'',
		'icon'		=>  '',
	), $atts));
	ob_start(); ?>

	<div class="de_count">
        <i class="icon-<?php echo esc_attr($icon); ?> wow zoomIn" data-wow-delay="0"></i>
        <h3 class="timer" data-to="<?php echo esc_attr($number); ?>" data-speed="2500">0</h3>
        <span><?php echo htmlspecialchars_decode($title); ?></span>
    </div>

    <?php

    return ob_get_clean();
}

// Logos Client
add_shortcode('logos', 'logos_func');
function logos_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
		'visible'		=>  '',
	), $atts));

	ob_start(); ?>
    
    <div id="owl-demo" class="client-logo">
    	<?php $img_ids = explode(",",$gallery);

            foreach( $img_ids AS $img_id ){

            $image_src = wp_get_attachment_image_src($img_id,''); ?>       
        	<div class="item"><img src="<?php echo esc_url($image_src[0]); ?>" alt="client logo"></div>        
    	<?php } ?>	
    </div>       
    <script>
    	(function($) { "use strict";
			$("#owl-demo").owlCarousel({
 
			    autoPlay: 3000, //Set AutoPlay to 3 seconds
				items : <?php echo esc_attr($visible); ?>,
			    itemsDesktop : [1199,3],
			    itemsDesktopSmall : [979,3]			 
			});		
		})(jQuery);
    </script>
	<?php

    return ob_get_clean();
}

// Portfolio Filter

add_shortcode('foliof', 'foliof_func');
function foliof_func($atts, $content = null){
	extract(shortcode_atts(array(
		'all'		=> 	'',
		'num'		=> 	'',
	), $atts));

	$all1 = (!empty($all) ? $all : 'All');
	$num1 = (!empty($num) ? $num : 8);

	ob_start(); ?>        

    <div class="portfolioFilter">
 
		<a href="#" data-filter="*" class="current"><?php echo htmlspecialchars_decode($all1); ?></a>
		<?php 

            $categories = get_terms('categories');

            foreach( (array)$categories as $categorie){

            $cat_name = $categorie->name;

            $cat_slug = $categorie->slug;

            $cat_count = $categorie->count;

        ?>
            <a href="#" data-filter=".<?php echo htmlspecialchars_decode( $cat_slug ); ?>"><?php echo htmlspecialchars_decode( $cat_name ); ?></a>
        <?php } ?>
		
	</div>
 
	<div class="portfolioContainer">
	<?php 

        $args = array(   

            'post_type' => 'portfolio',   

            'posts_per_page' => $num1,	            

        );  

        $wp_query = new WP_Query($args);

        while ($wp_query -> have_posts()) : $wp_query -> the_post(); 

        $cates = get_the_terms(get_the_ID(),'categories');

        $cate_name ='';

        $cate_slug = '';

        foreach((array)$cates as $cate){

            if(count($cates)>0){

                $cate_name .= $cate->name.'<span>, </span> ' ;

                $cate_slug .= $cate->slug .' ';     

            } 

        }
        $price = get_post_meta(get_the_ID(),'_cmb_price_portfolio', true);
    ?>         
		<div class="<?php echo esc_attr($cate_slug); ?>">
			<div class="lp-pic gallery-pic"><!-- pic -->
				<?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
			</div><!-- /.pic -->
			<div class="caption">
				<h2><?php the_title(); ?></h2>
				<?php if($price){ ?><span><?php echo htmlspecialchars_decode($price); ?></span><?php } ?>
			</div>
		</div>
	<?php endwhile; wp_reset_postdata(); ?> 		
	</div>

	<?php

    return ob_get_clean();
}

// Newsletters
add_shortcode('newsletter', 'newsletter_func');
function newsletter_func($atts, $content = null){
	extract(shortcode_atts(array(
		'btntext'	=> '',
		'style'		=>	'',
	), $atts));
		$stylist = (!empty($style) ? $style : style1);
	ob_start(); ?>

	<?php
		/**
		 * Detect plugin. For use on Front End only.
		 */
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		// check for plugin using plugin name
		if ( is_plugin_active( 'newsletter/plugin.php' ) ) { 
	?>	

	<?php if($stylist=='style1'){ ?>
		<form id="newsletter" class="newsletter-foot" method="post" action="<?php echo esc_url( home_url() ); ?>/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">  
          	<div class="input-group-foot">
          		<input type="email" id="news" name="ne" class="form-control-foot" placeholder="<?php esc_html_e('E-Mail Address', 'wealth'); ?>" required>
          		<span class="input-group-btn-foot">
          			<button class="btn lp-btn-default-foot" type="submit" name="submit"><?php echo esc_attr($btntext); ?></button>
          		</span>
    		</div>
        </form>
	<?php } ?>
	<?php if($stylist=='style2'){ ?>
		<form id="newsletter" class="newsletter-loss" method="post" action="<?php echo esc_url( home_url() ); ?>/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">  
            <div class="form-group-loss">
              	<label for="exampleInputEmail1">Email address</label>
              	<input name="ne" type="email" class="form-control-loss" id="news" placeholder="<?php esc_html_e('Enter email', 'wealth'); ?>" required >
            </div>
            <button type="submit" class="btn btn-green-loss btn-submit"><?php echo esc_attr($btntext); ?></button>
      	</form>
	<?php } ?>
	<?php if($stylist=='style3'){ ?>
		<form id="newsletter" class="newsletter-skin" method="post" action="<?php echo esc_url( home_url() ); ?>/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">  
            <div class="form-group-skin">              
              	<input name="ne" type="email" class="form-control-skin" id="news" placeholder="<?php esc_html_e('Enter email', 'wealth'); ?>" required >
            </div>
            <button type="submit" class="btn btn-salmon-skin"><?php echo esc_attr($btntext); ?></button>
      	</form>
	<?php } ?>
	<?php if($stylist=='style4'){ ?>
		<form id="newsletter" class="newsletter-insurance" method="post" action="<?php echo esc_url( home_url() ); ?>/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">  
          	<input name="ne" type="email" class="form-control-insurance" id="news" placeholder="<?php esc_html_e('Enter email', 'wealth'); ?>" required >
		 	<button class="btn btn-default btn-go" type="submit"><?php echo esc_attr($btntext); ?></button>          
      	</form>
	<?php } ?>
	<?php if($stylist=='style5'){ ?>
		<div class="row">
			<form id="newsletter" class="newsletter-life" method="post" action="<?php echo esc_url( home_url() ); ?>/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">  
	          	<div class="col-md-9"><input name="ne" type="email" class="form-control-life" id="news" placeholder="<?php esc_html_e('Enter email', 'wealth'); ?>" required ></div>
			 	<div class="col-md-3"><button class="btn btn-default btn-orange btn-submit" type="submit"><?php echo esc_attr($btntext); ?></button> </div>         
	      	</form>
      	</div>
	<?php } ?>
	<?php if($stylist=='style6'){ ?>
		<form id="newsletter" class="newsletter-rental" method="post" action="<?php echo esc_url( home_url() ); ?>/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">  
          	<div class="form-group-rental">
                <input type="email" id="newsletter" name="ne" title="Please write valid email address" class="form-control-rental" placeholder="<?php esc_html_e('Enter email', 'wealth'); ?>" required>
          	</div>
          	<button type="submit" class="btn lp-btn-primary-rental"><?php echo esc_attr($btntext); ?></button>
        </form>
	<?php } ?>
	<?php if($stylist=='style7'){ ?>
		<form id="newsletter" class="newsletter-hotel" method="post" action="<?php echo esc_url( home_url() ); ?>/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">  
			<div class="input-group-hotel">
	          	<input type="email" class="form-control-hotel" id="newsletter" name="ne" title="Please write valid email address" placeholder="<?php esc_html_e('E-Mail Address', 'wealth'); ?>" required>
	          	<span class="input-group-btn-hotel">
	          		<button class="btn lp-btn-default-hotel" type="submit"><?php echo esc_attr($btntext); ?></button>
	          	</span> 
	        </div>
	    </form>
	<?php } ?>
	<?php if($stylist=='style8'){ ?>
		<form id="newsletter" class="newsletter-hotel" method="post" action="<?php echo esc_url( home_url() ); ?>/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">  
			<div class="input-group-hotel">
	          	<input type="email" class="form-control-mortgage" id="newsletter" name="ne" title="Please write valid email address" placeholder="<?php esc_html_e('E-Mail Address', 'wealth'); ?>" required>
	          	<span class="input-group-btn-hotel">
	          		<button class="btn lp-btn-default-mortgage" type="submit"><?php echo esc_attr($btntext); ?></button>
	          	</span> 
	        </div>
	    </form>
	<?php } ?>
	<?php if($stylist=='style9'){ ?>
      	<form id="newsletter" class="newsletter-broker" method="post" action="<?php echo esc_url( home_url() ); ?>/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">  
            <div class="form-group">
              	<label for="exampleInputEmail1"> </label>
              	<input type="email" class="form-control" id="newsletter" name="ne" title="Please write valid email address" placeholder="" required>
            </div>
            <button type="submit" class="btn lp-btn-default "><?php echo esc_attr($btntext); ?></button>
      	</form>
	<?php } ?>
	<script type="text/javascript">
	//<![CDATA[
	if (typeof newsletter_check !== "function") {
	window.newsletter_check = function (f) {
	    var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
	    if (!re.test(f.elements["ne"].value)) {
	        alert("The email is not correct");
	        return false;
	    }
	    if (f.elements["ny"] && !f.elements["ny"].checked) {
	        alert("You must accept the privacy statement");
	        return false;
	    }
	    return true;
	}
	}
	//]]>
	</script>
	
<?php } ?>		

<?php
	return ob_get_clean();
}

// Google Map
add_shortcode('ggmap','ggmap_func');
function ggmap_func($atts, $content = null){
    extract( shortcode_atts( array(
	  'height'		=> '',	
      'lat'   		=> '',
      'long'	  	=> '',
      'zoom'		=> '',
      'address'		=> '',
	  'mapcolor'	=> '',
	  'icon'		=> '',
   ), $atts ) );
   
   $img = wp_get_attachment_image_src($image,'full');
   $img = $img[0];
   
   $icon1 = wp_get_attachment_image_src($icon,'full');
   $icon1 = $icon1[0];
   		
    ob_start(); ?>
    	 
    <div id="map" style="<?php if($height) echo 'height: '.$height.'px;'; ?>"></div>
	
	<script src="https://maps.googleapis.com/maps/api/js?v=3"></script>
    <script type="text/javascript">	
	(function($) {
    "use strict"
    $(document).ready(function(){
        
        var locations = [
			['<div class="infobox"><span><?php echo esc_js( $address );?><span></div>', <?php echo esc_js( $lat );?>, <?php echo esc_js( $long );?>, 2]
        ];
	
		var map = new google.maps.Map(document.getElementById('<?php echo esc_js( map ); ?>'), {
		  zoom: <?php echo esc_js( $zoom );?>,
			scrollwheel: false,
			navigationControl: true,
			mapTypeControl: false,
			scaleControl: false,
			draggable: true,
			
			styles: [{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}],
			center: new google.maps.LatLng(<?php echo esc_js( $lat );?>, <?php echo esc_js( $long );?>),
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		});
	
		var infowindow = new google.maps.InfoWindow();
	
		var marker, i;
	
		for (i = 0; i < locations.length; i++) {  
	  
			marker = new google.maps.Marker({ 
			position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
			map: map ,
			icon: '<?php echo esc_js( $icon1 );?>',
			title: '<?php echo esc_js($address); ?>'
			});
		
		  google.maps.event.addListener(marker, (function(marker, i) {
			return function() {
			  infowindow.setContent(locations[i][0]);
			  infowindow.open(map, marker);
			}
		  })(marker, i));
		}
        
        });

    })(jQuery);   	
   	</script>
<?php

    return ob_get_clean();

}