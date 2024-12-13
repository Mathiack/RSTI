<!-- General Settings -->

<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$effect = $this -> get_option('effect');
$slide_direction = $this -> get_option('slide_direction');
$easing = $this -> get_option('easing');
$autospeed = $this -> get_option('autospeed');
$fadespeed = $this -> get_option('fadespeed');
$navopacity = $this -> get_option('navopacity');
$navhover = $this -> get_option('navhover');
$infospeed = $this -> get_option('infospeed');
$infodelay = $this -> get_option('infodelay');
$infohideonmobile = $this -> get_option('infohideonmobile');
$thumbopacity = $this -> get_option('thumbopacity');
$thumbscrollspeed = $this -> get_option('thumbscrollspeed');
$infofade = $this -> get_option('infofade');
$infofadedelay = $this -> get_option('infofadedelay');
$infoonhover = $this -> get_option('infoonhover');
$thumbhideonmobile = $this -> get_option ('thumbhideonmobile');
?>

<h3><?php _e('Slide Effects', 'slideshow-gallery'); ?></h3>

<table class="form-table">
	<tbody>
		<tr>
			<th><label for="effect_fade"><?php _e('Effect', 'slideshow-gallery'); ?></label></th>
			<td>
				<?php
					
				$effects = array(
					'slide',
					'fade',
					'blind',
					'bounce',
					'clip',
					'drop',
					'explode',
					'fold',
					'puff',
					'pulsate',
					'scale',
					'shake',
					'size',
				);
					
				?>
				
				<select name="effect" id="effect">
					<?php foreach ($effects as $eff) : ?>
						<option <?php echo (!$this -> ci_serial_valid() && $eff != "slide") ? 'disabled="disabled"' : ''; ?> <?php echo (!empty($effect) && $effect == $eff) ? 'selected="selected"' : ''; ?> value="<?php echo esc_attr(wp_unslash($eff)); ?>"><?php echo ucfirst($eff); ?> <?php if (!$this -> ci_serial_valid() && $eff != "slide") { echo __('(Pro Version Only)', 'slideshow-gallery'); } ?></option>
					<?php endforeach; ?>
				</select>				
				<span class="howto"><?php _e('Choose the type of effect/transition you want for slides', 'slideshow-gallery'); ?></span>
				
				<script type="text/javascript">
				jQuery('#effect').on('change', function() {
					var effect = jQuery(this).val();
					
					switch (effect) {
						case 'slide'			:
							jQuery('#effect_slide_div').show();
							break;
						default 				:
							jQuery('#effect_slide_div').hide();
							break;
					}
				});
				</script>
			</td>
		</tr>
	</tbody>
</table>

<div id="effect_slide_div" style="display:<?php echo (!empty($effect) && $effect == "slide") ? 'block' : 'none'; ?>;">
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="slide_direction_lr"><?php _e('Slide Direction', 'slideshow-gallery'); ?></label></th>
				<td>
					<label><input <?php echo (!empty($slide_direction) && $slide_direction == "lr") ? 'checked="checked"' : ''; ?> type="radio" name="slide_direction" value="lr" id="slide_direction_lr" /> <?php _e('Left/Right', 'slideshow-gallery'); ?></label>
					<label><input <?php echo (!empty($slide_direction) && $slide_direction == "tb") ? 'checked="checked"' : ''; ?> type="radio" name="slide_direction" value="tb" id="slide_direction_tb" /> <?php _e('Top/Bottom', 'slideshow-gallery'); ?></label>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<table class="form-table">
	<tbody>
		<tr>
			<th><label for="easing"><?php _e('Easing', 'slideshow-gallery'); ?></label>
			<?php echo $this -> Html -> help(sprintf(__('Choose the type of easing effect. See the %s available.', 'slideshow-gallery'), '<a href="https://api.jqueryui.com/easings/" target="_blank">' . __('list of easings', 'slideshow-gallery') . '</a>')); ?></th>
			<td>					
				<select name="easing" id="easing">
					<option value="swing">swing</option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="linear">linear <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInQuad">easeInQuad <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeOutQuad">easeOutQuad <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInOutQuad">easeInOutQuad <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInCubic">easeInCubic <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeOutCubic">easeOutCubic <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInOutCubic">easeInOutCubic <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInQuart">easeInQuart <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeOutQuart">easeOutQuart <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInOutQuart">easeInOutQuart <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInQuint">easeInQuint <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeOutQuint">easeOutQuint <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInOutQuint">easeInOutQuint <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInSine">easeInSine <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeOutSine">easeOutSine <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInOutSine">easeInOutSine <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInExpo">easeInExpo <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeOutExpo">easeOutExpo <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInOutExpo">easeInOutExpo <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInCirc">easeInCirc <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeOutCirc">easeOutCirc <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInOutCirc">easeInOutCirc <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInElastic">easeInElastic <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeOutElastic">easeOutElastic <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInOutElastic">easeInOutElastic <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInBack">easeInBack <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeOutBack">easeOutBack <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInOutBack">easeInOutBack <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInBounce">easeInBounce <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeOutBounce">easeOutBounce <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
					<option <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> value="easeInOutBounce">easeInOutBounce <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></option>
				</select>
				
				<script type="text/javascript">
					jQuery(document).ready(function() {
						jQuery('#easing').val('<?php echo esc_attr($easing); ?>');
					});
				</script>
				
				<span class="howto"><?php _e('Choose the desired easing effect', 'slideshow-gallery'); ?></span>
			</td>
		</tr>
	</tbody>
</table>

<h3><?php _e('Sliding Behaviour', 'slideshow-gallery'); ?></h3>

<table class="form-table">
	<tbody>
		<tr>
			<th><label for="autoslideY"><?php _e('Auto Slide', 'slideshow-gallery'); ?></label>
			<?php echo $this -> Html -> help(__('Turn this on so that the slideshow can automatically slide through the slides.<br/><br/><strong>Override per slideshow:</strong> Using parameter <code>auto</code> with value <code>true</code> or <code>false</code> eg. <code>[tribulant_slideshow auto="false"]</code>.', 'slideshow-gallery')); ?></th>
			<td>
				<label><input onclick="jQuery('#autoslide_div').show();" <?php echo ($this -> get_option('autoslide') == "Y") ? 'checked="checked"' : ''; ?> type="radio" name="autoslide" value="Y" id="autoslideY" /> <?php _e('Yes', 'slideshow-gallery'); ?></label>
				<label><input onclick="jQuery('#autoslide_div').hide();" <?php echo ($this -> get_option('autoslide') == "N") ? 'checked="checked"' : ''; ?> type="radio" name="autoslide" value="N" id="autoslideN" /> <?php _e('No', 'slideshow-gallery'); ?></label>
				<span class="howto"><?php _e('Should image slides automatically slide?', 'slideshow-gallery'); ?></span>
			</td>
		</tr>
	</tbody>
</table>

<div id="autoslide_div" style="display:<?php echo ($this -> get_option('autoslide') == "Y") ? 'block' : 'none'; ?>;">
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="alwaysauto_true"><?php _e('Always Auto', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('With the "Auto Slide" setting turned on above, the slideshow will automatically go through the slides but it will stop automatically navigating once the user started navigating. You can override this behaviour and force automatic navigation by turning this on.', 'slideshow-gallery')); ?></th>
				<td>
					<label><input <?php echo ($this -> get_option('alwaysauto') == "true") ? 'checked="checked"' : ''; ?> type="radio" name="alwaysauto" value="true" id="alwaysauto_true" /> <?php _e('Yes', 'slideshow-gallery'); ?></label>
					<label><input <?php echo ($this -> get_option('alwaysauto') == "false") ? 'checked="checked"' : ''; ?> type="radio" name="alwaysauto" value="false" id="alwaysauto_false" /> <?php _e('No', 'slideshow-gallery'); ?></label>
					<span class="howto"><?php _e('Should the slideshow always continue auto sliding, even after navigation by the user?', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="autospeed"><?php _e('Auto Speed', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('Set the speed at which auto sliding will occur, meaning the interval between auto sliding. The default is 10 which is recommended but you can specify a smaller number for quicker sliding or a larger number for slower sliding.', 'slideshow-gallery')); ?></th>
				<td>
					<input type="hidden" style="width:45px;" name="autospeed" value="<?php echo esc_attr($autospeed); ?>" id="autospeed" />
					<div id="autospeed_slider"></div>
					<span class="slider-value" id="autospeed_slider_value"><?php echo (empty($autospeed)) ? 0 : wp_kses_post($autospeed); ?></span>
					<script type="text/javascript">
					jQuery(document).ready(function() {
						jQuery('#autospeed_slider').slider({
							min: 1, 
							max: 20,
							value: <?php echo (empty($autospeed)) ? 0 : esc_attr($autospeed); ?>,
							slide: function(event, ui) {
								jQuery('#autospeed').val(ui.value);
								jQuery('#autospeed_slider_value').text(ui.value);
							}
						});
					});
					</script>
					<span class="howto"><?php _e('Speed for auto sliding. Lower number for shorter interval between images.', 'slideshow-gallery'); ?> <small><?php _e('(Default/Recommended: 10)', 'slideshow-gallery'); ?></small></span>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<table class="form-table">
	<tbody>
		<tr>
			<th><label for="fadespeed"><?php _e('Transition Speed', 'slideshow-gallery'); ?></label>
			<?php echo $this -> Html -> help(__('Choose the speed at which images fade in and out. The default is 20 and a number between 1 and 50 is recommended. Use a low number for quick fading and a higher number for slower fading.', 'slideshow-gallery')); ?></th>
			<td>
				<input style="width:45px;" type="hidden" name="fadespeed" value="<?php echo esc_attr($fadespeed); ?>" id="fadespeed" />
				<div id="fadespeed_slider"></div>
				<span class="slider-value" id="fadespeed_slider_value"><?php echo (empty($fadespeed)) ? 0 : wp_kses_post($fadespeed); ?></span>
				<script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery('#fadespeed_slider').slider({
						min: 1, 
						max: 50,
						value: <?php echo (empty($fadespeed)) ? 0 : esc_attr($fadespeed); ?>,
						slide: function(event, ui) {
							jQuery('#fadespeed').val(ui.value);
							jQuery('#fadespeed_slider_value').text(ui.value);
						}
					});
				});
				</script>
				<span class="howto"><?php _e('Speed for fading of images. Lower number for quicker fading of images.', 'slideshow-gallery'); ?> <small><?php _e('(Default: 10, Recommended: 1-20)', 'slideshow-gallery'); ?><br/></small></span>
			</td>
		</tr>
	</tbody>
</table>

<h3><?php _e('Navigation (Previous/Next)', 'slideshow-gallery'); ?></h3>
<table class="form-table">
	<tbody>
		<tr>
			<th><label for="shownav_Y"><?php _e('Show Image Navigation', 'slideshow-gallery'); ?></label>
			<?php echo $this -> Html -> help(__('Turn this on to show the Next and Previous arrows on either sides of the slideshow for the user to navigate through slides. Once turned on, you can set the opacity of these navigation arrows below.', 'slideshow-gallery')); ?></th>
			<td>
				<label><input <?php echo ($this -> get_option('shownav') == "Y") ? 'checked="checked"' : ''; ?> onclick="jQuery('#shownavdiv').show();" type="radio" name="shownav" value="Y" id="shownav_Y" /> <?php _e('Yes', 'slideshow-gallery'); ?></label>
				<label><input <?php echo ($this -> get_option('shownav') == "N") ? 'checked="checked"' : ''; ?> onclick="jQuery('#shownavdiv').hide();" type="radio" name="shownav" value="N" id="shownav_N" /> <?php _e('No', 'slideshow-gallery'); ?></label>
				<span class="howto"><?php _e('Show next/previous buttons on the image for navigation purposes?', 'slideshow-gallery'); ?></span>
			</td>
		</tr>
	</tbody>
</table>

<div id="shownavdiv" style="display:<?php echo ($this -> get_option('shownav') == "Y") ? 'block' : 'none'; ?>;">
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="navopacity"><?php _e('Navigation Default Opacity', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('The default state opacity of the left/right navigation arrows. This is a percentage value and you can specify anything between 0% and 100% as needed.', 'slideshow-gallery')); ?></th>
				<td>
					<input type="hidden" name="navopacity" value="<?php echo esc_attr($navopacity); ?>" id="navopacity" style="width:45px;" />
					<div id="navopacity_slider"></div>
					<span class="slider-value" id="navopacity_slider_value"><?php echo (empty($navopacity)) ? 0 : esc_attr($navopacity); ?></span>
					<script type="text/javascript">
					jQuery(document).ready(function() {
						jQuery('#navopacity_slider').slider({
							min: 0, 
							max: 100,
							value: <?php echo (empty($navopacity)) ? 0 : esc_attr($navopacity); ?>,
							slide: function(event, ui) {
								jQuery('#navopacity').val(ui.value);
								jQuery('#navopacity_slider_value').text(ui.value);
							}
						});
					});
					</script>
					
					<span class="howto"><?php _e('Opacity of the next/previous buttons by default.', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="navhover"><?php _e('Navigation Hover Opacity', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('The hover state opacity of the left/right navigation arrows. This is the opacity when the user hovers with the mouse cursor over the arrow image. Percentage value between 0% and 100%', 'slideshow-gallery')); ?></th>
				<td>
					<input type="hidden" name="navhover" value="<?php echo esc_attr($navhover); ?>" id="navhover" style="width:45px;" />
					<div id="navhover_slider"></div>
					<span class="slider-value" id="navhover_slider_value"><?php echo (empty($navhover)) ? 0 : esc_attr($navhover); ?></span>
					<script type="text/javascript">
					jQuery(document).ready(function() {
						jQuery('#navhover_slider').slider({
							min: 0, 
							max: 100,
							value: <?php echo (empty($navhover)) ? 0 : $navhover; ?>,
							slide: function(event, ui) {
								jQuery('#navhover').val(ui.value);
								jQuery('#navhover_slider_value').text(ui.value);
							}
						});
					});
					</script>
					<span class="howto"><?php _e('Opacity of the next/previous buttons when they are hovered.', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<h3><?php _e('Information Bar', 'slideshow-gallery'); ?></h3>

<table class="form-table">
	<tbody>
		<tr>
			<th><label for="informationY"><?php _e('Show Information', 'slideshow-gallery'); ?></label>
			<?php echo $this -> Html -> help(__('Should the information bar be shown on slides? Turn this on to show a bar on each slide with the title and description of the slide.', 'slideshow-gallery')); ?></th>
			<td>
				<label><input onclick="jQuery('#information_div').show();" <?php echo ($this -> get_option('information') == "Y") ? 'checked="checked"' : ''; ?> type="radio" name="information" value="Y" id="informationY" /> <?php _e('Yes', 'slideshow-gallery'); ?></label>
				<label><input onclick="jQuery('#information_div').hide();" <?php echo ($this -> get_option('information') == "N") ? 'checked="checked"' : ''; ?> type="radio" name="information" value="N" id="informationN" /> <?php _e('No', 'slideshow-gallery'); ?></label>
				<span class="howto"><?php _e('Should the information bar be shown on slides?', 'slideshow-gallery'); ?></span>
			</td>
		</tr>
	</tbody>
</table>

<div id="information_div" style="display:<?php echo ($this -> get_option('information') == "Y") ? 'block' : 'none'; ?>;">
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="infopositionbottom"><?php _e('Information Bar Position', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('With the Information Bar turned on with the setting above, you can now specify the position of the information bar. Either above or below the slideshow is available.', 'slideshow-gallery')); ?></th>
				<td>
					<label><input <?php echo ($this -> get_option('infoposition') == "top") ? 'checked="checked"' : ''; ?> type="radio" name="infoposition" value="top" id="infopositiontop" /> <?php _e('Top', 'slideshow-gallery'); ?></label>
					<label><input <?php echo ($this -> get_option('infoposition') == "bottom") ? 'checked="checked"' : ''; ?> type="radio" name="infoposition" value="bottom" id="infopositionbottom" /> <?php _e('Bottom', 'slideshow-gallery'); ?></label>
					<span class="howto"><?php _e('Choose your preferred position of the information bar relative to the slideshow.', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
			<?php /*<tr>
				<th><label for="infoheadingcontent"><?php _e('Information Content', 'slideshow-gallery'); ?></label></th>
				<td>
					<label><input type="radio" name="infoheadingcontent" value="title" id="infoheadingcontent_title" /> <?php _e('Image Title', 'slideshow-gallery'); ?></label>
					<label><input type="radio" name="infoheadingcontent" value="caption" id="infoheadingcontent_caption" /> <?php _e('Image Caption', 'slideshow-gallery'); ?></label>
				</td>
			</tr>*/ ?>
			<tr>
				<th><label for="infoonhover"><?php _e('Show Only On Hover', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('Checking this option will only show the information bar on hover', 'slideshow-gallery')); ?></th>
				<td>
					<label><input onclick="if (jQuery(this).is(':checked')) { jQuery('#infoonhover_div').hide(); } else { jQuery('#infoonhover_div').show(); }" <?php echo (!empty($infoonhover)) ? 'checked="checked"' : ''; ?> type="checkbox" name="infoonhover" value="1" id="infoonhover" /> <?php _e('Yes, only show the info bar on hover', 'slideshow-gallery'); ?></label>
					<span class="howto"><?php _e('Tick/check this to only show the information bar on hover.', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
		</tbody>
	</table>

	<div id="infoonhover_div" style="display:<?php echo (empty($infoonhover)) ? 'block' : 'none'; ?>;">	
		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="infodelay"><?php _e('Information Delay', 'slideshow-gallery'); ?></label></th>
					<td>
						<label><input <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> class="widefat" style="width:65px;" type="text" name="infodelay" value="<?php echo esc_attr(wp_unslash($infodelay)); ?>" id="infodelay" /> <?php _e('seconds', 'slideshow-gallery'); ?> <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></label>
						<span class="howto"><?php _e('Delay the information bar in seconds or leave empty/zero for immediate display.', 'slideshow-gallery'); ?></span>
					</td>
				</tr>
				<tr>
					<th><label for="infofade"><?php _e('Fade Information Bar', 'slideshow-gallery'); ?></label>
					<?php echo $this -> Html -> help(__('Fade the information bar after a few seconds.', 'slideshow-gallery')); ?></th>
					<td>
						<label><input <?php echo (!empty($infofade)) ? 'checked="checked"' : ''; ?> onclick="if (jQuery(this).is(':checked')) { jQuery('#informationfade_div').show(); } else { jQuery('#informationfade_div').hide(); }"type="checkbox" name="infofade" value="1" id="infofade" /> <?php _e('Yes, fade the information bar', 'slideshow-gallery'); ?></label>
						<span class="howto"><?php _e('Do you want the information bar to fade?', 'slideshow-gallery'); ?></span>
					</td>
				</tr>
			</tbody>
		</table>
		
		<div id="informationfade_div" style="display:<?php echo (!empty($infofade)) ? 'block' : 'none'; ?>;">
			<table class="form-table">
				<tbody>
					<tr>
						<th><label for="infofadedelay"><?php _e('Fade Delay', 'slideshow-gallery'); ?></label></th>
						<td>
							<label><input class="widefat" style="width:65px;" type="text" name="infofadedelay" value="<?php echo esc_attr(wp_unslash($infofadedelay)); ?>" id="infofadedelay" /> <?php _e('seconds', 'slideshow-gallery'); ?></label>
							<span class="howto"><?php _e('Enter time in seconds for the information bar to fade.', 'slideshow-gallery'); ?></span>
						</td>
					</tr>	
				</tbody>
			</table>
		</div>
	</div>
	
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="infospeed"><?php _e('Information Speed', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('Specify the speed at which the information bar will slide up and down as the slide is shown and hidden.', 'slideshow-gallery')); ?></th>
				<td>
					<input type="hidden" style="width:45px;" name="infospeed" value="<?php echo esc_attr($infospeed); ?>" id="infospeed" />
					<div id="infospeed_slider"></div>
					<span class="slider-value" id="infospeed_slider_value"><?php echo (empty($infospeed)) ? 0 : esc_attr($infospeed); ?></span>
					<script type="text/javascript">
					jQuery(document).ready(function() {
						jQuery('#infospeed_slider').slider({
							min: 1, 
							max: 20,
							value: <?php echo (empty($infospeed)) ? 0 : esc_attr($infospeed); ?>,
							slide: function(event, ui) {
								jQuery('#infospeed').val(ui.value);
								jQuery('#infospeed_slider_value').text(ui.value);
							}
						});
					});
					</script>
					<span class="howto"><?php _e('Speed at which the information bar will slide in and out.', 'slideshow-gallery'); ?></span>
				</td>
			</tr>	
			<tr>
				<th><label for="infohideonmobile"><?php _e('Hide On Mobiles', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('With a responsive layout turned on, the slideshow will respond in width on mobile devices and the information bar tends to overlap the entire slide since it increases in height as it reduces in width. You can tick/check this setting to hide the information bar on mobile devices so that the slides remain fully visible.', 'slideshow-gallery')); ?></th>
				<td>
					<label><input <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> <?php echo (!empty($infohideonmobile) && $this -> ci_serial_valid()) ? 'checked="checked"' : ''; ?> type="checkbox" name="infohideonmobile" value="1" id="infohideonmobile" /> <?php _e('Yes, hide the information bar on mobiles', 'slideshow-gallery'); ?> <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></label>
					<span class="howto"><?php _e('Tick/check this to hide the information bar on mobiles', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<h3><?php _e('Thumbnails Bar/Slider', 'slideshow-gallery'); ?></h3>

<table class="form-table">
	<tbody>
		<tr>
			<th><label for="thumbnailsN"><?php _e('Show Thumbnails', 'slideshow-gallery'); ?></label>
			<?php echo $this -> Html -> help(__('Would you like to show a thumbnail bar/slider above/below the slideshow with the thumbnails of all the slides in the slideshow for easier navigation?', 'slideshow-gallery')); ?></th>
			<td>
				<label><input onclick="jQuery('#thumbnails_div').show();" <?php echo ($this -> get_option('thumbnails') == "Y") ? 'checked="checked"' : ''; ?> type="radio" name="thumbnails" value="Y" id="thumbnailsY" /> <?php _e('Yes', 'slideshow-gallery'); ?></label>
				<label><input onclick="jQuery('#thumbnails_div').hide();" <?php echo ($this -> get_option('thumbnails') == "N") ? 'checked="checked"' : ''; ?> type="radio" name="thumbnails" value="N" id="thumbnailsN" /> <?php _e('No', 'slideshow-gallery'); ?></label>
				<span class="howto"><?php _e('Should the thumbnails bar be shown for slides?', 'slideshow-gallery'); ?></span>
			</td>
		</tr>
	</tbody>
</table>

<div id="thumbnails_div" style="display:<?php echo ($this -> get_option('thumbnails') == "Y") ? 'block' : 'none'; ?>;">
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="thubmpositionbottom"><?php _e('Thumbnails Position', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('With the thumbnails turned on with the setting above, you can now specify the position of the thumbnail bar/slider. Either above or below the slideshow is available.', 'slideshow-gallery')); ?></th>
				<td>
					<label><input <?php echo ($this -> get_option('thumbposition') == "top") ? 'checked="checked"' : ''; ?> type="radio" name="thumbposition" value="top" id="thumbpositiontop" /> <?php _e('Top', 'slideshow-gallery'); ?></label>
					<label><input <?php echo ($this -> get_option('thumbposition') == "bottom") ? 'checked="checked"' : ''; ?> type="radio" name="thumbposition" value="bottom" id="thumbpositionbottom" /> <?php _e('Bottom', 'slideshow-gallery'); ?></label>
					<span class="howto"><?php _e('Choose your preferred position of the thumbnails bar relative to the slideshow images.', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="thumbheight"><?php _e('Thumbnail Dimensions', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('Specify the width and height (dimensions) of the thumbnails in the thumbnail bar/slider which will show above/below the slideshow.', 'slideshow-gallery')); ?></th>
				<td>
					<input class="widefat" style="width:45px;" type="text" name="thumbwidth" value="<?php echo esc_attr(wp_unslash($this -> get_option('thumbwidth'))); ?>" id="thumbwidth" /> 
					<?php _e('x <!-- by -->', 'slideshow-gallery'); ?>
					<input class="widefat" style="width:45px;" type="text" name="thumbheight" value="<?php echo esc_attr(wp_unslash($this -> get_option('thumbheight'))); ?>" id="thumbheight" />
					<?php _e('px <!-- pixels -->', 'slideshow-gallery'); ?>
					<span class="howto"><?php _e('Width and height of the thumbnails for the slides.', 'slideshow-gallery'); ?><br/>
					<?php _e('You may leave the height empty (not the width) to crop proportionally.', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="thumbopacity"><?php _e('Thumbnail Opacity', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('The opacity of the default state of thumbnails in the thumbnails bar/slider. The active thumbnail of the currently showing slide will be 100% opacity, always.', 'slideshow-gallery')); ?></th>
				<td>
					<input style="width:45px;" type="hidden" name="thumbopacity" value="<?php echo esc_attr($thumbopacity); ?>" id="thumbopacity" />
					<div id="thumbopacity_slider"></div>
					<span class="slider-value" id="thumbopacity_slider_value"><?php echo (empty($thumbopacity)) ? 0 : esc_attr($thumbopacity); ?></span>
					<script type="text/javascript">
					jQuery(document).ready(function() {
						jQuery('#thumbopacity_slider').slider({
							min: 0, 
							max: 100,
							value: <?php echo (empty($thumbopacity)) ? 0 : esc_attr($thumbopacity); ?>,
							slide: function(event, ui) {
								jQuery('#thumbopacity').val(ui.value);
								jQuery('#thumbopacity_slider_value').text(ui.value);
							}
						});
					});
					</script>
					<span class="howto"><?php _e('Default opacity of thumbnails when they are not hovered.', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="thumbscrollspeed"><?php _e('Thumbnails Scroll Speed', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('At which speed should the thumbnails bar/slider scroll when the left/right arrows are hovered by the user?', 'slideshow-gallery')); ?></th>
				<td>
					<input type="hidden" class="widefat" style="width:45px;" name="thumbscrollspeed" value="<?php echo esc_attr($thumbscrollspeed); ?>" id="thumbscrollspeed" />
					<div id="thumbscrollspeed_slider"></div>
					<span class="slider-value" id="thumbscrollspeed_slider_value"><?php echo (empty($thumbscrollspeed)) ? 0 : esc_attr($thumbscrollspeed); ?></span>
					<script type="text/javascript">
					jQuery(document).ready(function() {
						jQuery('#thumbscrollspeed_slider').slider({
							min: 1, 
							max: 20,
							value: <?php echo (empty($thumbscrollspeed)) ? 0 : esc_attr($thumbscrollspeed); ?>,
							slide: function(event, ui) {
								jQuery('#thumbscrollspeed').val(ui.value);
								jQuery('#thumbscrollspeed_slider_value').text(ui.value);
							}
						});
					});
					</script>
					<span class="howto"><?php _e('Speed at which the thumbnails will scroll.', 'slideshow-gallery'); ?> <small><?php _e('(Default:5, Recommended: 1-20)', 'slideshow-gallery'); ?></small></span>
				</td>
			</tr>
			<tr>
				<th><label for="thumbspacing"><?php _e('Thumbnail Spacing', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('This is a simple margin setting to specify the space between the thumbnails in the thumbnails bar/slider above/below the slideshow.', 'slideshow-gallery')); ?></th>
				<td>
					<input type="text" style="width:45px;" name="thumbspacing" value="<?php echo esc_attr($this -> get_option('thumbspacing')); ?>" id="thumbspacing" /> <?php _e('px', 'slideshow-gallery'); ?>
					<span class="howto"><?php _e('Horizontal margin/spacing in pixels between thumbnail images.', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="thumbhideonmobile"><?php _e('Hide On Mobile', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(__('With a responsive layout turned on, the slideshow will respond in width on mobile devices. You can tick/check this setting to hide the thumbnail bar.', 'slideshow-gallery')); ?></th>
				<td>
					<label><input <?php echo (!$this -> ci_serial_valid()) ? 'disabled="disabled"' : ''; ?> <?php echo (!empty($thumbhideonmobile) && $this -> ci_serial_valid()) ? 'checked="checked"' : ''; ?> type="checkbox" name="thumbhideonmobile" value="1" id="thumbhideonmobile" /> <?php _e('Yes, hide the thumbnail bar on mobiles', 'slideshow-gallery'); ?> <?php if (!$this -> ci_serial_valid()) { echo sprintf(__('(%s)', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Pro Version Only', 'slideshow-gallery') . '</a>'); } ?></label>
					<span class="howto"><?php _e('Tick/check this to hide the thumbnail bar on mobiles', 'slideshow-gallery'); ?></span>
				</td>
			</tr>
		</tbody>
	</table>
</div>