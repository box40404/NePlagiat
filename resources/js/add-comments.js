import "/resources/js/bootstrap.js";


document.getElementById('comment-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Предотвращаем стандартное поведение отправки формы

    var formData = new FormData(this);

    console.log('bebra')

    fetch(this.action, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            // Очищаем поле ввода комментария после успешной отправки
            document.getElementById('comment-text').value = '';
    
            // Обрабатываем ответ сервера в формате JSON
            return response.json();
        } else {
            // Если сервер вернул ошибку, обрабатываем её
            throw new Error('Server response was not ok');
        }
    })
    .then(data => {
        // Проверяем, есть ли новый комментарий в ответе от сервера
        if (data.newComment) {
            // Создаем элемент для нового комментария
            const newCommentElement = document.createElement('li');
            newCommentElement.textContent = data.newComment.text; // Предполагается, что сервер возвращает текст нового комментария
    
            // Добавляем новый комментарий в список комментариев
            const commentList = document.getElementById('comment-list');
            commentList.appendChild(newCommentElement);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Обрабатываем ошибку, например, выводим сообщение об ошибке пользователю
    });
    
});
