// Navbar scroll
const navbar = document.querySelector('.navbar');
window.addEventListener('scroll', () => {
    navbar.style.background = window.scrollY > 40 ?
        'rgba(9,9,9,0.98)' :
        'rgba(9,9,9,0.95)';
});

// Comment like toggle
document.querySelectorAll('.comment-likes').forEach(btn => {
    btn.addEventListener('click', () => {
        btn.style.color = btn.style.color === 'rgb(229, 9, 20)' ? '' : 'var(--red)';
    });
});

document.getElementById('playBtn').addEventListener('click', () => {
    document.getElementById('videoPlayer').style.display = 'block';
    document.getElementById('playBtnWrap').style.display = 'none';
    document.querySelector('.hero-video-bg').style.display = 'none';
    document.querySelector('.hero-video-gradient').style.display = 'none';
});
    