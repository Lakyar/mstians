<x-layout>

        <div class="w-[80%] mt-10 mx-auto">
            <div class="w-[70%] mx-auto relative my-10">
            <img src="/images/{{$event->images}}" class="w-full blur-lg opacity-50 h-80  shadow-lg shadow-black/30" alt="">
        
            <img src="/images/{{$event->images}}" class="w-[80%]  hover:scale-110 duration-500 absolute top-0 left-0 mx-[10%] h-80 object-cover  shadow-lg shadow-black/30 " alt="">
        </div>


            <h1 class="font-bold text-2xl text-center my-4">
                <a href="/events/{{ $event['id'] }}">{{ $event['title'] }}</a>
            </h1>

            <h1><i class="fa-regular fa-clock text-xl w-8 text-center"></i><span class=""> {{ substr($event['startTime'], 0, 5) }} @if($event['endTime']) to {{ substr($event['endTime'], 0, 5) }} @endif</span></h1>
            <h1><i class="fa-regular fa-calendar-days text-xl w-8 text-center"></i> <span class="">{{$event['startDate']}} @if($event['endDate']) to {{$event['endDate']}} @endif</span></h1>
            <h1><i class="fa-solid fa-location-dot text-xl w-8 text-center"></i><span class=""> {{$event['location']}}</span></h1>
            
            <p class="p-5">
                {{ $event['description'] }}
            </p>

        </div>


    
    </x-layout>
    