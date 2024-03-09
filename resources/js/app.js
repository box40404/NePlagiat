import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    const infoBtn = document.getElementById('info-btn');
    const popup = document.getElementById('popup');
    const closeBtn = document.getElementById('close');

    infoBtn.addEventListener('click', function() {
        popup.style.display = 'block';
    });

    closeBtn.addEventListener('click', function() {
        popup.style.display = 'none';
    });
});

document.addEventListener('DOMContentLoaded', function() {
        const showButtons = document.querySelectorAll('.show-comments-btn');
        const hideButtons = document.querySelectorAll('.hide-comments-btn');

    showButtons.forEach(button => {
        button.addEventListener('click', function() {
            const hiddenComments = button.parentElement.querySelector('.hidden-comments');
            const hideButton =  button.parentElement.parentElement.querySelector('.hide-comments-btn');
            if (hiddenComments.style.display === 'none' || hiddenComments.style.display === '') {
                hiddenComments.style.display = 'block';
                button.textContent = 'Hide';
                hideButton.classList.remove('hidden'); // Убираем класс hidden у кнопки
            } else {
                hiddenComments.style.display = 'none';
                button.textContent = 'Show';
                hideButton.classList.add('hidden'); // Добавляем класс hidden кнопке
            }
        });
    });

    hideButtons.forEach(button => {
        button.addEventListener('click', function() {
            console.log('func 2')
            const hiddenComments = button.parentElement.parentElement.querySelector('.hidden-comments');
            hiddenComments.style.display = 'none';
            const showButton = button.parentElement.parentElement.querySelector('.show-comments-btn');
            showButton.textContent = 'Show';
            button.classList.add('hidden'); // Добавляем класс hidden кнопке скрытия комментариев
        });
    });
});

