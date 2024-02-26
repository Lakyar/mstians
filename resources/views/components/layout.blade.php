<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{{asset('images/logo2.png')}}" />
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        <!-- Include AOS library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="//unpkg.com/alpinejs" defer></script>

        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            window.tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            main: "#000754",
                        },
                        fontFamily: {
                            myRubik: ['Rubik', 'sans-serif'],
                        },
                    },
                },
            };
        </script>
        <title>MSTians</title>
    </head>
    <body class=" bg-slate-700 selection:bg-blue-900 selection:text-white text-white max-w-screen font-thin font-myRubik">
        <nav  class="flex justify-between shadow-md shadow-black/70 items-center   bg-gradient-to-b text from-white/0   via-transparent to-transparent backdrop-blur-md h-20 w-full ">
            <a href="/"
                ><img class="w-36 ml-6" src="{{asset('images/logo.png')}}" alt="" class="logo"
            /></a>
            <ul class="flex justify-between min-w-3/5 space-x-6 mr-6 text-lg uppercase">
                <li >
                    <a href="/" class="hover:tracking-[0.3rem]  duration-300">home</a>
                </li>
                <li >
                    <a href="/about" class="hover:tracking-widest duration-300 ">about us</a>
                </li>
                <li >
                    <a href="/library" class="hover:tracking-widest duration-300 ">library</a>
                </li>
                <li >
                    <a href="/blogs" class="hover:tracking-widest duration-300">blogs</a>
                </li>
                <li >
                    <a href="/events" class="hover:tracking-widest duration-300">events</a>
                </li>
                <li >
                    <a href="/tournaments" class="hover:tracking-widest duration-300">tournaments</a>
                </li>

                @auth

                <li>
                    <a href="/classrooms" class="hover:tracking-widest duration-300">Classrooms</a>
                </li>
                <li>
                    <a href="/account/{{ auth()->user()->id }}" class="hover:tracking-wider duration-300 ml-4" style="text-shadow: 0 0 26px white"><i class="fa-solid fa-user-graduate"></i> {{ auth()->user()->name }}</a>
                </li>
                <li>

                </li>

                @else                

                <li>
                    <a href="/login" class="hover:tracking-widest duration-300">Login</a>
                </li>

                @endauth



            </ul>
        </nav>



        <section class=" w-full h-fit">




    {{--VIEW OUTPUT--}}
    {{$slot}}

        </section>




        <footer class="w-full h-fit flex flex-col bg-slate-900 justify-around py-3 px-5 items-center">
            <div class="flex flex-row-reverse w-full justify-between items-center">
                <div class="flex flex-col">
                    <i class="mb-2 fa-brands fa-facebook"></i>
                    <i class="mb-2 fa-brands fa-linkedin"></i>
                    <i class="mb-2 fa-brands fa-viber"></i>
                    <i class="mb-2 fa-brands fa-twitter"></i>
                </div>
                <div class="flex flex-col font-thin underline">
                    <a href="/">Home</a>
                    <a href="/about">About</a>
                    <a href="/">Contact</a>
                    @auth
                    <a href="/account/{{ auth()->user()->id }}">Account</a>
                    @else
                    <a href="/login">Login</a>
                    @endauth
                </div>
                <div class="flex flex-col font-thin underline">
                    <a href="/blogs">Blogs</a>
                    <a href="/events">Events</a>
                    <a href="/tournaments">Tournaments</a>
                    <a href="/allteams">Teams</a>
                </div>
                <img src="{{asset('images/logo2.png')}}" class="w-32 h-32" alt="">

                <div class="flex flex-col font-thin text-sm">
                    <span class="mb-2 "><i class=" fa-solid fa-location-dot"></i> No. 36 Alan Pya Pagoda St, Mingalar Taungnyunt Tsp</span>
                    <span class="mb-2"><i class=" fa-solid fa-location-dot"></i> No. 36 Alan Pya Pagoda St, Mingalar Taungnyunt Tsp</span>
                    <span class="mb-2"><i class=" fa-solid fa-location-dot"></i> No. 36 Alan Pya Pagoda St, Mingalar Taungnyunt Tsp</span>
                    <span class="mb-2"><i class=" fa-solid fa-phone "></i> 09 422 288 106 <i class=" fa-solid fa-phone ml-1"></i> 09 422 288 10 <i class=" fa-solid fa-phone ml-1"></i> 09 422 288 106</span>

                </div>


            </div>


            <p><i class="fa-regular fa-copyright my-5"></i> MSTUNIVERSITY2024</p>

        </footer>


        <x-flash-message />



        <script>
            // Initialize AOS
            AOS.init();

        </script>
    </body>

</html>
