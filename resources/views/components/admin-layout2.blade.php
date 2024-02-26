<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
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
    <body class=" bg-slate-600  text-white max-w-screen font-myRubik">
        <nav  class="flex justify-between bg-yellow-700 shadow-md shadow-black/70 items-center  backdrop-blur-md h-20 w-full ">
            <a href="/admin"
                ><img class="w-24 ml-6" src="{{asset('images/logo.png')}}" alt="" class="logo"
            /></a>



                <form action="/logout" class=" mr-6" method="POST">
                    @csrf
                    <button type="submit" class="bg-black/80 hover:bg-black active:bg-black active:text-white px-4 hover:shadow-md shadow-2xl  hover:shadow-red-500/50 shadow-red-500/70 rounded-md hover:rounded-2xl w-fit h-12 text-red-500 font-bold text-2xl duration-300">
                        <i class="fa-solid fa-person-through-window "></i> LOGOUT
                    </button>
                </form>

        </nav>



        <section class=" w-full h-fit ">




    {{--VIEW OUTPUT--}}
    {{$slot}}

        </section>






        <x-flash-message />



        <script>
            // Initialize AOS
            AOS.init();

        </script>
    </body>

</html>
