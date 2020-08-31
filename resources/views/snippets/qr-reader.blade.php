<div class="card-body">
    <video id="qr-video" class="w-100"></video>
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
    var canvas = document.getElementById('qr-canvas');

    function setResult(label, result) {
        label.textContent = result;
        label.style.color = 'teal';
        clearTimeout(label.highlightTimeout);
        label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);
    }

    // ####### Web Cam Scanning #######


    const scanner = new QrScanner(video, result => setResult(camQrResult, result), error => {
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

    // for debugging
    window.scanner = scanner;

    scanner.$canvas.setAttribute('id', '');

    document.getElementById('show-scan-region').addEventListener('change', (e) => {
        const input = e.target;
        const label = input.parentNode;
        label.parentNode.insertBefore(scanner.$canvas, label.nextSibling);
        scanner.$canvas.style.display = input.checked ? 'block' : 'none';
    });

</script>
