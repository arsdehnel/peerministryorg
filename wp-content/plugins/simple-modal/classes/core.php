<?php

/**
 * @since 0.1.0 this class initializes everything and is passed around through the other classes
 */

    class simplemodal_core{

        public function __construct( &$db, &$ui ){
            $this->db = &$db;
            $this->ui = &$ui;
            add_action('wp_enqueue_scripts',array($this,'import_public_js'));
            add_action('wp_head',array($this,'import_public_css'));
            add_action('wp_footer',array($this,'import_public_html'));
            add_filter('mce_buttons', array($this, 'my_mce_buttons'));
			// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
			add_filter('mce_external_plugins', array($this,'myplugin_register_tinymce_javascript') );
        	add_action( 'wp_ajax_simple-modal--editor-modal-list-lookup' , array( $this, 'editor_modal_list_lookup' )    , 10 );
        	add_action( 'wp_ajax_simple-modal--ajax-post-load' , array( $this, 'ajax_post_load' )    , 10 );

        }

        function ajax_post_load(){
        	$post = get_post( $_GET['postId'] );
        	echo json_encode(array(
        			'title' => $post->post_title,
        			'content' => $post->post_content
        			));
        	die();
        }

        function import_public_css(){
        	wp_enqueue_style( 'simplemodal-public-css', plugins_url('../css/public.css',__file__) );
        }

        function import_public_js(){
        	wp_enqueue_script( 'simplemodal-public-js', plugins_url('../js/public.js',__file__), null, null, true );
        }

        function import_public_html(){
        	//echo '<div class="public">';
        	require_once SIMPLEMODAL_DIR . '/views/public-page-html.php';
        }

        function my_mce_buttons($buttons) {
        	wp_enqueue_style( 'sm-tinymce-styles', plugins_url().'/simple-modal/tinymce/wp_simplemodal.css' );
        	array_push($buttons, 'separator', 'wp_simplemodal');
   			return $buttons;

		}

		function myplugin_register_tinymce_javascript($plugin_array) {
			$plugin_array['wp_simplemodal'] = plugins_url('../tinymce/wp_simplemodal.js',__file__);
   			return $plugin_array;
		}

		function editor_modal_list_lookup(){

			//the "modals" row-select generated from the UI
		    $modals = new SimpleModalUI();
		    $modals->type = "rowselect";
		    $modals->label_class = "simplemodal-title";
		    $modals->meta_class = "simplemodal-meta";
		    $modals->wrapper_class = 'simplemodal-tinymce-modal-select';
		    $modals->name = 'simplemodal_modal_post_id';
		    $modals->id = 'simplemodal_modal_post_id';
		    $modals->data = $this->db->get_modals();

			require_once SIMPLEMODAL_DIR . '/tinymce/modal-list.php';
			die();
		}

   }


/* End of file */
/* Location: ./simple-modal/classes/core.php */
