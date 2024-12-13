=== Slideshow Gallery LITE ===
Contributors: contrid
Donate link: https://tribulant.com/
Tags: wordpress plugins, wordpress slideshow gallery, slides, slideshow, image gallery, images, gallery, featured content, content gallery, javascript, javascript slideshow, slideshow gallery
Requires at least: 3.1
Tested up to: 6.6.2
Stable tag: 1.8.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Feature content in a JavaScript powered slideshow gallery showcase on your WordPress website.


== Description ==

Feature content in beautiful and fast JavaScript powered slideshow gallery showcases on your WordPress website.

You can easily display multiple galleries throughout your WordPress website displaying your custom added slides, slide galleries or showing slides from WordPress posts/pages.

The slideshow is flexible, all aspects can easily be configured and embedding/hardcoding the slideshow gallery is a breeze. 

See the <a href="https://tribulant.net/slideshowgallery/">online demonstration</a>.


Here are several ways to display a slideshow: 


= Shortcode for all slides =

To embed a slideshow with all slides under **Slideshow > Manage Slides** in the plugin, simply insert the shortcode below into the content of a post/page.

`[tribulant_slideshow]`


= Shortcode for featured posts =

You can create a slideshow from featured posts, each post being a slide and it's featured image used as the slide image. The link of the slide will be the link of the post so clicking on the slide will take users to that post.

Here is a sample shortcode that you can use for this:

`[tribulant_slideshow featured="true" featurednumber="10" featuredtype="post"]`


= Shortcode for a gallery's slides =

To embed a slideshow with slides from a specific gallery under **Slideshow > Manage Galleries** in the plugin, simply insert the shortcode below (where X is the ID value of the gallery) into the content of a post/page.

`[tribulant_slideshow gallery_id="X"]`


= Shortcode for the images of a WordPress post/page =

To embed a slideshow with the images uploaded to a WordPress post/page through it's media gallery, simply insert the shortcode below (where X is the ID value of the post). Whether you want to display the images from a post or a page, the parameter remains `post_id`.

`[tribulant_slideshow post_id="X"]`


= Shortcode for latest/featured products =

In order to display latest or featured products in a slideshow, you need the <a href="https://tribulant.com/plugins/view/10/" title="WordPress Shopping Cart">Shopping Cart plugin</a> from Tribulant. Once you have this installed and activated, you can easily display recent or featured products. To display recent products use the shortcode below. 

`[tribulant_slideshow products="latest"]`

And to display featured products, use the one below. 

`[tribulant_slideshow products="featured"]`

For both, you can use the `productsnumber` parameter to limit the number of products eg. 

`[tribulant_slideshow products="latest" productsnumber="5"]`


= Hardcode into any plugin/theme with PHP =

To hardcode into any PHP file of your WordPress theme, simply use 

`<?php if (function_exists('slideshow')) { slideshow($output = true, $gallery_id = false, $post_id = false, $params = array()); } ?>`.


= Parameters for shortcode/hardcode to customize each slideshow =

You can use any of the following parameters with both the hardcoding and shortcode to customize each slideshow gallery:

Shortcode example 1: 
`[tribulant_slideshow layout="responsive" gallery_id="3" auto="true" navopacity="0" showthumbs="true"]`

Shortcode example 2: 
`[tribulant_slideshow layout="specific" post_id="379" width="600" height="300" auto="false" showinfo="false"]`

Hardcode example 1: 
`<?php slideshow(true, 3, false, array('layout' => "responsive", 'auto' => "true", 'navopacity' => "0", 'showthumbs' => "true")); ?>`

Hardcode example 2: 
`<?php slideshow(true, false, 379, array('layout' => "specific", 'width' => "600", 'height' => "300", 'auto' => "false", 'showinfo' => "false")); ?>`

This way you can customize each slideshow you embed or hardcode, despite the settings you saved under **Slideshow > Settings**.


* `effect` [ fade | slide ] = Choose the transition effect of the slideshow. Either fade or slide
* `slide_direction` [ lr | tb ] = If you're using `slide` for the `effect`, you can choose left/right or top/bottom sliding
* `easing` [ swing ] = Choose the easing effect you'd like. The default is `swing`
* `products` [ latest | featured ] = String "latest" or "featured" to display products from the <a href="https://tribulant.com/plugins/view/10/">Checkout plugin</a>.
* `productsnumber` [ productsnumber ] = Numeric/integer to limit the number of products to display.
* `featured` [ true | false ] = Show posts with their featured images 
* `featurednumber` [ number ] = A numeric/integer value. The default is 10
* `featuredtype` [ post_type ] = A post type slug like 'post', 'page', etc. The default is 'post'
* `gallery_id` [ gallery_id ] = Numeric/integer ID of a gallery to display images from.
* `post_id` [ post_id ] = Numeric/integer ID of a post to take images from it, uploaded through it's "Add Media" button.
* `numberposts` [ numberposts ] = Numeric value of the number of images to take from the post/page. "-1" for unlimited/all
* `layout` [ responsive | specific ] = Set to 'responsive' for mobile/tablet compatible theme and 'specific' for fixed width/height.
* `resizeimages` [ true | false ] = Set to 'true' to resize images to fit the slideshow dimensions.
* `imagesoverlay` [ true | false ] (default: setting) = Set to 'true' to display links of slides that are images in a Colorbox overlay on the page.
* `orderby` [ random ] = Set to 'random' to randomly order the slides. Leave this shortcode parameter to order by the order set on the slides.
* `width` [ width | auto ] = (only with layout="specific") Width of the slideshow in pixels. Don't specify 'px' part, just the numeric value for the height.
* `resheight` [ resheight ] = (only with layout="responsive") Numeric/integer value such as "30" to be used with 'resheighttype' below
* `resheighttype [ resheighttype ] = (only with layout="responsive") "px" (pixels) or "%" (percent) as the value e.g., resheighttype="%"
* `height` [ height ] (only with layout="specific"; default: setting) = Height of the slideshow in pixels. Don't specify the 'px' part, just the numeric value for the height.
* `autoheight` [ true | false ] = Should the gallery adjust it's height for each slide?
* `auto` [ true | false ] (default: setting) = Set this to 'true' to automatically slide the slides in the slideshow.
* `autospeed` [ speed ] (default: setting) = Speed of the auto sliding. 10 is normal. Lower number is faster. Between 5 and 15 is recommended.
* `fadespeed` [ speed ] (default: setting) = Speed of the fading of images. 10 is normal. Lower number is faster. Between 1 and 20 is recommended.
* `shownav` [ true | false ] (default: setting) = Set to 'true' to show the next/previous image navigation buttons.
* `navopacity` [ opacity ] (default: setting) = The opacity of the next/previous buttons. Between 0 and 100 with 0 being transparent and 100 being fully opaque.
* `navhoveropacity` [ opacity ] (default: setting) = The opacity of the next/previous buttons on hovering. Between 0 and 100 with 0 being transparent and 100 being fully opaque.
* `showinfo` [ true | false ] (default: setting) = Set to 'true' to show the information bar for each slide.
* `infospeed` [ speed ] (default: setting) = Speed at which the information bar will slide up. Between 5 and 15 is recommended.
* `showthumbs` [ true | false ] (default: setting) = Set to 'true' to show the thumbnails for the slides.
* `thumbsposition` [ top | bottom ] (default: setting) = Set to "top" to show above the slideshow.
* `thumbsborder` [ hexidecimal color ] (default: setting) = Hex color of the active thumb border. For example #333333.
* `thumbsspeed` [ speed> ] (default: setting) = Speed of the thumbnail bar scrolling. Lower is slower. Between 1 and 20 is recommended.
* `thumbsspacing` [ spacing ] (default: setting) = An integer value in pixels to space the thumbnails apart. Don’t include the 'px' part, just the number. Between 0 and 10 is recommended.


= Languages =

Thank you to these wonderful people who contributed to translating the Slideshow Gallery plugin:

* Afrikaans (af_ZA) by <a href="https://tribulant.com">Antonie Potgieter | Tribulant</a>
* Slovak (sk_SK) by Branco Radenovich

<a href="https://tribulant.com/support/">Contact us</a> to submit your language file and be mentioned here!


== Installation ==

Installing the WordPress slideshow gallery plugin is very easy. Simply follow the steps below.

1. In WordPress, navigate to Plugins > Add New and upload it there (or search and install it there), and then skip to step 6. Or, for manual installation, extract the package to obtain the `slideshow-gallery` folder and continue below.

2. Upload the `slideshow-gallery` folder to the `/wp-content/plugins/` directory.

3. Activate the plugin through the 'Plugins' menu in WordPress.

4. Configure the settings according to your needs through the **Slideshow > Settings** menu.

5. Add and manage your slides in the 'Slideshow' section.

6. Use `[tribulant_slideshow post_id="X"]` to embed a slideshow with the images of a post into your posts/pages or use `[tribulant_slideshow gallery_id="X"]` to display the slides of a specific gallery by ID or use `[tribulant_slideshow]` to embed a slideshow with your custom added slides under **Slideshow > Manage Slides** or `<?php if (function_exists('slideshow')) { slideshow($output = true, $gallery_id = false, $post_id = false, $params = array()); } ?>` into your WordPress theme using PHP code.


== Frequently Asked Questions ==

= Can I display/embed multiple instances of the slideshow gallery? =
Yes, you can and you can add multiple slideshows on the same page as well.

= How can I display specific slides in a slideshow gallery instance? =
You can organize slides either into multiple galleries according to your needs or you can upload images to WordPress posts and display the images uploaded to a post.

= How do I display the images uploaded to a post? =
You can embed a slideshow and show the images uploaded to a post with the `post_id` parameter. Like this `[tribulant_slideshow post_id="123"]`.

= Can I exclude certain images from a post in the slideshow? =
Yes, you can use the `exclude` parameter to exclude post images by their order in the gallery (comma separated) like this `[tribulant_slideshow post_id="123" exclude="2,4,8"]`.

= How can I fix slide images or thumbnails not displaying? =
There is an "Images Tester" utility under Slideshow > Settings on the right-hand side. Use that to determine the problem.


== Screenshots ==

1. Slideshow gallery with thumbnails at the bottom.
2. Slideshow gallery with thumbnails turned OFF.
3. Slideshow gallery with thumbnails at the top.
4. Different styles/colors.
5. TinyMCE editor button to insert shortcodes.
6. Turn on Thickbox to show enlarged images in an overlay.


== Changelog ==

See all <a href="https://tribulant.com/docs/wordpress-slideshow-gallery/1758/#doc3">releases and full changelogs</a> in our docs.

= 1.8.4 =
* ADD: "Dismiss forever" button on the admin area rating notice to dismiss it forever.
* FIX: Order slides by random (orderby="random") was not working.
* FIX: XSS vulnerability.

= 1.8.3 =
* IMPROVE: PHP 8.2 and 8.3 compatibility.
* FIX: Cannot order slides after previous vulnerability fix.

= 1.8.2 =
* FIX: Vulnerability SQL injection on shortcode gallery.

= 1.8.1 =
* FIX: Saving slides and galleries that are multilingual don't save the title and description.
* FIX: Disabling direct access to plugin log file using htaccess rules added on plugin activation.

= 1.8 =
* FIX: Security improvements and fixes.

= 1.7.9 =
* IMPROVE: Added back the serial key to the plugin action links.
* FIX: Bug in select all in group checkboxes.
* FIX: Responsive issue, report and fix suggestion by Jules.
* FIX: Vulnerability issue with gallery ID.
* FIX: CSRF vulnerability issue with reset settings and check DB.

= 1.7.8 =
* FIX: Compatibility with FSE (Full Site Editing).

= 1.7.7 =
* FIX: Unwanted code displayed below the slider because of an older IE6 fix.
* FIX: Search result in plugins showed a warning.
* FIX: Security updates.

= 1.7.6 =
* IMPROVE: Disabled error handler as it was causing issues needlessly. WordPress error logging is sufficient.
* IMPROVE: PHP 8 and 8.1 compatibility.
* FIX: Some PHP warnings and errors that were causing problems.

= 1.7.5 =
* FIX: Null safe checker is added to some places.

= 1.7.4.4 =
* FIX: Multiple slideshows error on a page/post.

= 1.7.4.3 =
* IMPROVE: Various security fixes.
* IMPROVE: Removed unneeded libraries.

= 1.7.4.2 =
* IMPROVE: Various security fixes.

= 1.7.4.1 =
* IMPROVE: Various security updates.
* IMPORTANT: Due to required changes by WordPress.org and us hosting this free plugin here with them, we were unfortunately required to remove the ability to use translation plugins with this free lite version. This still works in our premium version and you can purchase that on our Tribulant website. The premium version will also get more features in the future. We apologise for the inconvenience.

= 1.7.4 =
* FIX: XSS vulnerability issue.

= 1.7.3 =
* IMPROVE: Removed update checker.

= 1.7.2 =
* IMPROVE: Removed serial key management for this free version. To manage the serial key and get access to all the features, you can purchase and use the paid version of this plugin.

= 1.7.1 =
* FIX: Colorbox updates and fixes.

= 1.7 =
* FIX: Error handler.
* FIX: Undefined $_SERVER variable indexes, while executing WP Cron.
* FIX: PHP Errors and Notices fixes for current and future versions of PHP.

= 1.6.15 =
* FIX: Additional errors related to errorhandler.php.

= 1.6.14 =
* FIX: Errors related to errorhandler.php.
* FIX: Errors in recent PHP versions.
* FIX: Incompatibility with the Avada theme and potentially other WordPress themes.

= 1.6.13 =
* FIX: Undefined variable and other errors.

= 1.6.12 =
* ADD: infoheadingcontent attribute on shortcode
* IMPROVE: Preload slideshow images on page load
* IMPROVE: Security fixes and improvements
* IMPROVE: About page update with new layout
* FIX: Debugging setting affects debugging on WordPress globally

= 1.6.11 =
* ADD: Variable buttons when saving multiple slides for Alt, Caption, etc.
* ADD: Polylang multilingual integration
* ADD: WPGlobus multilingual integration
* IMPROVE: Make Select2 select drop downs accessible by screen readers
* IMPROVE: Make Colorbox translatable
* FIX: Expired slides are showing up in the ordering screen
* FIX: Apostrophe in gallery title/name won't save

= 1.6.10 =
* ADD: WordPress 5+ compatibility

= 1.6.9 =
* ADD: Search box in admin sections to find slides and galleries
* IMPROVE: ALT attributes on slide images
* IMPROVE: Change "Configuration" to "Settings" throughout
* IMPROVE: http:// to https://
* FIX: Possible XSS and SQLi vulnerability
* FIX: Media library loading very slowly
* FIX: Buttons/icons not showing in some browsers like FireFox
* FIX: Serial key overlay not showing correctly

= 1.6.8 =
* ADD: Set an expiry date on a slide
* ADD: Use WP_List_Table for proper, responsive tables in admin
* IMPROVE: Static textdomain for easier translation
* IMPROVE: Update WP Color Picker
* IMPROVE: http:// to https://
* IMPROVE: hange INPUT to BUTTON element in several places
* IMPROVE: Prevent conflict with outdated Select2 versions from other plugins
* FIX: Jetpack Lazy Load causes problems with slides
* FIX: url() function sometimes breaks plugin path
* FIX: Use link on slide confusion and not opening
* FIX: Apostrophe in gallery title/name won't save
* FIX: "No slides are available" due to getimagesize() not supported

= 1.6.7 =
* ADD: Compatibility with WordPress 4.8+
* ADD: Display slideshow images inside RSS feeds
* FIX: Blank/empty slide breaks slideshow
* FIX: Woocommerce loads outdated version of Select2, conflicts
* FIX: Conflict with Select2 of Yoast SEO 

= 1.6.6 =
* IMPROVE: Check for missing media/attachment records
* IMPROVE: ALT attributes on slide images
* FIX: Arrows on thumbnails slider misaligned on some themes
* FIX: Thumbnail dimensions incorrect on media image slides
* FIX: Possible XSS vulnerability (credit: www.defensecode.com)
* FIX: PHP deprecated class constructors cause warning message
* FIX: Slideshow doesn't show in posts/pages loaded with Ajax 

= 1.6.5 =
* IMPROVE: Use attachment full URL if 'thumbnail' size is not available when adding slides
* IMPROVE: Change deprecated jQuery live() to on()
* IMPROVE: Colorbox upgrade to 1.6.4
* IMPROVE: Review SSL/https
* IMPROVE: Updated welcome/about page
* IMPROVE: New, improved object cache system 
* FIX: Security, possible XSS on CSS parameters
* FIX: Missing FontAwesome font files in admin area
* FIX: Fatal error: Call to a member function image_path() on a non-object
* FIX: Colorbox when you have Multiple Galleries

= 1.6.4 =
* ADD: Full retina/high definition compatibility
* ADD: Setting to hide thumbnails bar on mobile
* ADD: Show thumbnails in order list for slides
* ADD: Information Bar position
* ADD: Show info bar only on hover
* ADD: Fade the information bar after a few seconds
* IMPROVE: Remove auto slide on slideshow with single image
* IMPROVE: CSS Selectors Resize images setting for responsive slideshows as well
* IMPROVE: Ensure that autoheight always works even with responsive height set
* IMPROVE: Generate images/thumbnails on remote URLs as well
* IMPROVE: Compatibility with new PHP OOP such as PHP7
* FIX: Paging broken in admin sections, database error

= 1.6.3 =
* IMPROVE: Allow html in description of slides
* IMPROVE: Set line-height on icons
* IMPROVE: Auto hide thumbnails bar if only one image/slide
* IMPROVE: Featured posts in TinyMCE button/icon dialog
* IMPROVE: No items tables in admin sections 
* FIX: Changing paths causes media uploaded slides thumbnails to break
* FIX: Prev an Next buttons not showing in some browsers (Firefox)
* FIX: Update issue
* FIX: Image overlay (Colorbox) close icon not working in some browsers (FireFox)
* FIX: Overflow of thumbnails slider with very narrow slideshow
* FIX: Next & Prev arrows not showing in Colorbox overlay
* FIX: Slideshow is sliding with only one slide/image available
* FIX: Possible security vulnerability with malicious strings in slides/galleries 

= 1.6.2 =
* ADD: (PRO) jQuery UI effects - Blind, Clip, Explode, Puff, Pulsate, Shake, etc.
* ADD: (PRO) jQuery easing effects  
* ADD: (PRO) Excerpt length and more settings for featured posts in slideshow
* ADD: (PRO) Touch/mobile swipe gestures support
* ADD: (PRO) Set a delay on the information bar 
* ADD: (PRO) WPML multilingual support
* ADD: (PRO) qTranslate X multilingual support 
* FIX: Do not load any resources from remote sources
* FIX: Removed all limitations/restrictions on galleries and slides

= 1.6.1 =
* IMPROVE: Featured posts in TinyMCE button/icon dialog
* IMPROVE: No items tables in admin sections 
* FIX: Possible security vulnerability with malicious strings in slides/galleries

= 1.6 =
* ADD: Assign/set/remove galleries bulk action for slides in admin
* ADD: "Per Page" setting in admin sections
* ADD: Max height setting for auto height
* IMPROVE: Upgrade Colorbox and load from CDN
* IMPROVE: WordPress 4.4 headings changes compatibility
* IMPROVE: Headings in admin settings for easier settings
* IMPROVE: Use post_id="X" to pull current post/page ID automatically
* IMPROVE: Make sure links in information bar is the same colour as information text
* IMPROVE: WordPress configured date format in admin sections for dates
* IMPROVE: Select2 drop downs in admin sections
* IMPROVE: Performance improvements with PHP class autoload
* IMPROVE: Remove wp_head/wp_footer checks
* IMPROVE: Check that slide 'type' database field is present 
* FIX: Featured posts featuredtype parameter ineffective
* FIX: "Submit Serial Key" permission/access error
* FIX: Sorting of slides within gallery in admin not working
* FIX: Possible XSS security issues
* FIX: HTML validation errors
* FIX: Specify URL slides not always pulling image correctly
* FIX: Specify URL "File type is not allowed..."
* FIX: Colorbox images wrong path (404 Not Found)
* FIX: Information bar not showing excerpt of post correctly
* FIX: Post/page media images description not showing in info bar
* FIX: Thumbnails don't show on some browsers (Android, Opera, Safari, etc) 

= 1.5.3.4 =
* ADD: FontAwesome icons throughout
* IMPROVE: Improved error handling on multiple slides adding
* IMPROVE: Minimalistic Colorbox design
* IMPROVE: Remove dashicons and fonts completely
* IMPROVE: New WordPress 4.3 check-column styling 
* FIX: Some notices/errors showing raw HTML code
* FIX: Vulnerability/security issues 

= 1.5.3.2 =
* IMPROVE: Prevent plugin files from being accessed directly for security
* IMPROVE: Check file mime and type of image URL on slide for security
* IMPROVE: Validate, sanitize and escape data for security purposes
* IMPROVE: Implement WordPress nonces throughout for security 
* FIX: CSS and JS files don't work with child theme folder
* FIX: Setting to only hide title
* FIX: Multiple slideshows, overlay shows all images
* FIX: Broken permissions page when paging gallery 

= 1.5.3 =
* FIX: Link not showing with auto height on
* FIX: Dots (.) in image filenames break images/slides
* FIX: Multiple loading/spinning images  

= 1.5.2 =
* ADD: Navigate between images in overlay
* IMPROVE: Ability to hide wp_head/wp_footer notifications in admin
* IMPROVE: HTML validation  
* IMPROVE: WordPress 4.1 compatibility
* FIX: Remove unnecessary flush()

= 1.5.1 =
* ADD: Setting to output Javascript per slideshow or globally in footer
* ADD: Detection of wp_head/wp_footer functions in theme which are required
* ADD: Left/right and top/bottom sliding effect
* ADD: Effect/transition setting to choose between fade/slide
* IMPROVE: Open featured posts slides in the same window
* IMPROVE: Make prev/next buttons/elements unselectable
* IMPROVE: Animation for auto height of images
* IMPROVE: Cross-fading of images for a better effect
* IMPROVE: Image fade speed setting up to 50
* IMPROVE: New, improved paging in admin sections  
* FIX: Slide 'type' database column/field not created or updated to support media
* FIX: Fix drag/drop sorting open- and closed hand cursors
* FIX: Erratic timing between slides
* FIX: Auto height setting doesn't work on fixed layout slideshow  

= 1.5 =
* ADD: Add multiple slides at once from the media gallery/uploader
* ADD: "Check/optimize database tables" feature under settings
* ADD: Load external language files from wp-content/languages/slideshow-gallery/
* ADD: "Continue editing" checkboxes in admin sections
* ADD: Indexes on MySQL database tables for performance
* ADD: Use media library for slides
* IMPROVE: Improvements to load_plugin_textdomain()
* IMPROVE: Blank index.php file to prevent indexing/crawling of plugin files/folders
* IMPROVE: Replace all 'slideshow-gallery' string instances dynamically
* IMPROVE: New help tooltip design
* IMPROVE: Move Javascript out of shortcode into head
* IMPROVE: Add text to arrow buttons  

= 1.4.9 =
* ADD: 'numberposts' shortcode attribute for post/page images as slides
* ADD: Notice to rate/review the plugin
* IMPROVE: Moved some files from plugin core to /assets/ folder
* FIX: Post/page images gallery only shows 10 slides, no more
* FIX: Extra space after thumbnails in thumbnail strip

= 1.4.8 =
* ADD: WordPress 4.0 compatibility
* FIX: Post/page images slideshow order broken
* FIX: Hide information bar on mobile checkbox resets to on

= 1.4.7 =
* ADD: Recommended plugin under settings
* IMPROVE: TimThumb absolute URLs to prevent permission problems
* IMPROVE: Allow long filenames for custom slides
* IMPROVE: Replace direct Ajax calls with wp_ajax_
* IMPROVE: Prefill the post ID in the TinyMCE dialog with ID of current post
* FIX: Spaces in filenames uploaded to post/page breaks images
* FIX: Remove all wp-config.php and wp-load.php references
* FIX: Possible shell exploit by uploading PHP file as slide
* FIX: Colorbox script should only load with this featured turned on
* FIX: Thumbnails On/Off setting doesn't work

= 1.4.6 =
* ADD: Featured content. Display a slide for each post with it's featured image
* ADD: Auto height setting to adjust height for each slide
* IMPROVE: (m)qTranslate compatibility for post images and featured posts
* IMPROVE: Change direct Ajax calls to wp_ajax_ hooks
* FIX: Slideshow inside float:left; element breaks height
* FIX: Information bar not showing on post/pages images slides

= 1.4.5 =
* ADD: Welcome/about screen on update
* ADD: Child theme folder support
* ADD: Multilingual with (m)qTranslate
* IMPROVE: New style for sliders in settings
* IMPROVE: Deprecated: Function split() is deprecated
* IMPROVE: Deprecated: Function eregi() is deprecated
* FIX: Uppercase file extensions
* FIX: Image overlay/enlargement only works with no thumbnails
* FIX: Image overlay/enlargement URL wrong
* FIX: Space in file name
* FIX: Information bar is overlapped by prev/next

= 1.4.4.3 =
* FIX: TypeError: 'null' is not an object (evaluating 'e.offsetHeight')

= 1.4.4.2 =
* IMPROVE: Replaced eregi() with preg_match()
* IMPROVE: Replaced ereg_replace() with preg_replace()
* FIX: Multiple rows of thumbnails issue
* FIX: Info bar delay on hide
* FIX: console.log() call left behind
* FIX: Current image not showing when saving slide and it doesn't save

= 1.4.4.1 =
* IMPROVE: Change admin-functions.php to includes/admin.php
* FIX: Cannot order slides of a gallery "No slides available"

= 1.4.4 =
* FIX: Galleries not showing when saving a slide

= 1.4.3 =
* ADD: WordPress Object Cache API for performance
* FIX: Post/page images slideshow not showing images with resize turned on
* FIX: Featured/latest product images not showing with resizing

= 1.4.2 =
* ADD: More flexible settings for information bar per slide
* ADD: Switch from TimThumb to BFI Thumb
* FIX: Change mysql_real_escape_string() to esc_sql()
* REMOVE: Images tester is no longer needed

= 1.4.1 =
* ADD: Set opacity for information bar per slide
* ADD: Setting per slide to show title/description or not
* IMPROVE: Updated TimThumb script
* IMPROVE: Updated WordPress plugin file header
* IMPROVE: Function call_user_method() is deprecated
* IMPROVE: New spinner/loading image
* FIX: More PHP warnings/notices
* FIX: 404 Not Found on spinner/loading image

= 1.4 =
* ADD: WordPress 3.9 compatibility
* ADD: New shortcode `[tribulant_slideshow]` to prevent conflicts
* IMPROVE: Reduced/hidden information bar on mobile
* IMPROVE: More CSS selectors on elements
* IMPROVE: New dashicon for help instead of CSS
* IMPROVE: File and folder permissions incorrect on some servers
* FIX: TinyMCE editor button/icon not inserting shortcodes
* FIX: PHP strict standards warnings
* FIX: NextGen Conflict
* FIX: Slideshow not showing with 1 slide
* FIX: TinyMCE editor icon/button since WordPress 3.9 missing

= 1.3.1.3 =
* FIX: Image could not be moved from TMP error in some cases
* FIX: PHP Strict, Notice and Warning messages

= 1.3.1.2 =
* FIX: Not all Settings loading

= 1.3.1 =

* ADD: Images tester utility under Settings to fix broken images
* FIX: Issue with turning off navigation images
* FIX: Issue with new slider settings if empty or set to zero (0)

= 1.3 =

* ADD: Show latest/featured products from Shopping Cart plugin
* ADD: Plugin "Settings" link on the "Plugins" page in WordPress
* ADD: TimThumb crop position setting 
* ADD: WordPress multi-site compatibility
* ADD: Sortable columns in all admin sections 
* ADD: Help tooltips in admin 
* ADD: Sliders for speed settings 
* ADD: Color picker for color settings
* ADD: Delete image upon deletion of locally created slide 
* ADD: WordPress 3.8+ design and compatibility
* ADD: Multiple slideshows on a single page 
* ADD: Responsive design for mobiles and tablets 
* ADD: Debugging setting in settings 
* IMPROVE: Colorbox upgrade/fix
* IMPROVE: Use wp_upload_dir() for dynamic paths 
* IMPROVE: Better thumbnail slider using CSS calc 
* IMPROVE: Move images to default theme folder 
* IMPROVE: New TinyMCE icon/button
* IMPROVE: New dashicons menu icon 
* IMPROVE: When the nav arrows are turned off, the link click area should be full 
* IMPROVE: Automatically center align images in the slideshow
* FIX: Empty/zero thumbs spacing causes JS error
* FIX: Deleting a slide leaves empty reference in gallery 
* FIX: Information overlaps arrows when long 
* FIX: Permissions settings not working
* FIX: Turning off autoslide setting doesn't stop autoslide 
* FIX: Javascript error due to tooltip() call 
* FIX: Width/height of slideshow is less than the settings

= 1.2.3.2 =
* ADD: List/grid switching for ordering of slides
* ADD: Permission/role settings for sections
* ADD: 'imagesoverlay' parameter to turn On/Off the Colorbox overlay per slideshow
* ADD: "Resize Images" setting TimThumb test case for debugging
* ADD: Order slides per gallery
* ADD: Order slides randomly
* IMPROVE: Change WP_PLUGIN_DIR to plugins_url() for styles/scripts
* IMPROVE: Change mysql_list_fields() to a compatible function
* IMPROVE: Remove previous image to prevent overlapping
* IMPROVE: Max width/height for Colorbox overlay for images
* FIX: Null ID value on insert of slide
* FIX: Validation errors
* FIX: Slide current/new window problem

= 1.2.2.1 =
* IMPROVE: Upgrade of TimThumb from 2.8.9 to 2.8.10 to fix broken images.

= 1.2.2 =
* FIX: Slides paging numbers didn't show up
* REMOVE: 'Description' not mandatory/required for each slide.
* FIX: Slashes caused by single/double quotes in titles/descriptions
* ADD: Hardcode for each gallery in 'Manage Galleries' section
* ADD: Shortcode in the 'Manage Galleries' section for each gallery
* ADD: Gallery ID to the 'Manage Galleries' section
* FIX: the 100% width issue on the 'img' tag if resizeimages = false
* IMPROVE: Change cache directory to "wp-content/uploads/slideshow-gallery/cache" for TimThumb

= 1.2.1 = 
* FIX: Thumbnails On/Off setting doesn't work
* IMPROVE: TimThumb absolute URLs to prevent permission problems
* FIX: Colorbox script should only load with this featured turned on

= 1.2 =
* ADD: 'About Us' box in the Settings section
* IMPROVE: Better, more usable hardcoding procedure
* FIX: Slideshow goes left
* IMPROVE: auto width property
* ADD: Banner image for WordPress.org directory
* IMPROVE: Use load_plugin_textdomain instead for language file
* ADD: Order slides by random?
* FIX: Enqueue scripts/styles at the right time
* ADD: Link target (current/new window) setting on each slide for link
* IMPROVE: Hide next/previous navigation when there is only one slide
* ADD: TimThumb integration for cropping images
* CHANGE: Colorbox for popup images
* ADD: 'Open' link to test slide links
* ADD: Icon in each section of the plugin
* CHANGE: Author name on WordPress.org to link appropriately
* ADD: Dimensions for thumbnail images
* CHANGE: New icon image for the admin menu
* IMPROVE: Change 1=1 for the CSS
* FIX: Code showing in the RSS feed.
* ADD: Shortcode parameters
* ADD: Setting to turn off the next/previous navigation
* IMPROVE: "Previous Image" and "Next Image" in language file
* FIX: Not all thumbnails load the first time
* IMPROVE: Remove black borders left and right of the image
* IMPROVE: Removed link overlay which displayed white in IE6

= 1.1 =
* ADDED: "THIS POST" added to the TinyMCE dialog to insert a shortcode for a slideshow of the current post
* IMPROVED: Some CSS improvements to the slideshow
* ADDED: Thickbox to show images in overlay. Can be turned On/Off
* FIXED: Fixed all thumbnails not preloading on first load
* FIXED: Slide HREF in IE
* ADDED: Spinner loading indicator to show the slideshow is loading up
* ADDED: "Link" column in the "Manage Slides" section
* FIXED: Load Thickbox on the 'Manage Slides' page for the enlargements
* ADDED: Ability to upload an image when saving a slide rather than specifying a URL
* ADDED: Row actions in the 'Manage Slides' section

= 1.0.4 =
* IMPROVED: WordPress 2.9 sortable meta boxes.
* FIXED: `wp_redirect()` fatal error in dashboard.
* ADDED: TinyMCE editor button to quickly insert slideshows into posts/pages.
* ADDED: `exclude` parameter to use in conjunction with the `post_id` parameter to exclude attachments by order.
* CHANGED: Changed `#wrapper` in the HTML markup to `#slideshow-wrapper` due to some theme conflicts.

= 1.0.4 =
* COMPATIBILITY: WordPress 2.9
* FIXED: #fullsize z-index to keep below other elements such as drop down menus.

= 1.0.3 =
* ADDED: Default, English language file in the `languages` folder.
* ADDED: Settings setting to turn On/Off resizing of images via CSS.
* ADDED: Webkit border radius in CSS for thumbnail images.
* ADDED: `post_id` parameter for the `[tribulant_slideshow]` shortcode to display images from a post/page.
* IMPROVED: Plugin doesn't utilize PHP short open tags anymore.
* COMPATIBILITY: Removed `autoLoad` (introduced in PHP 5) parameter from `class_exists` function for PHP 4 compatibility.
* IMPROVED: Directory separator constant DS from DIRECTORY_SEPARATOR.

= 1.0 =
* Initial release of the WordPress Slideshow Gallery plugin
