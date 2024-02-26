<x-layout>

<div class="w-[80%] mt-10 mx-auto">
    <div class="w-[70%] mx-auto relative  my-10">
    <img src="/images/{{$blog->images}}" class="w-full blur-lg  opacity-50 h-80  shadow-lg shadow-black/30" alt="">

    <img src="/images/{{$blog->images}}" class="w-[80%] mx-[10%] hover:scale-110 duration-500 absolute top-0 left-0  h-80  shadow-lg shadow-black/50 " alt="">
       
    </div>

    <h1 class="font-bold text-3xl my-4 text-center bg-slate-00 ">
        <a href="/blogs/{{$blog['id']}}">{{$blog['title']}}</a>
    </h1>

    <p class="px-12 py-6 text-justify font-thin text-lg line-hei bg-slate-00 " style="text-shadow: 0 0 2px black;">
        {{$blog['description']}}
    </p>
    <h5 class="text-end px-12 font-thin">
        By {{$blog->user->name}}
    </h5>

    @auth
        
    <div class="w-[70%] text-thin mx-auto bg-slate-700 flex flex-col  mt-10 scale-90 rounded-lg">

        <div class="w-full flex justify-around py-3">
            <p>50 <i class="fa-regular fa-comment"></i></p>
            <p><i class="fa-solid fa-link"></i></p>
        </div>
        <div class="w-full h-fit bg-slate-700 p-2 justify-center flex flex-col ">
            <div class="flex justify-around">
                <input type="text" placeholder="Share your thoughts..." class="text-white rounded-lg w-[80%] bg-slate-900 outline-none h-14 p-4 mb-3">
                <button type="submit" class="bg-slate-900 hover:bg-slate-950 active:bg-black active:text-white hover:shadow-md shadow-2xl  hover:shadow-blue-500/50 shadow-blue-500/70 rounded-md hover:rounded-2xl w-16 h-14 text-blue-500 font-bold text-2xl duration-300">
                    <i class="fa-solid fa-paper-plane"></i>
               </button>

            </div>
            <div class="w-full flex-col border-b border-white/50 p-4">
                <p class="text-bold text-lg mb-2">Aung Aung</p>
                <p class="text-base ml-3">Very Good!!</p>
            </div>
            <div class="w-full flex-col border-b border-white/50 p-4 ">
                <p class="text-bold text-lg mb-2">Zay Zay</p>
                <p class="text-base ml-3">I will come this event!!</p>
            </div>
    </div>

    @else

    <div class="w-[70%] text-thin mx-auto bg-slate-700 flex flex-col  mt-10 scale-90 rounded-lg">

        <div class="w-full flex justify-around py-3">
            <p>50 <i class="fa-regular fa-comment"></i></p>
            <p><i class="fa-solid fa-link"></i></p>
        </div>
        <div class="w-full h-fit bg-slate-700 p-2 justify-center flex flex-col ">
            <div class="flex justify-around">
                <a href="/login" class="bg-slate-900 text-center py-3 hover:bg-slate-950 active:bg-black active:text-white hover:shadow-md shadow-2xl  hover:shadow-blue-500/30 shadow-blue-500/40 rounded-md hover:rounded-lg hover:tracking-widest w-full text-blue-500 font-thin text-lg duration-300">
                    Log in to view comments.
               </a>

            </div>

    </div>

    @endauth


    </div>
</x-card>

{{-- <a href="/blogs/{{$blog->id}}/edit" class="m-5 text-3xl">Edit<i class="fa fa-pencil"></i></a>


<form action="/blogs/{{$blog->id}}" method="POST">
@csrf
@method('DELETE')
<button class="text-red-500 text-3xl    m-5">Delete<i class="fa fa-trash"></i></button>
</form> --}}

</div>
