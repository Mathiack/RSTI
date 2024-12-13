<!-- WordPress Related Settings -->

<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$language_external = $this -> get_option('language_external');
$locale = get_locale();

?>

<table class="form-table">
	<tbody>
		<tr>
			<th><label for="language_external"><?php _e('Language External', 'slideshow-gallery'); ?></label>
			<?php echo $this -> Html -> help(sprintf(__('By default, the plugin loads language file from %s. By turning this on, you can host your language file outside the plugin and place it inside %s. Name the language file %s', 'slideshow-gallery'), '<code>wp-content/plugins/' . $this -> plugin_name . '/languages/</code>', '<code>wp-content/languages/' . $this -> plugin_name . '/</code>', '<code>' . $this -> plugin_name . '-' . $locale . '.mo</code>')); ?></th>
			<td>
				<label><input <?php echo (!empty($language_external)) ? 'checked="checked"' : ''; ?> type="checkbox" name="language_external" value="1" id="language_external" /> <?php _e('Yes, load external language file', 'slideshow-gallery'); ?></label>
				<span class="howto"><?php echo sprintf(__('Turn this on to load language file from %s named %s', 'slideshow-gallery'), '<code>wp-content/languages/' . $this -> plugin_name . '/</code>', '<code>' . $this -> plugin_name . '-' . $locale . '.mo</code>'); ?></span>
			</td>
		</tr>
	</tbody>
</table>

<!-- Permissions -->

<?php

global $wp_roles;
$permissions = $this -> get_option('permissions');

?>

<?php if (current_user_can('edit_users') || is_super_admin()) : ?>
	<table class="form-table">
		<thead>
			<tr>
				<th>&nbsp;</th>
    			<?php foreach ($wp_roles -> role_names as $role_key => $role_name) : ?>
    				<th style="white-space:nowrap; font-weight:bold; text-align:center;">
    					<label>
    						<?php if ($role_key != "administrator") : ?><input type="checkbox" name="sectionsrolescheckall<?php echo esc_attr($role_key); ?>" value="1" id="sectionsrolescheckall<?php echo esc_attr($role_key); ?>" onclick="jqCheckAll(this, false, 'permissions[<?php echo esc_attr($role_key); ?>]');" /><?php endif; ?>
							<?php echo esc_html($role_name); ?>
    					</label>
    				</th>	
    			<?php endforeach; ?>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($this -> sections)) : ?>
				<?php foreach ($this -> sections as $section_key => $section_name) : ?>
					<?php if ($section_key != "about" && $section_key != "welcome") : ?>
						<tr class="<?php echo $class = (empty($class)) ? 'arow' : ''; ?>">
							<th style="white-space:nowrap; text-align:right;"><?php echo $this -> Html -> section_name($section_key); ?></th>
							<?php foreach ($wp_roles -> role_names as $role_key => $role_name) : ?>
								<td style="text-align:center;">
									<input <?php echo ($role_key == "administrator") ? 'checked="checked" disabled="disabled"' : ''; ?> <?php echo (!empty($permissions[$role_key]) && in_array($section_key, $permissions[$role_key])) ? 'checked="checked"' : ''; ?> type="checkbox" name="permissions[<?php echo $role_key; ?>][]" value="<?php echo esc_attr($section_key); ?>" id="" />
								</td>
							<?php endforeach; ?>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
<?php endif; ?>