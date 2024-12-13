<?php
/**
 * Slideshow About Dashboard v4.5
 */

/**
 * About This Version administration panel.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** WordPress Administration Bootstrap */
require_once( ABSPATH . 'wp-admin/admin.php' );

$major_features = array(
	array(
		'src'         => $this -> url() . '/images/about/feature-1.png',
		'heading'     => 'WordPress 4.0+ Compatibility',
		'description' => 'This version is 100% compatible with the latest WordPress version. It will fit nicely into your WordPress dashboard and maximizes the WordPress capabilities for speed, functionality and reliability.',
	),
	array(
		'src'         => $this -> url() . '/images/about/feature-2.jpg',
		'heading'     => 'Multilingual',
		'description' => 'This version of the Slideshow Gallery plugin is fully integrated with qTranslate-X and WPML. It now supports internationalization and multilanguage.',
	)
);
shuffle( $major_features );

$minor_features = array(
	array(
		'src'         => $this -> url() . '/images/about/feature-3.jpg',
		'heading'     => 'Responsive Slideshows',
		'description' => 'The new, responsive option is a flexible foundation that adapts your slideshow to mobile devices and the desktop or any other viewing environment. In this way your slideshow can easily be viewed on a desktop or mobile device.',
	),
	array(
		'src'         => $this -> url() . '/images/about/feature-4.jpg',
		'heading'     => 'Image Lightbox/Overlay',
		'description' => 'Slideshows in this version can show slide images in an overlay when they are clicked in the slideshow to show a larger/original image.',
	),
	array(
		'src'			=>	$this -> url() . '/images/about/feature-5.jpg',
		'heading'		=>	'Multiple Slideshows',
		'description'	=>	'Create a beautiful page with more than one slideshow. You now have the ability to add unlimited slideshows per page, as many as you want. They will all play along nicely!'
	)
);

?>

<div class="wrap slideshow-gallery about-wrap slideshow">
	<h1><?php echo sprintf( 'Welcome to Slideshow Gallery %s', $this -> version); ?></h1>
	<div class="about-text">
		<?php echo sprintf('Thank you for installing! Tribulant Slideshow Gallery %s is more powerful, reliable and versatile than before. It includes many features and improvements to make email marketing easier and more efficient for you.', $this -> version); ?>
	</div>
	<div class="slideshow-badge">
		<div>
			<i class="fa fa-image fa-fw" style="font-size: 72px !important; color: white;"></i>
		</div>
		<?php echo sprintf('Version %s', $this -> version); ?>
	</div>
	
	<h2>New Major Features</h2>
	<div class="feature-section two-col has-2-columns">
		<?php foreach ( $major_features as $feature ) : ?>
			<div class="col column">
				<div class="media-container">
					<?php
					// Video.
					if ( is_array( $feature['src'] ) ) :
						echo wp_video_shortcode( array(
							'mp4'      => $feature['src']['mp4'],
							'ogv'      => $feature['src']['ogv'],
							'webm'     => $feature['src']['webm'],
							'loop'     => true,
							'autoplay' => true,
							'width'    => 500,
							'height'   => 284
						) );
	
					// Image.
					else:
					?>
					<img src="<?php echo esc_url( $feature['src'] ); ?>" />
					<?php endif; ?>
				</div>
				<h3><?php echo esc_html($feature['heading']); ?></h3>
				<p><?php echo esc_html($feature['description']); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
	
	<hr/>
	
	<h2>New Minor Features</h2>
	<div class="feature-section three-col has-3-columns">
		<?php foreach ( $minor_features as $feature ) : ?>
			<div class="col column">
				<div class="minor-img-container">
					<img src="<?php echo esc_attr( $feature['src'] ); ?>" />
				</div>
				<h3><?php echo esc_html($feature['heading']); ?></h3>
				<p><?php echo esc_html($feature['description']); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
	
	<hr/>
	
	<div class="return-to-dashboard">
		<a href="<?php echo admin_url('admin.php'); ?>?page=<?php echo esc_attr($this -> sections -> welcome); ?>"><?php echo 'Go to Slideshow Gallery overview'; ?></a>
	</div>
</div>