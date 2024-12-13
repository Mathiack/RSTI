<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class GalleryFormHelper extends GalleryPlugin {
	
	function __construct() {
		
	}
	
	function hidden($name = '', $args = array()) {
		global $wpcoHtml;
		
		$defaults = array(
			'value' 		=> 	(empty($args['value'])) ? $this -> Html -> field_value($name) : $args['value'],
		);
		
		$r = wp_parse_args($args, $defaults);
		extract($r, EXTR_SKIP);
		
		ob_start();
		
		?><input type="hidden" name="<?php echo esc_attr($this -> Html -> field_name($name)); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($name); ?>" /><?php
		
		$hidden = ob_get_clean();
		return $hidden;
	}

	function text($name = null, $args = array()) {	
		$defaults = array(
			'id'			=>	(empty($args['id'])) ? $name : $args['id'],
			'width'			=>	'100%',
			'class'			=>	"widefat",
			'error'			=>	true,
			'value'			=>	(empty($args['value'])) ? $this -> Html -> field_value($name) : $args['value'],
			'autocomplete'	=>	"on",
		);
		
		$r = wp_parse_args($args, $defaults);
		extract($r, EXTR_SKIP);
		echo $this -> Html -> field_value($name);
		
		ob_start();
		
		?><input class="<?php echo esc_attr($class); ?>" type="text" autocomplete="<?php echo esc_attr($autocomplete); ?>" style="width:<?php echo esc_attr($width); ?>" name="<?php echo esc_attr($this -> Html -> field_name($name)); ?>" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($id); ?>" /><?php
		
		if ($error == true) {
			echo $this -> Html -> field_error($name);
		}
		
		$text = ob_get_clean();
		return $text;
	}
	
	function textarea($name = '', $args = array()) {		
		$defaults = array(
			'error'			=>	true,
			'width'			=>	'100%',
			'class'			=>	"widefat",
			'rows'			=>	4,
			'cols'			=>	"100%",
		);
		
		$r = wp_parse_args($args, $defaults);
		extract($r, EXTR_SKIP);
		
		ob_start();
		
		?><textarea class="<?php echo esc_attr($class); ?>" name="<?php echo esc_attr($this -> Html -> field_name($name)); ?>" rows="<?php echo esc_attr($rows); ?>" style="width:<?php echo esc_attr($width); ?>;" cols="<?php echo esc_attr($cols); ?>" id="<?php echo esc_attr($name); ?>"><?php echo esc_attr($this -> Html -> field_value($name)); ?></textarea><?php
		
		if ($error == true) {
			echo $this -> Html -> field_error($name);
		}
		
		$textarea = ob_get_clean();
		return $textarea;
	}

	function submit($name = '', $args = array()) {		
		$defaults = array('class' => "button-primary");
		$r = wp_parse_args($args, $defaults);
		extract($r, EXTR_SKIP);
		
		ob_start();
		
		?><input class="<?php echo esc_attr($class); ?>" type="submit" name="<?php echo esc_attr($this -> Html -> sanitize($name)); ?>" value="<?php echo esc_attr($name); ?>" /><?php
		
		$submit = ob_get_clean();
		return $submit;
	}
}