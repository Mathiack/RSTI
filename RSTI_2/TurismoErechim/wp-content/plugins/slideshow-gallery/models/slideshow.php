<?php

if (!class_exists('slideshow_lite')) {
	class slideshow_lite extends GalleryPlugin {
		
		function __construct() {			
			$this -> initialize_classes();
				
			if (!is_multisite() || (is_multisite() && $this -> is_plugin_active($this -> plugin_file))) {					
				if (!$this -> ci_serial_valid()) {
					$this -> add_filter('slideshow_sections', 'lite_sections', 10, 1);
					$this -> sections = apply_filters('slideshow_sections', (object) $this -> sections);		
					$this -> add_action('slideshow_admin_menu', 'lite_admin_menu', 10, 1);
					$this -> add_action('admin_bar_menu', 'lite_admin_bar_menu', 999, 1);
				}
			}
		}
		
		function lite_sections($sections = null) {
			$sections = (object) $sections;
			$sections -> lite_upgrade = "slideshow-lite-upgrade";			
			return $sections;
		}
		
		function lite_admin_menu($menus = null) {
			add_submenu_page($this -> sections -> welcome, __('Upgrade to PRO', 'slideshow-gallery'), __('Upgrade to PRO', 'slideshow-gallery'), 'slideshow_welcome', $this -> sections -> lite_upgrade, array($this, 'lite_upgrade'));
		}
		
		function lite_upgrade() {
			$this -> render('lite-upgrade', false, true, 'admin');
		}
		
		function lite_admin_bar_menu($wp_admin_bar = null) {
			global $wp_admin_bar, $blog_id;

			if (is_multisite()) {				
				if (is_network_admin()) {
					return;
				}
			}
			
			if (!current_user_can('slideshow_welcome')) {
				return;
			}
		
			$args = array(
				'id'		=>	'slideshowlite',
				'title'		=>	__('Slideshow LITE', 'slideshow-gallery'),
				'href'		=>	admin_url('admin.php?page=' . $this -> sections -> lite_upgrade),
				'meta'		=>	array('class' => 'slideshow-lite'),
			);
			
			$wp_admin_bar -> add_node($args);
			
			$args = array(
				'id'		=>	'slideshowlite_submitserial',
				'title'		=>	__('Submit Serial Key', 'slideshow-gallery'),
				'parent'	=>	'slideshowlite',
				'href'		=>	admin_url('admin.php?page=' . $this -> sections -> submitserial),
				'meta'		=>	array('class' => 'slideshow-lite-submitserial', 'onclick' => "jQuery.colorbox({href:ajaxurl + \"?action=slideshow_serialkey&security=" . wp_create_nonce('serialkey') . "\"}); return false;"),
			);
			
			$wp_admin_bar -> add_node($args);
			
			$args = array(
				'id'		=>	'slideshowlite_upgrade',
				'title'		=>	__('Upgrade to PRO now!', 'slideshow-gallery'),
				'parent'	=>	'slideshowlite',
				'href'		=>	admin_url('admin.php?page=' . $this -> sections -> lite_upgrade),
				'meta'		=>	array('class' => 'slideshow-lite-upgrade'),
			);
			
			$wp_admin_bar -> add_node($args);
		}
	}
	
	add_action('plugins_loaded', 'load_slideshow_lite');
	
	function load_slideshow_lite() {
		$slideshow_lite = new slideshow_lite();
		return $slideshow_lite;
	}
}

?>