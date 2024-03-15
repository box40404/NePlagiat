import './bootstrap';

let overlay = document.getElementById('overlay')

let photos = document.querySelectorAll('[id="post-img"]')


photos.forEach(photo => {
    photo.addEventListener('click', function(e) {
        if(overlay.style.display == 'none' || overlay.style.display == ''){
            let img = overlay.querySelector('[id="overlay-img"]')
            img.src = photo.src

            overlay.style.display = 'flex'
        } else{
            overlay.style.display = 'none'
        }


        e.stopPropagation()

    })
})

document.addEventListener( 'click', (e) => {

    const withinBoundaries = e.composedPath().includes(overlay.children.item(0));
 
    if ( ! withinBoundaries ) {
        overlay.style.display = 'none'; // скрываем элемент т к клик был за его пределами
    }

})