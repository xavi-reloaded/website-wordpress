//placeholders
(function (a) {
    a(function () {
	var b = Modernizr.input.placeholder;
	if (!b) {
	    var c = a("input[placeholder], textarea[placeholder]"), d = c.length, e, f = "placeholder";
	    while (d--)
		c[d].value = c[d].value ? c[d].value : c.eq(d).addClass(f).attr("placeholder"), c.eq(d).focus(function () {
		    var b = a(this);
		    this.value == b.attr("placeholder") && (b.removeClass(f), this.value = "");
		}).blur(function () {
		    var b = a(this);
		    this.value == "" && (b.addClass(f), this.value = b.attr("placeholder"));
		}), function (b) {
		    a(b.form).bind("submit", function () {
			b.value == a(b).attr("placeholder") && (b.value = "");
		    });
		}(c[d]);
	}
    });
})(jQuery);


//Android
Modernizr.addTest('android', function () {
    return !!navigator.userAgent.match(/android/i);
});

//Img preloader
function preloadImages(imgs) {
    var picArr = [];
    for (i = 0; i < imgs.length; i++) {
	picArr[i] = new Image(100, 100);
	picArr[i].src = imgs[i];
    }
}
preloadImages([
    THEME_URI + "/images/skin/default/tag_cloud/tag_cloud_hover.png"]
	);


jQuery(window).load(function () {

    //Isotope
    var isotopeit = jQuery('.filters').next('.row');

    if (isotopeit.length) {
	isotopeit.each(function () {
	    jQuery(this).find('.portfolio_wrap').isotope({layoutMode: 'fitRows'});
	});
    }

    jQuery('.filters a').click(function (e) {
	e.preventDefault();

	jQuery(this).closest('ul').find('.selected').removeClass('selected');
	jQuery(this).addClass('selected');

	jQuery(this).closest("li").removeClass("cat-item");
	var selector = jQuery(this).closest("li").attr('class');

	jQuery(this).closest('.filters').next('.row').find('.portfolio_wrap').isotope({
	    filter: function () {
		var itemcat = jQuery(this).attr('class');
		return itemcat.match(selector);
	    }
	});
    });




    jQuery('.rev_slider_wrapper').find('.tp-bullets').closest('.rev_slider_wrapper').addClass('rev_slider_add');

    jQuery('.contact-submit').find('.recaptcha_wrap').closest('.contact-submit').addClass('recaptcha_on');




    //flex slider for portfolio single
    if (jQuery('.portfolio_single .flexslider').length) {
	jQuery('.portfolio_single .flexslider').flexslider({
	    animation: "slide",
	    allowOneSlide: true
	});
	jQuery('.portfolio_single .flex-control-nav').on(function () {
	    jQuery(this).closest('.portfolio_single .flexslider').addClass('havedots');
	});
    }

    initPortfolioCarousel();


});





if (jQuery.browser.opera) {
    jQuery('.carousel-title, .entry-content h1, .textwidget h1, .page-title, .entry-title, .widget-title, #comments, #reply-title, .filters-title, .logo-text, .post-day, .teaser_title, .teaser_more, .btn_text, .recent-day, .ox-contact-form .retro_button, .widget_contactform button, .tp-caption.headings_h1, .tp-caption.headings_h2, .tp-caption.headings_h4, .tp-caption.default_headings_h1, .tp-caption.default_headings_h2, .tp-caption.default_headings_h3').each(function () {
	var $this = jQuery(this);
	$this.text($this.text().toUpperCase());
    });
    jQuery('.sf-menu .menu-item a').each(function () {
	var $a = jQuery(this),
		$span = '';

	if ($a.find('.menu-title').length) {
	    $span = $a.find('.menu-title').clone();
	    $a.find('.menu-title').remove();
	}

	$a.text($a.text().toUpperCase());

	if ($span.length)
	{
	    $a.append($span);
	}

    });
}


jQuery(document).ready(function() {

    jQuery('body.tinvwl-theme-style.woocommerce ul.products li.product .tinv-wraper.tinv-wishlist,body.tinvwl-theme-style.woocommerce-page ul.products li.product .tinv-wraper.tinv-wishlist,body.tinvwl-theme-style .woocommerce ul.products li.product .tinv-wraper.tinv-wishlist').each(function(){
        jQuery(this).closest('li.product').find('.product_buttons').append(jQuery(this));
    });
    jQuery( '.variations_form .tinv-wraper.tinv-wishlist.tinvwl-after-add-to-cart' ).each( function () {
        var $this = jQuery( this ),
            single_variation_wrap = $this.parent().children( '.single_variation_wrap' );
        if ( single_variation_wrap.length ) {
            $this.appendTo( single_variation_wrap.eq( 0 ) );
        }
    } );


    sharrreContent();

//	preloader for feedBurner form
    var $feedBurnerInput = jQuery(".widget_feedburner input[name='email'], .widget_mailchimp input[type='text'], .contactformWidget input[type='text'], .contactformWidget textarea"),
	    timeout = 10000,
	    isPreloader = false,
	    timer;

    $feedBurnerInput
	    .focus(function () {
		var $this = jQuery(this),
			$preloader = $this.closest('form').find('.preloader');

		if (!isPreloader) {
		    isPreloader = true;
		    $preloader.animate({'font-size': 0}, {duration: timeout, step: function () {
			    jQuery(this).css('background-position', '+=1px');
			}}, 'linear');
		    timer = window.setInterval(function () {
			$preloader.animate({'font-size': 0}, {duration: timeout, step: function () {
				jQuery(this).css('background-position', '+=1px');
			    }}, 'linear');
		    }, timeout);
		}
	    })
	    .focusout(function () {
		clearInterval(timer);
		isPreloader = false;
		jQuery(this).closest('form').find('.preloader').stop();
	    });




    jQuery('.header ul.sf-menu').superfish({
	hoverClass: 'sfHover',
	animation: {
	    opacity: 'show',
	    height: 'auto'
	},
	onBeforeShow: function () {
	    var $this = jQuery(this),
		    offset = ($this.parent().outerWidth() - $this.outerWidth()) / 2,
		    nav = $this.closest('nav');

	    if (nav.hasClass('main_menu_left'))
	    {
		offset -= 23;
	    } else if (nav.hasClass('main_menu_right'))
	    {
		offset += 23;
	    }

	    $this.css({left: offset + 'px'});
	},
	delay: 200, // the delay in milliseconds that the mouse can remain outside a submenu without it closing
	disableHI: true,
	autoArrows: false
    }).supposition();


    //pretty mobile menu
    // prepend menu icon

    jQuery('.main_menu_mobile').find('li.dropdown').prepend('<span class="display-child-ul"></span>');
    // toggle nav
    jQuery("#menu-icon").on("click", function () {
	jQuery(".mobile-menu").slideToggle(400, 'swing');
	jQuery(this).toggleClass("active");
    });

    jQuery(".display-child-ul").on("click", function () {
	jQuery(this).parent().find('ul').first().slideToggle(400, 'swing');
	jQuery(this).parent().toggleClass("active");
    });


    jQuery('ul.sf-menu li:not(".dropdown") > a').on('touchend', function () {
	var el = jQuery(this);
	var link = el.attr('href');
	window.location = link;
    });


    jQuery('.portfolios_listing.grid_12:last-child, .portfolios_listing.grid_8:last-child').addClass('last-child');




    jQuery('.post_area, .widget_post_area, .blog_2').mouseenter(function (e) {
	jQuery(this).find('.post-date .post-day').animate({top: -11, 'line-height': '82px'}, 220);
	jQuery(this).find('.post-date .post-month').animate({bottom: 2}, 220);
    }).mouseleave(function (e) {
	jQuery(this).find('.post-date .post-day').animate({top: 0, 'line-height': '65px'}, 220);
	jQuery(this).find('.post-date .post-month').animate({bottom: 5}, 220);
    });

    jQuery('.blog_2').mouseenter(function (e) {
	jQuery(this).find('.post-date-image').animate({bottom: -1}, 250);
    }).mouseleave(function (e) {
	jQuery(this).find('.post-date-image').animate({bottom: -8}, 250);
    });

    jQuery(".lt-ie10 .footer-area .widget_tag_cloud a").css({"opacity": 1})
	    .mouseenter(function (e) {
		jQuery(this).find('.tag-cloud').animate({opacity: "0.5"}, 300);
	    }).mouseleave(function (e) {
	jQuery(this).find('.tag-cloud').animate({opacity: "1"}, 300);
    });

    jQuery(".lt-ie10 .widget_tag_cloud a").css({"left": 0})
	    .mouseenter(function (e) {
		jQuery(this).animate({left: 5}, 300);
	    }).mouseleave(function (e) {
	jQuery(this).animate({left: 0}, 300);
    });


    jQuery('.portfolios_listing .lightbox').find('img').addClass('imgborder');



    // Social icon  background  hovers
    /* for old soclinks in content, who have class in social_links - billet*/

    jQuery('.billet').wrap('<div class="billet-wrap">');

    jQuery('a.social_links span').css('opacity', 0);

    jQuery('a.social_links').hover(function () {
	jQuery(this).find('span').stop().fadeTo(400, 1);
    }, function () {
	jQuery(this).find('span').stop().fadeTo(600, 0);
    });



    jQuery('a.lightbox').append('<span class="content-img-shadow transparent-shadow"></span>');

    jQuery(".lt-ie9 .transparent-shadow").css({"opacity": 0});

    jQuery('body')
	    .on('mouseenter', '.portfolio-lightbox, .imgborder, a.thumb, a.lightbox', function () {
		jQuery(this).find('.transparent-shadow').stop().animate({opacity: .2}, 600);
	    })
	    .on('mouseleave', '.portfolio-lightbox, .imgborder, a.thumb, a.lightbox', function () {
		jQuery(this).find('.transparent-shadow').stop().animate({opacity: 0}, 1000);
	    });

    jQuery('ul.product_list_widget li a.widget_decor').wrapInner('<div class="widget-img-wrap">');
    jQuery('ul.product_list_widget li a.widget_decor').find('.widget-img-wrap').append('<span class="content-img-shadow transparent-shadow"></span>');

    jQuery('body')
	    .on('mouseenter', 'ul.product_list_widget li > a.widget_decor', function () {
		jQuery(this).find('.transparent-shadow').stop().animate({opacity: .2}, 600);
	    })
	    .on('mouseleave', 'ul.product_list_widget li > a.widget_decor', function () {
		jQuery(this).find('.transparent-shadow').stop().animate({opacity: 0}, 1000);
	    });


    // lightbox
    jQuery('.lightbox').append('<span class="lightbox-zoom">' + Theme_i18n.view + '</span>').find('img.alignnone').closest('.lightbox').addClass('alignnone').find('img').removeClass('alignnone');
    jQuery('.lightbox').find('img.alignleft').closest('.lightbox').addClass('alignleft');
    jQuery('.alignleft').find('img').removeClass('alignleft');

    jQuery('.lightbox').find('img.alignright').closest('.lightbox').addClass('alignright');
    jQuery('.alignright').find('img').removeClass('alignright');

    jQuery('p').find('img.aligncenter').closest('p').addClass('aligncenter');
    jQuery('p').find('.aligncenter').removeClass('aligncenter');

    jQuery('.widget_tag_cloud a').wrapInner('<div class="tag-cloud-wrap-inner">').prepend('<div class="tag-cloud"><div class="tag-cloud-wrap">');
    jQuery('.widget_product_tag_cloud a').wrapInner('<div class="tag-cloud-wrap-inner">').prepend('<div class="tag-cloud"><div class="tag-cloud-wrap">');
    jQuery('.filters a').wrapInner('<div class="filters-wrap"><div class="filters-inner">');
    jQuery('a.lightbox').addClass('imgborder').find('img.imgborder').removeClass('imgborder');

    jQuery('.gallery-item').find('.lightbox').removeClass('imgborder');

    // Gallery caption	
    jQuery(".gallery-caption").css({"opacity": 0});
    jQuery(".gallery-caption").css({"top": "80%"});
    jQuery(".gallery-item").hover(function () {
	jQuery(this).find('.gallery-caption').stop().animate({"opacity": 1, "top": "100%"});
    }, function () {
	jQuery(this).find('.gallery-caption').stop().animate({"opacity": 0, "top": "80%"}, 150);
    });


    // This fix for portfolio category listing when page only full width without sidebar;
    jQuery(".grid_12 .portfolio_listing_page").find('.clearboth').removeClass('clearboth');
    jQuery(".grid_12 .portfolio_listing_page .portfolios_listing:nth-child(3n+1)").addClass('clearboth');


    /*	Toggles and Tabs */
    jQuery(".toggle_container:not('.active')").hide();
    jQuery("h4.trigger").click(function () {
	jQuery(this).toggleClass("active").next().slideToggle("normal");

	return false;
    });

    if (jQuery('.tabgroup').length) {
	jQuery(".tabgroup").tabs().show();
    }

    // Tabs
    jQuery('.tabacc .panel').hide();

    jQuery('.tabacc ul.tabs li a').click(function () {

	var $tab = jQuery(this),
		$tabs_wrapper = $tab.closest('.tabacc');

	jQuery('ul.tabs li', $tabs_wrapper).removeClass('active');
	jQuery('div.panel', $tabs_wrapper).hide();
	jQuery('div' + $tab.attr('href'), $tabs_wrapper).show();
	$tab.parent().addClass('active');

	return false;
    });


    jQuery('.tabacc').each(function () {
	var tabs = jQuery(this);
	jQuery('ul.tabs li:first a', tabs).click();

    });

    /* ToC */
    jQuery('div.toc a.toc_hide').click(function () {

	var hide = '[' + jQuery(this).data('hide') + ']';
	var show = '[' + jQuery(this).data('show') + ']';
	if (jQuery(this).html() == hide) {
	    jQuery(this).html(show);
	} else {
	    jQuery(this).html(hide);
	}
	jQuery(this).closest('h4').next().slideToggle("normal");


	return false;
    });

    /*	Lightbox */
    jQuery("a.zoom, a[data-rel^='prettyPhoto']").prettyPhoto({
	hook: 'data-rel',
	theme: 'light_square',
	overlay_gallery: false,
	social_tools: false,
	deeplinking: false,
	show_title: false /*hide title in lightbox*/

    });
    jQuery("a[data-pp^='lightbox']").prettyPhoto({
	hook: 'data-pp',
	theme: 'light_square',
	overlay_gallery: false,
	social_tools: false,
	deeplinking: true,
	show_title: false /*hide title in lightbox*/

    });

    if (jQuery("#commentform").length) {

	jQuery("#commentform p.comment-form-rating").prependTo('#commentform');

	jQuery("#commentform").validate({
	    submitHandler: function (form) {
		jQuery(".comment-form-submit input[type='submit']").attr('disabled', 'disabled');
		this.form.submit();
	    },
	    rules: {
		author: "required author",
		email: "required email",
		comment: "required"
	    },
	    messages: {
		author: "Please specify your name.",
		comment: "Please enter your message.",
		email: {
		    required: "We need your email address to contact you.",
		    email: "Your email address must be in the format of name@domain.com"
		}
	    }
	});
    }


});


/////////////////////////////////////////////////////////////////////////


function ajaxContact(theForm) {
    var $ = jQuery;
    var name, el, label, html;
    var form_data = {};



    $('input, select, textarea', theForm).each(function (n, element) {
	el = $(element);

	{
	    name = el.attr('name');
//
	    switch (el.attr('type'))
	    {
		case 'radio':
		    if (el.prop('checked'))
		    {
			label = $('label:first', el.parent('div'));
		    }
		    break;
		case 'checkbox':
		    label = $("label[for='" + name + "']:not(.error)", theForm);
		    break;
		default:
		    label = $("label[for='" + name + "']", theForm);
	    }

	    // Widget contact form skip this step!
	    if (!($(theForm).hasClass('contactformWidget')) && label && label.length)
	    {
		if (name != 'recaptcha_response_field')
		{
		    html = label.html();
		    html = html.replace(/<span>.*<\/span>/, '');
		    html = html.replace(/<br>/, '');

		    if (el.attr('type') == 'checkbox')
		    {
			if (el.prop('checked'))
			{
			    form_data[html] = 'yes';
			} else
			{
			    form_data[html] = 'no';
			}
		    } else
		    {
			form_data[html] = el.val().replace(/\n/g, '<br/>');
		    }
		}
	    } else
	    {
		/**
		 * to, subject .....
		 */
		if (name != undefined
			&& name != '_wp_http_referer'
			&& name != '_wpnonce'
			&& name != 'contact-form-id'
			&& name != 'recaptcha_challenge_field' // IGNORE CAPTCH FORM ELEMENTS
			&& name != 'recaptcha_response_field'
			&& name != 'use-captch'
			)
		{
		    if (el.attr('type') != 'radio')
		    {
			/**
			 * email reply to:
			 */
			if (name == 'th-email-from')
			{
			    if (form_data[name] == undefined)
			    {
				/**
				 * first of reply
				 */
				var email_from = null;
				jQuery('[name="' + name + '"]').each(function ()
				{

				    email_from = jQuery(this).closest('div').find('input.email').val();
				    if (email_from && email_from.length)
				    {
					return false;
				    }
				});

				if (email_from && email_from.length)
				{
				    form_data[name] = email_from;
				}
			    }
			} else
			{
			    form_data[name] = el.val();
			}
		    }
		}
	    }
	    name = label = html = null;
	}
	el = null;
    });


    var showMessage = function (msg) {
	jQuery(theForm).find('div').fadeOut(500);
	setTimeout(function () {
	    jQuery(theForm)
		    .append('<p class="note">' + msg + '</p>')
		    .slideDown('fast');
	}, 500);
	hideMessage(jQuery(theForm));
    };

    var hideMessage = function ($form) {
	setTimeout(function () {
	    $form.find('.note').html('').slideUp('fast');
	    $form.find("button, .ox_button").removeAttr('disabled');
	    $form.find("input[type=text], textarea").val('');
	    $form.find('div').fadeIn(500);
	}, 3000);
    };

    form_data.action = 'send_contact_form';

    jQuery.ajax({
	type: "POST",
	url: ThemeData.admin_url,
	data: form_data,
	success: showMessage,
	error: function () {
	    showMessage(Theme_i18n.wrong_connection);
	}
    });

    return false;
}
function validateCaptcha(form, callback)
{
    jQuery.ajax({
	type: 'post',
	url: ThemeData.admin_url,
	data: {
	    action: "captcha_check",
	    recaptcha_challenge_field: jQuery('#recaptcha_challenge_field', form).val(),
	    recaptcha_response_field: jQuery('#recaptcha_response_field', form).val()
	},
	success: function (response) {
	    if (typeof response != 'undefined' && typeof response.is_valid != 'undefined')
	    {
		if (typeof Recaptcha != 'undefined')
		{
		    Recaptcha.reload();
		}

		if (response.is_valid)
		{
		    if (typeof callback == 'function')
		    {
			callback(form);
		    }
		}

		return response.is_valid;

	    }
	    return false;
	},
	error: function () {
	    if (typeof Recaptcha != 'undefined')
	    {
		Recaptcha.reload();
	    }
	    return false;
	}
    });
}



var portFlexslider;
function initPortfolioCarousel() {
    var $carousels_grid_12 = jQuery('.grid_12 .portfolio-carousel');
    var $carousels_grid_8 = jQuery('.grid_8 .portfolio-carousel');

    if ($carousels_grid_12 && $carousels_grid_12.length)
    {

	var defaults = {
	    animation: "slide",
	    reverse: false,
	    directionNav: true,
	    itemWidth: 215,
	    minItems: 1,
	    maxItems: Math.floor($carousels_grid_12.find('.flex-viewport').width() / 215),
	    controlNav: false,
	    start: function (slider) {
		portFlexslider = slider;
	    }
	};
	$carousels_grid_12.each(function () {
	    var $this = jQuery(this);
	    var data = $this.data('carousel');
	    if (data)
	    {
		$this.flexslider(jQuery.extend({}, defaults, data));
	    }
	});

	jQuery(window).resize(function () {
	    portFlexslider.vars.maxItems = Math.floor(portFlexslider.find('.flex-viewport').width() / 215);
	    portFlexslider.flexAnimate(0);
	    portFlexslider.slides.width(portFlexslider.computedW);
	    portFlexslider.update(portFlexslider.pagingCount);
	    portFlexslider.setProps();
	});

    }
    if ($carousels_grid_8 && $carousels_grid_8.length)
    {
	var defaults = {
	    animation: "slide",
	    reverse: false,
	    directionNav: true,
	    itemWidth: 250,
	    minItems: 1,
	    maxItems: Math.floor($carousels_grid_12.find('.flex-viewport').width() / 250),
	    controlNav: false,
	    start: function (slider) {
		portFlexslider = slider;
	    }
	};
	$carousels_grid_8.each(function () {
	    var $this = jQuery(this);
	    var data = $this.data('carousel');
	    if (data)
	    {
		$this.flexslider(jQuery.extend({}, defaults, data));
	    }
	});

	jQuery(window).resize(function () {
	    portFlexslider.vars.maxItems = Math.floor(portFlexslider.find('.flex-viewport').width() / 250);
	    portFlexslider.flexAnimate(0);
	    portFlexslider.slides.width(portFlexslider.computedW);
	    portFlexslider.update(portFlexslider.pagingCount);
	    portFlexslider.setProps();
	});
    }
}

function sharrreContent() {
    var box = jQuery('.share_box');

    if (box && box.length) {
	if (typeof sharreData != 'undefined') {
	    box.sharrre({
		share: {
		    twitter: true,
		    facebook: true,
		    googlePlus: true,
		    linkedin: true,
		    pinterest: true
		},
		template: sharreData,
		enableHover: false,
		enableTracking: false,
		urlCurl: box.data('curl'),
		buttons: {
		    pinterest: {media: box.data('media'), description: box.data('text')}
		},
		render: function (api, options) {
		    jQuery(api.element).on('click', '.twitter_account', function () {
			api.openPopup('twitter');
			return false;
		    });
		    jQuery(api.element).on('click', '.facebook_account', function () {
			api.openPopup('facebook');
			return false;
		    });
		    jQuery(api.element).on('click', '.google_plus_account', function () {
			api.openPopup('googlePlus');
			return false;
		    });
		    jQuery(api.element).on('click', '.linked_in_account', function () {
			api.openPopup('linkedin');
			return false;
		    });
		    jQuery(api.element).on('click', '.pinterest_account', function () {
			api.openPopup('pinterest');
			return false;
		    });
		}
	    });
	}
    }
}

//tags product page
jQuery('.tagged_as a').wrapInner('<div class="tag-cloud-wrap-inner">').prepend('<div class="tag-cloud"><div class="tag-cloud-wrap">');
jQuery(".summary .tagged_as").each(function () {

    var $tag_links = jQuery('<div class="tagged_as_wrap"></div>').insertAfter(this);

    jQuery('.summary .tagged_as a').each(function () {

	$tag_links.append(jQuery(this).clone());

	jQuery(this).remove();

    });

    var tagged_as = jQuery(this).html().replace(/,/g, '');

    jQuery(this).html(tagged_as);

    var tagged_as2 = jQuery(this).html().replace(/\./g, '');
    jQuery(this).html(tagged_as2);

    $tag_links.appendTo(this);

});

//categories product page
jQuery('.posted_in a').wrapInner('<div class="tag-cloud-wrap-inner">').prepend('<div class="tag-cloud"><div class="tag-cloud-wrap">');

jQuery(".summary .posted_in").each(function () {

    var $tag_links = jQuery('<div class="tagged_as_wrap"></div>').insertAfter(this);

    jQuery('.summary .posted_in a').each(function () {

	$tag_links.append(jQuery(this).clone());

	jQuery(this).remove();

    });

    var tagged_as = jQuery(this).html().replace(/,/g, '');

    jQuery(this).html(tagged_as);

    var tagged_as2 = jQuery(this).html().replace(/\./g, '');
    jQuery(this).html(tagged_as2);

    $tag_links.appendTo(this);

});

//WOO 

jQuery(window).load(function () {

    /*Top line shopping cart*/
    var top_cart_config = {
	over: function () {
	    jQuery('.topline_shopping_cart').css('display', 'block').animate({opacity: 1}, 1);
	},
	interval: 0,
	timeout: 100,
	out: function () {

	    jQuery('.topline_shopping_cart').animate({opacity: 0}, 100, function () {
		jQuery(this).css('display', 'none');
	    });
	}
    };
    jQuery(".top_cart").hoverIntent(top_cart_config);


    jQuery('.add_to_cart_button').click(function () {

	jQuery('.topline_shopping_cart.widget_shopping_cart').fadeIn('1000', function () {
	    setTimeout(function () {
		jQuery('.topline_shopping_cart.widget_shopping_cart').fadeOut('1000');
	    }, 5000);
	});
    });


//	Scroll to reviews tab		
    jQuery('a.show_review_form').click(function (e) {
	e.preventDefault();
	var $tab = jQuery('.woocommerce-tabs ul.tabs li.reviews_tab a');
	var $tabs_wrapper = $tab.closest('.woocommerce-tabs');

	jQuery('ul.tabs li', $tabs_wrapper).removeClass('active');
	jQuery('div.panel', $tabs_wrapper).hide();
	jQuery('div' + $tab.attr('href'), $tabs_wrapper).show();
	$tab.parent().addClass('active');


	jQuery('html, body').animate({
	    scrollTop: jQuery('#review_form').offset().top - 50
	}, 200);


	return false;
    });


    jQuery(' a.open_review_tab').click(function (e) {
	e.preventDefault();
	var $tab = jQuery('.woocommerce-tabs ul.tabs li.reviews_tab a');
	var $tabs_wrapper = $tab.closest('.woocommerce-tabs');

	jQuery('ul.tabs li', $tabs_wrapper).removeClass('active');
	jQuery('div.panel', $tabs_wrapper).hide();
	jQuery('div' + $tab.attr('href'), $tabs_wrapper).show();
	$tab.parent().addClass('active');


	jQuery('html, body').animate({
	    scrollTop: jQuery('.woocommerce-tabs').offset().top - 50
	}, 200);


	return false;
    });

//Product thumb size	

    jQuery('.thumb_holder').each(function () {
	jQuery(this).height(jQuery(this).find('img').first().height());
	jQuery(this).find('img.product_hover_image').css({'margin-top': -jQuery(this).find('img').first().height(), 'display': 'block'});
    });

    jQuery('.shop_catalog_image .thumb_holder').each(function () {
	if (jQuery(this).height() < jQuery(this).find('img').first().height()) {
	    jQuery(this).find('img').first().height(jQuery(this).height());
	}
    });

    jQuery('ul.products li.product').on({
	mouseenter: function () {
	    if (jQuery(this).find('img').length > 1) {
		jQuery(this).find('img').first().stop().animate({opacity: 0}, 400);
		jQuery(this).find('img').last().stop().animate({opacity: 1}, 400);
	    }
	},
	mouseleave: function () {
	    if (jQuery(this).find('img').length > 1) {
		jQuery(this).find('img').last().stop().animate({opacity: 0}, 400);
		jQuery(this).find('img').first().stop().animate({opacity: 1}, 400);
	    }
	}
    });

});

jQuery(window).on('resize ready load', function () {
    jQuery('.thumb_holder').each(function () {
	jQuery(this).height(jQuery(this).find('img').first().height());
	jQuery(this).find('img.product_hover_image').css({'margin-top': -jQuery(this).find('img').first().height()});
    });
});


// form - new select styles
jQuery(document).on('ready ajaxComplete', function () {
    select_wrapper();

});
jQuery(document).on('change', 'select', function () {
    select_wrapper();
});

var select_wrapper = function () {

    jQuery('.styled-select').each(function () {
	if (!jQuery(this).find('select').length)
	    jQuery(this).children().unwrap();
    });

    jQuery('select:not(".wrapped, .woocommerce-checkout #billing_country, .woocommerce-checkout #shipping_country, .woocommerce-checkout #billing_state, .woocommerce-checkout #shipping_state, .woocommerce-account #shipping_country, .woocommerce-account #billing_country, .woocommerce-account #billing_state, .woocommerce-account #shipping_state, #ecwid_body select")').each(function () {
	if (!jQuery(this).parent().hasClass('styled-select'))
	    jQuery(this).wrap('<span class="styled-select" />');
    });

    jQuery('.tinv-wishlist select').unwrap('<span class="styled-select" />');
};

//WooCommerce quiantity

jQuery(function ($) {

    $(".shipping-calculator-button").click(function () {
	$(this).toggleClass("clicked");
    });

    // Quantity buttons
    $('div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)').addClass('buttons_added').append('<input type="button" value="+" class="plus" />').prepend('<input type="button" value="-" class="minus" />');

    $(document).on('click', '.plus, .minus', function () {

	// Get values
	var $qty = $(this).closest('.quantity').find('.qty'),
		currentVal = parseFloat($qty.val()),
		max = parseFloat($qty.attr('max')),
		min = parseFloat($qty.attr('min')),
		step = $qty.attr('step');

	// Format values
	if (!currentVal || currentVal === '' || currentVal === 'NaN')
	    currentVal = 0;
	if (max === '' || max === 'NaN')
	    max = '';
	if (min === '' || min === 'NaN')
	    min = 0;
	if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN')
	    step = 1;

	// Change the value
	if ($(this).is('.plus')) {

	    if (max && (max == currentVal || currentVal > max)) {
		$qty.val(max);
	    } else {
		$qty.val(currentVal + parseFloat(step));
	    }

	} else {

	    if (min && (min == currentVal || currentVal < min)) {
		$qty.val(min);
	    } else if (currentVal > 0) {
		$qty.val(currentVal - parseFloat(step));
	    }

	}

	// Trigger change event
	$qty.trigger('change');

    });

});