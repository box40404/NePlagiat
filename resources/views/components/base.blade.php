<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{$title}} </title>
    @vite('resources/css/app.css')
    @vite('resources/css/create-post.css')
</head>

<body>
    <header>
        <div class="logo">MyUniqueVK</div>
        <nav>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    
    {{$slot}}

    <footer>
        <p>&copy; 2024 MyUniqueVK. All rights reserved.</p>
    </footer>

    @vite('resources/js/app.js')

</body>
</html>
