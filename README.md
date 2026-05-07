## Current Features

- Configurable stream URL
- Editable station name
- Optional station description
- Shortcode support: [shane_radio_station]
- Basic MP3/AAC/HLS preparation
- Frontend CSS and JS loaded

## Roadmap

1. Schedule system
   - Create Show custom post type
   - Add show image
   - Add day/start/end schedule fields
   - Add disabled status
   - Add override status
   - Add conflict detection
   - Display current live show on frontend player

2. Live player
   - Replace native audio controls
   - Add custom play/pause button
   - Remove seek/rewind ability

3. Block/widget support
   - Gutenberg block
   - Classic widget

4. Player settings
   - Responsive player container
   - Background image support
   - Equalizer animation
   - Multiple players
   - Player skins
   - Optional metadata support
     - Admin can add a private metadata API URL
     - API URL is stored in WordPress options
     - Frontend does not expose the API URL
     - WordPress fetches metadata server-side
     - Frontend receives only safe fields:
       - song title
       - artist
     - Display metadata under show details

## Security
Frontend JS
   ↓
Calls our WordPress AJAX/REST endpoint
   ↓
WordPress server fetches private metadata API URL
   ↓
WordPress returns only cleaned metadata
   ↓
Frontend never sees the real metadata API URL