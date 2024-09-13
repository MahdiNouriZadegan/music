$(document).ready(function() {
    var d = document;
    var musicStatusElem = d.getElementById('music-status');
    var goAhead = d.getElementById('go-ahead');
    var goBack = d.getElementById('go-back');
    var timer = d.getElementById('timer');
    var line = d.getElementsByClassName('time-line')[0];
    var audio = d.getElementById('audio');
    var lineBox = d.getElementsByClassName('time-line-box')[0];
    var volume = d.getElementById('volume');
    var volumeIcon = d.getElementById('volume-icon');
    var musicStatus = 0;

    musicStatusElem.addEventListener('click', function() {
        var musicIcon = document.getElementById('music-icon');
        if (musicStatus == 0) {
            audio.play();
            musicIcon.classList.remove('fa-play');
            musicIcon.classList.add('fa-stop');
            musicStatus = 1;
        } else {
            audio.pause();
            musicIcon.classList.remove('fa-stop');
            musicIcon.classList.add('fa-play');
            musicStatus = 0;
        }
    });

    setInterval(() => {

        var persentOfPlay = audio.currentTime * 100 / audio.duration;
        line.style.width = persentOfPlay + '%';
        let leftTime = Math.floor(audio.duration - audio.currentTime);
        let minutes = Math.floor(leftTime / 60);
        let seconds = leftTime - (minutes * 60);
        timer.innerHTML = minutes + ':' + Math.floor(seconds);

        let audioVolume = Math.floor(audio.volume * 100);
        volume.innerHTML = audioVolume + '%';

        if (audioVolume <= 30 && audioVolume > 8) {
            volumeIcon.classList.remove('fa-volume-up');
            volumeIcon.classList.remove('fa-volume-off');
            volumeIcon.classList.add('fa-volume-down');
        } else if (audioVolume >= 70) {
            volumeIcon.classList.remove('fa-volume-off');
            volumeIcon.classList.remove('fa-volume-down');
            volumeIcon.classList.add('fa-volume-up');
        } else if (audioVolume <= 8) {
            volumeIcon.classList.remove('fa-volume-down');
            volumeIcon.classList.remove('fa-volume-up');
            volumeIcon.classList.add('fa-volume-off');
        }
    }, 1);

    volume.addEventListener('click', maxVolume);

    function maxVolume() {
        audio.volume = 1;
        volume.innerHTML = '100%';
    }


    goAhead.addEventListener('click', function() {
        audio.currentTime += 10;
    });
    goBack.addEventListener('click', function() {
        audio.currentTime -= 10;
    });

    lineBox.addEventListener('click', postionOfLine);

    function postionOfLine(event) {

        const rect = event.target.getBoundingClientRect();
        const elementWidth = lineBox.offsetWidth;
        var clickX = event.clientX - rect.right;
        clickX = Math.abs(clickX);
        const percentage = (clickX * 100) / elementWidth;
        const time = audio.duration * percentage / 100;
        audio.currentTime = time;
    }

    var copy = d.getElementById('copy-link');
    var shortLink = d.getElementById('short-link');
    copy.addEventListener('click', function() {
        const textToCopy = 'http://' + shortLink.innerText;


        const tempInput = document.createElement("textarea");
        tempInput.value = textToCopy;
        document.body.appendChild(tempInput);

        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
        document.getElementById('success-copy').style.display = 'block';
        setTimeout(function() {
            document.getElementById('success-copy').style.display = 'none';
        }, 3000);
    })


    var volumeLineBox = d.getElementsByClassName('volume-line-box')[0];
    var volumeLine = d.getElementsByClassName('volume-line')[0];

    volumeLineBox.addEventListener('click', changeVolume);

    function changeVolume(event) {
        const rect = event.target.getBoundingClientRect();

        const elementWidth = volumeLineBox.offsetWidth;
        var clickX = event.clientX - rect.right;
        clickX = Math.abs(clickX);
        const percentage = (clickX * 100) / elementWidth;
        volumeLine.style.width = percentage + '%';
        var audio = d.getElementById('audio');
        if (percentage / 100 <= 1) {
            audio.volume = percentage / 100;
        }
    }
});