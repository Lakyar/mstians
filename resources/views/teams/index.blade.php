<x-layout>

    <section class="teamsSection w-[90%] mx-auto flex flex-col items-center" style="min-height: calc(100vh - 80px);">
        <h1 class="text-3xl font-semibold mb-4 tracking-widest">All Teams</h1>

        <div class="grid grid-cols-3 gap-4">
            @foreach($teams as $team)
                <a href="{{ route('teams.show', $team) }}" class="text-decoration-none">
                    <div class="p-4 bg-gray-700 rounded-lg">
                        <h2 class="text-xl font-semibold mb-2">{{ $team->name }}</h2>
                        <p class="text-sm">Game: {{ $team->game }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

</x-layout>
