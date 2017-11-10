const tags = document.querySelectorAll('.tags__btn');

for(let i = 0; i < tags.length; i++) {
    tags[i].addEventListener('click', function() {
        tags[i].classList.toggle('tags__btn--active');
    });
}