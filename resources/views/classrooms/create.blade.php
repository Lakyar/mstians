<x-admin-layout2>
    <section class="w-full" style="min-height: calc(100vh - 80px)">
        <div class="w-[90%] mx-auto">
            <header class="text-center">
                <h2 class="text-2xl font-semibold uppercase italic mb-8">
                    Create New Class Room
                </h2>
            </header>

            <form method="POST" class="flex flex-wrap justify-between" enctype="multipart/form-data" action="{{ route('classrooms.store') }}">
                @csrf

                <div class="mb-6 w-[46%]">
                    <label for="name" class="inline-block text-lg mb-2">Class Room Name:</label>
                    <input type="text" class="border border-gray-900 bg-slate-900 outline-none rounded p-2 w-full text-white shadow-md shadow-black/50" name="name" value="{{ old('name') }}" placeholder="Example: L5DC-B1, ITPEC-B1">
                    @error('name')
                        <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 w-[46%]">
                    <label for="education" class="inline-block text-lg mb-2">Education:</label>
                    <select name="education" id="educationSelect" class="border border-gray-900 bg-slate-900 outline-none rounded p-2.5 w-full text-white shadow-md shadow-black/50">
                        <option value="NCC" {{ old('education') === 'NCC' ? 'selected' : '' }}>NCC</option>
                        <option value="ITPEC" {{ old('education') === 'ITPEC' ? 'selected' : '' }}>ITPEC</option>
                        <option value="OTHER" {{ old('education') === 'OTHER' ? 'selected' : '' }}>OTHER</option>
                    </select>
                    @error('education')
                        <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>
                

                <div class="mb-6 w-[46%]" id="levelDiv">
                    <label for="level" class="inline-block text-lg mb-2">Level:</label>
                    <input type="text" class="border border-gray-900 bg-slate-900 outline-none rounded p-2 w-full text-white shadow-md shadow-black/50" name="level" value="{{ old('level') }}" placeholder="Enter class room level" id="levelInput">
                    @error('level')
                        <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 w-[46%]">
                    <label for="batch" class="inline-block text-lg mb-2">Batch:</label>
                    <input type="text" class="border border-gray-900 bg-slate-900 outline-none rounded p-2 w-full text-white shadow-md shadow-black/50" name="batch" value="{{ old('batch') }}" placeholder="Enter class room batch">
                    @error('batch')
                    <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>
                

                
                <div class="mb-6 w-[46%]" id="courseDiv">
                    <label for="course" class="inline-block text-lg mb-2">Course:</label>
                    <input type="text" class="border border-gray-900 bg-slate-900 outline-none rounded p-2 w-full text-white shadow-md shadow-black/50" name="course" value="{{ old('course') }}" placeholder="Enter class room batch" id="courseInput">
                    @error('course')
                        <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 w-[46%]" id="cityDiv">
                    <label for="city" class="inline-block text-lg mb-2">City:</label>
                    <input type="text" class="border border-gray-900 bg-slate-900 outline-none rounded p-2 w-full text-white shadow-md shadow-black/50" name="city" value="{{ old('city') }}" placeholder="Enter city" id="cityInput">
                    @error('city')
                        <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>



                            
                <div class="mb-6 w-[46%]">
                    <label for="images" class="inline-block text-lg mb-2">
                        Banner Image;
                    </label>
                    <input
                        type="file"
                        class=" rounded p-2 w-full bg-slate-900 shadow-md shadow-black/50"
                        name="images" value="{{old('images')}}"/>

                    @error('images')
                        <p class="text-red-500 text-s mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6 w-full flex justify-between flex-row-reverse items-center">
                    <div class="mb-6 w-full flex justify-end">
                        <button type="submit" class="bg-green-500 shadow-md shadow-black/50 text-slate-950 font-semibold rounded py-4 px-14  hover:bg-green-400 active:bg-black active:text-white">Create</button>
                    </div>
        
                    <a href="/classrooms/manage" class="text-white py-2 px-10  shadow-md shadow-black/50 bg-yellow-600 hover:bg-yellow-700 active:bg-black active:text-white"> Back </a>
                </div>

            </form>
        </div>
    </section>
</x-admin-layout2>



<script>
    // Get references to the elements
    const courseDiv = document.getElementById('courseDiv');
    const levelDiv = document.getElementById('levelDiv');
    const educationSelect = document.getElementById('educationSelect');

    // Add event listener to education select
    educationSelect.addEventListener('change', function() {
        // Check if the selected value is ITPEC
        if (this.value === 'ITPEC') {
            // Hide the course and level divs
            courseDiv.style.display = 'none';
            levelDiv.style.display = 'none';
        } else {
            // Show the course and level divs
            courseDiv.style.display = 'block';
            levelDiv.style.display = 'block';
        }
    });

    // Initial check on page load
    if (educationSelect.value === 'ITPEC') {
        // Hide the course and level divs initially if ITPEC is selected
        courseDiv.style.display = 'none';
        levelDiv.style.display = 'none';
    }
</script>