<x-admin-layout2>

                
    <section class="w-full " style="min-height: calc(100vh - 80px)">
        <div class=" w-[90%] mx-auto mt-10 ">
            <header class="text-center">
                <h2 class="text-2xl font-semibold uppercase italic mb-8">
                    Post New Event
                </h2>
            </header>
        
            <form method="POST" class="flex flex-wrap justify-between"  enctype="multipart/form-data" action="/events">
                @csrf

        
                <div class="mb-6 w-[35%]">
                    <label for="title" class="inline-block text-lg mb-2"
                        >Event Title</label>
                    <input
                        type="text"
                        class="border border-gray-900 bg-slate-900 outline-none rounded p-2 w-full text-white shadow-md shadow-black/50"
                        name="title" value="{{old('title')}}"
                        placeholder="Example: MST Futsal Cup 2023"
                    />
                    
                    @error('title')
                        <p class="text-red-500 text-s mt-1">{{$message}}</p>
                    @enderror
                </div>



        
                <div class="mb-6 w-35%">
                    <label for="tags" class="inline-block text-lg mb-2">
                        Tags (Comma Separated)
                    </label>
                    <input
                        type="text"
                        class="border border-gray-900 bg-slate-900 outline-none rounded p-2 w-full text-white shadow-md shadow-black/50"
                        name="tags" value="{{old('tags')}}"
                        placeholder="Example: Game, Seminar, Futsal, etc"/>
                    
                    @error('tags')
                        <p class="text-red-500 text-s mt-1">{{$message}}</p>
                    @enderror
                </div>
        
                <div class="mb-6 w-[20%]">
                    <label for="images" class="inline-block text-lg mb-2">
                        Image
                    </label>
                    <input
                        type="file"
                        class=" rounded p-2 w-full bg-slate-900 shadow-md shadow-black/50"
                        name="images" value="{{old('images')}}"/>

                    @error('images')
                        <p class="text-red-500 text-s mt-1">{{$message}}</p>
                    @enderror
                </div>
        
                <div class="mb-6 w-full">
                    <label
                        for="description"
                        class="inline-block text-lg mb-2"
                    >
                        Event Description
                    </label>
                    <textarea
                        class="bg-slate-900 rounded p-2 w-full outline-none  text-white shadow-md shadow-black/50"
                        name="description"
                        rows="10"
                        placeholder="Lorem ipsum bruh bruh, etc">
                        {{old('description')}}
                    </textarea>
                    
                    @error('description')
                        <p class="text-red-500 text-s mt-1">{{$message}}</p>
                    @enderror
                </div>
        
                <div class="mb-6 w-full flex justify-between flex-row-reverse items-center">
                    <button
                        class="bg-green-500 shadow-md shadow-black/50 text-slate-950 font-semibold rounded py-4 px-14  hover:bg-green-400 active:bg-black active:text-white">
                        Post
                    </button>
        
                    <a href="/events/manage" class="text-white py-2 px-10  shadow-md shadow-black/50 bg-yellow-600 hover:bg-yellow-700 active:bg-black active:text-white"> Back </a>
                </div>
            </form>
        </div>
    </section>


</x-admin-layout2>    