<x-layout>

    @include('partials._event_search')
    
    @unless (count($events) == 0)
    <div class="w-full flex flex-wrap justify-around mt-6">
        @php
            // Sort events by ID in descending order
            $sortedevents = $events->sortByDesc('id')->values()->all();
        @endphp
        @foreach($sortedevents as $index => $event)
            <div :event="$event" class=" w-[29%] -skew-x-3 h-60 duration-300 hover:scale-95 hover:shadow-md hover:shadow-white/30 shadow-xl shadow-white/0   relative flex flex-col justify-end text-start mb-8 @if($index < 2) w-[45%]  h-72 @endif">
                <a href="/events/{{$event['id']}}">
                    <img src="/images/{{$event->images}}" class="absolute object-cover w-full h-full top-0 left-0 z-0" alt="">
                </a>
    
                <h1 class="font-bold backdrop-blur-sm pt-1 bg-slate-900/70  px-3 w-full  text-lg relative z-10" style="text-shadow: 0 0 5px black;">
                    <a href="/events/{{$event['id']}}">{{$event['title']}}</a>

                </h1>

                <div class="w-full flex justify-between backdrop-blur-sm p-1 bg-slate-900/70 font-thin ">
                    <span class="text-sm"><i class="fa-regular fa-clock"></i> {{ substr($event['startTime'], 0, 5) }} @if($event['endTime']) to {{ substr($event['endTime'], 0, 5) }} @endif</span>
                    <span class="text-sm"><i class="fa-regular fa-calendar-days"></i> {{$event['startDate']}} @if($event['endDate']) to {{$event['endDate']}} @endif</span>
                    <span class="text-sm"><i class="fa-solid fa-location-dot"></i> {{$event['location']}}</span>

                </div>


            </div>
        @endforeach
    </div>
    @else
    <p>No events</p>
    @endunless
    
    <div class="p-4">
        {{$events->links()}}
    </div>
    
</x-layout>
