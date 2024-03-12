import './bootstrap';


const fileInput = document.getElementById('file-input');
const selectedPhotosDiv = document.getElementById('selected-photos');

fileInput.addEventListener('change', function() {
    selectedPhotosDiv.innerHTML = ''; // Очищаем предыдущие выбранные фотографии

    const files = Array.from(fileInput.files); // Получаем выбранные файлы
    files.forEach(file => {
        const image = document.createElement('img');
        image.src = URL.createObjectURL(file); // Получаем URL для просмотра выбранной фотографии
        image.alt = file.name; // Устанавливаем имя файла в качестве альтернативного текста
        image.classList.add('selected-photo');
        selectedPhotosDiv.appendChild(image); // Добавляем изображение в div
    });
});