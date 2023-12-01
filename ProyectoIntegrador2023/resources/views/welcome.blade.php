<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Practicas PPP</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

    </head>
    <body class="antialiased">

        @livewire('navigation')

        <div class="relative sm:flex sm:justify-left sm:items-bottom min-h-screensm:fixed sm:top-0 sm:left-0 p-6 text-left z-10">
            <img class="Image1 w-[182px] h-[47px] mr-10" src="img/descarga.png" />
            <div class="OfertasLaborales text-black text-2xl font-bold font-['Istok Web'] mr-10" style="color: #003366;">Ofertas Laborales</div>
        </div>

        <img class="Image2 w-[1440px] h-[618px] left-0 top-[90px] " src="img/bg.png" />

        <div>

        </div>

        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center selection:bg-blue-400 selection:text-white ">
            @if (Route::has('login'))
                <div class=" sm:top-0 sm:right-0 p-6 text-right z-10 mt-2 mr-5" style="background-color: #FFC940; border-radius: 20px">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-white hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" style="background-color: orange;">Inicio</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-white hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 mt-3">Ingresar</a>

                        @if (Route::has('register'))

                        @endif
                    @endauth
                </div>
            @endif


            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex>

                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <a href="https://laravel.com/docs" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900">Vibrant Ecosystem</h2>

                                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                                    Laravel's robust library of first-party tools and libraries, such ass
                                </p>
                        </a>

                    </div>
                </div>


            </div>
        </div>
    </body>
</html>
