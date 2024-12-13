<?php
	
if (!defined('ABSPATH')) exit; // Exit if accessed directly	
	
require_once $this -> plugin_base() . DS . 'includes' . DS . 'class.gallery-list-table.php';
$Gallery_List_table = new Gallery_List_Table();	
$Gallery_List_table -> prepare_items();
	
?>

<div class="wrap slideshow-gallery slideshow">
	<h1><?php _e('Manage Galleries', 'slideshow-gallery'); ?>
	<?php echo $this -> Html -> link(__('Add New', 'slideshow-gallery'), $this -> url . '&amp;method=save', array('class' => "add-new-h2")); ?></h1>
	
	<form id="slideshow-galleries-form" action="<?php echo admin_url('admin.php?page=' . $this -> sections -> galleries); ?>" method="get">
		<input type="hidden" name="page" value="<?php echo esc_attr($this -> sections -> galleries); ?>" />
		<?php $Gallery_List_table -> search_box(__('Search Galleries', 'slideshow-gallery'), 'search'); ?>
		<?php $Gallery_List_table -> display(); ?>
	</form>
</div>

<script type="text/javascript">	
jQuery('#doaction').on('click', function(event) {
	if (!confirm('Are you sure you want to apply this bulk action?')) {
		return false;
	}
});
</script>