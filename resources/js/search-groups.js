document.getElementById('search-btn').addEventListener('click', function() {
    const query = document.getElementById('search-input').value.toLowerCase();
    const groups = document.querySelectorAll('.group');
    
    groups.forEach(group => {
        const name = group.querySelector('.group-name').innerText.toLowerCase();
        const tags = group.querySelector('.group-tags').innerText.toLowerCase();
        
        if (name.includes(query) || tags.includes(query)) {
            group.style.display = 'flex';
        } else {
            group.style.display = 'none';
        }
    });
});