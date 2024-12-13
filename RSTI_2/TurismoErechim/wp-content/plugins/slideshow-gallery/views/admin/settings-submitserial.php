<div class="wrap slideshow">
	<h1><?php _e('Submit Serial Key', 'slideshow-gallery'); ?></h1>
	
	<p>
		<?php _e('Please submit a serial key in the form below.', 'slideshow-gallery'); ?><br/>
		<?php echo sprintf(__('You can obtain the serial key from your %s.', 'slideshow-gallery'), '<a href="https://tribulant.com/downloads/" target="_blank">' . __('downloads section', 'slideshow-gallery') . '</a>'); ?><br/>
	</p>
	
	<?php $this -> render('error', array('errors' => $errors), true, 'admin'); ?>
	
	<form action="?page=<?php echo esc_url($this -> sections -> submitserial); ?>" method="post">
		<?php wp_nonce_field($this -> sections -> submitserial); ?>
		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="serial"><?php _e('Serial Key', 'slideshow-gallery'); ?></label></th>
					<td>
						<input style="width:320px;" class="widefat" type="text" name="serial" value="<?php echo esc_attr(wp_unslash($_POST['serial'])); ?>" id="serial" />
					</td>
				</tr>
			</tbody>
		</table>
	
		<p class="submit">
			<button type="submit" class="button button-primary" name="submit" value="1">
				<i class="fa fa-check fa-fw"></i> <?php _e('Submit Serial Key', 'slideshow-gallery'); ?>
			</button>
		</p>
	</form>
</div>