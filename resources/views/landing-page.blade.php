<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Welcome</title>
</head>
<body>
    <header>
        <a href="#" class="logo">tourism</a>
        <nav>
            <ul class="nav-links">
                <li><a href="#about">About</a></li>
                <li><a href="#about">News</a></li>
            </ul>
        </nav>
        @if (!session('login'))
            <a href="{{ route('login') }}"><button>Login</button></a>
            <a href="{{ route('register') }}"><button>Register</button></a>
        @else 
          <div class="dropdown">
            <span class="greet-name">{{ session('name') }}</span> 
            <div class="dropdown-content">
            <a href="{{ route('logout') }}">Logout</a>
            </div>
          </div>
        @endif
    </header>

    <section id="banner">
        <h1 class="city-slogan">
            City Of
            <span class="txt-type" data-wait="3000" data-words='["Tofu", "Culture", "Sunda"]'></span>
        </h1>
        <h2 class="greet">
            Welcome To Sumedang
        </h2>
    </section>
    <section id="about">
        <h1 class="about-title">About Sumedang</h1>
        <p class="about-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, distinctio. Rerum maxime commodi natus consequatur mollitia. At aut eveniet quos quas dicta velit corporis placeat, accusamus perferendis exercitationem? Voluptatem, culpa sequi dolores eligendi ipsam harum possimus quaerat eaque odio quia nam minus perspiciatis a quidem aspernatur mollitia, adipisci consectetur libero voluptatum, nostrum voluptatibus? Eveniet ducimus reiciendis accusamus asperiores ullam corrupti facere eius at tempore, nostrum ut vero cupiditate molestias voluptas perspiciatis blanditiis illo nulla dolor voluptatibus dolore facilis quibusdam. Alias quis unde libero? Tempora suscipit dolor maxime iste et assumenda laudantium iusto architecto deleniti, adipisci, praesentium molestias! Explicabo, earum consequatur?</p>
    </section>


    <x-slot name="script">
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function()) {
                    alert('berhasil login');
                }, true);
            </script>
        @endif
    </x-slot>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>