<?php
	
class SlideshowErrorHandler extends GalleryPlugin {
	
	var $config = array();
	
	function __construct() {
		
	//	$debugging = get_option('tridebugging');
	//	$this -> config = array(
	//		'debug'			=>	((!empty($debugging)) ? true : $this -> debugging),
	//	);
		
	//	register_shutdown_function(array($this, "check_for_fatal"));
	//	set_error_handler(array($this, "log_error"));
	//	set_exception_handler(array($this, "log_exception"));
	}
	
	/**
	* Error handler, passes flow over the exception logger with new ErrorException.
	*/
	function log_error( $num = null, $str = null, $file = null, $line = null, $context = null ) {
	//    $this -> log_exception(new ErrorException($str, 0, $num, $file, $line));
	}
	
	function log_error1( $context = null ) {
	//    $this -> log_exception(new ErrorException($context, 0, "", "", null));
	}	
	
	/**
	* Uncaught exception handler.
	*/
	function log_exception( $e ) {
        return;
	    if ($e instanceof Error) {
            $this->log_error($e->getCode(), $e->getCode(), $e->getFile(), $e->getLine(), $e->getTraceAsString());
	        return;
        }

		$message = "Type: " . get_class( $e ) . "; Message: {$e->getMessage()}; File: {$e->getFile()}; Line: {$e->getLine()};";
	    
	    $file = $e -> getFile();
	    // Check if it is a slideshow-gallery error
	    if (!empty($file) && strpos($file, 'slideshow-gallery')) {		    
		    if ($this -> config["debug"] == true) {			    
		        //$this -> render_err($message, true, true);
		        error_log(date_i18n('[Y-m-d H:i:s] ') . $message . PHP_EOL, 3, SLIDESHOW_LOG_FILE);
	        
		        restore_error_handler();
		        error_log($message);
		    }
	    } else {
		    restore_error_handler();
		    if (defined('WP_DEBUG') && WP_DEBUG == true) {
			    trigger_error($message);
			    error_log($message);
			}
	    }
	    
	    set_error_handler(array($this, "log_error"));
	}
	
	/**
	* Checks for a fatal error, work around for set_error_handler not working on fatal errors.
	*/
	function check_for_fatal()
	{
	 //   $error = error_get_last();
	 //   if ( !empty($error) && $error["type"] == E_ERROR )
	 //       $this -> log_error1( $error["type"], $error["message"], $error["file"], $error["line"] );
	}
}
