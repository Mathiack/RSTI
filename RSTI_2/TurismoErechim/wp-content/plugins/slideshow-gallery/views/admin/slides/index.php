<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly	
	
require_once $this -> plugin_base() . DS . 'includes' . DS . 'class.slide-list-table.php';
$Slide_List_table = new Slide_List_Table();	
$Slide_List_table -> prepare_items();
	
?>

<div class="wrap slideshow-gallery slideshow">
	<h1><?php _e('Manage Slides', 'slideshow-gallery'); ?>
	<?php echo $this -> Html -> link(__('Add New', 'slideshow-gallery'), $this -> url . '&amp;method=save', array('class' => "add-new-h2")); ?> 
	<?php echo $this -> Html -> link(__('Add Multiple', 'slideshow-gallery'), $this -> url . '&amp;method=save-multiple', array('class' => "add-new-h2")); ?></h1>
	
	<form id="slideshow-slides-form" action="<?php echo admin_url('admin.php?page=' . $this -> sections -> slides); ?>" method="get">
		<input type="hidden" name="page" value="<?php echo esc_attr($this -> sections -> slides); ?>" />
		<?php $Slide_List_table -> search_box(__('Search Slides', 'slideshow-gallery'), 'search'); ?>
		<?php $Slide_List_table -> display(); ?>
	</form>
</div>

<script type="text/javascript">
jQuery('#bulk-action-selector-top').on('change', function(event) {
	var action = jQuery(this).val();
	switch (action) {
		case 'addgalleries'				:
		case 'setgalleries'				:
			jQuery('#action_galleries_div').show();
			break;
		case 'remgalleries'				:
			jQuery('#action_galleries_div').hide();
			break;
	}
});
	
jQuery('#doaction').on('click', function(event) {
	if (!confirm('Are you sure you want to apply this bulk action?')) {
		return false;
	}
});
</script>