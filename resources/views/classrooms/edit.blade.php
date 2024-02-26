<x-admin-layout2>
    <section class="w-full" style="min-height: calc(100vh - 80px)">
        <div class="w-[90%] mx-auto mt-10">
            <header class="text-center">
                <h2 class="text-2xl font-semibold uppercase italic mb-8">
                    Edit {{ $classroom->name }}
                </h2>
            </header>

            <form class="flex flex-wrap justify-between" enctype="multipart/form-data" method="POST" action="{{ route('classrooms.update', $classroom) }}">
                @csrf
                @method('PUT')


                <div class="mb-6 w-[46%]">
                    <label for="name" class="inline-block text-lg mb-2">Class Room Name:</label>
                    <input type="text" class="border border-gray-900 bg-slate-900 outline-none rounded p-2 w-full text-white shadow-md shadow-black/50" name="name" value="{{$classroom->name}}" placeholder="Enter class room name">
                    @error('name')
                        <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Add more input fields for additional data -->
                <div class="mb-6 w-[46%]">
                    <label for="level" class="inline-block text-lg mb-2">Level:</label>
                    <input type="text" class="border border-gray-900 bg-slate-900 outline-none rounded p-2 w-full text-white shadow-md shadow-black/50" name="level" value="{{$classroom->level}}" placeholder="Enter class room level">
                    @error('level')
                        <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                
                </div>

                <div class="mb-6 w-[46%]">
                    <label for="batch" class="inline-block text-lg mb-2">Batch:</label>
                    <input type="text" class="border border-gray-900 bg-slate-900 outline-none rounded p-2 w-full text-white shadow-md shadow-black/50" name="batch" value="{{$classroom->batch}}" placeholder="Enter class room batch">
                    @error('batch')
                    <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>

                
                <div class="mb-6 w-[46%]">
                    <label for="education" class="inline-block text-lg mb-2">Education:</label>
                    <input type="text" class="border border-gray-900 bg-slate-900 outline-none rounded p-2 w-full text-white shadow-md shadow-black/50" name="education" value="{{$classroom->education}}" placeholder="Enter class room batch">
                    @error('education')
                    <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>

                
                <div class="mb-6 w-[46%]">
                    <label for="course" class="inline-block text-lg mb-2">Course:</label>
                    <input type="text" class="border border-gray-900 bg-slate-900 outline-none rounded p-2 w-full text-white shadow-md shadow-black/50" name="course" value="{{$classroom->course}}" placeholder="Enter class room batch">
                    @error('course')
                    <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>

                            
                <div class="mb-6 w-[46%]">
                    <label for="images" class="inline-block text-lg mb-2">
                        Image
                    </label>
                    <input
                        type="file"
                        class=" rounded p-2 w-full bg-slate-900 shadow-md shadow-black/50"
                        name="images" value="{{$classroom->images}}"/>

                    @error('images')
                        <p class="text-red-500 text-s mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6 w-full flex justify-between flex-row-reverse items-center">
                    <div class="mb-6 w-full flex justify-end">
                        <button type="submit" class="bg-green-500 shadow-md shadow-black/50 text-slate-950 font-semibold rounded py-4 px-14  hover:bg-green-400 active:bg-black active:text-white">Update</button>
                    </div>
        
                    <a href="/classrooms/manage" class="text-white py-2 px-10  shadow-md shadow-black/50 bg-yellow-600 hover:bg-yellow-700 active:bg-black active:text-white"> Back </a>
                </div>

            </form>
        </div>
    </section>
</x-admin-layout2>
