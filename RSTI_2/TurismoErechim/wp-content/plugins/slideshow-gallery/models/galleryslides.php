<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class GalleryGallerySlides extends GalleryDbHelper {

	var $table;
	var $model = 'GallerySlides';
	var $controller = "galleriesslides";
	
	var $data = array();
	var $errors = array();
	
	var $fields = array(
		'id'				=>	"INT(11) NOT NULL AUTO_INCREMENT",
		'gallery_id'		=>	"INT(11) NOT NULL DEFAULT '0'",
		'slide_id'			=>	"INT(11) NOT NULL DEFAULT '0'",
		'order'				=>	"INT(11) NOT NULL DEFAULT '0'",
		'created'			=>	"DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'",
		'modified'			=>	"DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'",
		'key'				=>	"PRIMARY KEY (`id`), INDEX(`gallery_id`), INDEX(`slide_id`)",
	);
	
	var $indexes = array('gallery_id', 'slide_id');

	function __construct($data = array()) {
		global $wpdb;
		$this -> plugin_name = basename(dirname(dirname(__FILE__)));
		$this -> table = $wpdb -> prefix . strtolower($this -> pre) . "_" . $this -> controller;
		if (is_admin()) { $this -> check_table($this -> model); }
	
		if (!empty($data)) {
			foreach ($data as $dkey => $dval) {
				$this -> {$dkey} = $dval;
			}
		}
		
		return true;
	}
	
	function table() {
		$this -> table = $wpdb -> prefix . strtolower($this -> pre) . "_" . $this -> controller;
		return $this -> table;
	}
	
	function defaults() {
		$defaults = array(
			'created'			=>	$this -> Html -> gen_date(),
			'modified'			=>	$this -> Html -> gen_date(),
		);
		
		return $defaults;
	}
	
	function validate($data = null) {
		$this -> errors = array();
	
		if (!empty($data)) {
			$data = (empty($data[$this -> model])) ? $data : $data[$this -> model];
			
			foreach ($data as $dkey => $dval) {
				$this -> data -> {$dkey} = wp_unslash($dval);
			}
			
			extract($data, EXTR_SKIP);
			
			if (empty($gallery_id)) { $this -> errors['title'] = __('No gallery was specified', 'slideshow-gallery'); }
			if (empty($slide_id)) { $this -> errors['title'] = __('No slide was specified', 'slideshow-gallery'); }
			
			if (empty($this -> errors)) {
				if ($galleryslide = $this -> find(array('gallery_id' => $gallery_id, 'slide_id' => $slide_id))) {
					$this -> data -> id = $galleryslide -> id;
				}
			}
		} else {
			$this -> errors[] = __('No data was posted', 'slideshow-gallery');
		}
		
		return $this -> errors;
	}
}

include_once(dirname(__FILE__) . DS . 'slideshow.php');

?>