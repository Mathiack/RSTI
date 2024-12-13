<!--<div class="wrap slideshow <?php echo esc_url($this -> pre); ?>">
	<h2><?php _e('Check for Updates', 'slideshow-gallery'); ?></h2>
	
	<?php
	
	/*$update = $this -> vendor('update');
	$update_info = $update -> get_version_info();
	
	if (version_compare($this -> version, $update_info['version']) < 0) {		
		$this -> render('update', array('update_info' => $update_info), true, 'admin'); ?>
		
		<p><a href="https://tribulant.com" target="_blank"><img src="<?php echo esc_url($this -> render_url('images/logo.png', 'admin', false)); ?>" alt="tribulant" /></a></p>
		
		<?php $changelog = $update -> get_changelog(); ?>
		<div style="margin:10px 0; padding: 10px 20px; border:1px solid #ccc; border-radius:4px; moz-border-radius:4px; webkit-border-radius:4px;">
			<?php echo esc_url($changelog); ?>
		</div>
					
		<?php
	} else {
		?>

		<div class="updated"><p><i class="fa fa-check"></i> <?php _e('Your version of the Slideshow Gallery plugin is up to date.', 'slideshow-gallery'); ?></p></div>
		
		<?php if ($raw_response = get_transient('slideshow_update_info')) : ?>
			<?php if (!empty($raw_response['headers']['date'])) : ?>
				<p><?php echo sprintf(__('Last checked on <b>%s</b>', 'slideshow-gallery'), get_date_from_gmt(date("Y-m-d H:i:s", strtotime($raw_response['headers']['date'])), get_option('date_format') . ' ' . get_option('time_format'))); ?></p>
				<p><a href="?page=<?php echo esc_url($this -> sections -> settings_updates); ?>&amp;method=check" class="button-primary"><i class="fa fa-history fa-fw"></i> <?php _e('Check Again', 'slideshow-gallery'); ?></a>
				<?php echo esc_url($this -> Html -> help(__('The plugin checks for new versions every 24 hours. If you want to check right now, click the "Check Again" button in order to do so.', 'slideshow-gallery'))); ?></p>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php
	}*/
	
	?>
</div>-->