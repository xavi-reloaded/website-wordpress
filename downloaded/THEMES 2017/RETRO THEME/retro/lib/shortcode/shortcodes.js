(function() {
	tinymce.create('tinymce.plugins.ox_buttons', {
		init: function(ed, url) {
			ed.addButton('highlight', {
				title: 'Highlight',
				onclick: function() {

					ed.focus();
					ed.selection.setContent(' [highlight] ' + ed.selection.getContent() + ' [/highlight] ');

				},
				image: url + "/shortcodes/img/ed_highlight.png"
			});

			ed.addButton('dropcaps', {
				title: 'Dropcaps',
				onclick: function() {

					ed.focus();
					ed.selection.setContent(' [dropcaps] 1 [/dropcaps] ');

				},
				image: url + "/shortcodes/img/ed_dropcaps.png"
			});


			ed.addButton('table', {
				title: 'Table',
				onclick: function() {

					ed.focus();
					ed.selection.setContent(' [ox_table] <table> <thead><tr><th>Header 1</th><th>Header 2</th></tr></thead> <tbody><tr><td>Division 1</td><td>Division 2</td></tr></tbody> </table> [/ox_table] ');

				},
				image: url + "/shortcodes/img/ed_table.png"
			});

			ed.addButton('totop', {
				title: 'To Top',
				onclick: function() {

					ed.focus();
					ed.selection.setContent(' [totop] to Top [/totop] ');

				},
				image: url + "/shortcodes/img/ed_totop.png"
			});

			ed.addCommand('toc', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/toc.php' + ox_wpml_lang,
					width: 350,
					height: 250,
					inline: 1
				});

			});

			ed.addButton('toc', {
				title: 'Insert Table of Contents',
				cmd: 'toc',
				image: url + "/shortcodes/img/ed_toc.png"
			});

			ed.addCommand('buttons', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/buttons.php' + ox_wpml_lang,
					width: 350,
					height: 620,
					inline: 1
				});

			});

			ed.addButton('buttons', {
				title: 'Insert Button',
				cmd: 'buttons',
				image: url + "/shortcodes/img/ed_buttons.png"
			});
			ed.addCommand('event', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/event.php' + ox_wpml_lang,
					width: 350,
					height: 470,
					inline: 1
				});

			});

			ed.addCommand('blog', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/blog.php' + ox_wpml_lang,
					width: 350,
					height: 410,
					inline: 1
				});
			});
			ed.addButton('blog', {
				title: 'Insert Blog',
				cmd: 'blog',
				image: url + "/shortcodes/img/ed_blog.png"
			});

			ed.addCommand('contactForm', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/contactForm.php' + ox_wpml_lang,
					width: 900,
					height: 700,
					inline: 1
				});
			});
			ed.addButton('contactForm', {
				title: 'Insert Contact Form',
				cmd: 'contactForm',
				image: url + "/shortcodes/img/ed_contactForm.png"
			});

			ed.addCommand('terms_portfolio', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/portfolio.php' + ox_wpml_lang,
					width: 350,
					height: 500,
					inline: 1
				});
			});
			ed.addButton('terms_portfolio', {
				title: 'Insert Portfolio',
				cmd: 'terms_portfolio',
				image: url + "/shortcodes/img/ed_gallery.png"
			});
			ed.addCommand('portfolio_carousel', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/portfolio_carousel.php' + ox_wpml_lang,
					width: 350,
					height: 500,
					inline: 1
				});
			});
			ed.addButton('portfolio_carousel', {
				title: 'Insert Portfolio carousel',
				cmd: 'portfolio_carousel',
				image: url + "/shortcodes/img/ed_carousel.png"
			});

			ed.addCommand('notifications', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/notifications.php' + ox_wpml_lang,
					width: 350,
					height: 330,
					inline: 1
				});

			});

			ed.addButton('notifications', {
				title: 'Insert Notification',
				cmd: 'notifications',
				image: url + "/shortcodes/img/ed_notifications.png"
			});

			ed.addCommand('list', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/list.php' + ox_wpml_lang,
					width: 350,
					height: 170,
					inline: 1
				});

			});

			ed.addButton('list', {
				title: 'Insert List',
				cmd: 'list',
				image: url + "/shortcodes/img/ed_list.png"
			});

			ed.addButton('divider', {
				title: 'Insert Separator line',
				image: url + "/shortcodes/img/ed_divider.png",
				onclick: function() {
					ed.selection.setContent("<hr>");
				}
			});


			ed.addCommand('toggle', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/toggle.php' + ox_wpml_lang,
					width: 350,
					height: 240,
					inline: 1
				});

			});

			ed.addButton('toggle', {
				title: 'Insert Toggle',
				cmd: 'toggle',
				image: url + "/shortcodes/img/ed_toggle.png"
			});
			ed.addButton('tabs', {
				title: 'Insert Tabs',
				onclick: function() {
					ed.focus();
					ed.selection.setContent('[tabgroup] <br>[tab title="Tab 1"]' + ed.selection.getContent() + '[/tab] <br>[tab title="Tab 2"]Tab 2 content goes here.[/tab] <br>[tab title="Tab 3"]Tab 3 content goes here.[/tab] <br>[/tabgroup]');

				},
				image: url + "/shortcodes/img/ed_tabs.png"
			});

			ed.addCommand('social_link', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/social_link.php' + ox_wpml_lang,
					width: 350,
					height: 470,
					inline: 1
				});

			});
			ed.addButton('social_link', {
				title: 'Insert Social Link',
				cmd: 'social_link',
				image: url + "/shortcodes/img/ed_social.png"
			});

			ed.addCommand('social_button', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/social_button.php' + ox_wpml_lang,
					width: 350,
					height: 700,
					inline: 1
				});

			});
			ed.addButton('social_button', {
				title: 'Insert Share Button',
				cmd: 'social_button',
				image: url + "/shortcodes/img/ed_social_button.png"
			});
			ed.addCommand('teaser', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/teaser.php' + ox_wpml_lang,
					width: 350,
					height: 850,
					inline: 1
				});

			});
			ed.addButton('teaser', {
				title: 'Insert Teaser',
				cmd: 'teaser',
				image: url + "/shortcodes/img/ed_teaser.png"
			});

			ed.addCommand('testimonials', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/testimonials.php' + ox_wpml_lang,
					width: 350,
					height: 400,
					inline: 1
				});

			});
			ed.addButton('testimonials', {
				title: 'Testimonials',
				cmd: 'testimonials',
				image: url + "/shortcodes/img/ed_testimonials.png"
			});
			ed.addCommand('oxvideo', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/video.php' + ox_wpml_lang,
					width: 350,
					height: 270,
					inline: 1
				});

			});
			ed.addButton('oxvideo', {
				title: 'Video',
				cmd: 'oxvideo',
				image: url + "/shortcodes/img/ed_video.png"
			});

			ed.addCommand('slogan', function() {
				ed.windowManager.open({
					file: url + '/shortcodes/slogan.php' + ox_wpml_lang,
					width: 350,
					height: 370,
					inline: 1
				});

			});
			ed.addButton('slogan', {
				title: 'Slogan',
				cmd: 'slogan',
				image: url + "/shortcodes/img/ed_slogan.png"
			});
			ed.addButton('columns', {
				type: 'menubutton',
				text: false,
				icon: false,
				menu: [
					{text: 'Column 1/2', onclick: function() {
							ed.insertContent(' [one_half]  [/one_half] ');
						}},
					{text: 'Column 1/2 last', onclick: function() {
							ed.insertContent(' [one_half last=last]  [/one_half] ');
						}},
					{text: 'Column 1/3', onclick: function() {
							ed.insertContent(' [one_third]  [/one_third] ');
						}},
					{text: 'Column 1/3 last', onclick: function() {
							ed.insertContent(' [one_third last=last]  [/one_third] ');
						}},
					{text: 'Column 1/4', onclick: function() {
							ed.insertContent(' [one_fourth]  [/one_fourth] ');
						}},
					{text: 'Column 1/4 last', onclick: function() {
							ed.insertContent(' [one_fourth last=last]  [/one_fourth] ');
						}},
					{text: 'Column 2/3', onclick: function() {
							ed.insertContent(' [two_third]  [/two_third] ');
						}},
					{text: 'Column 2/3 last', onclick: function() {
							ed.insertContent(' [two_third last=last]  [/two_third] ');
						}},
					{text: 'Column 3/4', onclick: function() {
							ed.insertContent(' [three_fourth]  [/three_fourth] ');
						}},
					{text: 'Column 3/4 last', onclick: function() {
							ed.insertContent(' [three_fourth last=last]  [/three_fourth] ');
						}}
				]
			});

		},

		addImmediate: function(d, e, a) {
			d.add({title: e, onclick: function() {
					tinyMCE.activeEditor.execCommand("mceInsertContent", false, a)
				}})
		}
	});

	tinymce.PluginManager.add('ox_buttons', tinymce.plugins.ox_buttons);	

})();

