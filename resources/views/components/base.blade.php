<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{$title}} </title>
    @vite('resources/css/app.css')
    {{$styles}}
</head>

<body>

    <header>
        <div class="logo">NePlagiat</div>
        <nav>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('groups') }}">Groups</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="{{ route('profile') }}">Profile</a></li>
            </ul>
        </nav>
    </header>
    
    {{$slot}}

    <footer>
        <p>&copy; 2024 NePlagiat. No rights reserved.</p>
    </footer>

    {{$scripts}}

</body>
</html>
