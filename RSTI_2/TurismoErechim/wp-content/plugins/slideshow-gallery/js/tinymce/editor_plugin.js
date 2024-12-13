/**
 * Slideshow Gallery TinyMCE Plugin
 * @author Tribulant
 */

(function() {
	// Load plugin specific language pack
	//tinymce.PluginManager.requireLangPack("gallery");

	tinymce.create('tinymce.plugins.gallery', {
		init: function(ed, url) {
			ed.addCommand('mcegallery', function() {			
				ed.windowManager.open({
					file : slideshowajax + '?action=slideshow_tinymce',
					width : 500,
					height : 350,
					inline : 1
				}, {
					plugin_url : url // Plugin absolute URL
				});
			});

			// Register example button
			ed.addButton('gallery', {
				title : 'Insert a Slideshow Gallery',
				cmd : 'mcegallery',
			});			
		},		
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
				longname : 'Slideshow Gallery TinyMCE Plugin',
				author : 'Tribulant',
				authorurl : 'https://tribulant.com',
				infourl : 'https://tribulant.com',
				version : "1.0"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('gallery', tinymce.plugins.gallery);
})();