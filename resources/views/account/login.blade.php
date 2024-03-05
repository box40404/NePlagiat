<x-account-layout>
    <x-slot:title>
        Login
    </x-slot:title>

    <h1>login</h1>

    {{ session("message") }}

    <form action="" method="post">
        @csrf
        <input type="text" name="email" placeholder="email" value = "{{ old('email') }}">
        <input type="text" name="password" placeholder="password">
        <label for="remember" >
            Запомнить меня
            <input type="checkbox" name="remember">
        </label>
        <input type="submit" value="log in">
    </form>

    <a href="{{ Route('register') }}">register</a>
</x-account-layout>

