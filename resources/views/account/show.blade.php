<x-layout>
    <section class="accountSection bg-slate-600 flex items-center" style="min-height:calc(100vh - 80px); ">

</div>
        <div  class="w-5/6  mx-auto overflow-hidden h-fit bg-slate-900 flex shadow-xl shadow-black/70 rounded-lg relative">
            <img  src="{{asset('images/accBg.png')}}" class="absolute w-full h-full" alt="">

            <div class="w-[46%] bg-white/0 shadow-lg shadow-white/20 m-[2%] mr-[1%] backdrop-blur-sm rounded-lg min-h-[400px] flex flex-col items-center justify-around p-6 z-10 hover:bg-blue-700/5 hover:-translate-y-1 duration-300">
                <div class="w-full flex justify-between">

                    <div class="w-fit flex items-center flex-col">
                        <h1 class="text-2xl mb-4 tracking-wider">{{ auth()->user()->name }}
                            @if (auth()->user()->verified)
                                <i class="text-2xl text-yellow-300 bx bxs-badge-check"></i>
                            @endif
                        </h1>
            
                        @if(auth()->user()->classrooms->isNotEmpty())
                            <ul class="text-center">
                                @foreach(auth()->user()->classrooms as $classroom)
                                    @php
                                        $initial = strtoupper(substr($classroom->name, 0, 1)); // Get the first letter of the classroom name
                                    @endphp
                                    <li>
                                        <a href="{{ url('/classrooms/' . $classroom->id) }}" class="border-b-2 hover:tracking-wider duration-500 border-{{ $initial === 'L' ? 'blue' : ($initial === 'I' ? 'red' : 'yellow') }}-500">
                                            {{ $classroom->name }} (completed)
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No class joined yet.</p>
                        @endif
                    </div>
                    <div class="w-fit h-fit">
                        <i class="fa-solid p-4 shadow-lg fa-user-graduate text-5xl mr-5" style="box-shadow: 0 0 10px white, 0 0 20px yellow;"></i>
                    </div>
                </div>
            
                <div class="w-full flex flex-col">
                    <h1 class="text-lg mb-2"><i class="bx bxs-envelope"></i> {{ auth()->user()->email }}</h1>
            
                    <!-- Display user's teams -->
                    <div class="w-full items-start">
                        @if(auth()->user()->teams->isNotEmpty())

                        <h1 class="text-lg"><i class="bx bx-football"></i> Sport teams</h1>
                        <div class="flex flex-col ml-12 h-fit justify-around items-start">
                            @foreach(auth()->user()->teams as $team)
                                <a class="text-sm mx-2 hover:tracking-wider duration-300" href="{{ route('teams.show', $team) }}">{{ $team->name }} ({{ $team->game }})</a>
                            @endforeach

                        </div>
                        @else
                        <p>No teams joined yet.</p>
                        @endif
                    </div>
            
                    <h1 class="text-sm justify-start mt-4"> User Since: {{ auth()->user()->created_at->format('M d, Y') }}</h1>

                    @if(auth()->user()->role === 'admin')

                <div  class="flex justify-between items-center w-full mt-1">
                    <a href="/admin" class="bg-white/30 hover:bg-white/40 text-yellow-400 rounded-md  hover:rounded-2xl px-4 py-1 active:bg-black active:text-white hover:shadow-md shadow-2xl hover:shadow-yellow-500/40 shadow-yellow-500/60 text-xl duration-300  ">Admin Dashboard <i class="fa-solid fa-toolbox"></i></a>


                    <form action="/logout" class="inline" method="POST">
                        @csrf
                        <button type="submit" class="bg-white/30 hover:bg-white/40 active:bg-black active:text-white hover:shadow-md shadow-2xl  hover:shadow-red-500/50 shadow-red-500/70 rounded-md hover:rounded-2xl w-12 h-12 text-red-500 font-bold text-2xl duration-300">
                            <i class="fa-solid fa-person-through-window "></i> 
                        </button>
                    </form>
                </div>

                @else

                <div class="flex justify-end items-center w-full">


                    <form action="/logout" class="inline" method="POST">
                        @csrf
                        <button type="submit" class="bg-white/30 hover:bg-white/40 active:bg-black active:text-white hover:shadow-md shadow-2xl  hover:shadow-red-500/50 shadow-red-500/70 rounded-md hover:rounded-2xl w-12 h-12 text-red-500 font-bold text-2xl duration-300">
                            <i class="fa-solid fa-person-through-window "></i> 
                        </button>
                    </form>
                </div>
                @endif
                </div>
            </div>
            

            <div class="w-1/2 min-h-[400px] flex flex-col items-center justify-between m-[2%] ml-[1%]">
                <div class="flex w-full rounded-lg h-[58%] bg-slate-800/0 shadow-2xl hover:shadow-md shadow-white/10 hover:shadow-white/20 backdrop-blur-sm   items-center justify-around px-6 py-3 z-10  hover:bg-blue-700/5 hover:-translate-y-1 duration-300 ">
                    <i class="fa-solid fa-award text-4xl"></i>
                    <div class=" flex flex-col h-full text-sm">
                        <h1 class="text-xl font-semibold mb-4 tracking-widest">ACHIEVEMENTS</h1>
                        <h1 class="">NCC Level 4 Diploma in Computing</h1>
                        <h1 class="">M.S.T Network Essential Certificate</h1>
                        <h1 class="">Champion (M.S.T Esports Tournament 2023)</h1>
                        <h1 class="">Champion (M.S.T Futsal Tournament 2024)</h1>
                    </div>
                </div>
                <div class="flex w-full rounded-lg h-[38%] bg-slate-800/0 shadow-2xl hover:shadow-md shadow-white/10 hover:shadow-white/20 backdrop-blur-sm   items-center justify-around px-6 py-3 z-10  hover:bg-blue-700/5 hover:-translate-y-1 duration-300 ">
                    <div class=" flex flex-col h-full text-sm text-justify w-full">
                        <h1 class="text-xl font-semibold mb-4 tracking-widest">Manifesto</h1>
                        <div class="flex justify-between w-full items-center">
                        <form method="POST" class="w-full flex items-end justify-between" action="{{ route('users.updateNote') }}">
                                @csrf
                            <textarea id="noteTextarea" class="w-[80%] bg-white/0 outline-none focus:outline-none shadow-sm shadow-white outline px-3 py-2" name="note" rows="3" cols="50">{{ auth()->user()->note }}</textarea>
                            <button id="updateButton" type="submit" class="bg-white/30 hover:bg-white/40 active:bg-black active:text-white hover:shadow-md shadow-2xl  hover:shadow-violet-500/50 shadow-violet-500/70 rounded-md hover:rounded-2xl w-10 h-10 text-violet-200 font-bold text-lg duration-300"><i class="fa-solid fa-pencil"></i></button>
                        </form>


                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>
</x-layout>



<script>
    document.addEventListener('DOMContentLoaded', function() {
    const noteTextarea = document.getElementById('noteTextarea');
    const updateButton = document.getElementById('updateButton');
    
    // Get initial note value
    let initialNote = noteTextarea.value;
    
    // Add event listener to textarea
    noteTextarea.addEventListener('input', function() {
        // Check if the current value is different from the initial value
        if (noteTextarea.value !== initialNote) {
            // If different, set button opacity to 100%
            updateButton.style.opacity = '1';
        } else {
            // If same, set button opacity to 50%
            updateButton.style.opacity = '0.5';
        }
    });
});

</script>


