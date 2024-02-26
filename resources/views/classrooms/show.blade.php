<!-- resources/views/classrooms/show.blade.php -->

<x-layout>

    <section class="classroomsSection w-[90%] mx-auto flex flex-col items-center py-10" style="min-height: calc(100vh - 80px);">

        <h1 class="text-3xl font-semibold mb-4 tracking-widest">
            @if ($classroom->level)
                @if ($classroom->education === 'OTHER')
                    {{ $classroom->name }} Level {{ $classroom->level }} {{ $classroom->course }} (Batch - {{ $classroom->batch }})
                @else
                    {{ $classroom->education }} Level {{ $classroom->level }} {{ $classroom->course }} (Batch - {{ $classroom->batch }})
                @endif
            @else
                @if ($classroom->education === 'OTHER')
                    {{ $classroom->name }} {{ $classroom->course }} (Batch - {{ $classroom->batch }})
                @else
                    {{ $classroom->education }} {{ $classroom->course }} (Batch - {{ $classroom->batch }})
                @endif
            @endif
        </h1>
        
        
        <div class="w-full flex justify-around   ">
            <div class="w-[27%] flex flex-col">
                <img src="{{ asset('images/' . $classroom->images) }}" alt="Classroom Image" class="w-full h-40 object-cover">
                <div class=" my-3 bg-slate-900 w-full h-fit text-center">
                    <h1 class="text-2xl"><i class="bx bx-table"></i></h1>
                    <div class="flex w-full justify-between text-start px-4 py-2">
                        <div class="w-1/2">
                            <p>Monday</p>
                            <p>Tuesday</p>
                            <p>Wednesday</p>
                            <p>Thursday</p>
                            <p>Friday</p>
                            <p>Saturday</p>
                            <p>Sunday</p>
                        </div>
                        
                        <div class="w-1/2">
                            <p>USM (PIIS)</p>
                            <p>UMMO (NC)</p>
                            <p>UAZM (CS)</p>
                            <p>DTMK (CP)</p>
                            <p>DML (DBDD)</p>
                            <p>-</p>
                            <p>-</p>
                        </div>

                    </div>
                </div>

            </div>
            <div class="w-[30%] bg-slate-900 flex flex-col mb-3">
                <h1 class="text-2xl text-center my-2"> <i class='bx bxs-megaphone'></i></h1>
                <p class="p-4">
                    {{ $classroom->announcements }}
                </p>

                <a class="p-2 bg-blue-600 w-fit  mt-6 hover:bg-blue-700 active:bg-blue-900 duration-300" target="blank" href="https://www.nccedu.com/wp-content/uploads/2021/03/06-L5DB-Information-Systems-and-Organisations-ISO-Sample-Assignment-QP.pdf ">Download Assignment PDF</a>
                <a class="p-2 bg-red-600 w-fit  mt-6 hover:bg-red-700 active:bg-red-900 duration-300" target="blank" href="https://www.nccedu.com/wp-content/uploads/2021/04/Assignment-Presentation-Requirements1.pdf ">Other Documents</a>
            </div>
            <h1 class="text-xl mb-4 tracking-widest bg-slate-900 w-[30%] text-center">Exam Results</h1>

        </div>
        <div class="p-4 bg-gray-800 rounded-lg w-full">

            <p class="text-sm text-blue-300">Students</p>
            <div class="flex justify-center flex-wrap w-full">
                @foreach($classroom->users as $user)
                    <a href="{{ url('/users/' . $user->id . '/account') }}" class="rounded-full m-3 my-2 bg-slate-600 hover:bg-slate-700 active:bg-black w-[12%] text-center items-center flex flex-col justify-center text-sm text-white py-2">
                        {{ $user->name }}
                    </a>
                @endforeach
            
                {{-- Fill empty slots with default placeholder --}}
                @for ($i = $classroom->users->count(); $i < 6; $i++)
                    <div class="rounded-full my-2 bg-slate-600 hover:bg-slate-700 active:bg-black w-[12%] text-center items-center flex flex-col justify-center text-sm text-white py-2">
                        (TBA)
                    </div>
                @endfor
            </div>
            
        </div>

    </section>

</x-layout>
