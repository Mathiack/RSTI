<!-- Technical Settings -->

<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly
	
$jsoutput = $this -> get_option('jsoutput');	
	
?>

<table class="form-table">
	<tbody>
		<tr>
			<th><label for="jsoutput_perslideshow"><?php _e('JavaScript Output', 'slideshow-gallery'); ?></label></th>
			<td>
				<label><input <?php echo (empty($jsoutput) || (!empty($jsoutput) && $jsoutput == "perslideshow")) ? 'checked="checked"' : ''; ?> type="radio" name="jsoutput" value="perslideshow" id="jsoutput_perslideshow" /> <?php _e('Per Slideshow', 'slideshow-gallery'); ?></label>
				 &nbsp; 
				<label><input <?php echo (!empty($jsoutput) && $jsoutput == "footerglobal") ? 'checked="checked"' : ''; ?> type="radio" name="jsoutput" value="footerglobal" id="jsoutput_footerglobal" /> <?php _e('All in Footer', 'slideshow-gallery'); ?></label>
			</td>
		</tr>
	</tbody>
</table>