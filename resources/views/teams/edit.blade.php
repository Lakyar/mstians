<x-admin-layout2>
    <section class="w-full" style="min-height: calc(100vh - 80px)">
        <div class="w-[90%] mx-auto mt-10">
            <header class="text-center">
                <h2 class="text-2xl font-semibold uppercase italic mb-8">
                    Edit Team
                </h2>
            </header>

            <form method="POST" class="flex flex-wrap justify-between" enctype="multipart/form-data" action="{{ route('teams.update', $team) }}">
                @csrf
                @method('PUT')

                <div class="mb-6 w-full">
                    <label for="name" class="inline-block text-lg mb-2">Team Name:</label>
                    <input type="text" class="border border-gray-900 bg-slate-900 outline-none rounded p-2 w-full text-white shadow-md shadow-black/50" name="name" value="{{ $team->name }}" placeholder="Enter team name">
                    @error('name')
                        <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 w-full">
                    <label for="game" class="inline-block text-lg mb-2">Game:</label>
                    <input type="text" class="border border-gray-900 bg-slate-900 outline-none rounded p-2 w-full text-white shadow-md shadow-black/50" name="game" value="{{ $team->game }}" placeholder="Enter game name">
                    @error('game')
                        <p class="text-red-500 text-s mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 w-full flex justify-end">
                    <button type="submit" class="bg-green-500 shadow-md shadow-black/50 text-slate-950 font-semibold rounded py-4 px-14  hover:bg-green-400 active:bg-black active:text-white">Update Team</button>
                </div>
            </form>
        </div>
    </section>
</x-admin-layout2>
