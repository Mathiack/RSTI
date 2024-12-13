<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class GalleryHtmlHelper extends GalleryPlugin {

	function __construct() {
		$this -> plugin_name = basename(dirname(dirname(__FILE__)));
	}

	function help($help = null) {
		if (!empty($help)) {
			ob_start();

			?>

			<span class="galleryhelp">
				<a href="" onclick="return false;" title="<?php echo esc_attr(wp_unslash($help)); ?>"><i class="fa fa-question-circle"></i></a>
			</span>

			<?php

			$html = ob_get_clean();
			return $html;
		}
	}
	
	/*
	 * Matches each symbol of PHP date format standard
	 * with jQuery equivalent codeword
	 * @author Tristan Jahier
	 */
	function dateformat_PHP_to_jQueryUI($php_format = null) {
	    $SYMBOLS_MATCHING = array(
	        // Day
	        'd' => 'dd',
	        'D' => 'D',
	        'j' => 'd',
	        'l' => 'DD',
	        'N' => '',
	        'S' => '',
	        'w' => '',
	        'z' => 'o',
	        // Week
	        'W' => '',
	        // Month
	        'F' => 'MM',
	        'm' => 'mm',
	        'M' => 'M',
	        'n' => 'm',
	        't' => '',
	        // Year
	        'L' => '',
	        'o' => '',
	        'Y' => 'yy',
	        'y' => 'y',
	        // Time
	        'a' => '',
	        'A' => '',
	        'B' => '',
	        'g' => '',
	        'G' => '',
	        'h' => '',
	        'H' => '',
	        'i' => '',
	        's' => '',
	        'u' => ''
	    );
	    
	    $jqueryui_format = "";
	    $escaping = false;
	    for($i = 0; $i < strlen($php_format); $i++) {
	        $char = $php_format[$i];
	        if($char === '\\') {
	            $i++;
	            if($escaping) $jqueryui_format .= $php_format[$i];
	            else $jqueryui_format .= '\'' . $php_format[$i];
	            $escaping = true;
	        } else {
	            if($escaping) { $jqueryui_format .= "'"; $escaping = false; }
	            if(isset($SYMBOLS_MATCHING[$char]))
	                $jqueryui_format .= $SYMBOLS_MATCHING[$char];
	            else
	                $jqueryui_format .= $char;
	        }
	    }
	    
	    return $jqueryui_format;
	}

	function is_image($filename = null) {
		if (!empty($filename)) {
			if ($filetype = wp_check_filetype($filename)) {
				if (!empty($filetype['ext']) && ($filetype['ext'] == "bmp" || $filetype['ext'] == "png" || $filetype['ext'] == "jpg" || $filetype['ext'] == "jpeg")) {
					return true;
				}
			}
		}

		return false;
	}

	function uploads_path() {
		if ($upload_dir = wp_upload_dir()) {
			return str_replace("\\", "/", $upload_dir['basedir']);
		}

		return str_replace("\\", "/", WP_CONTENT_DIR . '/uploads');
	}

	function uploads_url() {
		if ($upload_dir = wp_upload_dir()) {
			return $upload_dir['baseurl'];
		}

		return site_url() . '/wp-content/uploads';
	}

	function section_name($section = null) {
		if (!empty($section)) {
			switch ($section) {
				case 'slides'			:
					$name = __('Manage Slides', 'slideshow-gallery');
					break;
				case 'galleries'		:
					$name = __('Manage Galleries', 'slideshow-gallery');
					break;
				case 'settings'			:
					$name = __('Settings', 'slideshow-gallery');
					break;
			}

			return isset($name) ? $name : false;
		}

		return false;
	}

	function link($name = null, $href = '/', $args = array()) {
		$defaults = array(
			'title'			=>	(empty($args['title'])) ? $name : $args['title'],
			'target'		=>	"_self",
			'class' 		=>	"wpco",
			'rel'			=>	"",
			'onclick'		=>	"",
		);

		$r = wp_parse_args($args, $defaults);
		extract($r, EXTR_SKIP);

		ob_start();

		?><a class="<?php echo esc_attr($class); ?>" rel="<?php echo esc_attr($rel); ?>" <?php echo (!empty($onclick)) ? 'onclick="' . $onclick . '"' : ''; ?> href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" title="<?php echo esc_attr($title); ?>"><?php echo esc_html($name); ?></a><?php

		$link = ob_get_clean();
		return $link;
	}

	function filename($url = null) {
		if (!empty($url)) {
			return basename($url);
		}

		return false;
	}

	function thumbname($filename = null, $append = "thumb") {
		if (!empty($filename)) {
			$name = $this -> strip_ext($filename, "name");
			$ext = $this -> strip_ext($filename, "ext");

			return $name . '-' . $append . '.' . $ext;
		}

		return false;
	}

	function bfithumb_image($image = null, $width = null, $height = null, $quality = 100, $class = "slideshow", $rel = "") {
		require_once($this -> plugin_base() . DS . 'vendors' . DS . 'BFI_Thumb.php');

		$params = array();
		if (!empty($width)) { $params['width'] = $width; }
		if (!empty($height)) { $params['height'] = $height; }
		$resizeimagescrop = $this -> get_option('resizeimagescrop');
		$crop = (!empty($resizeimagescrop) && $resizeimagescrop == "Y") ? true : false;
		$params['crop'] = $crop;

		$src = bfi_thumb($image, $params);

		$oldimagename = basename($src);
		$name = $this -> strip_ext($oldimagename, 'name');
		$imagename = $name . '.' . $this -> strip_ext($oldimagename, 'ext');
		$src = str_replace($oldimagename, $imagename, $src);

		$tt_image = '<img src="' . $src . '" />';
		return $tt_image;
	}

	function bfithumb_image_src($image = null, $width = null, $height = null, $quality = 100) {
		require_once($this -> plugin_base() . DS . 'vendors' . DS . 'BFI_Thumb.php');

		$params = array();
		if (!empty($width)) { $params['width'] = $width; }
		if (!empty($height)) { $params['height'] = $height; }
		$resizeimagescrop = $this -> get_option('resizeimagescrop');
		$crop = (!empty($resizeimagescrop) && $resizeimagescrop == "Y") ? true : false;
		$params['crop'] = $crop;

		$src = bfi_thumb($image, $params);

		$oldimagename = basename($src);
		$name = $this -> strip_ext($oldimagename, 'name');
		$imagename = $name . '.' . $this -> strip_ext($oldimagename, 'ext');
		$src = str_replace($oldimagename, $imagename, $src);

		$tt_image = $src;
		return $tt_image;
	}

	function otf_image_src($slide = null, $width = null, $height = null, $quality = 100) {
		$objectname = get_class($slide);

		if (!empty($slide -> attachment_id) && wp_get_attachment_image_src($slide -> attachment_id)) {						
			$image_src = wp_get_attachment_image_src($slide -> attachment_id, array($width, $height), false);			
			return $image_src[0];
		} elseif (!empty($objectname) && $objectname == "WP_Post" && !empty($slide -> ID)) {			
			$image_src = wp_get_attachment_image_src($slide -> ID, array($width, $height), false);
			return $image_src[0];
		}

		return $this -> bfithumb_image_src($slide -> image_path, $width, $height, $quality);
	}

	function bfithumb_url() {
		return plugins_url() . '/' . $this -> plugin_name . '/vendors/bfithumb.php';
	}

	function image_url($filename = null) {
		if (!empty($filename)) {
			return $this -> uploads_url() . '/' . $this -> plugin_name . '/' . $filename;
		}

		return false;
	}

	function image_path($slide = null) {
		$imagespath = $this -> get_option('imagespath');

		if (!empty($slide)) {

			$upload_dir = wp_upload_dir();
			$upload_path = $upload_dir['basedir'] . '/' . $slide -> image;
			if (file_exists($upload_path)) {
				$upload_dir['baseurl'] = $this -> replace_https($upload_dir['baseurl']);
				$image_path = $upload_dir['baseurl'] . '/' . $slide -> image;
				return $image_path;
			}

			switch ($slide -> type) {
				case 'media'				:
					$image_path = $slide -> image_url;
					break;
				case 'file'					:
				case 'url'					:
				default						:
					if (empty($imagespath)) {
						$image_path = $this -> uploads_path() . DS . $this -> plugin_name . DS . $slide -> image;
					} else {
						$image_path = rtrim($imagespath, DS) . DS . $slide -> image;
					}
					break;
			}

			return $this -> replace_https($image_path);
		}

		return false;
	}

	function field_name($name = null) {
		if (!empty($name)) {
			if ($mn = $this -> strip_mn($name)) {
				return $mn[1] . '[' . $mn[2] . ']';
			}
		}

		return $name;
	}

	function field_error($name = null, $el = "p") {
		if (!empty($name)) {
			if ($mn = $this -> strip_mn($name)) {
				$errors = array();

				switch ($mn[1]) {
					case 'Slide'		:
						$errors = $this -> GallerySlide() -> validate($_POST);
						break;
				}

				if (!empty($errors[$mn[2]])) {
					$error = '<' . $el . ' class="' . $this -> pre . 'error">' . $errors[$mn[2]] . '</' . $el . '>';

					return $error;
				}
			}
		}

		return false;
	}

	function field_value($name = null) {
		if ($mn = $this -> strip_mn($name)) {
			$value = $this -> {$mn[1]} -> data -> {$mn[2]};

			return $value;
		}

		return false;
	}

	function queryString($params, $name = null) {

		$ret = "";
		foreach ($params as $key => $val) {
			if (is_array($val)) {
				if ($name == null) {
					$ret .= $this -> queryString($val, $key);
				} else {
					$ret .= $this -> queryString($val, $name . "[$key]");
				}
			} else {
				if ($name != null) {
					$ret .= esc_html($name . "[$key]") . "=" . esc_html($val) . "&";
				} else {
					$ret .= esc_html($key) . "=" . esc_html($val) . "&";
				}
			}
		}

		return rtrim($ret, "&");
	}
	
	function retainquery($add = null, $old_url = null, $endslash = true, $onlyquery = false) {		
		$add_parts = $add;
		if (!is_array($add)) {
			$add = str_replace("&amp;", "&", $add);
			parse_str($add, $add_parts);
		}
		
		$url = (empty($old_url)) ? $_SERVER['REQUEST_URI'] : rtrim($old_url, '&');
		return add_query_arg($add_parts, $url);
	}

	function strip_ext($filename = null, $return = 'ext') {
		if (!empty($filename)) {
			$pathinfo = pathinfo($filename);

			if ($return == "ext") {
				return strtolower($pathinfo['extension']);
			} else {
				return $pathinfo['filename'];
			}
		}

		return false;
	}

	function strip_mn($name = null) {
		if (!empty($name)) {
			if (preg_match("/^(.*?)\.(.*?)$/si", $name, $matches)) {
				return $matches;
			}
		}

		return false;
	}

	function gen_date($format = "Y-m-d H:i:s", $time = false) {
		$format = (empty($format)) ? get_option('date_format') : $format;
		$time = (empty($time)) ? time() : $time;
		$date = date_i18n($format, $time);

		return $date;
	}

	function array_to_object($array = array()) {
		//type casting...
		return (object) $array;
	}

	function sanitize($string = null, $sep = '-') {
		if (!empty($string)) {
			$string = preg_replace("/[^0-9a-z" . $sep . "]/si", "", strtolower(str_replace(" ", $sep, $string)));
			$string = preg_replace("/" . $sep . "[" . $sep . "]*/i", $sep, $string);

			return $string;
		}

		return false;
	}
}