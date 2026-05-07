<?php

if (!defined('ABSPATH')) {
    exit;
}

class Shane_Radio_Station {

    public function run() {
        $this->load_dependencies();
        $this->define_hooks();
        $this->enqueue_assets();
    }

    private function load_dependencies() {
        require_once SHANE_RADIO_STATION_PLUGIN_DIR . 'includes/class-shane-radio-station-shortcode.php';
        require_once SHANE_RADIO_STATION_PLUGIN_DIR . 'includes/class-shane-radio-station-admin.php';
    }

    private function define_hooks() {
        $shortcode = new Shane_Radio_Station_Shortcode();

        add_shortcode('shane_radio_station', array($shortcode, 'render'));
        
        $admin = new Shane_Radio_Station_Admin();

        add_action('admin_menu', array($admin, 'add_admin_menu'));
        add_action('admin_init', array($admin, 'register_settings'));
    }

    private function enqueue_assets() {
        add_action('wp_enqueue_scripts', array($this, 'register_assets'));
    }

    public function register_assets() {
    wp_enqueue_style(
        'shane-radio-station-style',
        SHANE_RADIO_STATION_PLUGIN_URL . 'assets/css/radio-station.css',
        array(),
        SHANE_RADIO_STATION_VERSION
        
        );

    wp_enqueue_script(
        'hls-js',
        'https://cdn.jsdelivr.net/npm/hls.js@latest',
        array(),
        null,
        true
        
        );

    wp_enqueue_script(
        'shane-radio-station-script',
        SHANE_RADIO_STATION_PLUGIN_URL . 'assets/js/radio-station.js',
        array('hls-js'),
        SHANE_RADIO_STATION_VERSION,
        true
        
        );
    }
}