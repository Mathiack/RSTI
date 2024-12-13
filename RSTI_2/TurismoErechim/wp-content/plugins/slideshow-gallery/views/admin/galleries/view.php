<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly	
	
require_once $this -> plugin_base() . DS . 'includes' . DS . 'class.slide-list-table.php';
$args = array('screen' => $this -> menus['slideshow-slides']);
$Slide_List_table = new Slide_List_Table($args);	
$Slide_List_table -> prepare_items();
	
?>

<div class="wrap <?php echo esc_html($this -> pre); ?> slideshow">
	<h1><?php echo sprintf(esc_html__('View Gallery: %s', 'slideshow-gallery'), $gallery -> title); ?></h1>
	
	<div style="float:none;" class="subsubsub"><?php echo $this -> Html -> link(__('&larr; All Galleries', 'slideshow-gallery'), $this -> url, array('title' => __('All Galleries', 'slideshow-gallery'))); ?></div>
	
	<div class="tablenav top">
		<div class="alignleft">
			<a href="?page=<?php echo esc_html($this -> sections -> galleries); ?>&amp;method=save&amp;id=<?php echo esc_html($gallery -> id); ?>" class="button"><i class="fa fa-pencil"></i> <?php _e('Edit Gallery', 'slideshow-gallery'); ?></a>
		</div>
		<div class="alignleft">
			<a href="?page=<?php echo esc_html($this -> sections -> galleries); ?>&amp;method=hardcode&amp;id=<?php echo esc_html($gallery -> id); ?>" class="button"><i class="fa fa-code"></i> <?php _e('Embed', 'slideshow-gallery'); ?></a>
		</div>
		<div class="alignleft">
			<a onclick="if (!confirm('<?php _e('Are you sure you want to delete this gallery?', 'slideshow-gallery'); ?>')) { return false; }" href="?page=<?php echo esc_html($this -> sections -> galleries); ?>&amp;method=delete&amp;id=<?php echo esc_html($gallery -> id); ?>" class="button button-highlighted"><i class="fa fa-times"></i> <?php _e('Delete Gallery', 'slideshow-gallery'); ?></a>
		</div>
	</div>
	
	<form id="slideshow-slides-form" action="<?php echo admin_url('admin.php?page=' . $this -> sections -> slides); ?>" method="get">
		<input type="hidden" name="page" value="<?php echo esc_attr($this -> sections -> slides); ?>" />
		<?php $Slide_List_table -> search_box(__('Search Slides', 'slideshow-gallery'), 'search'); ?>
		<?php $Slide_List_table -> display(); ?>
	</form>
</div>

<script type="text/javascript">	
jQuery('#doaction').on('click', function(event) {
	if (!confirm('Are you sure you want to apply this bulk action?')) {
		return false;
	}
});
</script>