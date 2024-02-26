<x-admin-layout>

    <div class="flex flex-col flex-1">

        <div class="mt-12 text-center h-20">
            <a href="{{ route('classrooms.create') }}" class="items-center text-2xl mt-3 px-6 py-6 rounded-2xl bg-green-500/90 hover:text-black hover:bg-green-600 active:text-white active:bg-black duration-300 text-black font-bold">Create New Classroom +</a>
        </div>
        @unless (count($classrooms ?? []) == 0)

            <div class="bg-slate-600 w-full items-center px-10 flex flex-wrap justify-center">
                @foreach($classrooms as $classroom)
                    <div class="p-2 w-[25%] bg-slate-950 flex my-4 items-center -skew-x-3 mx-5 rounded-lg shadow-lg shadow-black/30">



                        <div class="flex flex-1 flex-col justify-between h-full px-4">
                            <div class="flex h-fit items-center justify-between w-full">

                                <!-- classroom Name -->
                                <h1 class="font-semibold text-xl text-start flex-1">
                                    {{$classroom->name}}
                                </h1>

                            </div>

                            <div class=" text-lg flex justify-between mt-8 w-full">


                                <a href="{{ route('classrooms.edit', $classroom) }}" class=" bg-slate-800  text-yellow-300 p-1 px-3 rounded-xl text-center">Edit <i class="fa fa-pencil"></i></a>

                                <!-- Delete Button -->
                                <button class="text-red-500  bg-slate-800 p-1 px-3 rounded-xl text-center" onclick="showDeleteConfirmationModal({{$classroom->id}})">Delete <i class="fa fa-trash"></i></button>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Delete Confirmation Modal -->
            <div id="deleteConfirmationModal" class="hidden absolute top-1/3 left-[30%] w-[40%]  h-80 bg-black bg-opacity-0 justify-center items-center z-50">
                <div class="bg-slate-400/50 backdrop-blur-md p-12 rounded-xl">
                    <p class="text-xl mb-4">Are you sure you want to delete this classroom?</p>
                    <div class="flex justify-between">
                        <button onclick="hideDeleteConfirmationModal()" class="bg-gray-400 px-4 py-2 rounded-md text-white hover:bg-gray-500">Cancel</button>
                        <form id="deleteClassroomForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 px-4 py-2 rounded-md text-white hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

        @else
            <p>No classrooms</p>
        @endunless


        <div class="mt-6 p-4">
            {{$classrooms->links()}}
        </div>

    </div>

    <script>
        function showDeleteConfirmationModal(classroomId) {
            document.getElementById('deleteClassroomForm').action = '/classrooms/' + classroomId;
            document.getElementById('deleteConfirmationModal').classList.remove('hidden');
        }

        function hideDeleteConfirmationModal() {
            document.getElementById('deleteConfirmationModal').classList.add('hidden');
        }
    </script>
</x-admin-layout>
