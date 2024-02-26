<x-layout>
    <div class="w-3/4 mt-10 mx-auto relative overflow-hidden">
        <!-- Background images -->
        <img src="/images/{{ $tournament->images }}" class="h-96 blur-md -z-10 absolute top-0 w-full mx-auto " alt="">
        <img src="/images/{{ $tournament->images }}" class="h-96  w-full mx-auto object-cover rounded-lg mb-10" alt="">

        <!-- Tournament title -->
        <h1 class="font-bold backdrop-blur-sm bg-black/20 top-0 text-3xl absolute p-2  w-full text-center" style="text-shadow: 0 0 20px black ">
            <a href="/tournaments/{{ $tournament->id }}">{{ $tournament->title }}</a>
        </h1>

        <!-- Tournament details -->
        <h1><i class="fa-regular fa-calendar-days text-xl w-8 text-center"></i> <span class="">{{$tournament['startDate']}} @if($tournament['endDate']) to {{$tournament['endDate']}} @endif</span></h1>
        <h1><i class="fa-solid fa-location-dot text-xl w-8 text-center"></i><span class=""> {{$tournament['location']}}</span></h1>

        <!-- Tournament description -->
        <p class="p-12">
            {{ $tournament->description }}
        </p>

        <!-- Participated Teams -->
        <h2 class="font-bold text-3xl mb-4">Participated Teams</h2>
        <div class="flex justify-center flex-wrap w-full">
            @foreach($tournament->teams as $team)
                <a href="{{ route('teams.show', $team) }}" class="rounded-lg m-10 my-2 bg-slate-600 hover:bg-slate-700 active:bg-black w-[15%] text-center items-center flex flex-col justify-center text-sm text-white py-8">
                    {{ $team->name }}
                </a>
            @endforeach

            @for ($i = count($tournament->teams); $i < 16; $i++)
                <div class="rounded-lg m-10 my-2 bg-slate-600 hover:bg-slate-700 active:bg-black w-[15%] text-center items-center flex flex-col justify-center text-sm text-white py-8">
                    (TBA)
                </div>
            @endfor
        </div>



        </div>
        

        <!-- Images -->
        <img src="{{ asset('images/futsal_matches.jpg') }}" class="h-96 w-[65%] brightness-90 mx-auto my-4" alt="">
        <img src="{{ asset('images/prize_pool.jpg') }}" class="h-96 w-[65%] brightness-90 mx-auto my-4" alt="">
    </div>
</x-layout>
