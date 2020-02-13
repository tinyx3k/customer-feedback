const video = document.getElementById('video');
const cameraOptions = document.querySelector('.video-options>select');
let currentStream;

function stopMediaTracks(stream) {
    stream.getTracks().forEach(track => {
        track.stop();
    });
}

Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('/models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('/models'),
    faceapi.nets.faceExpressionNet.loadFromUri('/models')
]);

function startVideo() {

}

video.addEventListener('playing', () => {
    const canvas = faceapi.createCanvasFromMedia(video);
    document.body.append(canvas);
    const displaySize = {
        width: video.width,
        height: video.height
    };
    faceapi.matchDimensions(canvas, displaySize);
    setInterval(async() => {
        const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceExpressions();
        const resizedDetections = faceapi.resizeResults(detections, displaySize);
        canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);
        faceapi.draw.drawDetections(canvas, resizedDetections);
        faceapi.draw.drawFaceLandmarks(canvas, resizedDetections);
        faceapi.draw.drawFaceExpressions(canvas, resizedDetections);
        var arrExp = resizedDetections[0].expressions;
        document.getElementById('neutral_score').value = arrExp.neutral;
        document.getElementById('happy_score').value = arrExp.happy;
        document.getElementById('sad_score').value = arrExp.sad;
        document.getElementById('angry_score').value = arrExp.angry;
        document.getElementById('fearful_score').value = arrExp.fearful;
        document.getElementById('disgusted_score').value = arrExp.disgusted;
        document.getElementById('surprised_score').value = arrExp.surprised;
        if (typeof resizedDetections[0].expressions !== 'undefined') {
            $('#exp-form').submit();
        }
    }, 500)
});

async function getDevices() {
    const devices = await navigator.mediaDevices.enumerateDevices();
    console.log(devices);
    const videoDevices = devices.filter(device => device.kind === 'videoinput');
    const options = videoDevices.map(videoDevice => {
        return `<option value="${videoDevice.deviceId}">${videoDevice.label}</option>`;
    });
    cameraOptions.innerHTML = options.join('');
}

getDevices();

$('#vid-id').on('change', function() {
    if (typeof currentStream !== 'undefined') {
        stopMediaTracks(currentStream);
    }
    const videoConstraints = {};
    if (document.getElementById('vid-id').value === '') {
        videoConstraints.facingMode = 'environment';
    } else {
        videoConstraints.deviceId = {
            exact: document.getElementById('vid-id').value
        };
    }

    const constraints = {
        video: videoConstraints,
        audio: false
    }

    navigator.mediaDevices.getUserMedia(constraints)
        .then(stream => {
            currentStream = stream;
            video.srcObject = stream;
            return navigator.mediaDevices.enumerateDevices();
        })
        .then(getDevices());
})