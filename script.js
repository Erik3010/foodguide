// sidebar functionality
let hamburger = jQuery('.hamburger');
let sidebar = jQuery('.sidebar');
let closeBtn = jQuery('.close-btn');

hamburger.on('click', () => {
    sidebar.addClass('active')
})

closeBtn.on('click', () => {
    sidebar.removeClass('active')
})

// card fade animation
let receipeCards = document.querySelectorAll('.card-receipe');
let blogCards = document.querySelectorAll('.card-blog');

jQuery(window).on('scroll', () => {
    let screenHeight = window.innerHeight / 1.3;

    receipeCards.forEach((receipeCard, i) => {
        let receipePos = receipeCard.getBoundingClientRect().top;

        if(receipePos < screenHeight) {
            receipeCard.classList.add('receipe-card-appear')
        }else{
            receipeCard.classList.remove('receipe-card-appear');
        }
    })

    blogCards.forEach((blogCard, i) => {
        let blogPos = blogCard.getBoundingClientRect().top;

        if(blogPos < screenHeight) {
            blogCard.classList.add('blog-card-appear');
        }else{
            blogCard.classList.remove('blog-card-appear');
        }
    })
})

// like functionality
function like(target, id) {
    let likeCounter = target.parentNode.querySelector('.card-like span');

    if(target.firstElementChild.classList.contains('liked')) return;

    jQuery.ajax({
        url: `http://localhost/foodguide/wp-json/v2/likes/${id}`,
        type: 'POST',
        success() {
            // console.log('ok')
            let likes = parseInt(likeCounter.innerHTML) + 1;
            likeCounter.innerHTML = likes;
            target.firstElementChild.classList.add('liked');
        },
        error() {
            console.loog('err')
        }
    })
}

function likeSinglePost(target, id) {
    if(target.classList.contains('liked')) return;

    let likeCounter = target.querySelector('span');

    jQuery.ajax({
        url: `http://localhost/foodguide/wp-json/v2/likes/${id}`,
        type: 'POST',
        success() {
            likeCounter.innerHTML = parseInt(likeCounter.innerHTML) + 1;
            target.classList.add('liked');
            console.log('ok');
        },
        error() {
            console.log('err')
        }
    })
}