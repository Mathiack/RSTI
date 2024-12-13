<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!class_exists('GalleryCheckinit')) {
	class GalleryCheckinit {

		protected static $allowed_html = array(

                'address'    => array(),
                'a'          => array(
                    'href'     => true,
                    'rel'      => true,
                    'rev'      => true,
                    'name'     => true,
                    'target'   => true,
                    'download' => array(
                        'valueless' => 'y',
                    ),
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                    'title' =>  true,
                ),
                'abbr'       => array(
	                'title'     => true,
	            ),
                'acronym'    => array(),
                'area'       => array(
                    'alt'    => true,
                    'coords' => true,
                    'href'   => true,
                    'nohref' => true,
                    'shape'  => true,
                    'target' => true,
                ),
                'article'    => array(
                    'align' => true,
                ),
                'aside'      => array(
                    'align' => true,
                ),
                'audio'      => array(
                    'autoplay' => true,
                    'controls' => true,
                    'loop'     => true,
                    'muted'    => true,
                    'preload'  => true,
                    'src'      => true,
                ),
                'b'          => array(),
                'bdo'        => array(),
                'big'        => array(),
                'blockquote' => array(
                    'cite' => true,
                ),
                'br'         => array(),
                'button'     => array(
                    'disabled' => true,
                    'name'     => true,
                    'type'     => true,
                    'value'    => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'caption'    => array(
                    'align' => true,
                ),
                'cite'       => array(),
                'code'       => array(),
                'col'        => array(
                    'align'   => true,
                    'char'    => true,
                    'charoff' => true,
                    'span'    => true,
                    'valign'  => true,
                    'width'   => true,
                ),
                'colgroup'   => array(
                    'align'   => true,
                    'char'    => true,
                    'charoff' => true,
                    'span'    => true,
                    'valign'  => true,
                    'width'   => true,
                ),
                'del'        => array(
                    'datetime' => true,
                ),
                'dd'         => array(),
                'dfn'        => array(),
                'details'    => array(
                    'align' => true,
                    'open'  => true,
                ),
                'div'        => array(
                    'align' => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'dl'         => array(),
                'dt'         => array(),
                'em'         => array(),
                'fieldset'   => array(),
                'figure'     => array(
                    'align' => true,
                ),
                'figcaption' => array(
                    'align' => true,
                ),
                'font'       => array(
                    'color' => true,
                    'face'  => true,
                    'size'  => true,
                ),
                'footer'     => array(
                    'align' => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'head' => array(),

                'h1'         => array(
                    'align' => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'h2'         => array(
                    'align' => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'h3'         => array(
                    'align' => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'h4'         => array(
                    'align' => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'h5'         => array(
                    'align' => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'h6'         => array(
                    'align' => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'header'     => array(
                    'align' => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'hgroup'     => array(
                    'align' => true,
                ),
                'hr'         => array(
                    'align'   => true,
                    'noshade' => true,
                    'size'    => true,
                    'width'   => true,
                ),
                'i'          => array(),
                'img'        => array(
                    'alt'      => true,
                    'align'    => true,
                    'border'   => true,
                    'height'   => true,
                    'hspace'   => true,
                    'loading'  => true,
                    'longdesc' => true,
                    'vspace'   => true,
                    'src'      => true,
                    'usemap'   => true,
                    'width'    => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'ins'        => array(
                    'datetime' => true,
                    'cite'     => true,
                ),
                'kbd'        => array(),
                'label'      => array(
                    'for' => true,
                    'id' => true,
                    'class' => true,
                ),
                'legend'     => array(
                    'align' => true,
                ),
                'li'         => array(
                    'align' => true,
                    'value' => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'main'       => array(
                    'align' => true,
                ),
                'map'        => array(
                    'name' => true,
                ),
                'mark'       => array(),
                'menu'       => array(
                    'type' => true,
                ),
                'nav'        => array(
                    'align' => true,
                ),
                'object'     => array(
                    'data' => array(
                        'required'       => true,
                        'value_callback' => '_wp_kses_allow_pdf_objects',
                    ),
                    'type' => array(
                        'required' => true,
                        'values'   => array( 'application/pdf' ),
                    ),
                ),
                'style'      => array (
                     'type' =>    true,
                ),
                'p'          => array(
                    'align' => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'pre'        => array(
                    'width' => true,
                ),
                'q'          => array(
                    'cite' => true,
                ),
                'rb'         => array(),
                'rp'         => array(),
                'rt'         => array(),
                'rtc'        => array(),
                'ruby'       => array(),
                's'          => array(),
                'samp'       => array(),
                'span'       => array(
                    'align' => true,
                ),
                'section'    => array(
                    'align' => true,
                    'id' => true,
                    'class' => true,
                ),
                'small'      => array(),
                'strike'     => array(),
                'strong'     => array(),
                'sub'        => array(),
                'summary'    => array(
                    'align' => true,
                ),
                'sup'        => array(),
                'table'      => array(
                    'align'       => true,
                    'bgcolor'     => true,
                    'border'      => true,
                    'cellpadding' => true,
                    'cellspacing' => true,
                    'rules'       => true,
                    'summary'     => true,
                    'width'       => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'tbody'      => array(
                    'align'   => true,
                    'char'    => true,
                    'charoff' => true,
                    'valign'  => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'td'         => array(
                    'abbr'    => true,
                    'align'   => true,
                    'axis'    => true,
                    'bgcolor' => true,
                    'char'    => true,
                    'charoff' => true,
                    'colspan' => true,
                    'headers' => true,
                    'height'  => true,
                    'nowrap'  => true,
                    'rowspan' => true,
                    'scope'   => true,
                    'valign'  => true,
                    'width'   => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'textarea'   => array(
                    'cols'     => true,
                    'rows'     => true,
                    'disabled' => true,
                    'name'     => true,
                    'readonly' => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'tfoot'      => array(
                    'align'   => true,
                    'char'    => true,
                    'charoff' => true,
                    'valign'  => true,
                ),
                'th'         => array(
                    'abbr'    => true,
                    'align'   => true,
                    'axis'    => true,
                    'bgcolor' => true,
                    'char'    => true,
                    'charoff' => true,
                    'colspan' => true,
                    'headers' => true,
                    'height'  => true,
                    'nowrap'  => true,
                    'rowspan' => true,
                    'scope'   => true,
                    'valign'  => true,
                    'width'   => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'thead'      => array(
                    'align'   => true,
                    'char'    => true,
                    'charoff' => true,
                    'valign'  => true,
                ),
                'title'      => array(),
                'tr'         => array(
                    'align'   => true,
                    'bgcolor' => true,
                    'char'    => true,
                    'charoff' => true,
                    'valign'  => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                ),
                'track'      => array(
                    'default' => true,
                    'kind'    => true,
                    'label'   => true,
                    'src'     => true,
                    'srclang' => true,
                ),
                'tt'         => array(),
                'u'          => array(),
                'ul'         => array(
                    'type' => true,
                ),
                'ol'         => array(
                    'start'    => true,
                    'type'     => true,
                    'reversed' => true,
                ),
                'var'        => array(),
                'video'      => array(
                    'autoplay'    => true,
                    'controls'    => true,
                    'height'      => true,
                    'loop'        => true,
                    'muted'       => true,
                    'playsinline' => true,
                    'poster'      => true,
                    'preload'     => true,
                    'src'         => true,
                    'width'       => true,
                    'id' => true,
                    'class' => true,
                    'style' =>  true,
                )
            );

		public static function get_allowed_html() {
	        return self::$allowed_html;
	    }

	    protected static $allowed_protocols = [ 'http', 'https' ];

		public static function get_allowed_protocols() {
	        return self::$allowed_protocols;
	    }
	
		function __construct() {
			return true;	
		}
		
		function ci_initialize() {							
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
			
			if (!is_plugin_active(plugin_basename($this -> plugin_file))) {			
				return;
			}
			
			add_action('wp_ajax_slideshow_serialkey', array($this, 'ajax_serialkey'));
		
			if (true || !is_admin() || (is_admin() && $this -> ci_serial_valid())) {
				$this -> ci_initialization();
			} else {				
				$this -> add_action('admin_print_styles', 'ci_print_styles', 10, 1);
				$this -> add_action('admin_print_scripts', 'ci_print_scripts', 10, 1);
				$this -> add_action('admin_notices');
				$this -> add_action('init', 'init', 10, 1);
				$this -> add_action('admin_menu', 'admin_menu');
			}
			
			return false;
		}
		
		function ci_initialization() {	
			
			$this -> add_action('after_plugin_row_' . $this -> plugin_name . '/slideshow-gallery.php', 'after_plugin_row', 10, 2);
			$this -> add_action('install_plugins_pre_plugin-information', 'display_changelog', 10, 1);
			
			/*if ($this -> ci_serial_valid()) {				
				$this -> add_action('install_plugins_pre_plugin-information', 'display_changelog', 10, 1);
				$this -> add_action('plugin_row_meta', 'plugin_row_meta', 10, 2);
				$this -> add_filter('transient_update_plugins', 'check_update', 10, 1);
		        $this -> add_filter('site_transient_update_plugins', 'check_update', 10, 1);
		    }*/
			
			$this -> add_filter('default_hidden_columns', 'default_hidden_columns', 10, 2);
			$this -> add_filter('set-screen-option', 'set_screen_option', 10, 3);
			$this -> add_filter('removable_query_args', 'removable_query_args', 10, 1);
			//$this -> add_filter('transient_update_plugins', 'check_update', 10, 1);
			//$this -> add_filter('site_transient_update_plugins', 'check_update', 10, 1);
			
			// SSL stuff
			add_filter('upload_dir', array($this, 'replace_https'));
			add_filter('option_siteurl', array($this, 'replace_https'));
			add_filter('option_home', array($this, 'replace_https'));
			add_filter('option_url', array($this, 'replace_https'));
			add_filter('option_wpurl', array($this, 'replace_https'));
			add_filter('option_stylesheet_url', array($this, 'replace_https'));
			add_filter('option_template_url', array($this, 'replace_https'));
			add_filter('wp_get_attachment_url', array($this, 'replace_https'));
			add_filter('widget_text', array($this, 'replace_https'));
			add_filter('login_url', array($this, 'replace_https'));
			add_filter('language_attributes', array($this, 'replace_https'));
			
			return true;
		}
		
		function ci_get_serial() {
		    //return true;

			if ($serial = $this -> get_option('serialkey')) {
				return $serial;
			}
			
			return false;
		}
		
		function ci_serial_valid() {
		    //return true;

			$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
			$port = isset($_SERVER['SERVER_PORT']) ? $_SERVER['SERVER_PORT'] : 80;
			$result = false;
			
			$existing = $this -> get_option('existing');
			if (!empty($existing)) return true;
			
			if (preg_match("/^(www\.)(.*)/si", $host, $matches)) {
				$wwwhost = $host;
				$nonwwwhost = preg_replace("/^(www\.)?/si", "", $wwwhost);
			} else {
				$nonwwwhost = $host;
				$wwwhost = "www." . $host;
			}

            if (preg_match('/tribulant.net/i', $nonwwwhost)) {
                return true;
            }

			if ($host == "localhost" || $host == "localhost:" . $port) {
				$result = true;	
			} else {
				if ($serial = $this -> ci_get_serial()) {			
					if ($serial == strtoupper(md5($host . "gallery" . "mymasesoetkoekiesisfokkenlekker"))) {
						$result = true;
					} elseif (strtoupper(md5($wwwhost . "gallery" . "mymasesoetkoekiesisfokkenlekker")) == $serial || 
								strtoupper(md5($nonwwwhost . "gallery" . "mymasesoetkoekiesisfokkenlekker")) == $serial) {
						$result = true;
					}
				}
			}
			
			$result = apply_filters($this -> pre . '_serialkey_validation', $result);
			return $result;
		}
	}
}

?>