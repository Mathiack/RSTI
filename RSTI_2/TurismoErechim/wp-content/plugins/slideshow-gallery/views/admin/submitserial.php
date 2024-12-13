<?php
	
$update = $this -> vendor('update');
$version_info = $update -> get_version_info();
	
?>

<h3><?php _e('Slideshow Gallery Serial Key', 'slideshow-gallery'); ?></h3>

<?php if (empty($success) || $success == false) : ?>
	<?php if (!$this -> ci_serial_valid()) : ?>
        <p style="width:400px;">
        	<?php _e('You are running Slideshow Gallery LITE.', 'slideshow-gallery'); ?>
        	<?php echo sprintf(__('To remove limits, you can submit a serial key or %s.'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">' . __('Upgrade to PRO', 'slideshow-gallery') . '</a>'); ?>
        </p>
        <p style="width:400px;">
	        <?php _e('Please obtain a serial key from the downloads section in your Tribulant account.', 'slideshow-gallery'); ?>
	        <?php _e('Once in the downloads section, click the KEY icon to request a serial key.', 'slideshow-gallery'); ?>
	        <a href="https://tribulant.com/downloads/" title="Tribulant Downloads" target="_blank"><?php _e('Downloads Section', 'slideshow-gallery'); ?></a>
        </p>
    
        <div class="slideshow_error">
            <?php $this -> render('error', array('errors' => $errors), true, 'admin'); ?>
        </div>
        
        <form onsubmit="slideshow_submitserial(this); return false;" action="<?php echo admin_url('admin.php?page=' . $this -> sections -> submitserial); ?>" method="post">
	        <?php wp_nonce_field($this -> sections -> submitserial); ?>
            <p>
	            <input type="text" class="widefat" style="width:400px;" name="serialkey" value="<?php echo esc_attr(wp_unslash($_POST['serialkey'])); ?>" /><br/>
            </p>
            <p class="submit">
            	<button type="button" class="button-secondary" name="close" onclick="jQuery.colorbox.close();" value="1">
            		<i class="fa fa-times fa-fw"></i> <?php _e('Cancel', 'slideshow-gallery'); ?>
            	</button>
            	<button id="slideshow_submitserial_button" type="submit" class="button-primary" name="submit" value="1">
            		<i class="fa fa-check fa-fw"></i> <?php _e('Submit Serial Key', 'slideshow-gallery'); ?>
            		<span style="display:none;" id="slideshow_submitserial_loading"><i class="fa fa-refresh fa-spin fa-fw"></i></span>
            	</button>
            </p>
        </form>        
    <?php else : ?>
        <p><?php _e('Serial Key:', 'slideshow-gallery'); ?> <strong><?php echo esc_html($this -> get_option('serialkey')); ?></strong></p>
        <p><?php _e('Your current serial is valid and working.', 'slideshow-gallery'); ?></p>
        
        <?php if (!empty($version_info['dtype']) && $version_info['dtype'] == "single") : ?>
        	<h2><?php _e('Upgrade to Unlimited', 'slideshow-gallery'); ?></h2>
        	<p><?php _e('You can upgrade one or more single domain licenses to an unlimited domains license.', 'slideshow-gallery'); ?>
        	<br/><?php _e('You only pay the difference.', 'slideshow-gallery'); ?></p>
        	<p>
	        	<a class="button" href="https://tribulant.com/items/upgrade/<?php echo esc_html($version_info['item_id']); ?>" target="_blank"><i class="fa fa-level-up fa-fw"></i> <?php _e('Upgrade Now', 'slideshow-gallery'); ?></a>
        	</p>
        <?php endif; ?>
        
        <p>
        	<button type="button" onclick="jQuery.colorbox.close();" name="close" class="button-primary" value="1">
        		<i class="fa fa-times fa-fw"></i> <?php _e('Close', 'slideshow-gallery'); ?>
        	</button>
        	<button id="slideshow_deleteserial_button" type="button" onclick="if (confirm('<?php _e('Are you sure you want to delete your serial key?', 'slideshow-gallery'); ?>')) { slideshow_deleteserial(); } return false;" name="delete" class="button-secondary" value="1">
        		<i class="fa fa-trash fa-fw"></i> <?php _e('Delete Serial', 'slideshow-gallery'); ?>
        		<span style="display:none;" id="slideshow_submitserial_loading"><i class="fa fa-refresh fa-spin fa-fw"></i></span>
        	</button>
        </p>
    <?php endif; ?>
<?php else : ?>
    <p><?php _e('The serial key is valid and you can now continue using the Slideshow Gallery plugin. Thank you for your business and support!', 'slideshow-gallery'); ?></p>
    <p>
	    <button type="button" onclick="jQuery.colorbox.close(); parent.location = '<?php echo rtrim(get_admin_url(), '/'); ?>/admin.php?page=<?php echo esc_html($this -> sections -> slides); ?>';" class="button-primary" name="close" value="1">
	    	<i class="fa fa-check fa-fw"></i> <?php _e('Apply Serial and Close Window', 'slideshow-gallery'); ?>
	    </button>
	</p>
<?php endif; ?>