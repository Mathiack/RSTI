<!-- Top Update Notice -->

<?php delete_transient('slideshow_update_info'); ?>

<?php $upgrade_url = wp_nonce_url('update.php?action=upgrade-plugin&amp;plugin=' . urlencode($this -> plugin_file), 'upgrade-plugin_' . $this -> plugin_file); ?>
<?php if ($this -> ci_serial_valid()) : ?>
	<?php if (!empty($update_info) && $update_info['is_valid_key'] == "1") : ?>		
		<div class="update-nag slideshow-update-nag-wrapper">
			<span class="slideshow-update-nag"></span> <?php echo sprintf(esc_html__('%s plugin %s is available.', 'slideshow-gallery'), 'Slideshow Gallery', $update_info['version']); ?><br/>
			<?php _e('You can update automatically or download to install manually.', 'slideshow-gallery'); ?>
			<br/><br/>
			<a href="<?php echo esc_url($upgrade_url); ?>" title="" class="button-primary"><i class="fa fa-magic"></i> <?php _e('Update Automatically', 'slideshow-gallery'); ?></a>
			<a target="_blank" href="<?php echo esc_url($update_info['url']); ?>" title="" class="button-secondary"><i class="fa fa-download"></i> <?php _e('Download', 'slideshow-gallery'); ?></a>
			<a style="color:black; text-decoration:none;" href="<?php echo admin_url('admin.php'); ?>?page=<?php echo esc_html($this -> sections -> settings_updates); ?>&amp;method=check" class="button button-secondary"><i class="fa fa-history fa-fw"></i> <?php _e('Check Again', 'slideshow-gallery'); ?></a>
			<?php if (empty($_GET['page']) || (!empty($_GET['page']) && $_GET['page'] != $this -> sections -> settings_updates)) : ?>
				<a class="button" href="<?php echo admin_url('admin.php?page=' . $this -> sections -> settings_updates); ?>"><i class="fa fa-list-ul"></i> <?php _e('Changelog', 'slideshow-gallery'); ?></a>
				<a href="?slideshow_method=hideupdate&version=<?php echo esc_html($update_info['version']); ?>" class="" style="position: absolute; top: 0; right: 0; margin: 10px 10px 0 0;"><i class="fa fa-times"></i></a>
			<?php endif; ?>
		</div>
	<?php else : ?>
		<div class="update-nag slideshow-update-nag-wrapper">
			<span class="slideshow-update-nag"></span> <?php echo sprintf(esc_html__('%s plugin %s is available.', 'slideshow-gallery'), 'Slideshow Gallery', $update_info['version']); ?><br/>
			<?php _e('Unfortunately your download has expired, please renew to gain access.', 'slideshow-gallery'); ?>
			<br/><br/>
			<a style="color:white; text-decoration:none;" href="<?php echo esc_url($update_info['url']); ?>" target="_blank" title="" class="button button-primary"><?php _e('Renew Now', 'slideshow-gallery'); ?></a>
			<a style="color:black; text-decoration:none;" href="<?php echo admin_url('admin.php'); ?>?page=<?php echo esc_html($this -> sections -> settings_updates); ?>&amp;method=check" class="button button-secondary"><i class="fa fa-history fa-fw"></i> <?php _e('Check Again', 'slideshow-gallery'); ?></a>
			<?php if (empty($_GET['page']) || (!empty($_GET['page']) && $_GET['page'] != $this -> sections -> settings_updates)) : ?>
				<a class="button" href="<?php echo admin_url('admin.php?page=' . $this -> sections -> settings_updates); ?>"><i class="fa fa-list-ul"></i> <?php _e('Changelog', 'slideshow-gallery'); ?></a>
				<a href="?slideshow_method=hideupdate&version=<?php echo esc_html($update_info['version']); ?>" class="" style="position: absolute; top: 0; right: 0; margin: 10px 10px 0 0;"><i class="fa fa-times"></i></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>
<?php else : ?>
	<div class="update-nag slideshow-update-nag-wrapper">
		<span class="slideshow-update-nag"></span> <?php echo sprintf(esc_html__('%s plugin %s is available.', 'slideshow-gallery'), 'Slideshow Gallery', $update_info['version']); ?><br/>
		<?php _e('You can update automatically or download to install manually.', 'slideshow-gallery'); ?>
		<br/><br/>
		<a href="<?php echo esc_url($upgrade_url); ?>" title="" class="button-primary"><i class="fa fa-magic"></i> <?php _e('Update Automatically', 'slideshow-gallery'); ?></a>
		<a target="_blank" href="https://wordpress.org/plugins/slideshow-gallery/" title="" class="button-secondary"><i class="fa fa-download"></i> <?php _e('Download', 'slideshow-gallery'); ?></a>
		<a style="color:black; text-decoration:none;" href="<?php echo admin_url('admin.php'); ?>?page=<?php echo esc_html($this -> sections -> settings_updates); ?>&amp;method=check" class="button button-secondary"><i class="fa fa-history fa-fw"></i> <?php _e('Check Again', 'slideshow-gallery'); ?></a>
		<?php if (empty($_GET['page']) || (!empty($_GET['page']) && $_GET['page'] != $this -> sections -> settings_updates)) : ?>
			<a class="button" href="<?php echo admin_url('admin.php?page=' . $this -> sections -> settings_updates); ?>"><i class="fa fa-list-ul"></i> <?php _e('Changelog', 'slideshow-gallery'); ?></a>
			<a href="?slideshow_method=hideupdate&version=<?php echo esc_attr($update_info['version']); ?>" class="" style="position: absolute; top: 0; right: 0; margin: 10px 10px 0 0;"><i class="fa fa-times"></i></a>
		<?php endif; ?>
	</div>
<?php endif; ?>