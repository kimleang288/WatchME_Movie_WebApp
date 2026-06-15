

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


const btn = document.getElementById('hamburger');
const links = document.querySelector('.nav-links');
btn.addEventListener('click', () => {
    btn.classList.toggle('open');
    links.classList.toggle('open');
});

links.querySelectorAll('a').forEach(a =>
    a.addEventListener('click', () => {
        btn.classList.remove('open');
        links.classList.remove('open');
    })
);