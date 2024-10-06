<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <header class="d-flex justify-content-center">
        <nav class="px-4 d-flex row justify-content-between align-items-center" style="min-width: 100%">
            <div class="logo">
                <a href="{{route('homepage')}}"><img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 80px;"></a>
            </div>
            <ul class="d-flex justify-content-center mb-0">
                <li><a href="{{route('homepage')}}">Početna</a></li>
                <li><a href="#">Osnovne informacije <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{route('nasilje')}}">Šta je nasilje?</a></li>
                        <li><a href="{{route('prepoznati')}}">Kako prepoznati?</a></li>
                        <li><a href="{{route('zasto-trpi')}}">Zašto trpi nasilje?</a></li>
                        {{-- <li><a href="#">Vrste nasilja: <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Fizičko</a></li>
                                <li><a href="#">Psihičko</a></li>
                                <li><a href="#">Ekonomsko</a></li>
                                <li><a href="#">Seksualno</a></li>
                                <li><a href="#">Izolacija i kontrola</a></li>
                                <li><a href="#">Proganjanje</a></li>
                                <li><a href="#">Pretnje</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                </li>
                <li><a href="#">Verifikacija i skupljanje dokaza <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{route('extension')}}">Verifikacija WhatsApp poruka</a></li>
                        <li><a href="{{route('icanprove')}}">Verifikacija drugih dokaza</a></li>
                        <li><a href="{{ route('evidence-file.index') }}">Moj kutak</a></li>
                    </ul>
                </li>
                <li><a href="{{route('post.newest')}}">Anonimni kutak</a></li>
                <li><a href="{{route('safe-spots')}}">Sigurna mesta <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{route('safe-spots')}}">Mapa sigurnih mesta</a></li>
                        <li><a href="{{route('safe-spots-contact')}}">Kontakt sigurnih mesta</a></li>
                    </ul>
                </li>
                <li><a href="#">Kome i kako prijaviti? <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{route('policija')}}">Policiji</a></li>
                        <li><a href="{{route('socijalni-rad')}}">Centru za socijalni rad</a></li>
                        <li><a href="{{route('zdravstvena-ustanova')}}">Zdravstvenoj ustanovi</a></li>
                        <li><a href="{{route('tuzioc')}}">Tužioc</a></li>
                    </ul>
                </li>
                @if (Auth::check() && Auth::user()->hasRole('admin'))
                    <li><a href="#">Admin meni<i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{route('user.list')}}">Korisnici</a></li>
                            <li><a href="{{route('post.list')}}">Postovi</a></li>
                            <li><a href="{{route('comment.list')}}">Komentari</a></li>
                            <li><a href="{{route('ip.list')}}">Ip adrese</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            @auth
            <div class="logout">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button class="btn btn-primary" type="submit">Logout</button>
                </form>
            </div>
            @else
            <div class="login_register">
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </div>
            @endauth    
            <div class="cta">
                <a href="https://www.google.com/" class="hide-page btn">Sakrij stranicu</a>
            </div>   
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2024 Tom i Džeri. All rights reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
