
/**
 * Controls the behaviours of custom metabox fields.
 *
 * @author Andrew Norcross
 * @author Jared Atchison
 * @author Bill Erickson
 * @see    https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

/*jslint browser: true, devel: true, indent: 4, maxerr: 50, sub: true */
/*global jQuery, tb_show, tb_remove */

/**
 * Custom jQuery for Custom Metaboxes and Fields
 */
jQuery(document).ready(function($) {
	'use strict';

	var formfield;

	/**
	 * Initialize timepicker (this will be moved inline in a future release)
	 */
	$('.cmb_timepicker').each(function() {
		$('#' + jQuery(this).attr('id')).timePicker({
			startTime: "00:00",
			endTime: "23:59",
			show24Hours: true,
			separator: ':',
			step: 30
		});
	});

	/**
	 * Initialize jQuery UI datepicker (this will be moved inline in a future release)
	 */
	$('.cmb_datepicker').each(function() {
		$('#' + jQuery(this).attr('id')).datepicker();
		// $('#' + jQuery(this).attr('id')).datepicker({ dateFormat: 'yy-mm-dd' });
		// For more options see http://jqueryui.com/demos/datepicker/#option-dateFormat
	});
	// Wrap date picker in class to narrow the scope of jQuery UI CSS and prevent conflicts
	$("#ui-datepicker-div").wrap('<div class="cmb_element" />');

	/**
	 * Initialize color picker
	 */
	$('input:text.cmb_colorpicker').each(function(i) {
		$(this).after('<div id="picker-' + i + '" style="z-index: 1000; background: #EEE; border: 1px solid #CCC; position: absolute; display: block;"></div>');
		$('#picker-' + i).hide().farbtastic($(this));
	})
			.focus(function() {
				$(this).next().show();
			})
			.blur(function() {
				$(this).next().hide();
			});

	/**
	 * File and image upload handling
	 */
	$('.cmb_upload_file').change(function() {
		formfield = $(this).attr('name');
		$('#' + formfield + '_id').val("");
	});

	$('.cmb_upload_button').live('click', function() {
		var buttonLabel;
		formfield = $(this).prev('input').attr('name');
		buttonLabel = 'Use as ' + $('label[for=' + formfield + ']').text();
		tb_show('', 'media-upload.php?post_id=' + $('#post_ID').val() + '&type=file&cmb_force_send=true&cmb_send_label=' + buttonLabel + '&TB_iframe=true');
		return false;
	});

	$('.cmb_remove_file_button').live('click', function() {
		formfield = $(this).attr('rel');
		$('input#' + formfield).val('');
		$('input#' + formfield + '_id').val('');
		$(this).parent().remove();
		return false;
	});

	window.original_send_to_editor = window.send_to_editor;
	window.send_to_editor = function(html) {
		var itemurl, itemclass, itemClassBits, itemid, htmlBits, itemtitle,
				image, uploadStatus = true;

		if (formfield) {

			if ($(html).html(html).find('img').length > 0) {
				itemurl = $(html).html(html).find('img').attr('src'); // Use the URL to the size selected.
				itemclass = $(html).html(html).find('img').attr('class'); // Extract the ID from the returned class name.
				itemClassBits = itemclass.split(" ");
				itemid = itemClassBits[itemClassBits.length - 1];
				itemid = itemid.replace('wp-image-', '');
			} else {
				// It's not an image. Get the URL to the file instead.
				htmlBits = html.split("'"); // jQuery seems to strip out XHTML when assigning the string to an object. Use alternate method.
				itemurl = htmlBits[1]; // Use the URL to the file.
				itemtitle = htmlBits[2];
				itemtitle = itemtitle.replace('>', '');
				itemtitle = itemtitle.replace('</a>', '');
				itemid = ""; // TO DO: Get ID for non-image attachments.
			}

			image = /(jpe?g|png|gif|ico)$/gi;

			if (itemurl.match(image)) {
				uploadStatus = '<div class="img_status"><img src="' + itemurl + '" alt="" /><a href="#" class="cmb_remove_file_button" rel="' + formfield + '">Remove Image</a></div>';
			} else {
				// No output preview if it's not an image
				// Standard generic output if it's not an image.
				html = '<a href="' + itemurl + '" target="_blank" rel="external">View File</a>';
				uploadStatus = '<div class="no_image"><span class="file_link">' + html + '</span>&nbsp;&nbsp;&nbsp;<a href="#" class="cmb_remove_file_button" rel="' + formfield + '">Remove</a></div>';
			}

			$('#' + formfield).val(itemurl);
			$('#' + formfield + '_id').val(itemid);
			$('#' + formfield).siblings('.cmb_upload_status').slideDown().html(uploadStatus);
			tb_remove();

		} else {
			window.original_send_to_editor(html);
		}

		formfield = '';
	};
});
// Portfolio slider meta box
jQuery(document).ready(function($) {
	var portfolio_slider = $('#portfolio-slider'),
			slide = portfolio_slider.children('.slide');


	// Fix for sortable jumping "bug"
	function adjustContainerHeight()
	{
		portfolio_slider.height('auto').height($('#portfolio-slider').height());
	}
	adjustContainerHeight();

	// Add slide
	$('#add-slider-slide').click(function(e) {
		portfolio_slider.height('auto');
		var cloneElem = portfolio_slider.children('.slide').last().clone();
		cloneElem
				.find('.image-preview div').css('background-image', 'url()').end()
				.find('input[type=text]').val('').end()
				.insertAfter(portfolio_slider.children('.slide').last());
		;
		adjustContainerHeight();
		e.preventDefault();
	});

	// Delete slide
	portfolio_slider.delegate('.remove-slide', 'click', function(e) {
		if (portfolio_slider.children('.slide').length == 1)
		{
			slide.find('.image-preview div').css('background-image', 'url()').end()
					.find('input[type=text]').val('').end()
					.find('input[type=hidden]').val('').end();
		}
		else
		{
			$(this).parents('.slide').remove();

		}

		adjustContainerHeight();
		e.preventDefault();
	});

	// Sortable slides
	portfolio_slider.sortable({
		handle: 'div.hndle',
		placeholder: 'sortable-placeholder',
		sort: function(event, ui) {
			$('.sortable-placeholder').height($(this).find('.ui-sortable-helper').height());
		},
		tolerance: 'pointer'
	});



	// Upload image
	portfolio_slider.delegate('.upload-image', 'click', function(e) {
		e.preventDefault();
		var $this = $(this);
		var custom_uploader = wp.media({
			title: 'Upload image for portfolio slide',
			button: {
				text: 'Add image to slide'
			},
			multiple: false  // Set this to true to allow multiple files to be selected
		})
				.on('select', function() {
					var attachment = custom_uploader.state().get('selection').first().toJSON();
					$this.closest('.ox-field').find('.image-preview div').css('background-image', 'url(' + attachment.url + ')');
					$this.siblings('input[type="text"]').val(attachment.url);
					$this.siblings('input[type="hidden"]').val(attachment.id);
				})
				.open();
	});


	// URL typing
	portfolio_slider.delegate('.image-url', 'keyup', function(e) {

		var $value = $(this).val();

		$(this).closest('.ox-field').find('.image-preview div').css('background-image', 'url(' + $value + ')');


	});

});