<div class="card-body">
    <div class="embed-responsive embed-responsive-1by1">
        <video id="qr-video"></video>
    </div>
</div>
<div class="card-body">
    <button class="btn btn-light" id="flash-toggle">⚡</button>
    <p class="card-text" id="cam-qr-result"></p>
</div>
<script type="module">
    import QrScanner from '/js/qr-scanner.min.js';
    QrScanner.WORKER_PATH = '/js/qr-scanner-worker.min.js';

    const video = document.getElementById('qr-video');
    const flashToggle = document.getElementById('flash-toggle');
    const camQrResult = document.getElementById('cam-qr-result');

    function setResult(result) {
        if (result.startsWith({{ action('room.index') }}))
        {
            window.location.replace(result);
        }
    }

    const scanner = new QrScanner(video, result => setResult(result), error => {
        camQrResult.textContent = error;
        camQrResult.style.color = 'inherit';
    });

    scanner.start().then(() => {
        scanner.hasFlash().then(hasFlash => {
            if (hasFlash) {
                flashToggle.style.display = 'inline-block';
                flashToggle.addEventListener('click', () => {
                    scanner.toggleFlash();
                });
            }
        });
    });
</script>
