<!-- Settings Submit -->

<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$debugging = get_option('tridebugging');

?>

<div class="submitbox" id="submitpost">
	<div id="minor-publishing">
		<div id="misc-publishing-actions">
			<div class="misc-pub-section">
				<a href="<?php echo wp_nonce_url(admin_url('admin.php?page=' . $this -> sections -> settings . '&method=checkdb'), $this -> sections -> settings . '_checkdb') ; ?>"><i class="fa fas fa-database fa-fw"></i> <?php _e('Check/optimize database tables', 'slideshow-gallery'); ?></a>
			</div>
			<div class="misc-pub-section">
				<a href="<?php echo  wp_nonce_url($this -> url . '&amp;method=reset' ,  $this -> sections -> settings . '_reset'); ?>" title="<?php _e('Reset all settings to their default values', 'slideshow-gallery'); ?>" onclick="if (!confirm('<?php _e('Are you sure you wish to reset all settings?', 'slideshow-gallery'); ?>')) { return false; }"><i class="fa fas fa-refresh fa-fw"></i> <?php _e('Reset to Defaults', 'slideshow-gallery'); ?></a>
			</div>
			<div class="misc-pub-section misc-pub-section-last">
				<label><input <?php echo (!empty($debugging) && $debugging == 1) ? 'checked="checked"' : ''; ?> type="checkbox" name="debugging" value="1" id="debugging" /><i class="fa fas fa-bug fa-fw"></i> <?php _e('Turn on debugging', 'slideshow-gallery'); ?></label>
				<?php echo $this -> Html -> help(sprintf(__('Ticking/checking this setting and saving the settings will turn on debugging. It will turn on PHP error reporting and also WordPress database errors. It will help you to troubleshoot problems where something is not working as expected or a blank page is appearing. Certain things are also logged in the %s', 'slideshow-gallery'), '<a target="_blank" href="' . plugins_url() . '/' . $this -> plugin_name . '/' . basename(SLIDESHOW_LOG_FILE) . '">' . __('log file', 'slideshow-gallery') . '</a>')); ?>
				<p>
					<a target="_blank" href="<?php echo esc_attr(wp_unslash(plugins_url() . '/' . $this -> plugin_name . '/' . basename(SLIDESHOW_LOG_FILE))); ?>"><?php _e('View the log file', 'slideshow-gallery'); ?></a>
					<a onclick="if (!confirm('<?php echo esc_attr(__('Are you sure you want to clear the log file?', 'slideshow-gallery')); ?>')) { return false; }" href="<?php echo wp_nonce_url(admin_url('admin.php?page=' . $this -> sections -> settings . '&method=clearlog'), $this -> sections -> settings . '_clearlog'); ?>" class="slideshow_error"><i class="fa fa-times fa-fw"></i></a>
				</p>
			</div>
		</div>
	</div>
	<div id="major-publishing-actions">
		<div id="publishing-action">
			<button class="button-primary button button-large" type="submit" name="save" value="1">
				<i class="fa fa-check fa-fw"></i> <?php _e('Save Settings', 'slideshow-gallery'); ?>
			</button>
		</div>
		<br class="clear" />
	</div>
</div>