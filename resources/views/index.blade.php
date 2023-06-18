<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peliculandia</title>
    <?php error_reporting(E_ALL);
    ini_set('display_errors', '1');?>
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
    <script>
        function mueveReloj(){
            momentoActual = new Date()
            hora = momentoActual.getHours()
            minuto = momentoActual.getMinutes()
            segundo = momentoActual.getSeconds()
        
            str_segundo = new String (segundo)
            if (str_segundo.length == 1)
               segundo = "0" + segundo
        
            str_minuto = new String (minuto)
            if (str_minuto.length == 1)
               minuto = "0" + minuto
        
            str_hora = new String (hora)
            if (str_hora.length == 1)
               hora = "0" + hora
        
            horaImprimible = hora + " : " + minuto + " : " + segundo
        
            document.form_reloj.reloj.value = horaImprimible
        
            setTimeout("mueveReloj()",1000)
        }
        </script>
    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }

        #menu-toggle:checked+#menu {
            display: block;
        }

        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }

        .hover\:grow:hover {
            transform: scale(1.02);
        }

        .carousel-open:checked+.carousel-item {
            position: static;
            opacity: 100;
        }

        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }

        #carousel-1:checked~.control-1,
        #carousel-2:checked~.control-2,
        #carousel-3:checked~.control-3 {
            display: block;
        }

        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }

        #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #000000;
        }
    </style>

</head>

<body class="bg-[#1E2749] text-white work-sans leading-normal text-base tracking-normal" onload="mueveReloj()">

    <nav id="header" class="sticky w-full z-30 top-0 py-1 bg-[rgba(16,16,16,1)]">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

            <label for="menu-toggle" class="cursor-pointer md:hidden block">
                <a class="inline-block no-underline hover:text-[#ff5400]  py-2 px-4" href="{{ url('/') }}"><img src="../resources/img/logo.png" class="w-[50px]"></a>
            </label>
            <input class="hidden" type="checkbox" id="menu-toggle">

            <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
                <nav>
                    <ul class="md:flex items-center justify-between text-base text-white  pt-4 md:pt-0">
                        <li><a class="inline-block no-underline hover:text-[#ff5400]  py-2 px-4" href="{{ url('/') }}"><img src="../resources/img/logo.png"  class="w-[50px]"></a></li>
                    </ul>
                </nav>
            </div>

            <div class="order-1 md:order-2">
                <!-- <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-[#ff5400] text-xl " href="#">
                    Barra busqueda
                </a> -->
                <form action="">
                <div class="relative mb-4 flex w-full flex-wrap items-stretch top-[0.5rem]">
                        <input name="search"
                        type="text"
                        class=" relative m-0 -mr-px block w-[1%] min-w-0 flex-auto  border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-1.5  rounded-2xl	text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out focus:border-[#ff5400] focus:text-white focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 "
                        placeholder="Busqueda" />
                    
                    <!-- <button
                      class="relative z-[2] rounded-r border-2 border-primary px-6 py-2 text-xs font-medium uppercase text-primary transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
                      type="button">
                      Search
                    </button> -->
                    <button class="relative z-[2] px-6 py-2 text-xs font-medium uppercase text-primary left-[-3.5rem]">
                        <svg class="fill-current hover:text-[#ff5400]" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path
                                    d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                            </svg>
                    </button>
                  </div>
                </form>
   
            </div>
            <div class="order-2 md:order-3 flex items-center" id="nav-content">


                 @if (Auth::check()) {{--sesion iniciada comprobación --}}
                    
                <a class="pl-3  inline-block no-underline hover:text-[#ff5400]" href="{{route('register')}}">
                    <svg class="fill-current hover:text-[#ff5400]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <circle fill="none" cx="12" cy="7" r="3"></circle>
                        <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z"></path>
                    </svg>
                    
                </a>
                <a class="pl-3  inline-block no-underline"> {{ Auth::user()->name }}</a>
                <form action="{{route('logout')}}" method="post">
                    <input type="submit" value="Cerrar Sesión" class="pl-3  inline-block no-underline hover:text-[#ff5400]">
                    @csrf
                </form>
                @else
                <a class="pl-3  inline-block no-underline hover:text-[#ff5400]" href="{{route('login')}}">
                    Iniciar Sesión / Registrarte
                </a>
                @endif
                
            </div>
        </div>
    </nav>

    <section class="w-full mx-auto bg-nordic-gray-light flex pt-12 md:pt-0 md:items-center bg-cover bg-right" style=" height: 32rem; background-image: url('https://images.workpointtoday.com/workpointnews/2023/05/19144715/1684482431_23216_S__11034627.jpg');">

        <div class="container mx-auto">

            <div class="flex flex-col w-full lg:w-1/2 justify-center items-start  px-6 tracking-wide">
                <h1 class="text-black text-2xl my-4"></h1>

            </div>

        </div>

    </section>

    <section class="bg-[#1E2749] text-white work-sans py-8">

<div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

    <nav id="store" class="w-full top-0 px-6 py-1">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-center mt-0 px-2 py-3">

            @if (request('search'))
            <a class="uppercase tracking-wide text-center   no-underline font-bold text-white text-xxl " href="#">
                Película buscada: {{ request('search') }}
            </a>
            @else
            <a class="uppercase tracking-wide text-center   no-underline font-bold text-white text-xxl " href="#">
                Películas destacadas
            </a>
            @endif
           

            <div class="flex items-center">
            




            <!-- <a class="pl-3 inline-block no-underline hover:text-[#ff5400] href=" #">
                    <svg class="fill-current hover:text-[#ff5400]" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24">
                        <path
                            d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                    </svg>
                </a> -->
            </div>
        </div>
    </nav>
    @foreach ($peliculas as $pelicula)
    <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
        <a href="{{route('peliculas.show2', $pelicula->id)}}">
            <img class="hover:grow hover:shadow-lg" src="{{$pelicula->imagen}}" width="70%">
            <div class="pt-3 flex items-center justify-between">
                <p class="">{{$pelicula->titulo}}</p>
                
            </div>
            <p class="pt-1 text-[#ff5400]" style="font-size: 1.5em">{{$pelicula->valoracion}}/10</p>
        </a>
    </div>
    @endforeach

</div>
    </section>


    <footer class=" mb-0 box-border flex w-full flex-col self-center mt-16 bg-[rgba(16,16,16,1)] h-[70px]">
        <div class="box-border flex w-full flex-col self-center max-w-[1200px]">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-center mt-0 px-2 py-3">

                <ul class="tracking-wide text-center   no-underline font-bold text-white text-xxl " href="#">
                    peliculandia@gmail.com
                </ul>
                
        </div>
        <form name="form_reloj" style="margin: -10px auto">
            <input type="text" name="reloj" size="10" style="background-color : #1E2749; border-radius: 15px; width: 80px; font-family : Verdana, Arial, Helvetica; font-size : 8pt; text-align : center;" onfocus="window.document.form_reloj.reloj.blur()">
            </form>

    </footer>


</body>

</html>