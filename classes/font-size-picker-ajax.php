<?php

class FontSizePickerAjax {
	public function __construct(){
		$this->maybe_start_session();
		$this->add_hooks();
	}

	public function maybe_start_session(){
		if( version_compare( phpversion(), '5.4.0', '<' ) && session_id() == '' ) session_start();
		elseif( session_status() == PHP_SESSION_NONE ) session_start();
	}

	public function add_hooks(){
		add_action( 'wp_ajax_nopriv_fictive_change_size', array( $this, 'change_font_size' ) );
		add_action( 'wp_ajax_fictive_change_size', array( $this, 'change_font_size' ) );

	}

	public function change_font_size(){
		$new_size = sanitize_text_field( $_POST['size'] );
		$_SESSION['fictive_font_size'] = $new_size;
		wp_send_json_success();
	}
}

$fontSizePickerAjax = new FontSizePickerAjax;
