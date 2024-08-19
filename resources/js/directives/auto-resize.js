export default (el) => {
    function resize() {
        el.style.height = 'auto';
        el.style.height = `${el.scrollHeight}px`;
    }

    el.addEventListener('input', resize);

    resize();
}
