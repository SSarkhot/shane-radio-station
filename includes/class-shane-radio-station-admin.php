<?php

if (!defined('ABSPATH')) {
    exit;
}

class Shane_Radio_Station_Admin {

    public function add_admin_menu() {

        add_menu_page(
            'Shane Radio Station',
            'Radio Station',
            'manage_options',
            'shane-radio-station',
            array($this, 'settings_page'),
            'dashicons-controls-volumeon',
            20
        );
    }

   public function register_settings() {

    register_setting(
        'shane_radio_station_settings_group',
        'shane_radio_station_stream_url',
        array(
            
            'sanitize_callback' => 'esc_url_raw',
            
            )
        );
    }

    public function settings_page() {
        ?>

        <div class="wrap">

            <h1>Shane Radio Station Settings</h1>

            <form method="post" action="options.php">

                <?php
                settings_fields('shane_radio_station_settings_group');
                do_settings_sections('shane_radio_station_settings_group');
                ?>

                <table class="form-table">

                    <tr>
                        <th scope="row">Stream URL</th>

                        <td>
                            <input
                                type="text"
                                name="shane_radio_station_stream_url"
                                value="<?php echo esc_attr(get_option('shane_radio_station_stream_url')); ?>"
                                class="regular-text"
                            >
                        </td>
                    </tr>

                </table>

                <?php submit_button(); ?>

            </form>

        </div>

        <?php
    }
}