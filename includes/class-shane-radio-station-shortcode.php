<?php

if (!defined('ABSPATH')) {
    exit;
}

class Shane_Radio_Station_Shortcode {

    public function render() {

        $stream_url = get_option('shane_radio_station_stream_url');
        $stream_type = $this->get_stream_type($stream_url);
        $station_name = get_option('shane_radio_station_name');
        $station_description = get_option('shane_radio_station_description');
        ob_start();
        ?>

        <div class="shane-radio-station-player">
            
        <!-- Station Name -->

            <?php if (!empty($station_name)) : ?>
                <h3><?php echo esc_html($station_name); ?></h3>
            <?php endif; ?>
                        
        <!-- Description -->
         
            <?php if (!empty($station_description)) : ?>
                <p class="shane-radio-station-description">
            <?php echo esc_html($station_description); ?>
                </p>
            <?php endif; ?>
        
        <!-- Stream -->

            <?php if (!empty($stream_url)) : ?>

                <audio
                    class="shane-radio-station-audio"
                    controls
                    data-stream-type="<?php echo esc_attr($stream_type); ?>"
                >
                    <source src="<?php echo esc_url($stream_url); ?>" type="<?php echo esc_attr($stream_type); ?>">
                    Your browser does not support the audio element.
                </audio>

            <?php else : ?>

                <p>No stream URL has been added yet.</p>

            <?php endif; ?>

        </div>

        <?php
        return ob_get_clean();
    }

    private function get_stream_type($stream_url) {

        if (empty($stream_url)) {
            return '';
        }

        if (str_contains($stream_url, '.m3u8')) {
            return 'application/x-mpegURL';
        }

        if (str_contains($stream_url, '.aac')) {
            return 'audio/aac';
        }

        return 'audio/mpeg';
    }
}