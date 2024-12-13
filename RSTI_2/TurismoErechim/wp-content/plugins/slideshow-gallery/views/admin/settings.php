<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly

global $post, $post_ID;
$post_ID = 1;

wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false);
wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false);

?>

<div class="wrap slideshow <?php echo esc_attr($this -> pre); ?>">
	<h1><?php _e('Settings', 'slideshow-gallery'); ?></h1>
	
	<form action="<?php echo esc_attr($this -> url); ?>" name="post" id="post" method="post">
		<?php wp_nonce_field($this -> sections -> settings); ?>
		
		<div id="poststuff" class="metabox-holder has-right-sidebar">			
			<div id="side-info-column" class="inner-sidebar">		
				<?php do_action('submitpage_box'); ?>	
				<?php do_meta_boxes($this -> menus['slideshow-settings'], 'side', $post); ?>
			</div>
			<div id="post-body">
				<div id="post-body-content">
					<?php do_meta_boxes($this -> menus['slideshow-settings'], 'normal', $post); ?>
				</div>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
(function($) {
	$document = $(document);
	$plugininstall = $('.plugin-install-newsletters');
	
	$plugininstall.on('click', '.install-now', function() {
		tb_show('<?php _e('Install Newsletter Plugin', 'slideshow-gallery'); ?>', $(this).attr('href'), false);
		return false;
	});
	
	$plugininstall.on('click', '.activate-now', function() {
		window.location = $(this).attr('href');
	});
	
	$document.on('wp-plugin-installing', function(event, args) {
		$plugininstall.find('.install-now').html('<i class="fa fa-refresh fa-spin fa-fw"></i> <?php echo __('Installing', 'slideshow-gallery'); ?>').prop('disabled', true);
	});
	
	$document.on('wp-plugin-install-success', function(event, response) {	
		$plugininstall.find('.install-now').html('<i class="fa fa-check fa-fw"></i> <?php _e('Activate', 'slideshow-gallery'); ?>').attr('href', response.activateUrl).prop('disabled', false);
		$plugininstall.find('.install-now').removeClass('install-now').addClass('activate-now')
	});
	
	$document.on('wp-plugin-install-error', function(event, response) {
		alert('<?php _e('An error occurred, please try again.', 'slideshow-gallery'); ?>');
		$plugininstall.find('.install-now').html('<i class="fa fa-check fa-fw"></i> <?php echo __('Install Now', 'slideshow-gallery'); ?>').prop('disabled', false);
	});
})(jQuery);
</script>