<?php

// WP_List_Table is not loaded automatically so we need to load it in our application
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

/**
 * Create a new table class that will extend the WP_List_Table
 */
class Slide_List_Table extends WP_List_Table {
	
    /**
     * Prepare the items for the table to process
     *
     * @return Void
     */
    public function prepare_items() {	    
        $per_page = $this -> get_items_per_page('slideshow_slides_perpage', 15);      
        $page_number = $this -> get_pagenum();
        
        $this -> process_bulk_action();
        
        $data = $this -> table_data($per_page, $page_number);
        usort($data, array($this, 'sort_data'));
        $total_items = $this -> record_count();

        $this -> set_pagination_args( array(
            'total_items' => $total_items,
            'per_page'    => $per_page
        ) );

        $this -> _column_headers = $this -> get_column_info();
        
        $this -> items = $data;
    }
    
    /**
	 * Returns the count of records in the database.
	 *
	 * @return null|string
	 */
	public function record_count() {
		global $wpdb;
		
		$slides_table = SG() -> Slide() -> table;
		$slidesgalleries_table = SG() -> GallerySlides() -> table;

		$sql = "SELECT COUNT(DISTINCT " . $slides_table . ".id) FROM " . $slides_table;
		$sql .= " LEFT JOIN " . $slidesgalleries_table . " ON " . $slides_table . ".id = " . $slidesgalleries_table . ".slide_id";		
		$sql .= $this -> add_conditions();

		return $wpdb -> get_var($sql);
	}

    /**
     * Get the table data
     *
     * @return Array
     */
    private function table_data($per_page = 15, $page_number = 1) {	   
	    global $wpdb;
	     	    
        $data = array();
        
        $slides_table = SG() -> Slide() -> table;
		$slidesgalleries_table = SG() -> GallerySlides() -> table;

		$sql = "SELECT DISTINCT " . $slides_table . ".* FROM " . $slides_table;
		$sql .= " LEFT JOIN " . $slidesgalleries_table . " ON " . $slides_table . ".id = " . $slidesgalleries_table . ".slide_id";		
		$sql .= $this -> add_conditions();
		
		$orderby = (empty($_REQUEST['orderby'])) ? $slides_table . '.modified' : sanitize_text_field($_REQUEST['orderby']);
		$order = (empty($_REQUEST['order'])) ? 'desc' : sanitize_text_field($_REQUEST['order']);
		
		$orderby_allowed_keywords = array("title", "modified", "created", "id", "image");

		$order_allowed_keywords = array("desc", "asc");

		if (!in_array($orderby, $orderby_allowed_keywords)) {
		    $orderby = $slides_table . '.modified';
		}

		if (!in_array($order, $order_allowed_keywords)) {
		    $order = 'desc';
		}


		$sql .= " ORDER BY " . $orderby . " " . $order;
		$sql .= " LIMIT $per_page";
		$sql .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;

		$result = $wpdb -> get_results($sql, 'ARRAY_A');
		
		if (!empty($result)) {
			$n = 0;
			foreach ($result as $record) {
				$data[$n] = (array) SG() -> init_class(SG() -> Slide() -> model, (object) $record);				
				$n++;
			}
		}
		
		return $data;
    }
    
    function add_conditions() {	    
	    $query = '';
	    $conditions = array();

        if (isset($_REQUEST['s'])) {
            $search = sanitize_text_field($_REQUEST['s']);
        } else {
            $search = "";
        }

		if (!empty($search)) {
			$conditions['s'] = $search;
		}

        if (isset($_REQUEST['id'])) {
            $gallery_id = sanitize_text_field($_REQUEST['id']);
        } else {
            $gallery_id = "";
        }

		if (!empty($gallery_id)) {
			$conditions['gallery_id'] = $gallery_id;
		}
		
		$slides_table = SG() -> Slide() -> table;
		$slidesgalleries_table = SG() -> GallerySlides() -> table;
		
		if (!empty($conditions)) {
			$query .= " WHERE";
			$q = 0;
			
			foreach ($conditions as $key => $val) {
				$didvalue = false;
				
				switch ($key) {
					case 's'					:
						$query .= " " . $slides_table . ".title LIKE '%" . esc_sql($val) . "%'";
						$didvalue = true;
						$q++;
						break;
					case 'gallery_id'			:
						$query .= " " . $slidesgalleries_table . ".gallery_id = '" . esc_sql($val) . "'";
						$didvalue = true;
						$q++;
						break;
				}
				
				if (!empty($didvalue) && $q < count($conditions)) {
					$query .= " AND";
				}
			}			
			
		}
		
		return $query;
    }

    /**
     * Override the parent columns method. Defines the columns to use in your listing table
     *
     * @return Array
     */
    public function get_columns() {
        $columns = array(
            'cb'				=>	'<input type="checkbox" />',
            'image'				=>	__('Image', 'slideshow-gallery'),
            'id'				=>	__('ID', 'slideshow-gallery'),
            'title'				=>	__('Title', 'slideshow-gallery'),
            'galleries'			=>	__('Galleries', 'slideshow-gallery'),
            'link'				=>	__('Link', 'slideshow-gallery'),
            'expiry'			=>	__('Expiry', 'slideshow-gallery'),
            'modified'			=>	__('Date', 'slideshow-gallery'),
            'order'				=>	__('Order', 'slideshow-gallery'),
        );

        return $columns;
    }

    /**
     * Define which columns are hidden
     *
     * @return Array
     */
	public function get_hidden_columns() {
        return array(
	        'id',
	        'link',
	        'expiry',
	        'order',
        );
    }

    /**
     * Define the sortable columns
     *
     * @return Array
     */
    public function get_sortable_columns() {
        $sortable = array(
	        'id'				=>	array('id', true),
	        'image'				=>	array('image', true),
	        'title'				=>	array('title', true),
	        'link'				=>	array('link', true),
	        'expiry'			=>	array('expiry', true),
	        'modified'			=>	array('modified', true),
	        'order'				=> 	array('order', true),
        );
        
        return $sortable;
    }
    
    function get_bulk_actions() {
		$actions = array(
			'delete'    			=> 	__('Delete', 'slideshow-gallery'),
			'addgalleries'			=>	__('Add Galleries...', 'slideshow-gallery'),
			'setgalleries'			=>	__('Set Galleries...', 'slideshow-gallery'),
			'remgalleries'			=>	__('Remove Galleries', 'slideshow-gallery'),
		);
		
		return $actions;
	}
	
	function process_bulk_action() {
		global $wpdb;
				
		$current_action = $this -> current_action();
        if (!empty($current_action)) {
	        $slides = map_deep($_REQUEST['slides'], 'sanitize_text_field');
	        $galleries = map_deep($_REQUEST['galleries'], 'sanitize_text_field');
	        
	        if (!empty($slides)) {
		        //Detect when a bulk action is being triggered...      
		        switch ($current_action) {
			        case 'delete'				:
			        	foreach ($slides as $slide_id) {
				            SG() -> Slide() -> delete($slide_id);
			            }
			        
						$message = __('Selected slides deleted', 'slideshow-gallery');
						SG() -> redirect(false, 'message', $message);
			        	break;
			        case 'remgalleries'			:
						foreach ($slides as $slide_id) {
							SG() -> GallerySlides() -> delete_all(array('slide_id' => $slide_id));
						}
						
						$message = __('Selected slides removed from all galleries', 'slideshow-gallery');
						SG() -> redirect(false, 'message', $message);
						break;
					case 'setgalleries'			:
						foreach ($slides as $slide_id) {
							SG() -> GallerySlides() -> delete_all(array('slide_id' => $slide_id));
						}
					case 'addgalleries'			:
						if (!empty($galleries)) {
							foreach ($slides as $slide_id) {
								foreach ($galleries as $gallery_id) {
									SG() -> GallerySlides() -> save(array(
										'slide_id'				=>	$slide_id,
										'gallery_id'			=>	$gallery_id,
									));
								}
							}
							
							$message = __('Slides added to selected galleries', 'slideshow-gallery');
							SG() -> redirect(false, 'message', $message);
						}
						break;
		        }
		    }
		    
		    SG() -> redirect();
	    }
    }
	
	public function extra_tablenav($which = null) {		
		if (!empty($which) && $which == "top") {
			?>
			
			<?php if (!empty($this -> items)) : ?>			
				<div class="alignleft actions">
					<a href="<?php echo wp_kses(admin_url('admin.php?page=' . SG() -> sections -> slides . '&method=order' . ((!empty($_GET['id'])) ? '&gallery_id=' . esc_html($_GET['id']) : '')) , GalleryCheckinit::get_allowed_html(), GalleryCheckinit::get_allowed_protocols());
  ?>" class="button"><i class="fa fas fa-sort fa-fw"></i> <?php esc_html_e('Order Slides', 'slideshow-gallery'); ?></a>
				</div>
				
				<div id="action_galleries_div" style="display:none;">
					<br class="clear" />
					<?php if ($galleries = SG() -> Gallery() -> select()) : ?>
						<div><label style="font-weight:bold"><input onclick="jqCheckAll(this, false, 'galleries');" type="checkbox" name="checkboxall" value="1" /> <?php esc_html_e('Select all', 'slideshow-gallery'); ?></label></div>
						<?php foreach ($galleries as $gallery_id => $gallery_name) : ?>
							<div><label><input type="checkbox" name="galleries[]" value="<?php echo esc_attr($gallery_id); ?>" /> <?php esc_html_e($gallery_name); ?></label></div>
						<?php endforeach; ?>
					<?php else : ?>
						<p class="slideshow_error"><?php esc_html_e('No galleries are available', 'slideshow-gallery'); ?></p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
			<?php
		}
	}

    /**
     * Define what data to show on each column of the table
     *
     * @param  Array $item        Data
     * @param  String $column_name - Current column name
     *
     * @return Mixed
     */
    public function column_default($item, $column_name) {
        switch( $column_name ) {
            case 'id'			:
                return $item[$column_name];
				break;
            default				:
                return $item[$column_name];
                break;
        }
    }
    
    function column_cb($item) {
        return sprintf(
            '<input type="checkbox" name="slides[]" value="%s" />', $item['id']
        );    
    }
    
    function column_image($item) {
	    
	    $image = '<a href="' . $item['image_path'] . '" title="' . esc_attr(wp_unslash($item['title'])) . '" class="colorbox" rel="slides"><img style="width:50px; height:50px;" class="img-rounded" src="' . SG() -> Html -> otf_image_src((object) $item, 50, 50, 100) . '" alt="' . esc_attr(SG() -> Html -> sanitize($item['title'])) . '" /></a>';
	    
	    return $image;
    }
    
    function column_title($item = null) {
	    
	    $title = '';
	    $title .= '<a class="row-title" href="' . admin_url('admin.php?page=' . SG() -> sections -> slides . '&method=save&id=' . $item['id']) . '">' . esc_html($item['title']) . '</a>';
	    
	    $actions = array(
		    'edit'				=>	sprintf('<a href="%s">%s</a>', admin_url('admin.php?page=' . SG() -> sections -> slides . '&method=save&id=' . $item['id']), __('Edit', 'slideshow-gallery')),
		    'delete'			=>	sprintf('<a href="%s" onclick="%s">%s</a>', wp_nonce_url(admin_url('admin.php?page=' . SG() -> sections -> slides . '&method=delete&id=' . $item['id']),SG() -> sections -> slides . '_delete'), "if (!confirm('" . __('Are you sure you want to delete this slide?', 'slideshow-gallery') . "')) { return false; }", __('Delete', 'slideshow-gallery')),
	    );
	    
	    $title .= $this -> row_actions($actions);
	    
	    return $title;
    }
    
    function column_galleries($item = null) {
	    
	    $galleries = __('None', 'slideshow-gallery');
	    if (!empty($item['gallery'])) {
		    $galleries = '';
		    $g = 1;
		    foreach ($item['gallery'] as $gallery) {
			    $galleries .= '<a href="' . admin_url('admin.php?page=' . SG() -> sections -> galleries . '&method=view&id=' . $gallery -> id) . '">' . esc_html($gallery -> title) . '</a>';
			    if ($g < count($item['gallery'])) {
				    $galleries .= ', ';
			    }
			    $g++;
		    }
	    }
	    
	    return $galleries;
    }
    
    function column_link($item = null) {
	    $link = '<span class="slideshow_error"><i class="fa fa-times fa-fw"></i> ' . __('No', 'slideshow-gallery') . '</span>';
	    
	    if (!empty($item['uselink']) && !empty($item['link'])) {
		    $link = '<span class="slideshow_success"><i class="fa fa-check fa-fw"></i> ' . __('Yes', 'slideshow-gallery') . '</span>';
		    $link .= ' (<a href="' . esc_attr(wp_unslash($item['link'])) . '" target="_blank">' . __('Open', 'slideshow-gallery') . '</a>)';
	    }
	    
	    return $link;
    }
    
    function column_expiry($item = null) {
	    $expiry = '<span class="slideshow_success"><i class="fa fa-times fa-fw"></i> ' . __('No', 'slideshow-gallery') . '</span>';
	    if (!empty($item['expiry'])) {
		    $expiry = '<span class="slideshow_warning"><i class="fa fa-check fa-fw"></i> ';
		    $expiry .= date_i18n(get_option('date_format'), strtotime($item['expiry']));
		    $expiry .= '</span>';
		    if (strtotime($item['expiry']) < time()) {
		    	$expiry .= '<br/><span class="slideshow_error"><i class="fa fa-exclamation-triangle fa-fw"></i> ' . __('Expired', 'slideshow-gallery') . '</span>';
		    }
	    }
	    
	    return $expiry;
    }
    
    function column_modified($item = array()) {	    
	    $modified = '';
	    
	    if (!empty($item['modified'])) {
		    $modified = '<label><abbr title="' . esc_attr(wp_unslash($item['modified'])) . '">' . SG() -> Html -> gen_date(false, strtotime($item['modified'])) . '</abbr></label>';
	    }
	    
	    return $modified;
    }
    
    /** Text displayed when no customer data is available */
	public function no_items() {
		echo sprintf(__('No slides avaliable. You can %s or %s.', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . SG() -> sections -> slides . '&method=save') . '">' . __('add one', 'slideshow-gallery') . '</a>', '<a href="' . admin_url('admin.php?page=' . SG() -> sections -> slides . '&method=save-multiple') . '">' . __('add multiple', 'slideshow-gallery') . '</a>');
	}

    /**
     * Allows you to sort the data by the variables set in the $_GET
     *
     * @return Mixed
     */
    private function sort_data( $a, $b ) {
        // Set defaults
        $orderby = 'modified';
        $order = 'desc';

        // If orderby is set, use this as the sort column
        if(!empty($_GET['orderby']))         {
            $orderby = sanitize_text_field($_GET['orderby']);
        }

        // If order is set use this as the order
        if(!empty($_GET['order']))
        {
            $order = sanitize_text_field($_GET['order']);
        }


        $result = strcmp( $a[$orderby], $b[$orderby] );

        if($order === 'asc') {
            return $result;
        }

        return -$result;
    }
    
    function debug($var = array()) {
	    echo wp_kses('<pre>' . print_r($var, true) . '</pre>' , GalleryCheckinit::get_allowed_html(), GalleryCheckinit::get_allowed_protocols());
	    return true;
    }
}