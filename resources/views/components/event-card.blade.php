{{-- @props(['event'])


<x-card class="p-5 w-[40%] bg-blue-900">

    <a href="/events/{{$event['id']}}">
        <img src="/images/{{$event->images}}" class="h-40 w-1/2 mx-auto p-3" alt="">
    </a>

    <h1 class="font-bold text-2xl">
        <a href="/events/{{$event['id']}}">{{$event['title']}}</a>
    </h1>
    <x-event-tags :tagsCsv="$event->tags" />

    <p class="p-5">
        {{$event['description']}}
    </p>
    <h5 class="font-semibold text-end">
        By {{$event->user->name}}
    </h5>
    <h5 class="font-semibold text-end">
        Type: {{$event['author']}}
    </h5>

    <div class="w-full py-2 bg-slate-500 flex justify-around mt-10">
        <p>500 Views</p>
        <p>50 Comments</p>
        <p>Share</p>
    </div>
</x-card> --}}