
const navbar = document.querySelector('.navbar');
window.addEventListener('scroll', () => {
    navbar.style.background = window.scrollY > 40 ?
        'rgba(9,9,9,0.98)' :
        'rgba(9,9,9,0.95)';
});

document.getElementById('playBtn').addEventListener('click', () => {
    document.getElementById('videoPlayer').style.display = 'block';
    document.getElementById('playBtnWrap').style.display = 'none';
    document.querySelector('.hero-video-bg').style.display = 'none';
    document.querySelector('.hero-video-gradient').style.display = 'none';
});

// Season accordion
let openSeason = null;

function toggleSeason(num) {
    const grid = document.querySelector('[data-season-grid="' + num + '"]');
    const chevron = document.querySelector('[data-season="' + num + '"] .season-chevron');

    if (openSeason !== null && openSeason !== num) {
        document.querySelector('[data-season-grid="' + openSeason + '"]').style.display = 'none';
        document.querySelector('[data-season="' + openSeason + '"] .season-chevron').style.transform = 'rotate(0deg)';
    }

    const isOpen = grid.style.display === 'flex';
    grid.style.display = isOpen ? 'none' : 'flex';
    chevron.style.transform = isOpen ? 'rotate(0deg)' : 'rotate(180deg)';
    openSeason = isOpen ? null : num;
}

// Season header click
document.querySelectorAll('.season-header').forEach(btn => {
    btn.addEventListener('click', () => {
        toggleSeason(parseInt(btn.dataset.season));
    });
});

// Episode card click
document.querySelectorAll('.episode-card').forEach(card => {
    card.addEventListener('click', () => {
        const tmdbId = card.dataset.show;
        const season = card.dataset.season;
        const episode = card.dataset.episode;

        document.querySelector('#videoPlayer iframe').src =
            `https://vidsrc.me/embed/tv?tmdb=${tmdbId}&season=${season}&episode=${episode}`;

        document.getElementById('videoPlayer').style.display = 'block';
        document.getElementById('playBtnWrap').style.display = 'none';
        document.querySelector('.hero-video-bg').style.display = 'none';
        document.querySelector('.hero-video-gradient').style.display = 'none';

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

// Auto-open season 1
document.addEventListener('DOMContentLoaded', () => {
    const first = document.querySelector('[data-season-grid="1"]');
    if (first) toggleSeason(1);
});