<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly	
	
?>

<div style="text-align:center;">
	<h4><a href="https://wordpress.org/plugins/newsletters-lite/" target="_blank">WordPress Newsletter plugin</a></h4>
	<p>
		<a href="https://wordpress.org/plugins/newsletters-lite/" target="_blank"><img style="width:200px; height:auto;" width="200" src="<?php echo esc_url($this -> url()); ?>/images/plugins/newsletters.png" alt="newsletters" /></a>
	</p>
	<p>
		Get the WordPress Newsletter plugin today. It is a FREE plugin which can be installed by clicking the button below.
	</p>
	<p>
		<div class="plugin-install-newsletters">
			<?php $installed = ($this -> is_plugin_active('wp-mailinglist/wp-mailinglist.php', true) || $this -> is_plugin_active('newsletters-lite/wp-mailinglist.php', true)); ?>
			<button <?php echo (!empty($installed)) ? 'disabled="disabled"' : ''; ?> type="button" class="install-now button button-primary button-large" href="<?php echo wp_nonce_url(admin_url('plugin-install.php?tab=plugin-information&plugin=newsletters-lite&TB_iframe=true&width=640&height=591')); ?>">
				<?php if (!empty($installed)) : ?>
					<i class="fa fa-check fa-fw"></i> <?php _e('Installed', 'slideshow-gallery'); ?>
				<?php else : ?>
					<i class="fa fa-check fa-fw"></i> <?php _e('Install Now', 'slideshow-gallery'); ?>
				<?php endif; ?>
			</button>
			<a class="button button-secondary button-large" href="https://wordpress.org/plugins/newsletters-lite/" target="_blank"><i class="fa fa-info-circle"></i> <?php _e('More Info', 'slideshow-gallery'); ?></a>
		</div>
	</p>
</div>