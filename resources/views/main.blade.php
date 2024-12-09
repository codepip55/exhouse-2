<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ExHouse</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')

    <script src="https://kit.fontawesome.com/4e2504afbf.js" crossorigin="anonymous"></script>
</head>
<style>
    * {
        font-family: 'Oxanium', sans-serif;
    }
    html {
        background-color: rgb(242 239 236);
    }
    .container {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }
    a {
        text-decoration: none;
        color: black;
    }

    .navbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        height: 60px;
        border-bottom: 1px solid #ddd;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .nav-links {
        display: flex;
        gap: 30px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav-links li {
        text-transform: uppercase;
    }

    .nav-links a {
        text-decoration: none;
        color: black;
        font-weight: bold;
        font-size: 14px;
    }

    .nav-links a:hover {
        color: #555;
    }
</style>
<body>
<nav class="navbar">
    <ul class="nav-links w-full justify-between ml-10">
        <li><a class="hover:cursor-pointer text-lg" href="/">ExHo<span class="fa-solid fa-house fa-xs"></span>se</a></li>
        <li><a href="/huizen">Huizen</a></li>
        <li><a href="/overons">Over Ons</a></li>
        <li><a href="/contact">Contact</a></li>
        @auth
            <li><a href="/dashboard">Welkom, {{auth()->user()->name}}</a></li>
        @else
            <li><a href="/login">Login</a></li>
        @endauth
    </ul>
</nav>
@yield('content')
<footer class="text-black py-8 mt-20">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-between">
            <div class="w-full sm:w-1/3 mb-4 sm:mb-0">
                <h3 class="text-xl font-semibold">ExHo<span class="fa-solid fa-house fa-xs"></span>se</h3>
                <p class="mt-2 mr-2">Uw betrouwbare partner in vastgoedbeheer en woningverhuur. Wij bieden comfortabele woningen en professionele diensten voor huurders en huiseigenaren.</p>
            </div>
            <div class="w-full sm:w-1/3 mb-4 sm:mb-0">
                <h3 class="text-xl font-semibold">Navigatie</h3>
                <ul class="mt-2">
                    <li><a href="/" class="text-slate-700 hover:text-[#555]">Home</a></li>
                    <li><a href="/overons" class="text-slate-700 hover:text-[#555]">Over ons</a></li>
                    <li><a href="/huizen" class="text-slate-700 hover:text-[#555]">Huizen</a></li>
                    <li><a href="/contact" class="text-slate-700 hover:text-[#555]">Contact</a></li>
                    <li><a href="https://pepijncolenbrander.com/tools" target="_blank" class="text-slate-700 hover:text-[#555]">Privacy Beleid</a></li>
                </ul>
            </div>
            <div class="w-full sm:w-1/3">
                <h3 class="text-xl font-semibold">Contact</h3>
                <ul class="mt-2">
                    <li><a href="tel:(085)3033033" class="text-slate-700 hover:text-[#555]">(085) 303 30 33</a></li>
                    <li><a href="mailto:exhouse@pepijncolenbrander.com" target="_blank" class="text-slate-700 hover:text-[#555]">exhouse@pepijncolenbrander.com</a></li>
                    <li><a href="https://maps.app.goo.gl/VpAeMnyPGPJ4iAFH8" target="_blank" class="text-slate-700 hover:text-[#555]">Adres: Esrand 2, 7642 ZZ Wierden, Nederland</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-700 pt-4 text-center text-sm">
            <p>&copy; 2024 ExHouse. Alle rechten voorbehouden.</p>
        </div>
    </div>
</footer>
</body>
</html>
