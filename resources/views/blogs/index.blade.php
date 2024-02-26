<x-layout>

    @include('partials._blog_search')
    
    @unless (count($blogs) == 0)
    <div class="w-full flex flex-wrap justify-around mt-6">
        @php
            // Sort blogs by ID in descending order
            $sortedBlogs = $blogs->sortByDesc('id')->values()->all();
        @endphp
        @foreach($sortedBlogs as $index => $blog)
            <div :blog="$blog" class=" w-[22%] -skew-x-3 h-60 duration-300 hover:scale-95 hover:shadow-md hover:shadow-white/30 shadow-xl shadow-white/0   relative flex flex-col justify-end text-start mb-8 @if($index < 3) w-[30%]  h-72 @endif">
                <a href="/blogs/{{$blog['id']}}">
                    <img src="/images/{{$blog->images}}" class="absolute w-full h-full top-0 left-0 z-0" alt="">
                </a>
    
                <h1 class="font-bold backdrop-blur-sm pt-1 bg-slate-900/70  px-3 w-full  text-lg relative z-10" style="text-shadow: 0 0 5px black;">
                    <a href="/blogs/{{$blog['id']}}">{{$blog['title']}}</a>

                </h1>
                <div class="w-full flex justify-between backdrop-blur-sm p-1 bg-slate-900/70 font-thin ">
                    <span class="text-xs">99+ Comments</span>
                    <span class="text-xs">{{ \Carbon\Carbon::parse($blog['created_at'])->diffForHumans() }}</span>

                </div>


            </div>
        @endforeach
    </div>
    @else
    <p>No Blogs</p>
    @endunless
    
    <div class="p-4">
        {{$blogs->links()}}
    </div>
    
</x-layout>
