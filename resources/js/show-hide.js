import './bootstrap';



document.addEventListener('DOMContentLoaded', function() {
        const showButtons = document.querySelectorAll('.show-comments-btn');
        const hideButtons = document.querySelectorAll('.hide-comments-btn');

    showButtons.forEach(button => {
        button.addEventListener('click', function() {
            const hiddenComments = button.parentElement.querySelector('.hidden-comments');
            const hideButton =  button.parentElement.parentElement.querySelector('.hide-comments-btn');
            let lenComments = button.dataset.lenComments
            if (hiddenComments.style.display === 'none' || hiddenComments.style.display === '') {
                hiddenComments.style.display = 'block';
                button.textContent = 'Скрыть';
                hideButton.classList.remove('hidden'); // Убираем класс hidden у кнопки
            } else {
                hiddenComments.style.display = 'none';
                button.textContent = `Показать еще ${lenComments}`;
                hideButton.classList.add('hidden'); // Добавляем класс hidden кнопке
            }
        });
    });

    hideButtons.forEach(button => {
        button.addEventListener('click', function() {
            const hiddenComments = button.parentElement.parentElement.querySelector('.hidden-comments');
            hiddenComments.style.display = 'none';
            const showButton = button.parentElement.parentElement.querySelector('.show-comments-btn');
            let lenComments = button.dataset.lenComments
            showButton.textContent = `Показать еще ${lenComments}`;
            button.classList.add('hidden'); // Добавляем класс hidden кнопке скрытия комментариев
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const viewPhotosButtons = document.querySelectorAll('.view-photos-btn');

    viewPhotosButtons.forEach(button => {
        button.addEventListener('click', function() {
            const additionalPhotos = button.parentElement.querySelector('.additional-photos');
            let lenImages = button.dataset.lenImages
            if (additionalPhotos.style.display === 'none' || additionalPhotos.style.display === '') {
                additionalPhotos.style.display = 'flex';
                button.textContent = 'Скрыть';
            } else {
                additionalPhotos.style.display = 'none';
                button.textContent = `Показать еще ${lenImages}`;
            }
        });
    });
});
