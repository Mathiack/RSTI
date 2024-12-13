<!-- Save a Slide -->

<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly

$showinfo = null;
$expiry = null;
$id = null;
$order = null;
$title = null;
$description = null;
$type = null;
$image_url = null;
$attachment_id = null;
$uselink = null;
$link = null;

if (is_object($this->Slide()->data)) {
    $showinfo = $this -> Slide() -> data -> showinfo;
    $expiry = $this -> Slide() -> data -> expiry;
    $id = $this -> Slide() -> data -> id;
    $order = $this -> Slide() -> data -> order;
    $title = $this -> Slide() -> data -> title;
    $description = $this -> Slide() -> data -> description;
    $type = $this -> Slide() -> data -> type;
    $image_url = $this -> Slide() -> data -> image_url;
    $attachment_id = $this -> Slide() -> data -> attachment_id;
    $uselink = $this -> Slide() -> data -> uselink;
    $link = $this -> Slide() -> data -> link;
}

if ($this -> language_do()) {
	$languages = $this -> language_getlanguages();
}

?>

<div class="wrap <?php echo esc_url($this -> pre); ?> slideshow-gallery slideshow">
	<h1><?php _e('Save a Slide', 'slideshow-gallery'); ?></h1>
	
	<form action="<?php echo esc_url($this -> url); ?>&amp;method=save" method="post" enctype="multipart/form-data">
		<?php wp_nonce_field($this -> sections -> slides . '_save'); ?>
		
		<input type="hidden" name="Slide[id]" value="<?php echo esc_attr($id); ?>" />
		<input type="hidden" name="Slide[order]" value="<?php echo esc_attr($order); ?>" />
	
		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="Slide.title"><?php _e('Title', 'slideshow-gallery'); ?></label>
					<?php echo $this -> Html -> help(__('This title is for your reference in management and it will also be used to display the title of the slide in the information bar if you have that turned on.', 'slideshow-gallery')); ?></th>
					<td>
						<?php if ($this -> language_do()) : ?>
							<?php $titles = $this -> language_split($title); ?>
							<div id="slide-title-tabs">
								<ul>
									<?php foreach ($languages as $language) : ?>
										<li><a href="#slide-title-tabs-<?php echo esc_attr($language); ?>"><?php echo esc_html($this -> language_flag($language)); ?></a></li>
									<?php endforeach; ?>
								</ul>
								<?php foreach ($languages as $language) : ?>
									<div id="slide-title-tabs-<?php echo esc_attr($language); ?>">
										<input type="text" name="Slide[title][<?php echo esc_attr($language); ?>]" id="Slide_title_<?php echo esc_attr($language); ?>" value="<?php echo esc_attr(wp_unslash($titles[$language])); ?>" class="widefat" />
									</div>
								<?php endforeach; ?>
							</div>
							
							<script type="text/javascript">
							jQuery(document).ready(function() {
								jQuery('#slide-title-tabs').tabs();
							});
							</script>
						<?php else : ?>
							<input class="widefat" type="text" name="Slide[title]" value="<?php echo esc_attr(wp_unslash($title)); ?>" id="Slide.title" />
						<?php endif; ?>
                        <span class="howto"><?php _e('Title/name of your slide as it will be displayed to your users.', 'slideshow-gallery'); ?></span>
						<?php echo (!empty($this -> Slide() -> errors['title'])) ? '<div class="slideshow_error">' . $this -> Slide() -> errors['title'] . '</div>' : ''; ?>
					</td>
				</tr>
				<tr>
					<th><label for="Slide.description"><?php _e('Description', 'slideshow-gallery'); ?></label>
					<?php echo $this -> Html -> help(__('The description is specifically used for the information bar if you have that turned on.', 'slideshow-gallery')); ?></th>
					<td>
						<?php if ($this -> language_do()) : ?>
							<?php $descriptions = $this -> language_split($description); ?>
							<div id="slide-description-tabs">
								<ul>
									<?php foreach ($languages as $language) : ?>
										<li><a href="#slide-description-tabs-<?php echo esc_attr($language); ?>"><?php echo esc_html($this -> language_flag($language)); ?></a></li>
									<?php endforeach; ?>
								</ul>
								<?php foreach ($languages as $language) : ?>
									<div id="slide-description-tabs-<?php echo esc_attr($language); ?>">
										<textarea name="Slide[description][<?php echo esc_attr($language); ?>]" cols="100%" class="widefat" rows="5"><?php echo esc_attr(wp_unslash($descriptions[$language])); ?></textarea>
									</div>
								<?php endforeach; ?>
							</div>
							
							<script type="text/javascript">
							jQuery(document).ready(function() {
								jQuery('#slide-description-tabs').tabs();
							});
							</script>
						<?php else : ?>
							<textarea class="widefat" rows="5" cols="100%" name="Slide[description]"><?php echo (!empty($this -> Slide() -> data -> description) ?  esc_attr($this -> Slide() -> data -> description) : ''  ); ?></textarea>
						<?php endif; ?>
                        <span class="howto"><?php _e('Description of your slide as it will be displayed to your users below the title.', 'slideshow-gallery'); ?></span>
						<?php echo (!empty($this -> Slide() -> errors['description'])) ? '<div class="slideshow_error">' . $this -> Slide() -> errors['description'] . '</div>' : ''; ?>
					</td>
				</tr>
				<tr>
					<th><label for="showinfo_both"><?php _e('Show Information?', 'slideshow-gallery'); ?></label>
					<?php echo $this -> Html -> help(__('You can choose to show both title and description, only title, only description or not show the information bar at all. Please note that this setting is only effective when the information bar is turned on in settings or via a parameter in shortcode or hardcode.', 'slideshow-gallery')); ?></th>
					<td>
						<label><input onclick="jQuery('#showinfo_div').show();" <?php echo ((empty($showinfo)) || (!empty($showinfo) && $showinfo == "both")) ? 'checked="checked"' : ''; ?> type="radio" name="Slide[showinfo]" value="both" id="showinfo_both" /> <?php _e('Both title and description', 'slideshow-gallery'); ?></label><br/>
						<label><input onclick="jQuery('#showinfo_div').show();" <?php echo (!empty($showinfo) && $showinfo == "title") ? 'checked="checked"' : ''; ?> type="radio" name="Slide[showinfo]" value="title" id="showinfo_title" /> <?php _e('Title only', 'slideshow-gallery'); ?></label><br/>
						<label><input onclick="jQuery('#showinfo_div').show();" <?php echo (!empty($showinfo) && $showinfo == "description") ? 'checked="checked"' : ''; ?> type="radio" name="Slide[showinfo]" value="description" id="showinfo_description" /> <?php _e('Description only', 'slideshow-gallery'); ?></label><br/>
						<label><input onclick="jQuery('#showinfo_div').hide();" <?php echo (!empty($showinfo) && $showinfo == "none") ? 'checked="checked"' : ''; ?> type="radio" name="Slide[showinfo]" value="none" id="showinfo_none" /> <?php _e('None, do not show', 'slideshow-gallery'); ?></label>
						<span class="howto"><?php _e('Choose how the information bar will be displayed on this slide.', 'slideshow-gallery'); ?></span>
					</td>
				</tr>
			</tbody>
		</table>
		
		<div id="showinfo_div" style="display:<?php echo (!empty($showinfo) && $showinfo != "none") ? 'block' : 'none'; ?>;">
			<table class="form-table">
				<tbody>
					<tr>
						<th><label for="iopacity"><?php _e('Info Opacity', 'slideshow-gallery'); ?></label>
						<?php echo $this -> Html -> help(__('The opacity of the information bar from 0 to 100 where 0 is transparent and 100 is opague.', 'slideshow-gallery')); ?></th>
						<td>
							<input type="text" id="iopacity" class="widefat" style="width:45px;" name="Slide[iopacity]" value="<?php echo empty($this -> Slide() -> data -> iopacity) ? '' : esc_attr(wp_unslash($this -> Slide() -> data -> iopacity)); ?>" />
							<span class="howto"><?php _e('A value between 0 and 100. Leave empty for default.', 'slideshow-gallery'); ?></span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="checkboxall"><?php _e('Galleries', 'slideshow-gallery'); ?></label>
					<?php echo $this -> Html -> help(__('You can organize/assign a slide to multiple galleries as needed. It is easy to display a slideshow with the slides of a specific gallery then.', 'slideshow-gallery')); ?></th>
					<td>
						<?php if ($galleries = $this -> Gallery() -> select()) : ?>
							<label style="font-weight:bold"><input onclick="jqCheckAll(this,'','Slide[galleries]');" type="checkbox" name="checkboxall" value="checkboxall" id="checkboxall" /> <?php _e('Select All', 'slideshow-gallery'); ?></label><br/>
							<?php foreach ($galleries as $gallery_id => $gallery_title) : ?>
								<label><input <?php echo (!empty($this -> Slide() -> data -> galleries) && in_array($gallery_id, $this -> Slide() -> data -> galleries)) ? 'checked="checked"' : ''; ?> type="checkbox" name="Slide[galleries][]" value="<?php echo esc_attr($gallery_id); ?>" id="Slide_galleries_<?php echo esc_html($gallery_id); ?>" /> <?php echo esc_html($gallery_title); ?></label><br/>
							<?php endforeach; ?>
						<?php else : ?>
							<span class="error"><?php _e('No galleries are available.', 'slideshow-gallery'); ?></span>
						<?php endif; ?>
						<span class="howto"><?php _e('Assign this slide to one or more galleries.', 'slideshow-gallery'); ?></span>
					</td>
				</tr>
                <tr>
                	<th><label for="Slide.type.media"><?php _e('Image Type', 'slideshow-gallery'); ?></label>
                	<?php echo $this -> Html -> help(__('Do you want to specify a URL to your image or upload the image file manually? Specifying a URL will still copy the image file remotely from the location to your server so uploading is recommended to prevent any restrictions or errors.', 'slideshow-gallery')); ?></th>
                    <td>
                    	<label><input onclick="jQuery('#typediv_media').show(); jQuery('#typediv_file').hide(); jQuery('#typediv_url').hide();" <?php echo (empty($type) || $type == "media") ? 'checked="checked"' : ''; ?> type="radio" name="Slide[type]" value="media" id="Slide.type.media" /> <?php _e('Media Upload', 'slideshow-gallery'); ?></label>
                    	<label><input onclick="jQuery('#typediv_file').show(); jQuery('#typediv_media').hide(); jQuery('#typediv_url').hide();" <?php echo ($type == "file") ? 'checked="checked"' : ''; ?> type="radio" name="Slide[type]" value="file" id="Slide.type.file" /> <?php _e('Upload File', 'slideshow-gallery'); ?></label>
                        <label><input onclick="jQuery('#typediv_url').show(); jQuery('#typediv_media').hide(); jQuery('#typediv_file').hide();" <?php echo ($type == "url") ? 'checked="checked"' : ''; ?> type="radio" name="Slide[type]" value="url" id="Slide.type.url" /> <?php _e('Specify URL', 'slideshow-gallery'); ?></label>
                        <?php echo (!empty($this -> Slide() -> errors['type'])) ? '<div class="slideshow_error">' . $this -> Slide() -> errors['type'] . '</div>' : ''; ?>
                        <span class="howto"><?php _e('Do you want to upload an image or specify a local/remote image URL?', 'slideshow-gallery'); ?></span>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <!-- Choose/upload file with the WordPress media uploader -->
        <div id="typediv_media" style="display:<?php echo (empty($type) || $type == "media") ? 'block' : 'none'; ?>;">
        	<table class="form-table">
        		<tbody>
        			<tr>
        				<th><label for="Slide_mediaupload"><?php _e('Choose Image', 'slideshow-gallery'); ?></label></th>
        				<td>	        				
        					<div id="Slide_mediaupload_image">
                        		<!-- image goes here -->
                        		<?php if (!empty($image_url)) : ?>
                        			<a href="<?php echo esc_url($image_url); ?>" title="<?php echo esc_attr($this -> Slide() -> data -> title); ?>" class="colorbox"><img class="img-rounded" src="<?php echo esc_url($this -> Html -> otf_image_src($this -> Slide() -> data, 100, 100, 100)); ?>" /></a>
                        		<?php endif; ?>
                        	</div>
                        
                        	<button type="button" name="Slide_mediaupload" value="1" id="Slide_mediaupload" class="button button-secondary">
                        		<i class="fa fa-image fa-fw"></i> <?php _e('Choose Image', 'slideshow-gallery'); ?>
                        	</button>
                        	<input type="text" name="Slide[media_file]" readonly="readonly" style="width:50%;" id="Slide_image_file" value="<?php echo esc_attr(wp_unslash($image_url)); ?>" />
                        	<input type="hidden" name="Slide[attachment_id]" value="<?php echo esc_attr(wp_unslash($attachment_id)); ?>" id="Slide_attachment_id" />
                        	
                        	<?php echo (!empty($this -> Slide() -> errors['media_file'])) ? '<div class="slideshow_error">' . $this -> Slide() -> errors['media_file'] . '</div>' : ''; ?>
                        	
                        	<script type="text/javascript">
                        	jQuery(document).ready(function() {
								var file_frame;
								
								jQuery('#Slide_mediaupload').on('click', function( event ){
									event.preventDefault();
									
									// If the media frame already exists, reopen it.
									if (file_frame) {
										file_frame.open();
										return;
									}
									
									// Create the media frame.
									file_frame = wp.media.frames.file_frame = wp.media({
										title: '<?php _e('Upload a slide', 'slideshow-gallery'); ?>',
										button: {
											text: '<?php _e('Select as Slide Image', 'slideshow-gallery'); ?>',
										},
										multiple: false  // Set to true to allow multiple files to be selected
									});
										
									// When an image is selected, run a callback.
									file_frame.on( 'select', function() {
										// We set multiple to false so only get one image from the uploader
										attachment = file_frame.state().get('selection').first().toJSON();
										
										// Do something with attachment.id and/or attachment.url here
										
										jQuery('#Slide_attachment_id').val(attachment.id);
										jQuery('#Slide_image_file').val(attachment.url);
										jQuery('#Slide_mediaupload_image').html('<a href="' + attachment.url + '" class="colorbox" onclick="jQuery.colorbox({href:\'' + attachment.url + '\'}); return false;"><img class="img-rounded" style="width:100px;" src="' + attachment.sizes.thumbnail.url + '" /></a>');
									});
									
									// Finally, open the modal
									file_frame.open();
								});
                        	});
                        	</script>
        				</td>
        			</tr>
        		</tbody>
        	</table>
        </div>
        
        <div id="typediv_file" style="display:<?php echo (!empty($type) && $type == "file") ? 'block' : 'none'; ?>;">
        	<table class="form-table">
            	<tbody>
                	<tr>
                    	<th><label for="Slide.image_file"><?php _e('Choose Image', 'slideshow-gallery'); ?></label>
                    	<?php echo $this -> Html -> help(__('Simply choose an image file from your computer to upload for this slide. Only .jpg, .png and .gif are supported and in rare cases .bmp but please try and prevent using .bmp files.', 'slideshow-gallery')); ?></th>
                        <td>
                        	<input type="file" name="image_file" value="" id="Slide.image_file" />
                            <span class="howto"><?php _e('Choose your image file from your computer. JPG, PNG, GIF are supported.', 'slideshow-gallery'); ?></span>
                            <?php echo (!empty($this -> Slide() -> errors['image_file'])) ? '<div class="slideshow_error">' . $this -> Slide() -> errors['image_file'] . '</div>' : ''; ?>
                            
                            <?php
							
							if (!empty($type) && $type == "file") {
								if (!empty($this -> Slide() -> data -> image)) {									
									?>
                                    
                                    <input type="hidden" name="Slide[image_oldfile]" value="<?php echo esc_attr(wp_unslash($this -> Slide() -> data -> image)); ?>" />
                                    <p><small><?php _e('Current image. Leave the field above blank to keep this image.', 'slideshow-gallery'); ?></small></p>
                                    <p><a title="<?php echo esc_attr($this -> Slide() -> data -> title); ?>" class="colorbox" href="<?php echo esc_url($this -> Slide() -> data -> image_path); ?>"><img src="<?php echo esc_url($this -> Html -> otf_image_src($this -> Slide() -> data, 100, 100, 100)); ?>" alt="" class="slideshow" /></a></p>
                                    
                                    <?php	
								}
							}
							
							?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div id="typediv_url" style="display:<?php echo ($type == "url") ? 'block' : 'none'; ?>;">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th><label for="Slide.image_url"><?php _e('Image URL', 'slideshow-gallery'); ?></label>
                        <?php echo $this -> Html -> help(__('Specify an absolute URL to an image file to use for this slide. The image will be copied from the location to your server.', 'slideshow-gallery')); ?></th>
                        <td>
                            <input class="widefat" type="text" name="Slide[image_url]" value="<?php echo esc_attr($image_url); ?>" id="Slide.image_url" />
                            <span class="howto"><?php _e('Local or remote image location eg. https://domain.com/path/to/image.jpg', 'slideshow-gallery'); ?></span>
                            <?php echo (!empty($this -> Slide() -> errors['image_url'])) ? '<div class="slideshow_error">' . $this -> Slide() -> errors['image_url'] . '</div>' : ''; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>    
                
        <table class="form-table">
        	<tbody>
				<tr>
					<th><label for="Slide_uselink_N"><?php _e('Use Link', 'slideshow-gallery'); ?></label>
					<?php echo $this -> Html -> help(__('Turn this on to specify a link/URL for this slide to link to when it is clicked.', 'slideshow-gallery')); ?></th>
					<td>
						<label><input onclick="jQuery('#Slide_uselink_div').show();" <?php echo ($uselink == "Y") ? 'checked="checked"' : ''; ?> type="radio" name="Slide[uselink]" value="Y" id="Slide_uselink_Y" /> <?php _e('Yes', 'slideshow-gallery'); ?></label>
						<label><input onclick="jQuery('#Slide_uselink_div').hide();" <?php echo (empty($uselink) || $uselink == "N") ? 'checked="checked"' : ''; ?> type="radio" name="Slide[uselink]" value="N" id="Slide_uselink_N" /> <?php _e('No', 'slideshow-gallery'); ?></label>
                        <span class="howto"><?php _e('Set this to Yes to link this slide to a link/URL of your choice.', 'slideshow-gallery'); ?></span>
					</td>
				</tr>
			</tbody>
		</table>
		
		<div id="Slide_uselink_div" style="display:<?php echo ($uselink == "Y") ? 'block' : 'none'; ?>;">
			<table class="form-table">
				<tbody>
					<tr>
						<th><label for="Slide.link"><?php _e('Link To', 'slideshow-gallery'); ?></label>
						<?php echo $this -> Html -> help(__('The absolute URL to take the user to when the slide is clicked.', 'slideshow-gallery')); ?></th>
						<td>
							<?php if ($this -> language_do()) : ?>
								<?php $links = $this -> language_split($link); ?>
								<div id="slide-link-tabs">
									<ul>
										<?php foreach ($languages as $language) : ?>
											<li><a href="#slide-link-tabs-<?php echo esc_attr($language); ?>"><?php echo esc_html($this -> language_flag($language)); ?></a></li>
										<?php endforeach; ?>
									</ul>
									<?php foreach ($languages as $language) : ?>
										<div id="slide-link-tabs-<?php echo esc_attr($language); ?>">
											<input type="text" name="Slide[link][<?php echo esc_attr($language); ?>]" id="Slide_link_<?php echo esc_attr($language); ?>" value="<?php echo esc_attr(wp_unslash($links[$language])); ?>" class="widefat" />
										</div>
									<?php endforeach; ?>
								</div>
								
								<script type="text/javascript">
								jQuery(document).ready(function() {
									jQuery('#slide-link-tabs').tabs();
								});
								</script>
							<?php else : ?>
								<input class="widefat" type="text" name="Slide[link]" value="<?php echo esc_attr($link); ?>" id="Slide.link" />
							<?php endif; ?>
							
                            <span class="howto"><?php _e('Link/URL to go to when a user clicks the slide eg. https://www.domain.com/mypage/', 'slideshow-gallery'); ?></span>
                        </td>
					</tr>
					<tr>
						<th><label for="Slide_linktarget_self"><?php _e('Link Target', 'slideshow-gallery'); ?></label>
						<?php echo $this -> Html -> help(__('Depending on the purpose of specifying this link, you may want it to open in the same window or in a new window.', 'slideshow-gallery')); ?></th>
						<td>
							<label><input <?php echo (empty($linktarget) || (!empty($linktarget) && $linktarget == "self")) ? 'checked="checked"' : ''; ?> type="radio" name="Slide[linktarget]" value="self" id="Slide_linktarget_self" /> <?php _e('Current Window', 'slideshow-gallery'); ?></label>
							<label><input <?php echo (!empty($linktarget) && $linktarget == "blank") ? 'checked="checked"' : ''; ?> type="radio" name="Slide[linktarget]" value="blank" id="Slide_linktarget_blank" /> <?php _e('New/Blank Window', 'slideshow-gallery'); ?></label>
							<span class="howto"><?php _e('Should this link open in the current window or a new window?', 'slideshow-gallery'); ?></span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<table class="form-table">
			<tbody>
				<tr>
					<th><label for="Slide_expiry"><?php _e('Expiry Date', 'slideshow-gallery'); ?></label></th>
					<td>
						<?php $currentdate = date_i18n(get_option('date_format'), strtotime((!empty($expiry) ? $expiry : "0000-00-00" ))); ?>
						<input type="text" name="Slide[expiry]" value="<?php echo (!empty($expiry) && $expiry != "0000-00-00") ? esc_attr(wp_unslash($currentdate)) : ''; ?>" id="Slide_expiry" />
						<span class="howto"><small><?php _e('(optional)', 'slideshow-gallery'); ?></small> <?php _e('Set an expiry date for this slide.', 'slideshow-gallery'); ?></span>
						
						<script type="text/javascript">
						jQuery(document).ready(function() {
							jQuery('#Slide_expiry').datepicker({
								showButtonPanel:true,
								changeMonth: true,
								changeYear: true,
								dateFormat: "<?php echo esc_js($this -> Html -> dateformat_PHP_to_jQueryUI(get_option('date_format'))); ?>",
								defaultDate: "<?php echo (!empty($expiry) && $expiry != "0000-00-00") ? esc_js($currentdate) : ''; ?>",									
								showOn: "both",
								buttonText: "",
							}).next(".ui-datepicker-trigger").addClass("button button-secondary");;
						});
						</script>
					</td>
				</tr>
			</tbody>
		</table>
		
		<p class="submit">
			<button class="button-primary" type="submit" name="submit" value="1">
				<i class="fa fa-check fa-fw"></i> <?php _e('Save Slide', 'slideshow-gallery'); ?>
			</button>
			<div class="slideshow_continueediting">
				<label><input <?php echo (!empty($_REQUEST['continueediting'])) ? 'checked="checked"' : ''; ?> type="checkbox" name="continueediting" value="1" id="continueediting" /> <?php _e('Continue editing', 'slideshow-gallery'); ?></label>
			</div>
		</p>
	</form>
</div>