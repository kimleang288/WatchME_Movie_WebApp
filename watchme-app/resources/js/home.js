document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.movies-wrapper').forEach(wrapper => {
        const grid = wrapper.querySelector('.movies-grid');
        const leftBtn = wrapper.querySelector('.scroll-btn.left');
        const rightBtn = wrapper.querySelector('.scroll-btn.right');

        grid.addEventListener('scroll', () => {
            leftBtn.style.display = grid.scrollLeft > 0 ? 'flex' : 'none';

            const atEnd = grid.scrollLeft + grid.clientWidth >= grid.scrollWidth - 5;
            rightBtn.style.display = atEnd ? 'none' : 'flex';
        });

        rightBtn.addEventListener('click', () => {
            grid.scrollBy({ left: 800, behavior: 'smooth' });
        });

        leftBtn.addEventListener('click', () => {
            grid.scrollBy({ left: -800, behavior: 'smooth' });
        });
    });
});