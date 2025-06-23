// 🎯 Purpose: Show replay button when video ends and restart video on click

document.addEventListener('DOMContentLoaded', () => {
    const video = document.querySelector('#about-video video');
    const replayBtn = document.getElementById('replay-btn');

    if (video && replayBtn) {
        video.addEventListener('ended', () => {
            replayBtn.classList.remove('hidden');
        });

        replayBtn.addEventListener('click', () => {
            video.currentTime = 0;
            video.play();
            replayBtn.classList.add('hidden');
        });
    }
});
