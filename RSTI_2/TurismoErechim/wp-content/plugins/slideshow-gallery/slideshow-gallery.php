<?php
/*
Plugin Name: Slideshow Gallery
Plugin URI: https://tribulant.com/plugins/view/13/
Author: Tribulant
Author URI: https://tribulant.com
Description: Feature content in a JavaScript powered slideshow gallery showcase on your WordPress website. The slideshow is flexible and all aspects can easily be configured. Embedding or hardcoding the slideshow gallery is a breeze. See the <a href="https://tribulant.com/docs/wordpress-slideshow-gallery/1758/" target="_blank">online documentation</a> for instructions on using and embedding slideshow galleries. Upgrade to the premium version to remove all limitations.
Version: 1.8.4
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Tags: slideshow gallery, slideshow, gallery, slider, jquery, bfithumb, galleries, photos, images
Text Domain: slideshow-gallery
Domain Path: /languages
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!defined('DS')) { define('DS', DIRECTORY_SEPARATOR); }

$path = dirname(__FILE__) . DS . 'slideshow-gallery-plugin.php'; 
if (file_exists($path)) {
	require_once(dirname(__FILE__) . DS . 'includes' . DS . 'checkinit.php');
	require_once(dirname(__FILE__) . DS . 'includes' . DS . 'constants.php');
	require_once($path);
	require_once(dirname(__FILE__) . DS . 'includes' . DS . 'errorhandler.php');
	require_once(dirname(__FILE__) . DS . 'vendors' . DS . 'otf_regen_thumbs.php');
}



if (!class_exists('SlideshowGallery')) {
	class SlideshowGallery extends GalleryPlugin {
		public $url;
		public $referer;
		public $plugin_file;
		public $Db;
		public $Html;
		public $Form;
		public $errorhandler;
		
		function __construct() {		
			$url = explode("&", $_SERVER['REQUEST_URI']);
			$this -> url = $url[0];
			$this -> referer = (empty($_SERVER['HTTP_REFERER'])) ? $this -> url : $_SERVER['HTTP_REFERER'];
			$this -> plugin_name = basename(dirname(__FILE__));
			$this -> plugin_file = plugin_basename(__FILE__);	
			$this -> register_plugin($this -> plugin_name, __FILE__);
			$this -> errorhandler = new SlideshowErrorHandler();

			
			//WordPress action hooks
			$this -> add_action('plugins_loaded');
			$this -> add_action('wp_head');
			$this -> add_action('wp_footer');
			$this -> add_action('admin_menu');
			$this -> add_action('admin_head');
			$this -> add_action('admin_notices');
			$this -> add_action('wp_print_styles', 'print_styles');
			$this -> add_action('admin_print_styles', 'print_styles');
			$this -> add_action('wp_print_scripts', 'print_scripts');
			$this -> add_action('admin_print_scripts', 'print_scripts');
			$this -> add_action('init', 'init_textdomain', 10, 1);
			$this -> add_action('admin_init', 'custom_redirect', 1, 1);
			
			//WordPress Ajax hooks
			$this -> add_action('wp_ajax_slideshow_slides_order', 'ajax_slides_order', 10, 1);
			$this -> add_action('wp_ajax_slideshow_tinymce', 'ajax_tinymce', 10, 1);
			
			//WordPress filter hooks
			$this -> add_filter('mce_buttons');
			$this -> add_filter('mce_external_plugins');
			$this -> add_filter("plugin_action_links_" . $this -> plugin_file, 'plugin_action_links', 10, 4);
			
			$this -> add_action('slideshow_ratereviewhook', 'ratereview_hook');
			$this ->add_action( 'wp_ajax_slideshow_dismiss_smart_rating', 'dismiss_slideshow_smart_rating' );

			if (!is_admin() || wp_doing_ajax()) { 
				add_shortcode('slideshow', array($this, 'embed')); 
				add_shortcode('tribulant_slideshow', array($this, 'embed'));
			}
			
			$this -> updating_plugin();
		} 
		
		function excerpt_more($more = null) {			
			global $slideshow_post;
			$excerptsettings = $this -> get_option('excerptsettings');
			if (!empty($excerptsettings)) {
				$excerpt_readmore = $this -> get_option('excerpt_readmore');
				if (!empty($excerpt_readmore)) {
					$more = ' <a href="' . get_permalink($slideshow_post -> ID) . '">' . esc_html($excerpt_readmore) . '</a>';	
				}
			}
			
			return $more;
		}
		
		function excerpt_length($length = null) {
			$excerptsettings = $this -> get_option('excerptsettings');
			if (!empty($excerptsettings)) {
				$excerpt_length = $this -> get_option('excerpt_length');
				if (!empty($excerpt_length)) {
					$length = $excerpt_length;
				}
			}
			
			return $length;
		}
		
		function plugin_action_links($actions = null, $plugin_file = null, $plugin_data = null, $context = null) {
			$this_plugin = plugin_basename(__FILE__);
			
			if (!empty($plugin_file) && $plugin_file == $this_plugin) {
				$actions[] = '<a href="" onclick="jQuery.colorbox({href:ajaxurl + \'?action=slideshow_serialkey&security=' . wp_create_nonce('serialkey') . '\'}); return false;" id="slideshow_submitseriallink"><i class="fa fa-key fa-fw"></i> ' . __('Serial Key', 'slideshow-gallery') . '</a>';
				$actions[] = '<a href="' . admin_url('admin.php?page=' . $this -> sections -> settings) . '"><i class="fa fa-cog fa-fw"></i> ' . __('Settings', 'slideshow-gallery') . '</a>';
				
				/*if ($update = $this -> vendor('update')) {
			        $version_info = $update -> get_version_info();
			     	if (!empty($version_info['dtype']) && $version_info['dtype'] == "single") {
				     	$actions[] = '<a href="https://tribulant.com/items/upgrade/' . $version_info['item_id'] . '" target="_blank"><i class="fa fa-level-up fa-fw"></i> ' . __('Upgrade', 'slideshow-gallery') . '</a>';
			     	}  
			    }*/
			}
			
			return $actions;
		}
		
		function init() {
		}
		
		function init_textdomain() {		
			$locale = get_locale();
			
			if (!empty($locale)) { 
				if ($locale == "ja" || $locale == "ja_JP") { setlocale(LC_ALL, "ja_JP.UTF8"); }
			} else { 
				setlocale(LC_ALL, apply_filters('slideshow_setlocale', $locale)); 
			}
			
			$mo_file = $this -> plugin_name . '-' . $locale . '.mo';
			$language_external = $this -> get_option('language_external');
		
			if (!empty($language_external)) {
				if (function_exists('load_textdomain')) {
					load_textdomain($this -> plugin_name, WP_LANG_DIR . DS . $this -> plugin_name . DS . $mo_file);
				}
			} else {
				if (function_exists('load_plugin_textdomain')) {
					load_plugin_textdomain($this -> plugin_name, false, dirname(plugin_basename(__FILE__)) . DS . 'languages' . DS);
				}
			}			
		}
		
		function plugins_loaded() {		
			$this -> ci_initialize();
				
			if ($this -> language_do()) {
	        	add_filter('gettext', array($this, 'language_useordefault'), 0);
	        }
		}
		
		function wp_head() {
			global $slideshow_javascript, $slideshow_css;
			$slideshow_javascript = array();
			$slideshow_css = array();
			
			$this -> render('head', false, true, 'default');
		}
		
		function wp_footer() {
			global $slideshow_javascript, $slideshow_css;
			$jsoutput = $this -> get_option('jsoutput');
		
			if (!empty($slideshow_javascript)) {
				if (!empty($jsoutput) && $jsoutput == "footerglobal") {
					?><!-- Slideshow Gallery Javascript BEG --><?php
				
					foreach ($slideshow_javascript as $javascript) {
						//echo wp_unslash($javascript);
						echo html_entity_decode(str_replace("\'", "'", str_replace('\n', '', esc_js($javascript))));
					}
					
					?><!-- Slideshow Gallery Javascript END --><?php
				}
			}
			
			if (!empty($slideshow_css)) {
				if (!empty($jsoutput) && $jsoutput == "footerglobal") {
					?><!-- Slideshow Gallery CSS BEG --><?php
						
					foreach ($slideshow_css as $css) {
						//echo wp_unslash($css);
						echo html_entity_decode(esc_html($css));
					}
					
					?><!-- Slideshow Gallery CSS END --><?php
				}
			}
		}
		
		function admin_menu() {
			//$update_icon = ($this -> has_update()) ? ' <span class="update-plugins count-1"><span class="update-count">1</span></span>' : '';
            $update_icon = '';
			$this -> check_roles();
			
			add_menu_page(__('Slideshow', 'slideshow-gallery'), __('Slideshow', 'slideshow-gallery') . $update_icon, 'slideshow_slides', $this -> sections -> slides, array($this, 'admin_slides'), false, "26.113");
			$this -> menus['slideshow-slides'] = add_submenu_page($this -> sections -> slides, __('Manage Slides', 'slideshow-gallery'), __('Manage Slides', 'slideshow-gallery'), 'slideshow_slides', $this -> sections -> slides, array($this, 'admin_slides'));
			$this -> menus['slideshow-galleries'] = add_submenu_page($this -> sections -> slides, __('Manage Galleries', 'slideshow-gallery'), __('Manage Galleries', 'slideshow-gallery'), 'slideshow_galleries', $this -> sections -> galleries, array($this, 'admin_galleries'));
			$this -> menus['slideshow-settings'] = add_submenu_page($this -> sections -> slides, __('Settings', 'slideshow-gallery'), __('Settings', 'slideshow-gallery'), 'slideshow_settings', $this -> sections -> settings, array($this, 'admin_settings'));
			//$this -> menus['slideshow-settings-updates'] = add_submenu_page($this -> sections -> slides, __('Updates', 'slideshow-gallery'), __('Updates', 'slideshow-gallery') . $update_icon, 'slideshow_settings_updates', $this -> sections -> settings_updates, array($this, 'admin_settings_updates'));
			
			if (!$this -> ci_serial_valid()) {
				//$this -> menus['slideshow-submitserial'] = add_submenu_page($this -> sections -> slides, __('Submit Serial Key', 'slideshow-gallery'), __('Submit Serial Key', 'slideshow-gallery'), 'slideshow_submitserial', $this -> sections -> submitserial, array($this, 'admin_submitserial'));
			}
			
			add_action("load-" . $this -> menus['slideshow-slides'], array($this, 'screen_options_slides'));
			add_action("load-" . $this -> menus['slideshow-galleries'], array($this, 'screen_options_galleries'));
			
			do_action('slideshow_admin_menu', $this -> menus);
			
			add_action('admin_head-' . $this -> menus['slideshow-settings'], array($this, 'admin_head_gallery_settings'));
			
			add_dashboard_page(
				sprintf('Slideshow Gallery %s', $this -> version),
				sprintf('Slideshow Gallery %s', $this -> version),
				'read',
				$this -> sections -> about,
				array($this, 'slideshow_gallery_about')
			);
			
			remove_submenu_page('index.php', $this -> sections -> about);
		}
		
		function set_screen_option($status = null, $option = null, $value = null) {			
			return $value;
		}
		
		function removable_query_args($removable_query_args = array()) {
			
			$removable_query_args[] = 'Galleryupdated';
			$removable_query_args[] = 'Gallerymessage';
			
			return $removable_query_args;
		}
		
		function screen_options_slides() {		
			$screen = get_current_screen();
		 
			// get out of here if we are not on our settings page
			if (!is_object($screen) || $screen -> id != $this -> menus['slideshow-slides']) {
				return;
			}
		 
			$args = array(
				'label' 	=> 	__('Slides per page', 'slideshow-gallery'),
				'default' 	=> 	15,
				'option' 	=> 	'slideshow_slides_perpage'
			);
			
			add_screen_option('per_page', $args);
			
			require_once $this -> plugin_base() . DS . 'includes' . DS . 'class.slide-list-table.php';
			$Slide_List_Table = new Slide_List_Table;
		}
		
		function screen_options_galleries() { 						
			$screen = get_current_screen();
		 
			// get out of here if we are not on our settings page
			if (!is_object($screen) || $screen -> id != $this -> menus['slideshow-galleries']) {
				return;
			}
		 
			$args = array(
				'label' 	=> 	__('Galleries per page', 'slideshow-gallery'),
				'default' 	=> 	15,
				'option' 	=> 	'slideshow_galleries_perpage'
			);
			
			add_screen_option('per_page', $args);
			
			require_once $this -> plugin_base() . DS . 'includes' . DS . 'class.gallery-list-table.php';
			$Gallery_List_Table = new Gallery_List_Table;
		}
		
		function default_hidden_columns($hidden = null, $screen = null) {			
			if ($current_screen = get_current_screen()) {												
				if (($current_screen -> id == $this -> menus['slideshow-slides']) || ($current_screen -> id == $this -> menus['slideshow-galleries'])) {					
					switch ($screen -> id) {
						case $this -> menus['slideshow-slides']			:
							$hidden = array(
								'id',
						        'link',
						        'expiry',
						        'order',
							);
							break;
						case $this -> menus['slideshow-galleries']		:
							$hidden = array(
								'id',
							);
							break;
					}
				}	
			}		
			
			return $hidden;
		}
		
		function slideshow_gallery_about() {
			$this -> render('about', false, true, 'admin');
		}
		
		function admin_head() {
			$this -> render('head', false, true, 'admin');
		}
		
		function admin_head_gallery_settings() {		
			add_meta_box('submitdiv', __('Save Settings', 'slideshow-gallery'), array($this -> Metabox, "settings_submit"), $this -> menus['slideshow-settings'], 'side', 'core');
			add_meta_box('pluginsdiv', __('Recommended Plugin', 'slideshow-gallery'), array($this -> Metabox, "settings_plugins"), $this -> menus['slideshow-settings'], 'side', 'core');
			add_meta_box('aboutdiv', __('About This Plugin', 'slideshow-gallery') . $this -> Html -> help(__('More about this plugin and the creators of it', 'slideshow-gallery')), array($this -> Metabox, "settings_about"), $this -> menus['slideshow-settings'], 'side', 'core');
			add_meta_box('generaldiv', __('General Settings', 'slideshow-gallery') . $this -> Html -> help(__('General settings for the inner workings and some default behaviours', 'slideshow-gallery')), array($this -> Metabox, "settings_general"), $this -> menus['slideshow-settings'], 'normal', 'core');
			add_meta_box('postsdiv', __('Posts/Pages Settings', 'slideshow-gallery'), array($this -> Metabox, "settings_postspages"), $this -> menus['slideshow-settings'], 'normal', 'core');
			add_meta_box('linksimagesdiv', __('Links &amp; Images Overlay', 'slideshow-gallery') . $this -> Html -> help(__('Configure the way that slides with links are opened', 'slideshow-gallery')), array($this -> Metabox, "settings_linksimages"), $this -> menus['slideshow-settings'], 'normal', 'core');
			add_meta_box('stylesdiv', __('Appearance &amp; Styles', 'slideshow-gallery') . $this -> Html -> help(__('Change the way the slideshows look so that it suits your needs', 'slideshow-gallery')), array($this -> Metabox, "settings_styles"), $this -> menus['slideshow-settings'], 'normal', 'core');
			add_meta_box('techdiv', __('Technical Settings', 'slideshow-gallery'), array($this -> Metabox, "settings_tech"), $this -> menus['slideshow-settings'], 'normal', 'core');
			add_meta_box('wprelateddiv', __('WordPress Related', 'slideshow-gallery') . $this -> Html -> help(__('Settings specifically related to WordPress', 'slideshow-gallery')), array($this -> Metabox, "settings_wprelated"), $this -> menus['slideshow-settings'], 'normal', 'core');
			
			global $post;
			do_action('do_meta_boxes', $this -> menus['slideshow-settings'], 'normal', $post);
			do_action('do_meta_boxes', $this -> menus['slideshow-settings'], 'side', $post);
		}
		
		function admin_submitserial() {
			$success = false;
		
			if (!empty($_POST)) {
				check_admin_referer($this -> sections -> submitserial);
				
				$serial = sanitize_text_field($_REQUEST['serial']);
				
				if (empty($serial)) { $errors[] = __('Please fill in a serial key.', 'slideshow-gallery'); }
				else { 
					$this -> update_option('serialkey', $serial);	//update the DB option
					$this -> delete_all_cache('all');
					
					if (!$this -> ci_serial_valid()) { $errors[] = __('Serial key is invalid, please try again.', 'slideshow-gallery'); }
					else {
						delete_transient($this -> pre . 'update_info');
						$success = true;
						$this -> redirect(admin_url('admin.php?page=' . $this -> sections -> welcome)); 
					}
				}
			}
			
			$this -> render('settings-submitserial', array('success' => $success, 'errors' => $errors), true, 'admin');
		}

		function dismiss_slideshow_smart_rating() {
			$nonce = isset($_POST['nonce']) ? $_POST['nonce'] : '';
			$action = 'slideshow_feedback_notification_bar_nonce';

			if (!wp_verify_nonce($nonce, $action)) {
				wp_send_json_error();
			}

			if ( false === get_option( 'slideshow_smart_rating_dismissed' ) && false === update_option( 'slideshow_smart_rating_dismissed', false ) ) {
				add_option( 'slideshow_smart_rating_dismissed', true );
			}
			wp_send_json_success();
		}
				
		function admin_notices() {
			if ( get_option( 'slideshow_smart_rating_dismissed', false ) ) {
				return;
			}
			
			if (is_admin()) {			
				$this -> check_uploaddir();
			
				$message = (!empty($_GET[$this -> pre . 'message'])) ? wp_kses_html_error($_GET[$this -> pre . 'message']) : false;
				if (!empty($message)) {						
					$msg_type = (!empty($_GET[$this -> pre . 'updated'])) ? 'msg' : 'err';
					call_user_func(array($this, 'render_' . $msg_type), $message);
				}
				
				$showmessage_ratereview = $this -> get_option('showmessage_ratereview');

				if (!empty($showmessage_ratereview)) {
					$nonce = wp_create_nonce( 'slideshow_feedback_notification_bar_nonce' );
	
					$message = sprintf(esc_html__('You have been using the %s for %s days or more. Please consider to %s it or say it %s on %s. %s', 'slideshow-gallery'), 
					'<a href="https://wordpress.org/plugins/slideshow-gallery/" target="_blank">Tribulant Slideshow Gallery plugin</a>',
					$showmessage_ratereview,
					'<a class="button" href="https://wordpress.org/support/plugin/slideshow-gallery/reviews/?rate=5#new-post" target="_blank"><i class="fa fa-star"></i> Rate</a>',
					'<a class="button" href="https://wordpress.org/plugins/slideshow-gallery/?compatibility[version]=' . get_bloginfo('version') . '&compatibility[topic_version]=' . $this -> version . '&compatibility[compatible]=1" target="_blank"><i class="fa fa-check"></i> Works</a>',
					'<a href="https://wordpress.org/plugins/slideshow-gallery/" target="_blank">WordPress.org</a>',
					'<button type="button" class="button slideshow-my-custom-dismiss-button" data-nonce="' . $nonce .'">' . __('Dismiss forever', 'slideshow-gallery') . '</button>');
					
					$dismissable = admin_url('admin.php?page=' . $this -> sections -> settings . '&slideshow_method=hidemessage&message=ratereview');
					$this -> render_msg($message, $dismissable, false);
					?>
					<script type="text/javascript">
						jQuery('.slideshow-my-custom-dismiss-button').on('click', function(e) {
							e.preventDefault();
						var nonce =jQuery(this).attr('data-nonce');
						jQuery.post(ajaxurl,{action:'slideshow_dismiss_smart_rating',nonce:nonce})
							jQuery('.slideshow.notice').hide();
						});
						</script>
					<?php
				}
				
				/* Serial key submission message */
				if (isset($_GET['page'])) {
                    $page = sanitize_text_field($_GET['page']);
                } else {
				    $page = "";
                }

				if (!$this -> ci_serial_valid() && (empty($page) || $page != $this -> sections -> submitserial)) {				
					$hidemessage_upgradetopro = $this -> get_option('hidemessage_upgradetopro');
				
					if (empty($hidemessage_upgradetopro)) {
						$message = sprintf(esc_html__('You are using Slideshow Gallery LITE. Take your slideshows to the next level with %s. Already purchased? %s.', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '">Slideshow Gallery PRO</a>', '<a href="https://tribulant.com/docs/wordpress-slideshow-gallery/1758" target="_blank">See instructions to install PRO</a>');
						$message .= ' <a class="button button-primary" href="' . admin_url('admin.php?page=' . $this -> sections -> lite_upgrade) . '"><i class="fa fa-check"></i> ' . __('Upgrade to PRO', 'slideshow-gallery') . '</a>';
						$message .= ' <a class="button button-secondary" href="' . admin_url('admin.php?page=' . $this -> sections -> welcome . '&slideshow_method=hidemessage&message=upgradetopro') . '"><i class="fa fa-times"></i> ' . __('Hide this message', 'slideshow-gallery') . '</a>';
						$dismissable = admin_url('admin.php?page=' . $this -> sections -> welcome . '&slideshow_method=hidemessage&message=upgradetopro');
						$this -> render_msg($message, $dismissable, false);
						
						?>
			            
			            <script type="text/javascript">
						jQuery(document).ready(function(e) {
			                jQuery('#<?php echo esc_attr($this -> pre); ?>submitseriallink').click(function() {					
								jQuery.colorbox({href:ajaxurl + "?action=slideshow_serialkey&security=<?php echo wp_create_nonce('serialkey'); ?>"});
								return false;
							});
			            });
						</script>
			            
			            <?php
			        }
				}
				
				// Is an Update Available?
				/*if (!empty($page) && in_array($page, (array) $this -> sections)) {
					if (apply_filters('slideshow_updates', true)) {
						if (current_user_can('edit_plugins') && $this -> has_update() && (empty($page) || (!empty($page) && $page != $this -> sections -> settings_updates))) {
							$hideupdate = $this -> get_option('hideupdate');
							if (empty($hideupdate) || (!empty($hideupdate) && version_compare($this -> version, $hideupdate, '>'))) {
								$update = $this -> vendor('update');
								$update_info = $update -> get_version_info();
								$this -> render('update', array('update_info' => $update_info), true, 'admin');
							}
						}
					}
				}*/
			}
			
		}
		
		function mce_buttons($buttons) {
			array_push($buttons, "separator", "gallery");
			return $buttons;
		}
		
		function mce_external_plugins($plugins) {
			$plugins['gallery'] = $this -> url() . '/js/tinymce/editor_plugin.js';
			return $plugins;
		}
		
		function slideshow($output = true, $post_id = null, $exclude = null) {		
			$params['post_id'] = $post_id;
			$params['exclude'] = $exclude;
		
			$content = $this -> embed($params, false);
			
			if ($output == true) {
				echo wp_kses_post($content);
			} else {
				return $content;
			}
		}
		
		function embed($atts = array(), $content = null) {
			//global variables
			global $wpdb;
			$styles = $this -> get_option('styles');
			
			$effect = $this -> get_option('effect');
			$slide_direction = $this -> get_option('slide_direction');
			$easing = $this -> get_option('easing');
			$autoheight = $this -> get_option('autoheight');
			
			$this -> add_filter('excerpt_more', 'excerpt_more', 999, 1);
			$this -> add_filter('excerpt_length', 'excerpt_length', 999, 1);
		
			// default shortcode parameters
			$defaults = array(
				'source'				=>	"slides",
				'products'				=>	false,
				'productsnumber'		=>	10,
				'featured'				=>	false,
				'featurednumber'		=>	10,
				'featuredtype'			=>	"post",
				'gallery_id'			=>	false,
				'orderby'				=>	array('order', "ASC"),
				'orderf'				=>	false,	// order field
				'orderd'				=>	false,	// order direction (ASC/DESC)
				'resizeimages'			=>	(($styles['resizeimages'] == "Y") ? "true" : "false"),
				'imagesoverlay'			=>	(($this -> get_option('imagesthickbox') == "Y") ? "true" : "false"),
				'layout'				=>	($styles['layout']),
				'width'					=>	($styles['width']),
				'height'				=>	((empty($autoheight)) ? $styles['height'] : false),
				'autoheight'			=>	((!empty($autoheight)) ? "true" : "false"),
				'autoheight_max'		=>	($this -> get_option('autoheight_max')),
				'resheight'				=>	($styles['resheight']),
				'resheighttype'			=>	($styles['resheighttype']),
				'auto'					=>	(($this -> get_option('autoslide') == "Y") ? "true" : "false"),
				'effect'				=>	((empty($effect) || (!empty($effect) && $effect == "fade")) ? 'fade' : $effect),
				'slide_direction'		=>	((empty($slide_direction) || (!empty($slide_direction) && $slide_direction == "lr")) ? 'lr' : 'tb'),
				'easing'				=>	((empty($easing)) ? 'swing' : $easing),
				'autospeed'				=>	($this -> get_option('autospeed')),
				'alwaysauto'			=>	($this -> get_option('alwaysauto')),
				'fadespeed'				=>	($this -> get_option('fadespeed')),
				'shownav'				=>	(($this -> get_option('shownav') == "Y") ? "true" : "false"),
				'navopacity'			=>	($this -> get_option('navopacity')),
				'navhoveropacity'		=>	($this -> get_option('navhover')),
				'showinfo'				=>	(($this -> get_option('information') == "Y") ? "true" : "false"),
				'infoheadingcontent'	=>	"title",
				'infoposition'			=> 	($this -> get_option('infoposition')),
				'infoonhover'			=>	($this -> get_option('infoonhover')),
				'infospeed'				=>	($this -> get_option('infospeed')),
				'infodelay'				=>	($this -> get_option('infodelay')),
				'infofade'				=>  ($this -> get_option ('infofade')),
				'infofadedelay'			=> 	($this -> get_option ('infofadedelay')),
				'showthumbs'			=>	(($this -> get_option('thumbnails') == "Y") ? "true" : "false"),
				'thumbsposition'		=>	($this -> get_option('thumbposition')),
				'thumbsborder'			=>	(isset($styles['thumbactive']) ? (empty($styles['thumbactive']  ) ? "#ffffff" : $styles['thumbactive']  ) : "#ffffff" ),
				'thumbsspeed'			=>	($this -> get_option('thumbscrollspeed')),
				'thumbsspacing'			=>	($this -> get_option('thumbspacing')),
				'post_id' 				=> 	null,
				'numberposts'			=>	"-1",
				'exclude' 				=> 	null, 
				'custom' 				=> 	null,
			);
					
			$s = shortcode_atts($defaults, $atts);

			
		    // Sanitize each element in the $s array
		    foreach ($s as $key => $value) {
		        if (is_numeric($value)) {
		            $s[$key] = intval($value); // For integers
		        } elseif (is_array($value)) {
		            $s[$key] = array_map('sanitize_text_field', $value); // For arrays
		        } else {
		            $s[$key] = sanitize_text_field($value); // For strings
		        }
		    }
		    
            if (!in_array($s['orderby'], ['id', 'date', 'name', 'type', 'created' , 'order' , 'random'], true)) {
                $s['orderby'] = array('order', "ASC"); // Default fallback
            }

		    // Additional validation based on the context
		    if (!in_array($s['orderf'], ['id', 'date', 'name', 'type', 'created', 'order'], true)) {
		        $s['orderf'] = 'order'; // Default fallback
		    }

		    if (!in_array(strtoupper($s['orderd']), ['ASC', 'DESC'], true)) {
		        $s['orderd'] = 'ASC'; // Default fallback
		    }


			extract($s);
			
			$slideshowtype = false;

			if (!empty($products)) {
				include_once(ABSPATH . 'wp-admin/includes/plugin.php');			
				if (is_plugin_active('wp-checkout' . DS . 'wp-checkout.php')) {
					$slides = array();
					
					if (empty($orderf) && empty($orderd)) {
						$orderf = "order";
						$orderd = "ASC";
					}
					
					if (class_exists('wpCheckout')) {
						if ($wpCheckout = new wpCheckout()) {
							global $wpcoDb, $Product;
							$wpcoDb -> model = $Product -> model;
							$productstype = $products;
						
							switch ($productstype) {
								case 'latest'		:
									$products = $wpcoDb -> find_all(false, false, array($orderf, $orderd), $productsnumber);
									break;
								case 'featured'		:
									$products = $wpcoDb -> find_all(array('featured' => "1"), false, array($orderf, $orderd), $productsnumber);
									break;
							}
						}
					}
					
					if (!empty($products)) {					
						$slides = $products;
						$slideshowtype = "products";
						$content = $this -> render('gallery', array('slides' => $slides, 'unique' => 'products' . $productstype . $productsnumber, 'products' => true, 'options' => $s, 'frompost' => false), false, 'default');
					} else {
						$error = __('No products are available', 'slideshow-gallery');
					}
				} else {
					$error = sprintf(__('You need the %sShopping Cart plugin%s to display products slides.', 'slideshow-gallery'), '<a href="https://tribulant.com/plugins/view/10/wordpress-shopping-cart-plugin" target="_blank">', '</a>');
				}
			// Featured images
			} elseif (!empty($featured)) {
				global $post;
				
				if (empty($orderf) && empty($orderd)) {
					$orderf = "order";
					$orderd = "ASC";
				}
			
				$args = array(
					'numberposts'				=>	$featurednumber,            	// should show 5 but only shows 3
					'post_type'					=>	$featuredtype,    				// posts only
					'meta_key'					=>	'_thumbnail_id', 				// with thumbnail
					'exclude'					=>	$post -> ID,         			// exclude current post
					'orderby'					=>	$orderf,
					'order'						=>	$orderd,
				);
				
				if ($posts = get_posts($args)) {										
					$slides = $posts;
					$slideshowtype = "featured";
					$content = $this -> render('gallery', array('slides' => $slides, 'unique' => 'featured' . $featuredtype . $featurednumber, 'featured' => true, 'options' => $s, 'frompost' => false), false, 'default');
				} else {
					$error = sprintf(__('No posts with featured images are available. Ensure your theme includes %s support.', 'slideshow-gallery'), '<code>add_theme_support("post-thumbnails");</code>');
				}
			// Slides of a gallery
			} elseif (!empty($gallery_id)) {
				if (!is_array($orderby) && !empty($orderby) && $orderby == "random") {
					$orderbystring = "ORDER BY RAND()";
				} else if (!is_array($orderby) && !empty($orderby) && $orderby != "random" ) {
                    $orderbystring = "ORDER BY " . $orderby  ;
                }
                else {

					if (empty($orderf) && empty($orderd)) {
						list($orderf, $orderd) = $orderby;
					}
					
					if ($orderf == "order") {
						$orderbystring = "ORDER BY " . $this -> GallerySlides() -> table . ".order " . esc_sql($orderd) . "";
					} else {
						$orderbystring = "ORDER BY " . $this -> Slide() -> table . "." . esc_sql($orderf) . " " . esc_sql($orderd) . "";
					}
				}
			
				$slidesquery = "SELECT * FROM " . $this -> Slide() -> table . " LEFT JOIN " . $this -> GallerySlides() -> table . 
				" ON " . $this -> Slide() -> table . ".id = " . $this -> GallerySlides() -> table . ".slide_id WHERE " . 
				$this -> GallerySlides() -> table . ".gallery_id = '" . esc_sql($gallery_id) . "' AND (" . $this -> Slide() -> table . ".expiry = NULL OR " . $this -> Slide() -> table . ".expiry > CURDATE() OR " . $this -> Slide() -> table . ".expiry = '0000-00-00') " . $orderbystring;
				
				$query_hash = md5($slidesquery);
				if ($oc_slides = wp_cache_get($query_hash, 'slideshowgallery')) {
					$slides = $oc_slides;
				} else {
					$slides = $wpdb -> get_results($slidesquery);
					wp_cache_set($query_hash, $slides, 'slideshowgallery', 0);
				}
				
				if (!empty($slides)) {				
					$imagespath = $this -> get_option('imagespath');
				
					foreach ($slides as $skey => $slide) {					
						$slides[$skey] = $this -> init_class($this -> Slide() -> model, $slide);							
						//$slides[$skey] -> image_path = $this -> Html -> image_path($slide);
					}
				
					if ($orderby == "random") { shuffle($slides); }
					$slideshowtype = "gallery";
					$content = $this -> render('gallery', array('slides' => $slides, 'unique' => 'gallery' . $gallery_id . rand(1, 999), 'options' => $s, 'frompost' => false), false, 'default');	
				} else {
					$error = __('No slides are available in this gallery', 'slideshow-gallery');
				}
			// All slides
			} elseif (!empty($custom) || empty($post_id)) {
				if (!empty($orderf) && !empty($orderd)) {
					$orderby = array($orderf, $orderd);
				}
				
				$slides = $this -> Slide() -> find_all(null, null, $orderby);
				
				if (!empty($slides)) {
					foreach ($slides as $slide_key => $slide) {
						
						// Check exclude
						if (!empty($exclude)) {
							$exclude = array_map('trim', explode(',', $exclude));
							if (in_array($slide -> id, $exclude)) {
								unset($slides[$slide_key]);
							}
						}
						
						// Check slide expiration
						if (!empty($slide -> expiry)) {							
							if (strtotime($slide -> expiry) <= time()) {
								unset($slides[$slide_key]);
							}
						}
					}
				}
				
				if ($orderby == "random") { shuffle($slides); }
				$slideshowtype = "slides";
				
				if (!empty($slides)) {
					$content = $this -> render('gallery', array('slides' => $slides, 'unique' => "custom" . rand(1, 999), 'options' => $s, 'frompost' => false), false, 'default');
				} else {
					$error = __('No slides are available', 'slideshow-gallery');
				}
			// Images of a post/page
			} else {
				global $post;
				$pid = (empty($post_id)) ? $post -> ID : $post_id;
				
				if (!is_numeric($post_id)) {
					$pid = $post -> ID;
				}
			
				if (!empty($pid) && $post = get_post($pid)) {
					$children_attributes = array(
						'numberposts'					=>	$numberposts,
						'post_parent'					=>	$post -> ID,
						'post_type'						=>	"attachment",
						'post_status'					=>	"any",
						'post_mime_type'				=>	"image",
						'orderby'						=>	((!empty($orderf)) ? $orderf : "menu_order"),
						'order'							=>	((!empty($orderd)) ? $orderd : "ASC"),
					);
				
					if ($attachments = get_children($children_attributes)) {
						if (!empty($exclude)) {
							$exclude = array_map('trim', explode(',', $exclude));
							
							$a = 0;
							foreach ($attachments as $id => $attachment) {
								//$attachments[$id] = (object) array_map('esc_attr', (array) $attachment);
								
								$a++;
								if (in_array($a, $exclude)) {
									unset($attachments[$id]);
								}
							}
						}
					
						if ($orderby == "random") { shuffle($attachments); }
						$slides = $attachments;
						
						$slideshowtype = "post";
						$content = $this -> render('gallery', array('slides' => $slides, 'unique' => $pid, 'options' => $s, 'frompost' => true), false, 'default');
					} else {
						$error = __('No attachments on this post/page', 'slideshow-gallery');
					}
				} else {
					$error = __('No post/page ID was specified', 'slideshow-gallery');
				}
			}
			
			// Check if this is an RSS Feed?
			if (is_feed()) {
				$content = '';
				ob_start();
				
				$width = $this -> get_option('thumbwidth');
				$height = $this -> get_option('thumbheight');
				
				if (!empty($slides)) {
					switch ($slideshowtype) {
						case 'products'					:
							foreach ($slides as $slide) {
								?>
								
								<a href="<?php echo get_permalink($slide -> post_id); ?>" title="<?php echo esc_attr($slide -> title); ?>">
									<img align="left" hspace="15" src="<?php echo esc_url($this -> Html() -> otf_image_src($slide, $this -> get_option('thumbwidth'), $this -> get_option('thumbheight'), 100)); ?>" />
								</a>
								
								<?php
							}
							break;
						case 'gallery'					:
							foreach ($slides as $slide) {
								?>
								
								<a href="<?php echo esc_url($slide -> image_path); ?>" title="<?php echo esc_attr($slide -> title); ?>">
									<img align="left" hspace="15" src="<?php echo esc_url($this -> Html() -> otf_image_src($slide, $this -> get_option('thumbwidth'), $this -> get_option('thumbheight'), 100)); ?>" alt="<?php echo esc_attr($this -> Html -> sanitize($slide -> title)); ?>" />
								</a>
								
								<?php
							}
							break;
						case 'featured'					:
							foreach ($slides as $slide) {
								?>
								
								<a href="<?php echo esc_url($slide -> guid); ?>" title="<?php echo esc_attr($slide -> post_title); ?>">
									<img align="left" hspace="15" src="<?php echo esc_url($this -> Html() -> otf_image_src($slide, $this -> get_option('thumbwidth'), $this -> get_option('thumbheight'), 100)); ?>" alt="<?php echo esc_attr($this -> Html -> sanitize($slide -> post_title)); ?>" />
								</a>
								
								<?php
							}
							break;
						case 'post'						:
						default 						:
							foreach ($slides as $slide) {
								$full_image_href = wp_get_attachment_image_src($slide -> ID, 'full', false);
								$full_image_url = wp_get_attachment_url($slide -> ID); 
								
								?>
								
								<a href="<?php echo esc_url($full_image_url); ?>" title="<?php echo esc_attr($slide -> post_title); ?>">
									<img align="left" hspace="15" src="<?php echo esc_url($this -> Html() -> otf_image_src($slide, $this -> get_option('thumbwidth'), $this -> get_option('thumbheight'), 100)); ?>" alt="<?php echo $this -> Html -> sanitize($slide -> post_title); ?>" />
								</a>
								
								<?php
							}
							break;
					}
					
					?><hr style="visibility:hidden; height:1px; width:100%; display:block;" /><?php
				}
				
				$content = ob_get_clean();
			}
			
			// Check for error messages
			if (!empty($error)) {
				$content = '';
				$content .= '<p class="slideshow_error slideshow-gallery-error">';
				$content .= wp_unslash($error);
				$content .= '</p>';
			}
			
			remove_filter('excerpt_more', array($this, 'excerpt_more'));
			remove_filter('excerpt_length', array($this, 'excerpt_length'));
			
			return $content;
		}
		
		function admin_slides() {
			global $wpdb;
			$method = (!empty($_GET['method'])) ? sanitize_text_field($_GET['method']) : false;
            $errors = array();
			switch ($method) {
				case 'delete'			:
					check_admin_referer($this -> sections -> slides . '_delete');
					$id = sanitize_text_field($_GET['id']);
					if (!empty($id)) {
						if ($this -> Slide() -> delete($id)) {
							$msg_type = 'message';
							$message = __('Slide has been removed', 'slideshow-gallery');
						} else {
							$msg_type = 'error';
							$message = __('Slide cannot be removed', 'slideshow-gallery');	
						}
					} else {
						$msg_type = 'error';
						$message = __('No slide was specified', 'slideshow-gallery');
					}
					
					$this -> redirect($this -> referer, $msg_type, $message);
					break;
				case 'save'				:				
					if (!empty($_POST)) {	
						check_admin_referer($this -> sections -> slides . '_save');
											
						if ($this -> Slide() -> save($_POST, true)) {
							$message = __('Slide item has been saved', 'slideshow-gallery');
							
							if (!empty($_POST['continueediting'])) {
								$this -> redirect(admin_url('admin.php?page=' . $this -> sections -> slides . '&method=save&id=' . $this -> Slide() -> insertid . '&continueediting=1'), 'message', $message);	
							} else {
								$this -> redirect($this -> url, "message", $message);
							}
						} else {
							$this -> render_err(__('Slide could not be saved', 'slideshow-gallery'));
							$this -> render('slides' . DS . 'save', false, true, 'admin');
						}
					} else {
						$this -> Db -> model = $this -> Slide() -> model;
						$slideId = (isset($_GET['id'])) ? sanitize_text_field($_GET['id']) : 0;
						$this -> Slide() -> find(array('id' => $slideId));
						$this -> render('slides' . DS . 'save', false, true, 'admin');
					}
					break;
				case 'save-multiple'	:
					if (!empty($_POST)) {	
						check_admin_referer($this -> sections -> slides . '_save-multiple');
											

						
						if (!empty($_POST['Slide']['slides'])) {
							$slides = map_deep($_POST['Slide']['slides'], 'sanitize_text_field');
							$galleries = map_deep((empty($_POST['Slide']['galleries']) ? array() : $_POST['Slide']['galleries']) , 'sanitize_text_field');
							
							$s = 0;
							
							foreach ($slides as $attachment_id => $slide) {
								$slide_data = array(
									'Slide'				=>	array(
										'title'				=>	$slide['title'],
										'description'		=>	$slide['description'],
										'image'				=>	basename($slide['url']),
										'attachment_id'		=>	$attachment_id,
										'type'				=>	'media',
										'image_url'			=>	$slide['url'],
										'media_file'		=>	$slide['url'],
										'galleries'			=>	$galleries,
									)
								);
								
								if (!$this -> Slide() -> save($slide_data)) {									
									//$errors = array_merge($errors, $this -> Slide() -> errors);
									$errors[$s] = $this -> Slide() -> errors;
								}
								
								$s++;
							}
							
							if (empty($errors)) {
								$message = __('Slides have been saved', 'slideshow-gallery');
								$this -> redirect(admin_url('admin.php?page=' . $this -> sections -> slides), 'message', $message);
							}
						} else {
							$errors[] = __('No slides were selected', 'slideshow-gallery');
						}
					}
					
					$this -> render('slides' . DS . 'save-multiple', array('errors' => $errors), true, 'admin');
					break;
				case 'order'			:
					if (isset($_GET['gallery_id'])) {
                        $gallery_id = sanitize_text_field($_GET['gallery_id']);
                    } else {
					    $gallery_id = "";
                    }

					if (!empty($gallery_id)) {
						$gallery = $this -> Gallery() -> find(array('id' => $gallery_id));
						
						$slides = array();
						$gsquery = "SELECT gs.slide_id FROM `" . $this -> GallerySlides() -> table . "` gs WHERE `gallery_id` = '" . esc_sql($gallery -> id) . "' ORDER BY gs.order ASC";
						
						$query_hash = md5($gsquery);
						if ($oc_gs = wp_cache_get($query_hash, 'slideshowgallery')) {
							$gs = $oc_gs;
						} else {
							$gs = $wpdb -> get_results($gsquery);
							wp_cache_set($query_hash, $gs, 'slideshowgallery', 0);
						}
						
						if (!empty($gs)) {
							foreach ($gs as $galleryslide) {
								$slides[] = $this -> Slide() -> find(array('id' => $galleryslide -> slide_id));
							}
						}
						
						$this -> render('slides' . DS . 'order-gallery', array('gallery' => $gallery, 'slides' => $slides), true, 'admin');	
					} else {
						$slides = $this -> Slide() -> find_all(null, null, array('order', "ASC"));
						$this -> render('slides' . DS . 'order', array('slides' => $slides), true, 'admin');
					}
					break;
				default					:
					$this -> render('slides' . DS . 'index', false, true, 'admin');
					break;
			}
		}
		
		function admin_galleries() {
			
			$method = (!empty($_GET['method'])) ? sanitize_text_field($_GET['method']) : false;
			switch ($method) {
				case 'save'						:
					if (!empty($_POST)) {	
						check_admin_referer($this -> sections -> galleries . '_save');
											
						if ($this -> Gallery() -> save($_POST, true)) {
							$message = __('Gallery item has been saved', 'slideshow-gallery');
							
							if (!empty($_POST['continueediting'])) {
								$this -> redirect(admin_url('admin.php?page=' . $this -> sections -> galleries . '&method=save&id=' . $this -> Gallery() -> insertid . '&continueediting=1'), 'message', $message);
							} else {
								$this -> redirect($this -> url, "message", $message);
							}
						} else {
							$this -> render('galleries' . DS . 'save', false, true, 'admin');
						}
					} else {
						$this -> Db -> model = $this -> Gallery() -> model;
						$galleryId = (isset($_GET['id'])) ? sanitize_text_field($_GET['id']) : 0;
						$this -> Gallery() -> find(array('id' => $galleryId));
						$this -> render('galleries' . DS . 'save', false, true, 'admin');
					}
					break;
				case 'view'						:
					$this -> Db -> model = $this -> Gallery() -> model;
					$gallery = $this -> Gallery() -> find(array('id' => sanitize_text_field($_GET['id'])));
					$perpage = (isset($_COOKIE[$this -> pre . 'slidesperpage'])) ? sanitize_text_field($_COOKIE[$this -> pre . 'slidesperpage']) : 25;
					$orderfield = (empty($_GET['orderby'])) ? 'modified' : sanitize_text_field($_GET['orderby']);
					$orderdirection = (empty($_GET['order'])) ? 'DESC' : strtoupper(sanitize_text_field($_GET['order']));
					$order = array($orderfield, $orderdirection);
					$data = $this -> paginate('GallerySlides', "*", $this -> sections -> galleries . '&method=view&id=' . $gallery -> id, array('gallery_id' => $gallery -> id), false, $perpage, $order);
					
					if ( ! is_array( $data ) ) {
						$data = [];
					}

					$data['Slide'] = array();
					if (!empty($data[$this -> GallerySlides() -> model])) {
						foreach ($data[$this -> GallerySlides() -> model] as $galleryslide) {
							$this -> Db -> model = $this -> Slide() -> model;
							$data['Slide'][] = $this -> Slide() -> find(array('id' => $galleryslide -> slide_id));
						}
					}
					
					$data_paginate = isset( $data['Paginate'] ) ? $data['Paginate'] : false;

					$this -> render('galleries' . DS . 'view', array('gallery' => $gallery, 'slides' => $data[$this -> Slide() -> model], 'paginate' => $data_paginate), true, 'admin');
					break;
				case 'hardcode'			:
					$this -> Db -> model = $this -> Gallery() -> model;
					$gallery = $this -> Gallery() -> find(array('id' => sanitize_text_field($_GET['id'])));					
					$this -> render('galleries' . DS . 'hardcode', array('gallery' => $gallery), true, 'admin');
					break;
				case 'delete'			:
					check_admin_referer($this -> sections -> galleries . '_delete');

					$id = sanitize_text_field($_GET['id']);
					if (!empty($id)) {
						if ($this -> Gallery() -> delete($id)) {
							$msg_type = 'message';
							$message = __('Gallery has been removed', 'slideshow-gallery');
						} else {
							$msg_type = 'error';
							$message = __('Gallery cannot be removed', 'slideshow-gallery');	
						}
					} else {
						$msg_type = 'error';
						$message = __('No gallery was specified', 'slideshow-gallery');
					}
					
					$this -> redirect($this -> referer, $msg_type, $message);
					break;
				default							:
					$this -> render('galleries' . DS . 'index', false, true, 'admin');
					break;
			}
		}
		
		function admin_settings() {
			global $wpdb;
			$method = (!empty($_GET['method'])) ? sanitize_text_field($_GET['method']) : false;
		
			switch ($method) {
				case 'clearlog'			:
				
					check_admin_referer($this -> sections -> settings . '_clearlog');
				
					@unlink(SLIDESHOW_LOG_FILE);
					
					$fh = fopen(SLIDESHOW_LOG_FILE, "w");
					fwrite($fh, "*** Slideshow Log File *** \r\n\r\n");
					fclose($fh);
					chmod(SLIDESHOW_LOG_FILE, 0777);
					
					$msgtype = 'message';
					$message = __('Log file has been cleared', 'slideshow-gallery');
					$this -> redirect($this -> referer, $msgtype, $message);
				
					break;
				case 'dismiss'			:
					if (!empty($_GET['dismiss'])) {
						$this -> update_option('dismiss_' . sanitize_text_field($_GET['dismiss']), 1);
					}
					
					$this -> redirect($this -> referer);
					break;
				case 'checkdb'			:
					check_admin_referer($this -> sections -> settings . '_checkdb');
					$this -> check_tables();
					
					if (!empty($this -> models)) {
						foreach ($this -> models as $model) {
							$query = "OPTIMIZE TABLE `" . $this -> {$model}() -> table . "`";
							$wpdb -> query($query);
						}
					}
				
					$this -> redirect($this -> referer, 'message', __('Database tables have been checked and optimized', 'slideshow-gallery'));
					break;
				case 'reset'			:
					check_admin_referer($this -> sections -> settings . '_reset');
					global $wpdb;
					$query = "DELETE FROM `" . $wpdb -> prefix . "options` WHERE `option_name` LIKE '" . esc_sql($this -> pre) . "%';";
					
					if ($wpdb -> query($query)) {
						$this -> initialize_options();
					
						$message = __('All settings have been reset to their defaults', 'slideshow-gallery');
						$msg_type = 'message';
						$this -> render_msg($message);	
					} else {
						$message = __('Settings could not be reset', 'slideshow-gallery');
						$msg_type = 'error';
						$this -> render_err($message);
					}
					
					$this -> redirect($this -> url, $msg_type, $message);
					break;
				default					:
					if (!empty($_POST)) {	
						check_admin_referer($this -> sections -> settings);
											
						delete_option('tridebugging');
						$this -> delete_option('infohideonmobile');
						$this -> delete_option('autoheight');
						$this -> delete_option('language_external');
						$this -> delete_option('excerptsettings');
						$this -> delete_option('infofade');
						$this -> delete_option('fadedelay');
						$this -> delete_option('infoonhover');
						$this -> delete_option('thumbhideonmobile');
					
						foreach ($_POST as $pkey => $pval) {					
							switch ($pkey) {
								case 'styles'				:
									$styles = array();
									foreach ($pval as $pvalkey => $pvalval) {
										switch ($pvalkey) {
											case 'layout'			:
												if (!$this -> ci_serial_valid()) {
													$styles[$pvalkey] = "specific";
												} else {
													$styles[$pvalkey] = $pvalval;
												}
												break;
											default 				:
												$styles[$pvalkey] = $pvalval;
												break;
										}
									}
									
									$this -> update_option('styles', $styles);
									break;
								case 'debugging'			:
									if (!empty($pval)) {
										update_option('tridebugging', 1);
									}
									break;
								case 'excerpt_readmore'		:
									if ($this -> language_do()) {
										$this -> update_option($pkey, $this -> language_join($pval));
									} else {
										$this -> update_option($pkey, $pval);
									}
									break;
								case 'permissions'			:
									global $wp_roles;
									$role_names = $wp_roles -> get_names();
								
									if (!empty($_POST['permissions'])) {
										$permissions = map_deep($_POST['permissions'], 'sanitize_text_field');
										
										foreach ($role_names as $role_key => $role_name) {
											foreach ($this -> sections as $section_key => $section_name) {
												$wp_roles -> remove_cap($role_key, 'slideshow_' . $section_key);
												
												if (!empty($permissions[$role_key]) && in_array($section_key, $permissions[$role_key])) {
													$wp_roles -> add_cap($role_key, 'slideshow_' . $section_key);
												}
												
												if ($role_key == "administrator") {
													$wp_roles -> add_cap("administrator", 'slideshow_' . $section_key);
													$permissions[$role_key][] = $section_key;
												}
											}
										}
									}
									
									$this -> update_option('permissions', $permissions);
									break;
								default						:								
									$this -> update_option($pkey, $pval);
									break;
							}
						}
						
						if (!$this -> ci_serial_valid()) {
							$this -> update_option('effect', "slide");
							$this -> update_option('easing', "swing");
							$this -> update_option('infodelay', "0");
							$this -> delete_option('infohideonmobile');
							$this -> delete_option('excerptsettings');
							$this -> update_option('imagesthickbox', "N");
							$this -> delete_option('thumbhideonmobile');
						}
						
						$message = __('Settings has been saved', 'slideshow-gallery');
						$this -> render_msg($message);
					}	
					
					$this -> render('settings', false, true, 'admin');
					break;
			}
		}
		
		function admin_settings_updates() {			
			$method = (!empty($_GET['method'])) ? sanitize_text_field($_GET['method']) : false;
			switch ($method) {
				case 'check'				:
					delete_transient('slideshow_update_info');
					$this -> redirect($this -> referer);
					break;
			}

			$this -> render('settings-updates', false, true, 'admin');
		}
		
		public function secureSlideshowGalleryLiteLog() {
            // Define the path to the .htaccess file
            $htaccessPath = ABSPATH . '.htaccess'; // ABSPATH is the WordPress root directory
            // Directive to add for restricting access to newsletters.log
            $restrictionDirective = "\n<FilesMatch \"^slideshow\\.log$\">\nOrder Allow,Deny\nDeny from all\n</FilesMatch>\n";
            // Check if the .htaccess file exists
            if (file_exists($htaccessPath)) {
                $contents = file_get_contents($htaccessPath);
                
                // Check if the directive is already present
                if (strpos($contents, trim($restrictionDirective)) === false) {
                    // Directive not found, append it
                    file_put_contents($htaccessPath, $restrictionDirective, FILE_APPEND);
                    echo "Directive added to existing .htaccess file.";
                } else {
                    // Directive already exists
                    echo "Directive already exists in .htaccess file.";
                }
            } else {
                // .htaccess file does not exist, create it and add the directive
                file_put_contents($htaccessPath, $restrictionDirective);
                echo "No .htaccess file found. New file created with directive.";
            }
        }

		
		function activation_hook() {
            $this->secureSlideshowGalleryLiteLog();
			$this -> add_option('activation_redirect', true);
		}
		
		function custom_redirect() {
		
			$method = (!empty($_GET['slideshow_method'])) ? sanitize_text_field($_GET['slideshow_method']) : false;
			if (!empty($method)) {
				switch ($method) {
					case 'hidemessage'					:
						if (!empty($_GET['message'])) {
							switch ($_GET['message']) {
								case 'upgradetopro'				:
									$this -> update_option('hidemessage_upgradetopro', true);
									break;
								case 'ratereview'				:
									$this -> delete_option('showmessage_ratereview');
									$this -> redirect($this -> referer);
									break;
							}
						}
						break;
					case 'hideupdate'					:					
						if (!empty($_GET['version'])) {
							$this -> update_option('hideupdate', sanitize_text_field($_GET['version']));
							$this -> redirect($this -> referer);
						}
						break;
				}
			}
			
			$activation_redirect = $this -> get_option('activation_redirect');
			if (is_admin() && !empty($activation_redirect)) {
				$this -> delete_option('activation_redirect');
				wp_cache_flush();
				wp_redirect(admin_url('index.php?page=' . $this -> sections -> about));
			}
		}
	}
}

if (!function_exists('SG')) {
	function SG($param = null) {
		return new SlideshowGallery($param);
	}
}

//initialize a Gallery object
global $Gallery;
$Gallery = new SlideshowGallery();
register_activation_hook(plugin_basename(__FILE__), array($Gallery, 'initialize_options'));
register_activation_hook(plugin_basename(__FILE__), array($Gallery, 'activation_hook'));

if (!function_exists('slideshow')) {
	function slideshow($output = true, $gallery_id = null, $post_id = null, $params = array()) {
		$params['gallery_id'] = $gallery_id;
		$params['post_id'] = $post_id;
	
		$Gallery = new SlideshowGallery();
		$content = $Gallery -> embed($params, false);
		
		if ($output == true) {
			echo wp_kses_post($content);
		} else {
			return $content;
		}
	}
}

?>
