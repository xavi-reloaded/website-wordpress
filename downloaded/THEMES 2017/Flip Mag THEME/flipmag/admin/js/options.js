
var Flipmag_Options = (function($) {
	
	var self = {

		init: function() 
		{
		
			// bind tab activation
			$('#flipmag-options .tabs a').on( "click",this.show_tab);
			$('.upload-btn').on( "click",this.upload);
			$('#flipmag-options input[name=delete]').on( "click",this.confirm_reset); // reset
			
			$('#flipmag-options-form, .form-table, #addtag, .flipmag-meta').delegate('.remove-image', 'click', this.remove_upload);
			
			this.init_color_pickers();			
			this.init_form_styles();
			
			// activate first tab
			if (!$('#flipmag-options .tabs a.active').length) {
				$('#flipmag-options .tabs a').first().trigger( "click" );
			}
			
			// typography
			$('#flipmag-options .typography *').on( "change",this.font_preview_update);

			// colors
			$('#reset-colors').on( "click",this.reset_colors);
			
			// backup/restore
			$('#options-backup').on( "click",this.create_backup);
			$('#options-restore').on( "change",function() {
				$('#flipmag-options-form #update:eq(0)').trigger( "click" );
			});

			// sample import
			$('#options-demo-import').on( "click",this.demo_import);

			
			$('#flipmag-options-form').submit(function() {
				if ($('#flipmag-options [name=import_backup]').val()) {
					return confirm('Do you really wish to override your current settings?');
				}
				
				return true;
			});
			
			if ($.fn.wpColorPicker) {
				$('.colorpicker').wpColorPicker();
			}
			
			
			/*
			 * Events are used to mainly conditionally show or hide elements
			 */
			if (this.events) {
				
				$.each(this.events, function(field, v) {
					
					// change event
					if (v.change) {
						
						// checkbox checked
						if (v.change.value == 'checked' && v.change.actions.show) {

							// register handler for the field							
							var fields = $('#flipmag-options [name='+ field +']');
							
							fields.on('change', function() {
								
								var elements = $('#flipmag-options .ele-' + v.change.actions.show.split(',').join(', #flipmag-options .ele-'));
								
								if ($(this).is(':checked')) {
									elements.show(200);
								}
								else {
									elements.hide(200);
								}
							});
							
							// fire up the events first load
							$(fields).trigger('change');
						}
						
					} // end change event

				}); // end $.each
				
			} // events
			
		},
		
		init_form_styles: function() {
		
			/*
			 * Checkbox toggle replacement
			 */
			$('#flipmag-options input[type=checkbox]').after(function() {
				
				if ($(this).attr('name').indexOf('[') !== -1) {
					return;
				}
				
				
				var yes = $(this).data('yes'),
					no  = $(this).data('no');
				
				var text    = no,
					checked = '';
				
				if ($(this).is(':checked')) {
					checked = ' checked';
					text    = yes;
				}
				
				$(this).hide();
				
				$(this).next('label').hide();
				
				return "<a href='#' class='checkbox-toggle"+ (checked || '') +"'><span>"+ text +"</span></a>";
				
			});
			
			$('.checkbox-toggle').on( "click",function(e) {
				var checkbox = $(this).prev('input[type=checkbox]');
				
				if (checkbox.is(':checked')) {
					checkbox.removeAttr('checked').trigger('change');
					text = 'No';
				}
				else {
					checkbox.attr('checked', 'checked').trigger('change');
					text = 'Yes';
				}
				
				// change text
				$(this).find('span').html(text);
				
				$(this).toggleClass('checked');
				
				return false;
			});

		},
		
		show_tab: function() {
			
			$('#flipmag-options .tabs a').removeClass('active');
			$('#flipmag-options .options-sections').hide();
			
			$('#options-' + $(this).attr('id')).fadeIn('slow');
			$(this).addClass('active');
			
			// improved select
			$('#options-' + $(this).attr('id') + ' .chosen-select').each(function() {
				
				var width = parseInt($(this).width());
				if (width <= 50) {
					$(this).css('width', '75px');
				} 
				
				$(this).chosen();
			});
			
			return false;
		},
		
		upload: function() {
			
			var element  = $(this),
				text_box = element.parent().find('.element-upload'),
				insert_label  = element.data('insert-label'),
				file_frame = null;
			
			if (file_frame) {
				return file_frame.open();
			}
			
			file_frame = wp.media({
				title: element.data('title'),
				button: {text: insert_label},
				multiple: false
			});
			
			file_frame.on('select', function() {
				attachment = file_frame.state().get('selection').first().toJSON();
				
				// set it in hidden input
				text_box.val(attachment.url);				
			
				// remove existing img and add the new one
				element.parent().find('.image-upload').find('img').remove();
				element.parent().find('.image-upload').prepend('<img src="' + attachment.url + '" />').fadeIn();
				element.parent().find('.after-upload').addClass('visible');
				
			});
			
			file_frame.open();
			
			return;
			
			// hacky method to update 
			var interval = setInterval(function() {
				$('#TB_iframeContent').contents().find('.savesend .button, #insertonlybutton, #go_button').val(insert_label);
			}, 500);
			
			// image sent from wp media uploader
			window.send_to_editor = function(html) {
				tb_remove();
				clearInterval(interval);
				
				var img_src = $('img', html).attr('src');
				
				text_box.val(img_src);
				element.parent().find('.image-upload').prepend('<img src="' + img_src + '" />').fadeIn();
			};
		
			
			tb_show(element.data('title'), 'media-upload.php?referer=wp-settings&type=image&TB_iframe=true&post_id=0', false);  
	        return false;
		},
		
		remove_upload: function() {
			$(this).parent().parent().find('.element-upload').val('');
			$(this).parent().find('img').remove();
			$(this).parent().find('.after-upload').removeClass('visible');
			
			return false;
		},
		
		confirm_reset: function() {
			if (confirm($(this).data('confirm'))) {
				return true;
			}
			
			return false;
		},
		
		reset_colors: function() {
			if (confirm($(this).data('confirm'))) {
				return true;
			}
			
			return false;
		},
		
		/**
		 * Color picker - farbastic setup
		 */
		init_color_pickers: function() {
			$('.color-picker-element').each(function() {
				
				// bind farbtastic to the color picker div and give it a callback element to 
				// update the text field. 
				var input = $(this).parent().find('.color-picker');
				var farbtastic = $.farbtastic(this, function(color) {

					if (color) {
						input.css({
							backgroundColor: color,
							color: this.hsl[2] > 0.5 ? '#000' : '#fff' 
						}).val(color);
					}

				});
				
				// set current color
				farbtastic.setColor(input.val());

				// update color on change
				input.keyup(function() { farbtastic.setColor($(this).val()); });
			});
			
			$('.color-picker').on('focus',function() {
				$(this).parent().find('.color-picker-element').fadeIn();
			}).blur(function() {
				$(this).parent().find('.color-picker-element').fadeOut();
			});
		},
		
		/**
		 * Update font preview
		 */
		font_preview_update: function() {
			var ele = $(this);
			
			var preview = ele.parent().find('.preview');
			preview.show();
			preview.css('font-size', $(this).parent().find('.size-picker').val() + 'px');
			
			
			// text changed or first font?
			if (ele.hasClass('font-picker') || !preview.text().length) {
				
				// not here via font-picker, correct context
				if (!preview.text().length) {
					ele = $(this).parent().find('.font-picker');
				}
				
				preview.text('Loading Preview...');
				
				// preview font
				function change_font() 
				{
					var font_data = (ele.val()).split(':'),
						font      = font_data[0];

					if (ele.val().indexOf('italic') !== -1) {
						preview.css('font-style', 'italic');
					}
					else {
						preview.css('font-style', '');
					}
					
					// font-weight parsed where it's a number in font:700 for example
					var weight = parseInt(font_data[1]);
					if (!isNaN(weight)) {
						preview.css('font-weight', weight);
					}
					else {
						preview.css('font-weight', 'normal');
					}
					
					preview.text($('option:selected', ele).text()).css('font-family', font); 
				}
				
				/*
				 * Load google font
				 */
				window.WebFontConfig = {
						google: { families: [encodeURIComponent(ele.val())] },
						active: change_font,
						inactive: change_font
				};
				
				// webfontloader already included
				if (typeof WebFont !== 'undefined') {
					WebFont.load(WebFontConfig);					
				}
				else {
					(function() {
						var wf = document.createElement('script');
						wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
							'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
						wf.type = 'text/javascript';
						wf.async = 'true';
						wf.id = 'google_loader';
						var s = document.getElementsByTagName('script')[0];
						s.parentNode.insertBefore(wf, s);
					})();
				}
			}	
		},
		
		/**
		 * Create a backup for downloading
		 */
		create_backup: function() {
			
			window.location.href = 'themes.php?page=flipmag-admin-options&backup=true&noheader=true';
			
		},


		demo_import: function(e) {

			if (!confirm($(this).data('confirm'))) {
				return false;
			}

			//$('#flipmag-options-form').attr('action', 'options.php?page=flipmag_demo_import').submit();

			// disable buttons
			$(this).attr('disabled', 'disabled');
			$('.button').attr('disabled', 'disabled');

			// show spinner
			$(this).after('<div class="spinner"></div>');
			$(this).find('.spinner').show();


			// submit via ajax
			var form_data = $('#flipmag-options-form').serializeArray();

			$.post(
				'themes.php?page=flipmag_demo_import',
				form_data,
				function(data) {
					var xyz = $(data).find("#wpbody");
					$('#options-options-sample-import').html( xyz );
					var data = $(data),
						message = data.find('.import-message');

					// success?
					if (message.find('.success').length) {
						//$('#options-options-sample-import').html(message.html());
					}
					else if (message.find('.failed').length) {
						$('#options-options-sample-import').html(message.find('.failed').html());
					}
					else {
						alert('Import Error.' );
					}
				},
				'html'
			)
			// timeout? http error?
			.fail(function() {
				alert('Error: Import Failed.');
			});

			return false;
			
		}
	};
	
	return self;
	
})(jQuery);


jQuery(function($) {

		Flipmag_Options.init();
        
        $(".radio-images input:radio").on( "change",function(){                        
            $("."+ $(this).attr("name") ).removeClass("active");
            $("#radio-"+ $(this).attr("id") ).addClass("active");
        });
        
        $("#flipmag-options-form fieldset legend").on( "click",function(){                        
            $( this ).parent( "fieldset" ).find(".element").toggle();
        });
        
});