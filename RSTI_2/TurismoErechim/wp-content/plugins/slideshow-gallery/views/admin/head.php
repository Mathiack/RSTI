<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly	

if (isset($_GET['page'])) {
    $page = sanitize_text_field($_GET['page']);
} else {
    $page = "";
}
	
?>

<script type="text/javascript">
var GalleryAjax = "<?php echo esc_url($this -> url()); ?>/<?php echo 'slideshow-gallery'; ?>-ajax.php";
var slideshowajax = "<?php echo admin_url('admin-ajax.php'); ?>";

jQuery(document).ready(function() {
	if (jQuery.isFunction(jQuery.fn.colorbox)) { jQuery('.colorbox').colorbox({maxWidth:'100%', maxHeight:'100%'}); }
	
	<?php if (!empty($page) && in_array($page, (array) $this -> sections)) : ?>
		if (jQuery.isFunction(jQuery.fn.select2)) {
			jQuery('.slideshow select, .select2').select2({
				tags: true
			});
		}
	<?php endif; ?>
	
	// Color Pickers
	if (jQuery.isFunction(jQuery.fn.wpColorPicker)) {
		jQuery('.color-picker').each(function() {
			jQuery(this).wpColorPicker();
		});
	}

	// Tooltips	
	if (jQuery.isFunction(jQuery.fn.tooltip)) {
		jQuery(".galleryhelp a").tooltip({
			tooltipClass: 'slideshow-ui-tooltip',
			content: function () {
	            return jQuery(this).prop('title');
	        },
	        show: null, 
	        close: function (event, ui) {
	            ui.tooltip.hover(
	            function () {
	                jQuery(this).stop(true).fadeTo(400, 1);
	            },    
	            function () {
	                jQuery(this).fadeOut("400", function () {
	                    jQuery(this).remove();
	                })
	            });
	        }
		});
	}
});
</script>