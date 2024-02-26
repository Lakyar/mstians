<!-- resources/views/users/edit.blade.php -->

<x-layout>
    <div class="container w-1/2 mx-auto text-black">
        <h1>Edit User</h1>
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block mb-2">Name:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="border border-gray-400 p-2 w-full">
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="border border-gray-400 p-2 w-full">
            </div>

            {{-- change role --}}
            <div class="mb-4">
                <label for="role" class="block mb-2">Role:</label>
                <select name="role" id="role" class="border border-gray-400 p-2 w-full">
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>user</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>admin</option>
                </select>
            </div>
            


            
            <div class="mb-4">
                <label class="block mb-2">Classes:</label>
                @foreach($classrooms as $classroom)
                    <div>
                        <input type="checkbox" name="classrooms[]" id="classroom_{{ $classroom->id }}" value="{{ $classroom->id }}" {{ $user->classrooms->contains($classroom->id) ? 'checked' : '' }}>
                        <label for="classroom_{{ $classroom->id }}">{{ $classroom->name }}</label>
                    </div>
                @endforeach
            </div>
            
            
            
            
            <div class="mb-4">
                <label class="block mb-2">Teams:</label>
                @foreach($teams as $team)
                    <div>
                        <input type="checkbox" name="teams[]" id="team_{{ $team->id }}" value="{{ $team->id }}" {{ $user->teams->contains($team->id) ? 'checked' : '' }}>
                        <label for="team_{{ $team->id }}">{{ $team->name }}</label>
                    </div>
                @endforeach
            </div>


            {{-- verify --}}
            <div class="mb-4">
                <label for="verified" class="block mb-2">Verified:</label>
                <input type="checkbox" name="verified" id="verified" {{ $user->verified ? 'checked' : '' }}>
            </div>
            
            <!-- Add more fields as needed -->
            <div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update</button>
            </div>
        </form>
    </div>



</x-layout>
