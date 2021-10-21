const select = document.querySelector('#select');
const shipping = document.querySelector('#shipping');

select.addEventListener('click', () => {
    shipping.classList.toggle('hidden')
})