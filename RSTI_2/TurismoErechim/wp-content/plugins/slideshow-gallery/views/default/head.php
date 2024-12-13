<script type="text/javascript">
(function($) {
	var $document = $(document);
	
	$document.ready(function() {
		if (typeof $.fn.colorbox !== 'undefined') {
			$.extend($.colorbox.settings, {
				current: "<?php echo esc_js(__('Image {current} of {total}', 'slideshow-gallery')); ?>",
			    previous: "<?php echo esc_js(__('Previous', 'slideshow-gallery')); ?>",
			    next: "<?php echo esc_js(__('Next', 'slideshow-gallery')); ?>",
			    close: "<?php echo esc_js(__('Close', 'slideshow-gallery')); ?>",
			    xhrError: "<?php echo esc_js(__('This content failed to load', 'slideshow-gallery')); ?>",
			    imgError: "<?php echo esc_js(__('This image failed to load', 'slideshow-gallery')); ?>"
			});
		}
	});
})(jQuery);
</script>