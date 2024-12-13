<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly	
	
?>

<table class="form-table">
	<tbody>
    	<tr>
        	<th><label for="imagesthickbox_N"><?php _e('Open Images in Overlay', 'slideshow-gallery'); ?></label>
        	<?php echo $this -> Html -> help(__('Turn this on to display the link of a slide in an enlargement overlay. It only works if the link on the slide is a link to a jpg, png, gif or bmp image though. For normal links to pages, the overlay will not be used at all.', 'slideshow-gallery')); ?></th>
            <td>
            	<label><input <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> <?php echo ($this -> get_option('imagesthickbox') == "Y" && $this -> ci_serial_valid()) ? 'checked="checked"' : ''; ?> type="radio" name="imagesthickbox" value="Y" id="imagesthickbox_Y" /> <?php _e('Yes', 'slideshow-gallery'); ?> <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></label>
				 &nbsp; 
                <label><input <?php echo ($this -> get_option('imagesthickbox') == "N" || !$this -> ci_serial_valid()) ? 'checked="checked"' : ''; ?> type="radio" name="imagesthickbox" value="N" id="imagesthickbox_N" /> <?php _e('No', 'slideshow-gallery'); ?></label>
            	<span class="howto"><?php _e('turning this on (Yes) will open image URLs (.jpg, .png, .gif, .bmp) in a Thickbox image overlay', 'slideshow-gallery'); ?></span>
            </td>
        </tr>
    </tbody>
</table>