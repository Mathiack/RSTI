<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly	
	
?>

<div class="wrap <?php echo esc_url($this -> pre); ?> slideshow">
	<h1><?php echo sprintf(esc_html__('Embed Gallery: %s', 'slideshow-gallery'), $gallery -> title); ?></h1>
	<div style="float:none;" class="subsubsub"><?php echo $this -> Html -> link(__('&larr; All Galleries', 'slideshow-gallery'), $this -> url, array('title' => __('All Galleries', 'slideshow-gallery'))); ?></div>
	
	<h2><?php _e('Shortcode in Post/Page', 'slideshow-gallery'); ?></h2>
	<code>[tribulant_slideshow gallery_id=<?php echo esc_html($gallery -> id); ?>]</code>
	
	<h2><?php _e('PHP Code in Theme', 'slideshow-gallery'); ?></h2>
	<p><?php _e('This PHP code can be used inside your WordPress theme to display slides inside this gallery.', 'slideshow-gallery'); ?></p>
	<textarea onmouseup="jQuery(this).unbind('onmouseup'); return false;" onfocus="jQuery(this).select();" cols="100%" rows="4"><?php echo htmlentities('<?php if (function_exists(\'slideshow\')) { slideshow(true, "' . $gallery -> id . '", false, array()); } ?>'); ?></textarea>
</div>