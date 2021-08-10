<?php

// Create custom settings menu
add_action('admin_menu', 'speaker_api_create_menu');

function speaker_api_create_menu() {
    //create new top-level menu
    add_menu_page('Speakers API Settings', 'Speakers API', 'administrator', __FILE__, 'speaker_api_settings_page' , 'dashicons-admin-generic' );
    //call register settings function
    add_action( 'admin_init', 'register_speaker_plugin_settings' );
}


function register_speaker_plugin_settings() {
    //register our settings
    register_setting( 'speakers-settings-group', 'speaker_user' );
    register_setting( 'speakers-settings-group', 'speaker_password' );
}

function speaker_api_settings_page(){
    require_once plugin_dir_path(__FILE__) . '../views/panel-admin.php';

}
