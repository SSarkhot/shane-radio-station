document.addEventListener('DOMContentLoaded', function () {
    const audioPlayers = document.querySelectorAll('.shane-radio-station-audio');

    audioPlayers.forEach(function (audio) {
        const streamType = audio.dataset.streamType;
        const source = audio.querySelector('source');

        if (!source) {
            return;
        }

        const streamUrl = source.getAttribute('src');

        if (streamType === 'application/x-mpegURL') {
            if (audio.canPlayType('application/vnd.apple.mpegurl')) {
                audio.src = streamUrl;
            } else if (Hls.isSupported()) {
                const hls = new Hls();
                hls.loadSource(streamUrl);
                hls.attachMedia(audio);
            } else {
                console.warn('HLS is not supported in this browser.');
            }
        }
    });
});