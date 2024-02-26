<x-admin-layout>
    <div class="container w-1/2 mx-auto h-fit">
        <h1>All Users</h1>
        <form action="{{ route('add.preadded.email') }}" method="POST" class="mb-4 text-black">
            @csrf
            <label for="email" class="block mb-2">Add Pre-added Email:</label>
            <input type="email" name="email" id="email" class="border border-gray-400 p-2 w-full">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded mt-2">Add Email</button>
        </form>



        <div class="flex flex-col">
            @foreach($users as $user)
                <div class="flex justify-between items-center p-3 bg-slate-800 h-10 m-2">
                    <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
                    <div class="flex">
                        <a href="{{ route('users.edit', $user) }}" class="mx-2">Edit</a>
                        <button onclick="showDeleteConfirmationModal({{ $user->id }})" class="mx-2">Delete</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteConfirmationModal" class="hidden fixed top-1/3 left-[30%] w-[40%] rounded-lg  h-fit bg-black bg-opacity-0 justify-center items-center z-50" >
        <div class="bg-gray-900 backdrop-blur-md p-12 rounded-xl">
            <p class="text-xl mb-4 text-red-500 font-semibold">Are you sure you want to delete this user? </p>
            <div class="flex justify-between">
                <button onclick="hideDeleteConfirmationModal()" class="bg-gray-400 px-4 py-2 rounded-md text-white hover:bg-gray-500">Cancel</button>
                <form id="deleteUserForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 px-4 py-2 rounded-md text-white hover:bg-red-600">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showDeleteConfirmationModal(userId) {
            document.getElementById('deleteUserForm').action = '/users/' + userId;
            document.getElementById('deleteConfirmationModal').classList.remove('hidden');
        }

        function hideDeleteConfirmationModal() {
            document.getElementById('deleteConfirmationModal').classList.add('hidden');
        }
    </script>


</x-admin-layout>
