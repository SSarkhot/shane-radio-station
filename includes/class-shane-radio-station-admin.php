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
        register_setting(
    'shane_radio_station_settings_group',
    'shane_radio_station_name',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    
            )
        );

        register_setting(
    'shane_radio_station_settings_group',
    'shane_radio_station_description',
    array(
        'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
    
        }

    public function settings_page() {
    ?>

    <div class="wrap">

        <h1>Shane Radio Station Settings</h1>

        <p>
            Add your live stream URL below. Then place the shortcode on any page or post.
        </p>

        <form method="post" action="options.php">

            <?php
            settings_fields('shane_radio_station_settings_group');
            do_settings_sections('shane_radio_station_settings_group');
            ?>

            <table class="form-table">
            <tr>
                    <th scope="row">Station Name</th>

                    <td>
                        <input
                            type="text"
                            name="shane_radio_station_name"
                            value="<?php echo esc_attr(get_option('shane_radio_station_name', 'Shane Radio Station')); ?>"
                            class="regular-text"
                            placeholder="Leave empty to hide Station Name"
                        >

                        <p class="description">
                            This name will appear above the audio player.
                        </p>
                    </td>
                </tr>
            <tr>

                <tr>
                    <th scope="row">Station Description</th>

                    <td>
                        <textarea
                            name="shane_radio_station_description"
                            class="large-text"
                            rows="3"
                            placeholder="Live music, 24/7."
                        ><?php echo esc_textarea(get_option('shane_radio_station_description')); ?></textarea>

                        <p class="description">
                            Optional text shown below the station name.
                        </p>
                    </td>
                </tr>

                    <th scope="row">Stream URL</th>

                    <td>
                        <input
                            type="text"
                            name="shane_radio_station_stream_url"
                            value="<?php echo esc_attr(get_option('shane_radio_station_stream_url')); ?>"
                            class="regular-text"
                            placeholder="https://example.com/live-stream.mp3"
                        >

                        <p class="description">
                            Supports MP3, AAC, and HLS .m3u8 stream URLs.
                        </p>
                    </td>
                </tr>

            </table>

            <?php submit_button(); ?>

        </form>

        <hr>

        <h2>Shortcode</h2>

        <p>Use this shortcode to display the radio player:</p>

        <code>[shane_radio_station]</code>

        <h2>Test Stream</h2>

        <p>You can use this test stream while developing:</p>

        <code>https://streams.radiomast.io/ref-128k-mp3-stereo</code>

    </div>

     <?php
    }
}