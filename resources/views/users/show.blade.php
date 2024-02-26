<!-- resources/views/users/show.blade.php -->

<x-layout>
    <div class="container bg-slate-600 mx-auto p-10 w-1/2">
        <h1>User Details</h1>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>

        <h2>class:</h2>
        <ul>
            @foreach($user->classrooms as $classroom)
                <li><a href="{{ url('/classrooms/' . $classroom->id) }}">{{ $classroom->name }}</a></li>
            @endforeach
        </ul>
        <h2>Teams:</h2>
        <ul>
            @foreach($user->teams as $team)
                <li><a href="{{ url('/teams/' . $team->id) }}">{{ $team->name }}</a> ( {{ $team->game }} )</li>
            @endforeach
        </ul>
        <!-- Add more details as needed -->
    </div>
</x-layout>
