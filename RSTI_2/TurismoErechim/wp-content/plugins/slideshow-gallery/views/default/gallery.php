<?php 

$wrapperid = "slideshow-wrapper" . $unique;
if (!isset($products) || !$products) $slides = stripslashes_deep($slides);
$thumbopacity = $this -> get_option('thumbopacity');

?>

<?php if (isset($slides) && !empty($slides)) : ?>
	<ul id="slideshow<?php echo esc_html($unique); ?>" class="slideshow<?php echo esc_html($unique); ?>" style="display:none;">
		<?php if ($frompost) : ?>
			<!-- From a WordPress post/page -->
			<?php foreach ($slides as $slide) : ?>
				<?php setup_postdata($slide -> ID); ?>
				<li>
					<?php if (empty($options['infoheadingcontent']) || $options['infoheadingcontent'] == "title") : ?>
						<h3 style="opacity:70;"><?php echo esc_html($slide -> post_title); ?></h3>
					<?php else : ?>
						<h3 style="opacity:70;"><?php echo esc_html($slide -> post_excerpt); ?></h3>
					<?php endif; ?>
					<?php 
						
					$full_image_href = wp_get_attachment_image_src($slide -> ID, 'full', false);
					$full_image_url = wp_get_attachment_url($slide -> ID); 
					
					?>										
					<?php if ($options['layout'] != "responsive" && $options['resizeimages'] == "true" && $options['width'] != "auto") : ?>
						<span data-alt="<?php echo esc_attr($this -> Html() -> sanitize($slide -> post_title)); ?>"><?php echo esc_html($this -> Html -> otf_image_src($slide, $options['width'], $options['height'], 100)); ?></span>
					<?php else : ?>
						<span data-alt="<?php echo esc_attr($this -> Html() -> sanitize($slide -> post_title)); ?>"><?php echo esc_html($full_image_href[0]); ?></span>
					<?php endif; ?>
					<p><?php echo esc_html(get_the_excerpt()); ?></p>
					<?php $thumbnail_link = wp_get_attachment_image_src($slide -> ID, array($options['width'], $options['height']), false); ?>
					<a href="<?php echo esc_url($full_image_url); ?>" id="<?php echo esc_html($unique); ?>imglink<?php echo esc_html($slide -> ID); ?>" <?php if ($this -> Html -> is_image($full_image_url)) : ?>class="colorboxslideshow<?php echo esc_html($unique); ?>" data-rel="slideshowgroup<?php echo esc_html($unique); ?>"<?php endif; ?> title="<?php echo esc_attr($slide -> post_title); ?>">
						<?php if ($options['showthumbs'] == "true") : ?>
							<img class="skip-lazy" src="<?php echo esc_url($this -> Html -> otf_image_src($slide, $this -> get_option('thumbwidth'), $this -> get_option('thumbheight'), 100)); ?>" alt="<?php echo esc_attr($this -> Html -> sanitize($slide -> post_title)); ?>" />
						<?php endif; ?>
					</a>
				</li>
				<?php wp_reset_postdata(); ?>
			<?php endforeach; ?>
		<?php elseif (isset($featured) && $featured) : ?>
			<!-- Featured images from posts -->
			<?php foreach ($slides as $slide) : ?>
				<?php 
					
				setup_postdata($slide); 
				global $slideshow_post;
				$slideshow_post = $slide;
				
				?>
				<li>
					<h3 style="opacity:70;"><a target="_self" href="<?php echo get_permalink($slide -> ID); ?>"><?php echo wp_unslash(esc_html($slide -> post_title)); ?></a></h3>
					<?php $full_image_href = wp_get_attachment_image_src(get_post_thumbnail_id($slide -> ID), 'full', false); ?>
					<?php $full_image_url = wp_get_attachment_url(get_post_thumbnail_id($slide -> ID)); ?>										
					<?php if ($options['layout'] != "responsive" && $options['resizeimages'] == "true" && $options['width'] != "auto") : ?>
						<span data-alt="<?php echo esc_attr($this -> Html() -> sanitize($slide -> post_title)); ?>"><?php echo esc_html($this -> Html -> otf_image_src($slide, $options['width'], $options['height'], 100)); ?></span>
					<?php else : ?>
						<span data-alt="<?php echo esc_attr($this -> Html() -> sanitize($slide -> post_title)); ?>"><?php echo esc_html($full_image_href[0]); ?></span>
					<?php endif; ?>
					<p><?php echo esc_html(get_the_excerpt()); ?></p>
					<?php $thumbnail_link = wp_get_attachment_image_src(get_post_thumbnail_id($slide -> ID), 'thumbnail', false); ?>
					<?php if ($options['showthumbs'] == "true") : ?>
						<?php if (!empty($slide -> guid)) : ?>
							<a href="<?php echo esc_url($slide -> guid); ?>" target="_self" title="<?php echo esc_attr($slide -> post_title); ?>"><img class="skip-lazy" src="<?php echo esc_url($this -> Html -> otf_image_src($slide, $this -> get_option('thumbwidth'), $this -> get_option('thumbheight'), 100)); ?>" alt="<?php echo esc_attr($this -> Html -> sanitize($slide -> post_title)); ?>" /></a>
						<?php else : ?>
							<a id="<?php echo esc_html($unique); ?>imglink<?php echo esc_html($slide -> ID); ?>" <?php if ($this -> Html -> is_image($full_image_url)) : ?>class="colorboxslideshow<?php echo esc_html($unique); ?>" data-rel="slideshowgroup<?php echo esc_html($unique); ?>"<?php endif; ?>><img class="skip-lazy" src="<?php echo esc_url($this -> Html -> otf_image_src($slide, $this -> get_option('thumbwidth'), $this -> get_option('thumbheight'), 100)); ?>" alt="<?php echo esc_attr($this -> Html -> sanitize($slide -> post_title)); ?>" /></a>
						<?php endif; ?>
					<?php else : ?>
						<a href="<?php echo esc_url($slide -> guid); ?>" target="_self" title="<?php echo esc_attr($slide -> post_title); ?>"></a>
					<?php endif; ?>
				</li>
				<?php wp_reset_postdata(); ?>
			<?php endforeach; ?>
		<?php elseif (isset($products) && $products) : ?>
			<!-- Shopping Cart plugin products https://tribulant.com/plugins/view/10/wordpress-shopping-cart-plugin -->
			<?php foreach ($slides as $slide) : ?>
				<li>
					<h3 style="opacity:70;"><?php echo wp_unslash(esc_html($slide -> title)); ?></h3>
					<?php if ($options['layout'] != "responsive" && $options['resizeimages'] == "true" && $options['width'] != "auto") : ?>
						<span data-alt="<?php echo esc_attr($this -> Html() -> sanitize($slide -> title)); ?>"><?php echo esc_html($this -> Html -> otf_image_src($slide, $options['width'], $options['height'], 100)); ?></span>
					<?php else : ?>
						<span data-alt="<?php echo esc_attr($this -> Html() -> sanitize($slide -> title)); ?>"><?php echo site_url() . '/' . $slide -> image_url; ?></span>
					<?php endif; ?>
					<p><?php echo substr(wp_unslash(esc_html($slide -> description)), 0, 255); ?></p>
					<?php if ($options['showthumbs'] == "true") : ?>
						<?php if (!empty($slide -> post_id)) : ?>
							<a href="<?php echo get_permalink($slide -> post_id); ?>" target="_self" title="<?php echo esc_attr($slide -> title); ?>"><img class="skip-lazy" src="<?php echo esc_url($this -> Html -> otf_image_src($slide, $this -> get_option('thumbwidth'), $this -> get_option('thumbheight'), 100)); ?>" alt="<?php echo esc_attr($this -> Html -> sanitize($slide -> title)); ?>" /></a>
						<?php else : ?>
							<a><img class="skip-lazy" src="<?php echo esc_url($this -> Html -> otf_image_src($slide, $this -> get_option('thumbwidth'), $this -> get_option('thumbheight'), 100)); ?>" alt="<?php echo esc_attr($this -> Html -> sanitize($slide -> title)); ?>" /></a>
						<?php endif; ?>
					<?php else : ?>
						<a href="<?php echo get_permalink($slide -> post_id); ?>" target="_self" title="<?php echo esc_attr($slide -> title); ?>"></a>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		<?php else : ?>
			<!-- From all slides or gallery slides -->
			<?php foreach ($slides as $slide) : ?>				
				<li>
					<h3 style="opacity:<?php echo (!empty($slide -> iopacity)) ? ($slide -> iopacity) : 70; ?>;"><?php echo (!empty($slide -> showinfo) && ($slide -> showinfo == "both" || $slide -> showinfo == "title")) ? esc_html($slide -> title) : ''; ?></h3>
					<?php if ($options['layout'] != "responsive" && $options['resizeimages'] == "true" && $options['width'] != "auto") : ?>
						<span data-alt="<?php echo esc_attr($this -> Html() -> sanitize($slide -> title)); ?>"><?php echo esc_html($this -> Html -> otf_image_src($slide, $options['width'], $options['height'], 100)); ?></span>
					<?php else : ?>
						<span data-alt="<?php echo esc_attr($this -> Html() -> sanitize($slide -> title)); ?>"><?php echo esc_html($slide -> image_path); ?></span>
					<?php endif; ?>
					<p><?php echo (!empty($slide -> showinfo) && ($slide -> showinfo == "both" || $slide -> showinfo == "description")) ? esc_html($slide -> description) : ''; ?></p>
					<?php if ($options['showthumbs'] == "true") : ?>
						<?php if ($slide -> uselink == "Y" && !empty($slide -> link)) : ?>
							<a href="<?php echo esc_url($slide -> link); ?>" title="<?php echo esc_attr($slide -> title); ?>" target="_<?php echo esc_html($slide -> linktarget); ?>"><img class="skip-lazy" src="<?php echo esc_url($this -> Html -> otf_image_src($slide, $this -> get_option('thumbwidth'), $this -> get_option('thumbheight'), 100)); ?>" alt="<?php echo esc_attr($this -> Html -> sanitize($slide -> title)); ?>" /></a>
						<?php elseif ($options['imagesoverlay'] == "true") : ?>
							<a href="<?php echo esc_url($slide -> image_path); ?>" id="<?php echo esc_html($unique); ?>imglink<?php echo esc_html($slide -> id); ?>" <?php if ($this -> Html -> is_image($slide -> image_path)) : ?>class="colorboxslideshow<?php echo esc_html($unique); ?>" data-rel="slideshowgroup<?php echo esc_html($unique); ?>"<?php endif; ?> target="_<?php echo esc_html($slide -> linktarget); ?>" title="<?php echo esc_attr($slide -> title); ?>"><img class="skip-lazy" src="<?php echo esc_url($this -> Html -> otf_image_src($slide, $this -> get_option('thumbwidth'), $this -> get_option('thumbheight'), 100)); ?>" alt="<?php echo esc_attr($this -> Html -> sanitize($slide -> title)); ?>" /></a>
						<?php else : ?>
							<a><img class="skip-lazy" src="<?php echo esc_url($this -> Html -> otf_image_src($slide, $this -> get_option('thumbwidth'), $this -> get_option('thumbheight'), 100)); ?>" alt="<?php echo esc_attr($this -> Html -> sanitize($slide -> title)); ?>" /></a>
						<?php endif; ?>
					<?php else : ?>
						<?php if ($slide -> uselink == "Y" && !empty($slide -> link)) : ?>
							<a href="<?php echo esc_url($slide -> link); ?>" target="_<?php echo esc_html($slide -> linktarget); ?>" title="<?php echo esc_attr($slide -> title); ?>"></a>
						<?php elseif ($options['imagesoverlay'] == "true") : ?>
							<a href="<?php echo esc_url($slide -> image_path); ?>" id="<?php echo esc_html($unique); ?>imglink<?php echo esc_html($slide -> id); ?>" <?php if ($this -> Html -> is_image($slide -> image_path)) : ?>class="colorboxslideshow<?php echo esc_html($unique); ?>" data-rel="slideshowgroup<?php echo esc_html($unique); ?>"<?php endif; ?> target="_<?php echo esc_html($slide -> linktarget); ?>" title="<?php echo esc_attr($slide -> title); ?>"></a>
						<?php else : ?>
							<a></a>
						<?php endif; ?>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
	
	<div id="<?php echo esc_attr($wrapperid); ?>" class="slideshow-wrapper">
		<?php if ($options['showthumbs'] == "true" && $options['thumbsposition'] == "top" && count($slides) > 1) : ?>
			<div id="thumbnails<?php echo esc_html($unique); ?>" class="slideshow-thumbnails thumbstop">
				<div class="slideshow-slideleft" id="slideleft<?php echo esc_html($unique); ?>" title="<?php _e('Slide Left', 'slideshow-gallery'); ?>"></div>
				<div class="slideshow-slidearea" id="slidearea<?php echo esc_html($unique); ?>">
					<div class="slideshow-slider" id="slider<?php echo esc_html($unique); ?>"></div>
				</div>
				<div class="slideshow-slideright" id="slideright<?php echo esc_html($unique); ?>" title="<?php _e('Slide Right', 'slideshow-gallery'); ?>"></div>
				<br style="clear:both; visibility:hidden; height:1px;" />
			</div>
		<?php endif; ?>
	
		<div class="slideshow-fullsize" id="fullsize<?php echo esc_html($unique); ?>">
			<?php $navb = false; $navf = false; ?>
			<?php if ($options['shownav'] == "true" && count($slides) > 1) : ?>
				<?php $navb = "imgprev"; ?>
				<div id="imgprev<?php echo esc_html($unique); ?>" class="slideshow-imgprev imgnav" title="<?php _e('Previous Image', 'slideshow-gallery'); ?>"><?php _e('Previous Image', 'slideshow-gallery'); ?></div>
			<?php endif; ?>
			<a id="imglink<?php echo esc_html($unique); ?>" class="slideshow-imglink imglink"><!-- link --></a>
			<?php if ($options['shownav'] == "true" && count($slides) > 1) : ?>
				<?php $navf = "imgnext"; ?>
				<div id="imgnext<?php echo esc_html($unique); ?>" class="slideshow-imgnext imgnav" title="<?php _e('Next Image', 'slideshow-gallery'); ?>"><?php _e('Next Image', 'slideshow-gallery'); ?></div>
			<?php endif; ?>
			<div id="image<?php echo esc_html($unique); ?>" class="slideshow-image"></div>
			<div class="slideshow-information info<?php echo esc_html($options['infoposition']); ?>" id="information<?php echo esc_html($unique); ?>">
				<h3 class="slideshow-info-heading"><?php _e('info heading', 'slideshow-gallery'); ?></h3>
				<p class="slideshow-info-content"><?php _e('info content', 'slideshow-gallery'); ?></p>
			</div>
		</div>
		
		<?php if ($options['showthumbs'] == "true" && $options['thumbsposition'] == "bottom" && count($slides) > 1) : ?>
			<div id="thumbnails<?php echo esc_html($unique); ?>" class="slideshow-thumbnails thumbsbot">
				<div class="slideshow-slideleft" id="slideleft<?php echo esc_html($unique); ?>" title="<?php _e('Slide Left', 'slideshow-gallery'); ?>"></div>
				<div class="slideshow-slidearea" id="slidearea<?php echo esc_html($unique); ?>">
					<div class="slideshow-slider" id="slider<?php echo esc_html($unique); ?>"></div>
				</div>
				<div class="slideshow-slideright" id="slideright<?php echo esc_html($unique); ?>" title="<?php _e('Slide Right', 'slideshow-gallery'); ?>"></div>
				<br style="clear:both; visibility:hidden; height:1px;" />
			</div>
		<?php endif; ?>
	</div>
	
	<?php ob_start(); ?>
	
	<script type="text/javascript">
	jQuery.noConflict();
	tid('slideshow<?php echo esc_html($unique); ?>').style.display = "none";
	tid('<?php echo esc_html($wrapperid); ?>').style.display = 'block';
	tid('<?php echo esc_html($wrapperid); ?>').style.visibility = 'hidden';
	var spinnerDiv = document.createElement('div');
	spinnerDiv.setAttribute('id', 'spinner<?php echo esc_html($unique); ?>');
	spinnerDiv.innerHTML = '<i class="fa fa-cog fa-spin"></i>';
	jQuery(spinnerDiv).appendTo('#fullsize<?php echo esc_html($unique); ?>');
	tid('spinner<?php echo esc_html($unique); ?>').style.visibility = 'visible';

	var slideshow<?php echo esc_html($unique); ?> = new TINY.slideshow("slideshow<?php echo esc_html($unique); ?>");
	jQuery(document).ready(function() {
		<?php if (empty($options['auto']) || (!empty($options['auto']) && $options['auto'] == "true")) : ?>slideshow<?php echo esc_html($unique); ?>.auto = true;<?php else : ?>slideshow<?php echo esc_html($unique); ?>.auto = false;<?php endif; ?>
		slideshow<?php echo esc_html($unique); ?>.speed = <?php echo esc_html($options['autospeed']); ?>;
		slideshow<?php echo esc_html($unique); ?>.effect = "<?php echo esc_html($options['effect']); ?>";
		slideshow<?php echo esc_html($unique); ?>.slide_direction = "<?php echo esc_html($options['slide_direction']); ?>";
		slideshow<?php echo esc_html($unique); ?>.easing = "<?php echo esc_html($options['easing']); ?>";
		slideshow<?php echo esc_html($unique); ?>.alwaysauto = <?php echo esc_html($options['alwaysauto']); ?>;
		slideshow<?php echo esc_html($unique); ?>.autoheight = <?php echo esc_html($options['autoheight']); ?>;
		slideshow<?php echo esc_html($unique); ?>.autoheight_max = <?php echo (empty($options['autoheight_max'])) ? "false" : esc_attr($options['autoheight_max']); ?>;
		slideshow<?php echo esc_html($unique); ?>.imgSpeed = <?php echo esc_html($options['fadespeed']); ?>;
		slideshow<?php echo esc_html($unique); ?>.navOpacity = <?php echo (empty($options['navopacity'])) ? 0 : esc_attr($options['navopacity']); ?>;
		slideshow<?php echo esc_html($unique); ?>.navHover = <?php echo (empty($options['navhoveropacity'])) ? 0 : esc_attr($options['navhoveropacity']); ?>;
		slideshow<?php echo esc_html($unique); ?>.letterbox = "#000000";
		slideshow<?php echo esc_html($unique); ?>.linkclass = "linkhover";
		slideshow<?php echo esc_html($unique); ?>.imagesid = "images<?php echo esc_html($unique); ?>";
		slideshow<?php echo esc_html($unique); ?>.info = "<?php echo ($options['showinfo'] == "true") ? 'information' . $unique : ''; ?>";
		slideshow<?php echo esc_html($unique); ?>.infoonhover = <?php echo (empty($options['infoonhover'])) ? 0 : esc_attr($options['infoonhover']); ?>;
		slideshow<?php echo esc_html($unique); ?>.infoSpeed = <?php echo esc_html($options['infospeed']); ?>;
		slideshow<?php echo esc_html($unique); ?>.infodelay = <?php echo (empty($options['infodelay'])) ? 0 : esc_attr($options['infodelay']); ?>;
		slideshow<?php echo esc_html($unique); ?>.infofade = <?php echo (empty($options['infofade'])) ? 0 : esc_attr($options['infofade']); ?>;
		slideshow<?php echo esc_html($unique); ?>.infofadedelay = <?php echo (empty($options['infofadedelay'])) ? 0 : esc_attr($options['infofadedelay']); ?>;
		slideshow<?php echo esc_html($unique); ?>.thumbs = "<?php echo ($options['showthumbs'] == "true" && count($slides) > 1) ? 'slider' . $unique : ''; ?>";
		slideshow<?php echo esc_html($unique); ?>.thumbOpacity = <?php echo (empty($thumbopacity)) ? 0 : esc_attr($thumbopacity); ?>;
		slideshow<?php echo esc_html($unique); ?>.left = "slideleft<?php echo esc_html($unique); ?>";
		slideshow<?php echo esc_html($unique); ?>.right = "slideright<?php echo esc_html($unique); ?>";
		slideshow<?php echo esc_html($unique); ?>.scrollSpeed = <?php echo esc_html($options['thumbsspeed']); ?>;
		slideshow<?php echo esc_html($unique); ?>.spacing = <?php echo (empty($options['thumbsspacing'])) ? '0' : esc_attr($options['thumbsspacing']); ?>;
		slideshow<?php echo esc_html($unique); ?>.active = "<?php echo esc_html($options['thumbsborder']); ?>";
		slideshow<?php echo esc_html($unique); ?>.imagesthickbox = "<?php echo esc_html($options['imagesoverlay']); ?>";
		jQuery("#spinner<?php echo esc_html($unique); ?>").remove();
		slideshow<?php echo esc_html($unique); ?>.init("slideshow<?php echo esc_html($unique); ?>","image<?php echo esc_html($unique); ?>","<?php echo (!empty($options['shownav']) && count($slides) > 1 && $options['shownav'] == "true") ? $navb . $unique : ''; ?>","<?php echo (!empty($options['shownav']) && count($slides) > 1 && $options['shownav'] == "true") ? $navf . $unique : ''; ?>","imglink<?php echo esc_html($unique); ?>");
		tid('<?php echo esc_html($wrapperid); ?>').style.visibility = 'visible';
		jQuery(window).trigger('resize');
		
		<?php if ($this -> ci_serial_valid()) : ?>
			slideshow<?php echo esc_html($unique); ?>.touch(tid('fullsize<?php echo esc_html($unique); ?>'));
			
			<?php if ($options['showthumbs'] == "true" && count($slides) > 1) : ?>
				var touchslidesurface = tid('slider<?php echo esc_html($unique); ?>');
				slideshow<?php echo esc_html($unique); ?>.touchslide(touchslidesurface);
			<?php endif; ?>
		<?php endif; ?>
	});

	<?php if ($options['layout'] == "responsive" && $options['resheighttype'] == "%") : ?>
		jQuery(window).resize(function() {
			var width = jQuery('#<?php echo esc_attr($wrapperid); ?>').width();
			var resheight = <?php echo esc_html($options['resheight']); ?>;
			var height = Math.round(((resheight / 100) * width));
			jQuery('#fullsize<?php echo esc_html($unique); ?>').height(height);
		});
	<?php elseif ($options['layout'] == "responsive" && $options['resheighttype'] == "px") : ?>
		jQuery('#fullsize<?php echo esc_html($unique); ?>').height('<?php echo esc_html($options['resheight'].$options['resheighttype']); ?>');
	<?php endif; ?>
	</script>
	
	<?php
	
	$cssattr['unique'] = $unique;
	$cssattr['wrapperid'] = $wrapperid;
	$cssattr['resizeimages'] = (($options['resizeimages'] == "true") ? "Y" : "N");
	$cssattr['width'] = $options['width'];
	$cssattr['height'] = $options['height'];
	$cssattr['autoheight'] = $options['autoheight'];
	$cssattr['thumbwidth'] = $this -> get_option('thumbwidth');
	$cssattr['thumbheight'] = $this -> get_option('thumbheight');	
	$cssattr['sliderwidth'] = ((($cssattr['thumbwidth'] + $options['thumbsspacing'] + 6) * count($slides)) + 60);
	$cssattr['infohideonmobile'] = $this -> get_option('infohideonmobile');
	$cssattr['thumbhideonmobile'] = $this -> get_option('thumbhideonmobile');
	
	$javascript = ob_get_clean(); 
	global $slideshow_javascript;
	$slideshow_javascript[] = $javascript;
	
	//ob_start();
	/*<link rel="stylesheet" property="stylesheet" href="<?php echo esc_html($this -> get_css_url($cssattr, $options['layout'])); ?>" type="text/css" media="all" />*/
	?>

	<?php
		
	//$css = ob_get_clean();
	$css = $this->generate_css($cssattr, $options['layout']);
	global $slideshow_css;
	$slideshow_css[] = $css;
	
	$jsoutput = $this -> get_option('jsoutput');
	if (empty($jsoutput) || $jsoutput == "perslideshow") {
		echo '<!-- Slideshow Gallery Javascript BEG -->';
		echo html_entity_decode(str_replace("\'", "'", str_replace('\n', '', esc_js($javascript))));
		echo '<!-- Slideshow Gallery Javascript END -->';
		
		echo '<!-- Slideshow Gallery CSS BEG -->';
		echo html_entity_decode(esc_html($css));
		echo '<!-- Slideshow Gallery CSS END -->';
	}
	
	?>
<?php else : ?>
	<?php _e('No slides are available.', 'slideshow-gallery'); ?>
<?php endif; ?>