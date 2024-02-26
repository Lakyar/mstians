<x-layout>

    <section class="teamsSection w-[90%] mx-auto flex flex-col items-center" style="min-height: calc(100vh - 80px);">

        <h1 class="text-3xl font-semibold mb-4 tracking-widest">Team Details</h1>

        <div class="p-4 bg-gray-700 rounded-lg">
            <h2 class="text-2xl text-yellow-400 font-semibold mb-2">
                {{ $team->name }}
            </h2>
            <p class="text-sm mb-8">Game Type: {{ $team->game }}</p>
            <p class="text-sm text-blue-300">Users:</p>
            <ul>
                @foreach($team->users as $user)
                    <li>
                        <a href="{{ url('/users/' . $user->id . '/account') }}">{{ $user->name }}</a>

                    </li>
                @endforeach
            </ul>
        </div>

    </section>

</x-layout>
