<?php

/**
 * @since 0.1.0 this class handles all the database interactions for simple modal
 */
    class simplemodal_db{

        public function __construct(){
            global $wpdb;
            $this->wpdb = &$wpdb;
        }

        public function get_modals(){
        	return get_posts(array('post_type'=>'simplemodal'));
        }

    }

/* End of file */
/* Location: ./simple-modal/classes/db.php */