<!-- Styles Settings -->

<?php 
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$styles = $this -> get_option('styles'); 
$autoheight = $this -> get_option('autoheight');
$autoheight_max = $this -> get_option('autoheight_max');
$resizeimagescrop = $this -> get_option('resizeimagescrop');
$thumbactive = (isset($styles['thumbactive']) ? (empty($styles['thumbactive']  ) ? "#ffffff" : $styles['thumbactive']  ) : "#ffffff" );

?>

<table class="form-table">
	<tbody>
		<?php if ($this -> has_child_theme_folder()) : ?>
			<tr>
				<th><?php _e('Child Theme Folder', 'slideshow-gallery'); ?></th>
				<td>
					<?php
					
					$theme_folder = basename(get_stylesheet_directory());
					
					?>
					<?php echo sprintf(__('Yes, there is a %s folder inside WordPress theme folder %s', 'slideshow-gallery'), '<code>slideshow</code>', '<code>' . $theme_folder . '</code>'); ?>
				</td>
			</tr>
		<?php endif; ?>
		<tr>
			<th><label for="layout_responsive"><?php _e('Layout', 'slideshow-gallery'); ?></label>
			<?php echo $this -> Html -> help(__('Choose responsive if you have a responsive theme and you want the slideshow to resize width/height in a responsive manner on different devices.<br/><br/><strong>Override per slideshow:</strong> Using parameter <code>layout</code> with value <code>responsive</code> or <code>specific</code> eg. <code>[tribulant_slideshow layout="specific"]</code>.', 'slideshow-gallery')); ?></th>
			<td>
				<label><input onclick="jQuery('#layout_specific_div').hide(); jQuery('#layout_responsive_div').show();" <?php echo ($styles['layout'] == "responsive") ? 'checked="checked"' : ''; ?> <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> type="radio" name="styles[layout]" value="responsive" id="layout_responsive" /> <?php _e('Responsive', 'slideshow-gallery'); ?> <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></label>
				<label><input onclick="jQuery('#layout_specific_div').show(); jQuery('#layout_responsive_div').hide();" <?php echo (empty($styles['layout']) || $styles['layout'] == "specific" || !$this -> ci_serial_valid()) ? 'checked="checked"' : ''; ?> type="radio" name="styles[layout]" value="specific" id="layout_specific" /> <?php _e('Fixed', 'slideshow-gallery'); ?></label>
				<span class="howto"><?php _e('Choose whether you want a responsive or fixed/specific layout for the slideshow.', 'slideshow-gallery'); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="autoheight"><?php _e('Auto Height', 'slideshow-gallery'); ?></label></th>
			<td>
				<label><input onclick="if (jQuery(this).is(':checked')) { jQuery('#autoheight_div').show(); jQuery('#styles_height').attr('disabled', 'disabled'); } else { jQuery('#autoheight_div').hide(); jQuery('#styles_height').removeAttr('disabled'); }" <?php echo (!empty($autoheight)) ? 'checked="checked"' : ''; ?> type="checkbox" name="autoheight" value="1" id="autoheight" /> <?php _e('Yes, automatically adjust the slideshow height for each slide', 'slideshow-gallery'); ?></label>
			</td>
		</tr>
	</tbody>
</table>

<div id="autoheight_div" style="display:<?php echo (!empty($autoheight)) ? 'block' : 'none'; ?>;">
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="autoheight_max"><?php _e('Maximum Auto Height', 'slideshow-gallery'); ?></label></th>
				<td>
					<label><input type="text" class="widefat" style="width:65px;" name="autoheight_max" value="<?php echo esc_attr(wp_unslash($autoheight_max)); ?>" id="autoheight_max" /> <?php _e('pixels', 'slideshow-gallery'); ?></label>
					<span class="howto"><?php _e('Set the maximum height that auto height may go or leave empty/zero for no maximum', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div id="layout_responsive_div" style="display:<?php echo (!empty($styles['layout']) && $styles['layout'] == "responsive") ? 'block' : 'none'; ?>;">
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="resheight"><?php _e('Responsive Height', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('The responsive height can be either a fixed height in pixel or a percentage height. The percentage height is a percentage of the width of the slideshow.<br/><br/><strong>Override per slideshow:</strong> Using parameters <code>resheight</code> value a value and <code>resheighttype</code> with <code>px</code> for pixels or <code>%</code> for percentage eg. <code>[tribulant_slideshow resheight="300" resheighttype="px"]</code>.', 'slideshow-gallery')); ?></th>
				<td>
					<input class="widefat" style="width:45px;" type="text" name="styles[resheight]" value="<?php echo esc_attr(wp_unslash($styles['resheight'])); ?>" id="resheight" />
					<select name="styles[resheighttype]">
						<option <?php echo ($styles['resheighttype'] == "%") ? 'selected="selected"' : ''; ?> value="%"><?php _e('&#37;', 'slideshow-gallery'); ?></option>
						<option <?php echo ($styles['resheighttype'] == "px") ? 'selected="selected"' : ''; ?> value="px"><?php _e('px', 'slideshow-gallery'); ?></option>
					</select>
					<span class="howto"><?php _e('Choose a responsive height for your slideshow, either a pixel or percentage height.', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<table class="form-table">
	<tbody>
		<tr>
			<th><label for="styles.resizeimages"><?php _e('Resize Images', 'slideshow-gallery'); ?></label>
			<?php echo $this -> Html -> help(__('Should images be automatically resized? If you specify No, the images will be used in the slideshow as you originally upload them. If you specify Yes, the images will be cropped/resized to fit the slideshow better which is the recommended setting.', 'slideshow-gallery')); ?></th>
			<td>
				<label><input onclick="jQuery('#resizeimages_div').show();" <?php echo (empty($styles['resizeimages']) || $styles['resizeimages'] == "Y") ? 'checked="checked"' : ''; ?> type="radio" name="styles[resizeimages]" value="Y" id="styles.resizeimages_Y" /> <?php _e('Yes', 'slideshow-gallery'); ?></label>
				<label><input onclick="jQuery('#resizeimages_div').hide();" <?php echo ($styles['resizeimages'] == "N") ? 'checked="checked"' : ''; ?> type="radio" name="styles[resizeimages]" value="N" id="styles.resizeimages_N" /> <?php _e('No', 'slideshow-gallery'); ?></label>
				<span class="howto"><?php _e('Should images be resized proportionally to fit the width of the slideshow area?', 'slideshow-gallery'); ?></span>
			</td>
		</tr>
	</tbody>
</table>

<div id="resizeimages_div" style="display:<?php echo (!empty($styles['resizeimages']) && $styles['resizeimages'] == "Y") ? 'block' : 'none'; ?>;">
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="resizeimagescrop_Y"><?php _e('Crop', 'slideshow-gallery'); ?></label></th>
				<td>
					<label><input <?php echo (!empty($resizeimagescrop) && $resizeimagescrop == "Y") ? 'checked="checked"' : ''; ?> type="radio" name="resizeimagescrop" value="Y" id="resizeimagescrop_Y" /> <?php _e('Yes', 'slideshow-gallery'); ?></label>
					<label><input <?php echo (!empty($resizeimagescrop) && $resizeimagescrop == "N") ? 'checked="checked"' : ''; ?> type="radio" name="resizeimagescrop" value="N" id="resizeimagescrop_N" /> <?php _e('No', 'slideshow-gallery'); ?></label>
					<span class="howto"><?php _e('Should images be cropped?', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div id="layout_specific_div" style="display:<?php echo (empty($styles['layout']) || $styles['layout'] == "specific") ? 'block' : 'none'; ?>;">		
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="styles.width"><?php _e('Gallery Width', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('The width of the slideshow in pixels.', 'slideshow-gallery')); ?></th>
				<td>
					<input style="width:45px;" id="styles.width" type="text" name="styles[width]" value="<?php echo esc_attr($styles['width']); ?>" /> <?php _e('px', 'slideshow-gallery'); ?>
					<span class="howto"><?php _e('Width of the slideshow gallery', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="styles_height"><?php _e('Gallery Height', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('The height of the slideshow in pixels.', 'slideshow-gallery')); ?></th>
				<td>
					<input <?php echo (!empty($autoheight)) ? 'disabled="disabled"' : ''; ?> style="width:45px;" id="styles_height" type="text" name="styles[height]" value="<?php echo esc_attr(wp_unslash((isset($styles['height'])) ? $styles['height'] : '')); ?>" /> <?php _e('px', 'slideshow-gallery'); ?>
					<span class="howto"><?php _e('Height of the slideshow gallery', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<table class="form-table">
	<tbody>
		<tr>
			<th><label for="styles.border"><?php _e('Slideshow Border', 'slideshow-gallery'); ?></label>
			<?php echo $this -> Html -> help(__('This is a CSS style for the border around the entire slideshow. You can use a value such as "1px #FFFFFF solid" to display a 1 pixel, white, solid border or even a value such as "none" for no border at all.', 'slideshow-gallery')); ?></th>
			<td>
				<input type="text" name="styles[border]" value="<?php echo esc_attr($styles['border']); ?>" id="styles.border" style="width:145px;" />
				<span class="howto"><?php echo sprintf(__('Border style/color for the entire slideshow wrapper eg. %s', 'slideshow-gallery'), "1px #000000 solid"); ?>
			</td>
		</tr>
		<tr>
			<th><label for="stylesbackground"><?php _e('Slideshow Background', 'slideshow-gallery'); ?></label>
			<?php echo $this -> Html -> help(__('The background which will display behind the entire slideshow. It is behind the slides, thumbnails, etc.', 'slideshow-gallery')); ?></th>
			<td>				
				<fieldset>
					<legend class="screen-reader-text"><span><?php _e('Slideshow Background', 'slideshow-gallery'); ?></span></legend>
					<div class="wp-picker-container">
						<a tabindex="0" id="stylesbackgroundbutton" class="wp-color-result" style="background-color:<?php echo esc_attr($styles['background']); ?>;" title="Select Color"></a>
						<span class="wp-picker-input-wrap">
							<input type="text" name="styles[background]" id="stylesbackground" value="<?php echo esc_attr($styles['background']); ?>" class="color-picker" style="" />
						</span>
					</div>
				</fieldset>				
				<span class="howto"><?php echo sprintf(__('Background color (hexidecimal) of the entire slideshow wrapper eg. %s', 'slideshow-gallery'), "#FFFFFF"); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="styles.infobackground"><?php _e('Information Background', 'slideshow-gallery'); ?></label>
			<?php echo $this -> Html -> help(__('The background of the information bar which shows the title and description of each slide. It is automatically half transparent so that it is not obtrusive to the slide image below it though.', 'slideshow-gallery')); ?></th>
			<td>
				<fieldset>
					<legend class="screen-reader-text"><span><?php _e('Information Background', 'slideshow-gallery'); ?></span></legend>
					<div class="wp-picker-container">
						<a tabindex="0" id="stylesinfobackgroundbutton" class="wp-color-result" style="background-color:<?php echo esc_attr($styles['infobackground']); ?>;" title="Select Color"></a>
						<span class="wp-picker-input-wrap">
							<input type="text" name="styles[infobackground]" id="stylesinfobackground" value="<?php echo esc_attr($styles['infobackground']); ?>" class="color-picker" style="" />
						</span>
					</div>
				</fieldset>				
				<span class="howto"><?php echo sprintf(__('Background color (hexidecimal) of the information bar eg. %s', 'slideshow-gallery'), "#000000"); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="styles.infocolor"><?php _e('Information Text Color', 'slideshow-gallery'); ?></label>
			<?php echo $this -> Html -> help(__('This is the color of the text of the title and description of each slide which shows in the information bar.', 'slideshow-gallery')); ?></th>
			<td>
				<fieldset>
					<legend class="screen-reader-text"><span><?php _e('Information Text Color', 'slideshow-gallery'); ?></span></legend>
					<div class="wp-picker-container">
						<a tabindex="0" id="stylesinfocolorbutton" class="wp-color-result" style="background-color:<?php echo esc_attr($styles['infocolor']); ?>;" title="Select Color"></a>
						<span class="wp-picker-input-wrap">
							<input type="text" name="styles[infocolor]" id="stylesinfocolor" value="<?php echo esc_attr($styles['infocolor']); ?>" class="color-picker" style="" />
						</span>
					</div>
				</fieldset>
				
				<span class="howto"><?php echo sprintf(__('Text color (hexidecimal) of the information bar content eg. %s', 'slideshow-gallery'), "#FFFFFF"); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="thumbactive"><?php _e('Thumbnail Active Border', 'slideshow-gallery'); ?></label>
			<?php echo $this -> Html -> help(__('This is the color of the border which displays on the active thumbnail of the slide currently displaying in the slideshow.', 'slideshow-gallery')); ?></th>
			<td>
				<fieldset>
					<legend class="screen-reader-text"><span><?php _e('Thumbnail Active Border', 'slideshow-gallery'); ?></span></legend>
					<div class="wp-picker-container">
						<a tabindex="0" id="stylesthumbactivebutton" class="wp-color-result" style="<?php echo (!empty($styles['thumbactive']) ?  ( 'background-color: ' .  esc_attr($styles['thumbactive']) ) : '' ); ?>;" title="Select Color"></a>
						<span class="wp-picker-input-wrap">
							<input type="text" name="styles[thumbactive]" id="stylesthumbactive" value="<?php echo $thumbactive; ?>" class="color-picker" style="" />
						</span>
					</div>
				</fieldset>				
				<span class="howto"><?php echo sprintf(__('Border color (hexidecimal) for the active image thumbnail eg. %s', 'slideshow-gallery'), "#FFFFFF"); ?></span>
			</td>
		</tr>
	</tbody>
</table>
