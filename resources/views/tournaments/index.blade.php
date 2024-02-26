<x-layout>
    
    @include('partials._hero')
    @include('partials._tournament_search')

    
    
    
    @unless (count ($tournaments) == 0)
    

    <div class=" my-4 w-full flex flex-wrap justify-around">

        
    @foreach($tournaments as $tournament)

    <div class="w-[66%] h-64 relative my-5 rounded-md duration-300 -skew-x-3 hover:scale-95 hover:shadow-md hover:shadow-white/30 shadow-xl shadow-white/0">

        <a href="/tournaments/{{$tournament['id']}} " class="overflow-hidden">
            <img src="/images/{{$tournament->images}}" class="object-cover h-full w-full mx-auto  rounded-md" alt="">
        </a>
    
        <h1 class="font-bold text-2xl absolute top-0 left-0 p-3 bg-black/40 backdrop-blur-sm ">
            <a href="/tournaments/{{$tournament['id']}}">{{$tournament['title']}}</a>
        </h1>
    
    
    
    
    </div>        
    
    @endforeach
    </div>
    
    
    @else
    <p>No Tournaments</p>
    @endunless
    
    
    <div class=" p-4">
        {{$tournaments->links()}}
    
    </div>
    
    {{-- <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-blue-500/10 text-white h-16 mt-20 opacity-90 md:justify-center">
        
        <a href="/tournaments/create" class="absolute top-2/5 right-10 bg-black text-white py-2 px-5">Post Tournament</a>
    </footer>
     --}}
    
    </x-layout>