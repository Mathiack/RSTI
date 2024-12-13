<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class GalleryGallery extends GalleryDbHelper {

	var $table;
	var $model = 'Gallery';
	var $controller = "galleries";
	
	var $data = array();
	var $errors = array();
	
	var $fields = array(
		'id'				=>	"INT(11) NOT NULL AUTO_INCREMENT",
		'title'				=>	"VARCHAR(150) NOT NULL DEFAULT ''",
		'created'			=>	"DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'",
		'modified'			=>	"DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'",
		'key'				=>	"PRIMARY KEY (`id`)",
	);

	public $id;
	public $slidescount;
	public $title;
	public $created;
	public $modified;

	function __construct($data = array()) {
		global $wpdb;
		$this -> plugin_name = basename(dirname(dirname(__FILE__)));
		$this -> table = $wpdb -> prefix . strtolower($this -> pre) . "_" . $this -> controller;
		if (is_admin()) { $this -> check_table($this -> model); }
	
		if (!empty($data)) {
			foreach ($data as $dkey => $dval) {
				$this -> {$dkey} = stripslashes_deep($dval); 
				
				switch ($dkey) {
					case 'id'			:
						$slidescountquery = "SELECT COUNT(`id`) FROM `" . $wpdb -> prefix . strtolower($this -> pre) . "_galleriesslides` WHERE `gallery_id` = '" . esc_sql($dval) . "'";
						
						$query_hash = md5($slidescountquery);
						if ($oc_slidescount = wp_cache_get($query_hash, 'slideshowgallery')) {
							$this -> slidescount = $oc_slidescount;
						} else {
							$this -> slidescount = $wpdb -> get_var($slidescountquery);
							wp_cache_set($query_hash, $this -> slidescount, 'slideshowgallery', 0);	
						}
						break;
				}
			}
		}
		
		return true;
	}
	
	function select() {
		$select = array();
		
		if ($galleries = $this -> find_all()) {
			foreach ($galleries as $gallery) {
				$select[$gallery -> id] = $gallery -> title;
			}
		}
		
		return $select;
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
			
			if (empty($title)) { $this -> errors['title'] = __('Please fill in a title', 'slideshow-gallery'); }
		} else {
			$this -> errors[] = __('No data was posted', 'slideshow-gallery');
		}
		
		return apply_filters('slideshow_gallery_validation', $this -> errors, $data);
	}
}

include_once(dirname(__FILE__) . DS . 'slideshow.php');

?>