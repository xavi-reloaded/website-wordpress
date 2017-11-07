<?php
$root =dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header("Content-type: text/css; charset=utf-8");
global $wealth_option; 
?>

/* 01 MAIN STYLES
****************************************************************************************************/

/* Header */
.lp-header .navbar-default{background-color:<?php echo esc_attr($wealth_option['header-background-color']); ?>;}
.lp-header .navbar-default.top-nav-collapse{background-color:<?php echo esc_attr($wealth_option['header-small-background-color']); ?>}
.lp-header .navbar-default .navbar-nav>li>a i,.lp-header .navbar-default .navbar-nav>li>a,.lp-header .navbar-default .navbar-nav>li>a:hover,.lp-header .navbar-default .navbar-nav>li>a:focus,.lp-header .navbar-default .navbar-nav>li.social>a i,.social-menu a i{color:<?php echo esc_attr($wealth_option['header-text-color']); ?>;}

/* Footer */
.social-footer a i,.lp-footer-1{background-color:<?php echo esc_attr($wealth_option['footer_bgcolor']); ?>;color:<?php echo esc_attr($wealth_option['footer_textcolor']); ?>;}

/* Main-color */
.lp-lead strong,
.team-block .team-info ul li i,
.cta-block .lp-btn-default,
.tiny-social a:hover,
.blog-list h3.blog-title a:hover,
.pagination ul li span, .pagination ul li a:hover,
.sidebar .widget li a:hover,
.tagcloud a:hover,
.widget_calendar tr td#today,
.c_reply a,.feature-block .circle,
.lp-btn-primary-carbooking:hover,
.lp-section-block-carbooking-2 h3 i,
.lp-section-block-carbooking-3 span.square,
.lp-form-carre h1,
.circle-carre,.testimonial-block-carre .testimonial-detail-carre span,
.feature-block-diet .circle i,.price-block-carwash .price-title-carwash h2,
.price-block-carwash .price-info-carwash ul li i,
.price-block-carwash .price-info-carwash .price-carwash,
.coupons-block-carwash h1,.coupons-block-carwash small,
.testimonial-block-carwash .client-say-carwash .client-info-carwash p,
.faq-block-carwash h2 span,.circle-dating,
.start-dating h2 b,story-bg-bottom:after,
.story-bg-right:after,.ts-ct span,
.price-block-diet h1,.testimonial-block-diet .name span,
.result-point i, h1 b, h1 strong,
.testimonial-block-edu .name-edu small,.highlight-fitness,
#testimonials-fitness .item .client p.client-name small,
.pricing-block-fitness.pricing-block-feature-fitness .lp-btn-grey-fitness:hover, .lp-btn-grey-fitness:focus,
.testimonial-block-foot span.customer-name-foot,
.customer-block-handyman .lp-white-box h3,
.insurance .authoe-name,.white-bg a i:hover,.makeup-about ul li i,
.testimonial-block-makeup h3,.room-block .grey-box span,
.benefit-block-room .square i,ul.caption-meeting li i,
a.social-room :hover,.room ul li i,.testimonial-block-room .testimonial-name span,
.box-color-mortgage h1,ul.mortgage li i,.lead-form-moving h1,
ul.feature-info li i,.price-block h2,.price-block h1,
.price-block h1 small,.team-blocks small,
.lp-section-block .testimonial-info-photo span,.contact-photo h3.highlight,
.lp-feature-box .lp-feature-cir,.lp-price-blk .price-ctn h3,
.service-info-rental.box-color-rental ul li i,.tour-block .package-info h2 span,
.holiday-block h2 small p,.testimonial-block-travel .customers-details small,
.box-icon,.feature-life h3,.doctor-profile h3,.testimonial-life span,
.green-icon:hover,.green-icon h3,.doctor-profile .social i:hover,
.green-icon-life3 h2,.green-icon-life3:hover,
.pricing-block-wedding .amt,#testimonial-wedding.owl-theme .owl-controls.clickable .owl-buttons div:hover,
.testimonial-block-wedding .name small,.lp-btn-primary-hardware:hover,
.testimonial-hardware .testimonial-info-hardware h2,.lp-header .navbar-default .navbar-nav>li.social>a:hover i,
.lp-header .navbar-default .navbar-nav li a:hover
{
	color:<?php echo esc_attr($wealth_option['main-color']); ?>;
}

.footer-block .ft-news-letter .lp-btn-default,
.blog-list .owl-theme .owl-controls .owl-page.active span,
.comment-form .form-submit input[type='submit'],
.circle,.lp-btn-primary,.portfolioFilter a.current,
.caption span,.lp-btn-primary-carbooking,
.lp-section-block-carbooking:hover,
.pricing-block-carbooking .icon-circle-carbooking,
.owl-theme .owl-controls .owl-page span,
.btn-orange,.lp-btn-primary-carre:hover, .lp-btn-primary-carre:focus,
#gallery-makeup.owl-theme .owl-controls .owl-page span,
.lp-btn-primary-carwash,.features-block-carwash .circle-carwash,
.btn-quote-dating:hover,.btn-quote-dating:focus,
.combo-box .amt,.lp-btn-default-diet:hover,
.work-block .circles,.benefit-point .circle-benefit,
.lp-btn-default-edu,.price-info-edu .lp-btn-default-edu,.pricing-block-fitness.pricing-block-feature-fitness,
.lp-btn-primary-fitness,.pricing-block-fitness .icon-circle-fitness,
.pricing-block-fitness .lp-btn-grey-fitness:hover, .lp-btn-grey-fitness:focus,
.lp-btn-primary-foot:hover, .lp-btn-primary-foot:focus,
.lp-section-block-fitness .icon-circle-fitness,
.form-box-handyman,.service-block-handyman .lp-white-box:hover,
.price-info-handyman .amt-handyman,.btn-404,
.wpb_single_image .vc_single_image-wrapper.vc_box_border_circle.vc_box_border_grey,
.lp-btn-primary-hotel,.lp-btn-default-hotel:hover, .lp-btn-default-hotel:focus,
.newsletter-insurance .btn-go:hover,
.btn-quote-insurance:hover,.btn-quote-insurance:focus,
.lp-btn-primary-makeup,.lp-btn-primary-makeup,
.pricing-block-makeup .icon-circle,
.form-box-meeting,.room-block .room-pic .img-caption,
.lp-btn-primary-mortgage:hover, .lp-btn-primary-mortgage:focus,
.lp-btn-default-mortgage:hover,.lp-btn-default-mortgage:focus,
.lp-btn-default-photo,.owl-theme .owl-controls .owl-buttons div,
.lp-price-blk .lp-price-title,.lp-price-blk .lp-btn-default-pool,
.lp-price-blk.hot-tubs .lp-btn-default-pool:hover,
.team-pool .team-info,.lp-btn-primary-rental:hover, .lp-btn-primary-rental:focus,
.about-feature-rental i,.lp-btn-primary-travel,.btn-quote-law:hover,
.btn-quote-loss,.btn-green-loss,.btn-salmon-skin,.bg-profile:hover,
.lp-btn-default-wedding:hover, .lp-btn-primary-wedding:focus,
.newsletter-broker .lp-btn-default,.lp-btn-primary-hardware
{
	background-color:<?php echo esc_attr($wealth_option['main-color']); ?>;
}

.footer-block .ft-news-letter .lp-btn-default,
.pagination ul li span, .pagination ul li a:hover,
.tagcloud a:hover,
.comment-respond form input[type=text]:focus,.comment-respond form textarea:focus,
.comment-form .form-submit input[type='submit'],
.lp-btn-primary,.lp-btn-primary:hover, .lp-btn-primary:focus,
.portfolioFilter a.current,.lp-btn-primary-carbooking,
.btn-orange,.lp-btn-primary-carre:hover, .lp-btn-primary-carre:focus,
.lp-btn-primary-carwash,.lp-btn-default-diet:hover,
.lp-btn-default-edu,.price-info-edu .lp-btn-default-edu,
.lp-btn-primary-fitness,.pricing-block-fitness .lp-btn-grey-fitness:hover, .lp-btn-grey-fitness:focus,
.lp-btn-primary-foot:hover, .lp-btn-primary-foot:focus,
.form-box-handyman .lp-btn-default-handyman:hover,
.lp-btn-primary-hotel,.lp-btn-default-hotel:hover, .lp-btn-default-hotel:focus,
.lp-btn-primary-makeup,.lp-pic-about,.lp-btn-primary-makeup,
.benefit-block-room .square,
.lp-btn-primary-mortgage:hover, .lp-btn-primary-mortgage:focus,
.lp-btn-default-mortgage:hover,.lp-btn-default-mortgage:focus,
.lp-btn-default-photo,.team-blocks .team-pic img:hover,
.lp-price-blk .lp-btn-default-pool,
.lp-price-blk.hot-tubs .lp-btn-default-pool:hover,
.lp-btn-primary-rental:hover, .lp-btn-primary-rental:focus,.lp-btn-primary-travel,
.lp-btn-default-wedding:hover, .lp-btn-primary-wedding:focus,
.newsletter-broker .lp-btn-default
{
	border-color:<?php echo esc_attr($wealth_option['main-color']); ?>;
}

.circle-carre{	
    border: 2px solid <?php echo esc_attr($wealth_option['main-color']); ?>;
}
.team-pool .down-arrow{border-color: <?php echo esc_attr($wealth_option['main-color']); ?> transparent transparent transparent;}

/* Second-color */

.listing-block .listing-info i,
.lp-section-block-carbooking:hover i,
.lp-section-block-carbooking-2 h3,
.lp-btn-primary-carbooking,
.lead-carre ul li i,
.vc_tta-container .vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-title > a span,
.vc_tta-container .vc_tta.vc_general .vc_tta-panel-title > a span:hover, 
.vc_tta-container .vc_tta.vc_general .vc_tta-panel-title > a span:focus,
.price-info-edu h1,.price-info-edu span,.price-info-edu ul li i,
.testimonial-block-edu .name-edu h2,.advice-block-mortgage .box-color-mortgage h3 i,
.booking-block-rental .price-box-rental span.amount-rental,
.testimonial-block-rental .testimonial-info-rental span.name,
.tour-block .package-info span.date,h1.lead-life b,
.doctor-profile strong,.testimonial-life span span,
.green-icon,.green-icon-life3,.pricing-block-wedding .pricing-info ul li i,.social-footer a i:hover
{
	color:<?php echo esc_attr($wealth_option['second-color']); ?>;
}

.lp-btn-default,
.benefit-block .square-icon,
.listing-block .listing-img .img-caption,
.lp-cta,.lp-btn-primary-carbooking:hover,
.lp-section-block-carbooking-3 span.square,
.btn-orange:hover,.lp-btn-primary-carre,
.btn-quote-dating,.lp-btn-default-diet,.lp-btn-default-edu:hover ,
.pricing-block-fitness.pricing-block-feature-fitness .icon-circle-fitness,
.pricing-block-fitness.pricing-block-feature-fitness .lp-btn-grey-fitness,
.lp-btn-primary-foot,.lp-btn-default-foot:hover, .lp-btn-default-foot:focus,
.lp-btn-primary-hotel:hover, .lp-btn-primary-hotel:focus,
.lp-btn-default-hotel,.newsletter-insurance .btn-go,
.btn-quote-insurance,.lp-btn-primary-mortgage,.lp-btn-default-mortgage,
.lp-btn-primary-moving,.work-pic-moving .circle-moving,
.area-img-moving .area-caption-moving,
.lp-btn-primary-pool,.lp-price-blk.hot-tubs .lp-price-title,
.lp-price-blk .lp-btn-default-pool:hover,
.lp-price-blk.hot-tubs .lp-btn-default-pool,
.lp-btn-primary-rental,.info-bg,
.btn-quote-law,.box-icon:hover,
.btn-quote-skin:hover,.btn-quote-skin:focus,
.lp-btn-default-wedding,.lp-btn-primary-hardware:hover
{
	background-color:<?php echo esc_attr($wealth_option['second-color']); ?>;
}

.lp-btn-default,
.lp-btn-primary-carbooking:hover,
.btn-orange:hover,.lp-btn-primary-carre,
.lp-btn-default-diet,
.pricing-block-fitness.pricing-block-feature-fitness .lp-btn-grey-fitness,
.lp-btn-primary-foot,.lp-btn-default-foot:hover, .lp-btn-default-foot:focus,
.lp-btn-primary-hotel:hover, .lp-btn-primary-hotel:focus,
.lp-btn-default-hotel,.lp-btn-primary-mortgage,.lp-btn-default-mortgage,
.lp-btn-primary-moving,.lp-btn-primary-pool,.lp-feature-box .lp-feature-cir,
.lp-price-blk .lp-btn-default-pool:hover,
.lp-price-blk.hot-tubs .lp-btn-default-pool,
.lp-btn-primary-rental,.lp-btn-default-wedding,.lp-btn-primary-hardware:hover
{
	border-color:<?php echo esc_attr($wealth_option['second-color']); ?>;
}
.testimonial-block-travel .info-bg:before{ border-top-color: <?php echo esc_attr($wealth_option['second-color']); ?>;}

<?php if($wealth_option['bg_blog'] != ''){ ?>
.rich-header{background-image:url(<?php echo esc_url($wealth_option['bg_blog']['url']); ?>);}
<?php } ?>