<x-layout>
    <section class="accountSection  bg-slate-700 flex items-center flex-wrap" style="min-height:calc(100vh - 80px); ">
        <div class="w-full relative text-center items-center flex justify-center z-10">

            <div class="absolute flex flex-col justify-center bg-yellow-100 -skew-x-[26deg] -z-10 self-center w-fit p-2 px-6 shadow-lg shadow-white/60">
                <h1 class="skew-x-[26deg] text-xl italic text-black">{{ $user->name }}'s Profile </h1>
                
            </div>


        </div>

        <div class="w-5/6 -mt-8 mx-auto h-fit bg-slate-900 flex shadow-lg shadow-black/70  rounded-lg relative">
            <img src="{{asset('images/accBg.png')}}" class="absolute w-full h-full" alt="">
    
            <div class="w-[46%] bg-white/0 shadow-lg shadow-white/20 m-[2%] mr-[1%] backdrop-blur-sm rounded-lg h-[400px] flex flex-col items-center justify-around p-6 z-10 hover:bg-blue-700/5 hover:-translate-y-1 duration-300">
                <div class="w-full flex justify-between">

                    <div class="w-fit flex items-center flex-col">
                        <h1 class="text-2xl mb-4 tracking-wider ">{{ $user->name }}
                            @if ($user->verified)
                            <i class='text-2xl text-yellow-300 bx bxs-badge-check'></i>
                            @endif
                        </h1>

                        @if($user->classrooms->isNotEmpty())
                        <ul class="text-center">
                            @foreach($user->classrooms as $classroom)
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
                        <i class="fa-solid  p-4 shadow-lg fa-user-graduate text-5xl mr-5" style="box-shadow: 0 0 10px white, 0 0 20px yellow;"></i>

                    </div>
                </div>

                <div class="w-full flex flex-col">
                    <h1 class="text-lg mb-2"><i class="bx bxs-envelope"></i> {{ $user->email }}</h1>



                    <!-- Display user's teams -->
                    <div class="w-full  items-start">
                        <h1 class="text-lg"><i class="bx bx-football"></i> Sport teams</h1>
                        <div class="flex flex-col ml-12 h-fit justify-around items-start ">
                        @foreach($user->teams as $team)
                            <a class="text-sm mx-2  hover:tracking-wider duration-300" href="{{ route('teams.show', $team) }}">{{ $team->name }} ({{ $team->game }})</a>
                        @endforeach 
                        </div>


                    </div>

                    <h1 class="text-sm self-end justify-end mt-4"> User Since: {{ $user->created_at->format('M d, Y') }}</h1>

                </div>
    
                            
    
    
    

            </div>
    
            <div class="w-1/2 h-[400px] flex flex-col items-center justify-between m-[2%] ml-[1%]">
                <div class="flex w-full rounded-lg h-[58%] bg-slate-800/0 shadow-lg shadow-white/20 backdrop-blur-sm   items-center justify-around px-6 py-3 z-10 hover:bg-blue-700/5 hover:-translate-y-1 duration-300">
                    <i class="fa-solid fa-award text-4xl"></i>
                    <div class=" flex flex-col h-full text-sm">
                        <h1 class="text-xl font-semibold mb-4 tracking-widest">ACHIEVEMENTS</h1>
                        <h1 class="">NCC Level 4 Diploma in Computing</h1>
                        <h1 class="">M.S.T Network Essential Certificate</h1>
                        <h1 class="">Champion (M.S.T Esports Tournament 2023)</h1>
                        <h1 class="">Champion (M.S.T Futsal Tournament 2024)</h1>
                        <h1 class="">Top 3(M.S.T Scholarship Exam 2024)</h1>
                    </div>
                </div>
                <div class="flex w-full rounded-lg h-[38%] bg-slate-800/0 shadow-lg shadow-white/20 backdrop-blur-sm   items-center justify-around px-6 py-3 z-10 hover:bg-blue-700/5 hover:-translate-y-1 duration-300">
                    <div class=" flex flex-wrap h-full text-sm text-justify">
                        <h1 class="text-xl w-full font-semibold mb-4 tracking-widest">{{ $user->name }}'s Manifesto</h1>
                        <p>
                            {{ $user->note }}
                        </p>
                    </div>
                </div>
                {{-- <div class="flex w-full rounded-lg h-[48%] bg-slate-800 items-center px-6 py-3">
                    <i class="fa fa-people-group text-4xl"></i>
                </div> --}}
            </div>
    
        </div>
    
    </section>
    </x-layout>
    