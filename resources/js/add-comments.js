import "/resources/js/bootstrap.js";


let commentForms = document.querySelectorAll('[id="comment-form"]')

commentForms.forEach(commentForm => {
    commentForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Предотвращаем стандартное поведение отправки формы
    
        var formData = new FormData(this);
    
    
        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                // Очищаем поле ввода комментария после успешной отправки
                commentForm.querySelector('[id="comment-input"]').value = '';
        
                // Обрабатываем ответ сервера в формате JSON
                return response.json();
            } else {
                // Если сервер вернул ошибку, обрабатываем её
                throw new Error('Server response was not ok');
            }
        })
        .then(data => {
            // Проверяем, есть ли новый комментарий в ответе от сервера
            if (data.comment) {
                // Создаем элемент для нового комментария
                let newCommentElement = document.createElement('li');
                let img = document.createElement('img')
                let p = document.createElement('p')
    
                img.src = ''
                img.alt = 'commenter ava'
    
                p.textContent = data.comment.text
                p.classList.add('comment-text')
    
                newCommentElement.append(img, p)
       
                const commentList = commentForm.parentElement.parentElement.querySelector('[id="comment-list"]')
                let hiddenComments = commentForm.parentElement.parentElement.querySelector('.hidden-comments')
    
                let lenComments = commentList.dataset.lenComments
                
                // Добавляем новый комментарий в список комментариев
                if(lenComments > 1){
                    let button = commentForm.parentElement.parentElement.querySelector('.show-comments-btn')
                    if(hiddenComments.style.display == 'none'){
                        button.dataset.lenComments = Number(button.dataset.lenComments) + 1
                        button.textContent =`Показать еще ${Number(button.dataset.lenComments)}`
                    }
                    else{
                        button.dataset.lenComments = Number(button.dataset.lenComments) + 1
                    }
    
                    hiddenComments.appendChild(newCommentElement)
                }
                else if(lenComments == 1){
                    // hiddenComments.style.display = 'block'
    
                    // let button = document.createElement('bitton')
                    // button.classList.add('show-comments-btn')
                    // button.dataset.lenComments = 1
    
                    // commentList.appendChild(button)
                    commentList.appendChild(newCommentElement)
                }
                else{
                    commentList.appendChild(newCommentElement)
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Обрабатываем ошибку, например, выводим сообщение об ошибке пользователю
        });
        
    });    
}) 