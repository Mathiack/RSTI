<?php

// WP_List_Table is not loaded automatically so we need to load it in our application
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

/**
 * Create a new table class that will extend the WP_List_Table
 */
class Gallery_List_Table extends WP_List_Table {
    /**
     * Prepare the items for the table to process
     *
     * @return Void
     */



    public function prepare_items() {	    
        $per_page = $this -> get_items_per_page('slideshow_galleries_perpage', 15);      
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
		
		$galleries_table = SG() -> Gallery() -> table;

		$sql = "SELECT COUNT(DISTINCT " . $galleries_table . ".id) FROM " . $galleries_table;
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
        
        $galleries_table = SG() -> Gallery() -> table;

		$sql = "SELECT DISTINCT " . $galleries_table . ".* FROM " . $galleries_table;
		$sql .= $this -> add_conditions();
		
		$orderby = (empty($_REQUEST['orderby'])) ? $galleries_table . '.modified' : sanitize_text_field($_REQUEST['orderby']);
		$order = (empty($_REQUEST['order'])) ? 'desc' : sanitize_text_field($_REQUEST['order']);
		
        $orderby_allowed_keywords = array("title", "modified", "created", "id");

		$order_allowed_keywords = array("desc", "asc");

		if (!in_array($orderby, $orderby_allowed_keywords)) {
		    $orderby = $galleries_table . '.modified';
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
				$data[$n] = (array) SG() -> init_class(SG() -> Gallery() -> model, (object) $record);				
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
		
		$galleries_table = SG() -> Gallery() -> table;
		
		if (!empty($conditions)) {
			$query .= " WHERE";
			$q = 0;
			
			foreach ($conditions as $key => $val) {
				$didvalue = false;
				
				switch ($key) {
					case 's'					:
						$query .= " " . $galleries_table . ".title LIKE '%" . esc_sql($val) . "%'";
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
            'title'				=>	__('Title', 'slideshow-gallery'),
            'id'				=>	__('ID', 'slideshow-gallery'),
            'slides'			=>	__('Slides', 'slideshow-gallery'),
            'shortcode'			=>	__('Shortcode', 'slideshow-gallery'),
            'modified'			=>	__('Date', 'slideshow-gallery'),
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
	        'title'				=>	array('title', true),
	        'modified'			=>	array('modified', true),
        );
        
        return $sortable;
    }
    
    function get_bulk_actions() {
		$actions = array(
			'delete'    			=> 	__('Delete', 'slideshow-gallery'),
		);
		
		return $actions;
	}
	
	function process_bulk_action() {
		global $wpdb;
				
		$current_action = $this -> current_action();
        if (!empty($current_action)) {
	        $galleries = map_deep($_REQUEST['galleries'], 'sanitize_text_field');
	        
	        if (!empty($galleries)) {
		        //Detect when a bulk action is being triggered...      
		        switch ($current_action) {
			        case 'delete'				:
			        	foreach ($galleries as $gallery_id) {
				            SG() -> Gallery() -> delete($gallery_id);
			            }
			        
						$message = __('Selected galleries deleted', 'slideshow-gallery');
						SG() -> redirect(false, 'message', $message);
			        	break;
		        }
		    }
		    
		    SG() -> redirect();
	    }
    }
	
	public function extra_tablenav($which = null) {		
		if (!empty($which) && $which == "top") {
			?>
			
			<?php /*<div class="alignleft actions">
				<a href=""></a>
			</div>*/ ?>
			
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
            '<input type="checkbox" name="galleries[]" value="%s" />', $item['id']
        );    
    }
    
    function column_title($item = null) {
	    
	    $title = '';
	    $title .= '<a class="row-title" href="' . admin_url('admin.php?page=' . SG() -> sections -> galleries . '&method=save&id=' . $item['id']) . '">' . esc_html($item['title']) . '</a>';
	    
	    $actions = array(
		    'view'				=>	sprintf('<a href="%s">%s</a>', admin_url('admin.php?page=' . SG() -> sections -> galleries . '&method=view&id=' . $item['id']), __('View', 'slideshow-gallery')),
		    'edit'				=>	sprintf('<a href="%s">%s</a>', admin_url('admin.php?page=' . SG() -> sections -> galleries . '&method=save&id=' . $item['id']), __('Edit', 'slideshow-gallery')),
		    'embed'				=>	sprintf('<a href="%s">%s</a>', admin_url('admin.php?page=' . SG() -> sections -> galleries . '&method=hardcode&id=' . $item['id']), __('Embed', 'slideshow-gallery')),
		    'order'				=>	sprintf('<a href="%s">%s</a>', admin_url('admin.php?page=' . SG() -> sections -> slides . '&method=order&gallery_id=' . $item['id']), __('Order Slides', 'slideshow-gallery')),
		    'delete'			=>	sprintf('<a href="%s" onclick="%s">%s</a>', wp_nonce_url(admin_url('admin.php?page=' . SG() -> sections -> galleries . '&method=delete&id=' . $item['id']),   SG() -> sections -> galleries . '_delete'), "if (!confirm('" . __('Are you sure you want to delete this gallery?', 'slideshow-gallery') . "')) { return false; }", __('Delete', 'slideshow-gallery')),
	    );
	    
	    $title .= $this -> row_actions($actions);
	    
	    return $title;
    }
    
    function column_slides($item = array()) {
	    
	    $slides = '<a href="' . admin_url('admin.php?page=' . SG() -> sections -> galleries . '&method=view&id=' . $item['id']) . '">' . $item['slidescount'] . '</a>';
	    
	    return $slides;
    }
    
    function column_shortcode($item = array()) {
	    
	    $shortcode = '<code>[tribulant_slideshow gallery_id=' . $item['id'] . ']</code>';
	    
	    return $shortcode;
    }
    
    function column_modified($item = array()) {	    
	    $modified = '';
	    if (!empty($item['modified'])) {
		    $modified = '<label><abbr title="' . esc_attr(wp_unslash($item['modified'])) . '">' . SG() -> Html -> gen_date(false, strtotime($item['modified'])) . '</abbr></label>';
	    }
	    
	    return 	wp_kses($modified , GalleryCheckinit::get_allowed_html(), GalleryCheckinit::get_allowed_protocols());

    }
    
    /** Text displayed when no customer data is available */
	public function no_items() {

		echo sprintf(__('No galleries avaliable. You can %s', 'slideshow-gallery'), '<a href="' . admin_url('admin.php?page=' . SG() -> sections -> galleries . '&method=save') . '">' . __('add one', 'slideshow-gallery') . '</a>');
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