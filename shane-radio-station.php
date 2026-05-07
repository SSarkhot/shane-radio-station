<?php
/**
 * Plugin Name: Shane Radio Station
 * Description: A live radio streaming plugin for WordPress.
 * Version: 1.0.0
 * Author: Shane Sarkhot
 */

if (!defined('ABSPATH')) {
    exit;
}

define('SHANE_RADIO_STATION_VERSION', '1.0.0');
define('SHANE_RADIO_STATION_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SHANE_RADIO_STATION_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once SHANE_RADIO_STATION_PLUGIN_DIR . 'includes/class-shane-radio-station.php';

function shane_radio_station_run() {
    $plugin = new Shane_Radio_Station();
    $plugin->run();
}

shane_radio_station_run();