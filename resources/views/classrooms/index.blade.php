<x-layout>

    <section class="classroomsSection w-[90%] mx-auto flex flex-col items-center mt-10" style="min-height: calc(100vh - 80px);">
        <h1 class="text-3xl font-semibold mb-4 tracking-widest">Classrooms</h1>



        <div class="tab w-full flex justify-center">
            <button class="tablinks rounded-t-2xl w-[15%] border-2 border-slate-900 text-xl durtion-300 text-yellow-500 py-2  font-bold bg-slate-700 hover:bg-slate-800 active" onclick="openClassroom(event, 'ALL')">All</button>
            <button class="tablinks rounded-t-2xl w-[15%] border-2 border-slate-900 text-xl text-blue-500 font-bold py-2 durtion-300 bg-slate-700 hover:bg-slate-800" onclick="openClassroom(event, 'NCC')">NCC</button>
            <button class="tablinks rounded-t-2xl w-[15%] border-2 border-slate-900 text-xl text-red-500 font-bold py-2 durtion-300 bg-slate-700 hover:bg-slate-800" onclick="openClassroom(event, 'ITPEC')">ITPEC</button>
            <button class="tablinks rounded-t-2xl w-[15%] border-2 border-slate-900 text-xl font-bold py-2 durtion-300 bg-slate-700 hover:bg-slate-800" onclick="openClassroom(event, 'OTHER')">OTHER</button>
        </div>
        
                
        <div id="ALL" class="tabcontent bg-slate-900 w-full h-fit text-center rounded-lg shadow-lg shadow-black/50 px-5">
            <h1 class="text-2xl my-5 tracking-wider font-semibold" style="text-shadow: 1px -1px 10px yellow">ALL CLASSES</h1>
        <div class="flex w-full justify-around flex-wrap">



            @foreach($classrooms as $classroom)

            <div class="card w-[13%] h-20 mb-8 mx-2 flex items-center justify-center flex-col">
                <div class="card-inner ">
                    <div class="card-front bg-slate-600 flex items-center justify-center rotate-0 ">
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full m-2">
                            <h2 class="text-lg font-semibold shadow-xl rounded-lg
                                @if (strpos($classroom->name, 'L') === 0)
                                    shadow-blue-500/60
                                @elseif (strpos($classroom->name, 'I') === 0)
                                    shadow-red-500/60
                                @else
                                    shadow-yellow-500/60
                                @endif
                            ">
                                {{ $classroom->name }}
                            </h2>
                        </a>
                    </div>
                  <div class="card-back active:bg-black bg-slate-700 flex items-center flex-col  justify-center" style="box-shadow: 0 0 20px black;">
                    <a href="{{ route('classrooms.show', $classroom) }}" class="w-full">
                        <h2 class="text-[10px] leading-3 font-thin rounded-lg">
                            @if ($classroom->education === 'OTHER')
                                {{ $classroom->name }}
                            @elseif ($classroom->level)
                                {{ $classroom->education }} level-{{ $classroom->level }}
                            @else
                                {{ $classroom->education }}
                            @endif
                        </h2>
                    </a>
                    
                    <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">{{ $classroom->course }}</h2></a>
                    <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">Batch-{{ $classroom->batch }}</h2></a>
                    <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">31 - Students</h2></a>
                    <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">Campus- {{ $classroom->city }}</h2></a>

                  </div>
                </div>
              </div>
            @endforeach

            

            </div>

        </div>
        
        
        <div id="NCC" class="tabcontent bg-slate-900 w-full text-center rounded-lg shadow-lg shadow-black/50 px-5">
            <h1 class="text-2xl my-5 tracking-wider font-semibold" style="text-shadow: 1px -1px 10px blue">NCC CLASSES</h1>
            <div class="flex w-full justify-around flex-wrap">



                @foreach($classrooms as $classroom)
                @if($classroom->education === 'NCC')

                <div class="card w-[13%] h-20 mb-8 mx-2 flex items-center justify-center flex-col">
                    <div class="card-inner ">
                      <div class="card-front bg-slate-600 flex items-center justify-center rotate-0 ">
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full m-2"><h2 class="text-lg font-semibold  ">{{ $classroom->name }}</h2></a>
                      </div>
                      <div class="card-back active:bg-black bg-slate-700 flex items-center flex-col  justify-center" style="box-shadow: 0 0 20px black;">
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full">
                            <h2 class="text-[10px] leading-3 font-thin rounded-lg">
                                @if ($classroom->education === 'OTHER')
                                    {{ $classroom->name }}
                                @elseif ($classroom->level)
                                    {{ $classroom->education }} level-{{ $classroom->level }}
                                @else
                                    {{ $classroom->education }}
                                @endif
                            </h2>
                        </a>
                        
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">{{ $classroom->course }}</h2></a>
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">Batch-{{ $classroom->batch }}</h2></a>
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">31 - Students</h2></a>
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">Campus- {{ $classroom->city }}</h2></a>
    
                      </div>
                    </div>
                  </div>
                @endif
                @endforeach
    
                </div>
    
            </div>
            

        
        </div>
        
        <div id="ITPEC" class="tabcontent bg-slate-900 w-full text-center rounded-lg shadow-lg shadow-black/50 px-5" >
                        
            <h1 class="text-2xl my-5 tracking-wider font-semibold" style="text-shadow: 1px -1px 10px red">ITPEC CLASSES</h1>
            <div class="flex w-full justify-around flex-wrap">



                @foreach($classrooms as $classroom)
                @if($classroom->education === 'ITPEC')

                <div class="card w-[13%] h-20 mb-8 mx-2 flex items-center justify-center flex-col">
                    <div class="card-inner ">
                      <div class="card-front bg-slate-600 flex items-center justify-center rotate-0 ">
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full m-2"><h2 class="text-lg font-semibold  ">{{ $classroom->name }}</h2></a>
                      </div>
                      <div class="card-back active:bg-black bg-slate-700 flex items-center flex-col  justify-center" style="box-shadow: 0 0 20px black;">
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full">
                            <h2 class="text-[10px] leading-3 font-thin rounded-lg">
                                @if ($classroom->education === 'OTHER')
                                    {{ $classroom->name }}
                                @elseif ($classroom->level)
                                    {{ $classroom->education }} level-{{ $classroom->level }}
                                @else
                                    {{ $classroom->education }}
                                @endif
                            </h2>
                        </a>
                        
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">{{ $classroom->course }}</h2></a>
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">Batch-{{ $classroom->batch }}</h2></a>
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">31 - Students</h2></a>
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">Campus- {{ $classroom->city }}</h2></a>
    
                      </div>
                    </div>
                  </div>
                @endif
                @endforeach
    
                </div>
    
            </div>
        </div>
        
        <div id="OTHER" class="tabcontent bg-slate-900 w-full text-center rounded-lg shadow-lg shadow-black/50 px-5" >
                        
            <h1 class="text-2xl my-5 tracking-wider font-semibold" style="text-shadow: 1px -1px 10px yellow">OTHER CLASSES</h1>
            <div class="flex w-full justify-around flex-wrap">



                @foreach($classrooms as $classroom)
                @if($classroom->education === 'OTHER')

                <div class="card w-[13%] h-20 mb-8 mx-2 flex items-center justify-center flex-col">
                    <div class="card-inner ">
                      <div class="card-front bg-slate-600 flex items-center justify-center rotate-0 ">
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full m-2"><h2 class="text-lg font-semibold  ">{{ $classroom->name }}</h2></a>
                      </div>
                      <div class="card-back active:bg-black bg-slate-700 flex items-center flex-col  justify-center" style="box-shadow: 0 0 20px black;">
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full">
                            <h2 class="text-[10px] leading-3 font-thin rounded-lg">
                                @if ($classroom->education === 'OTHER')
                                    {{ $classroom->name }}
                                @elseif ($classroom->level)
                                    {{ $classroom->education }} level-{{ $classroom->level }}
                                @else
                                    {{ $classroom->education }}
                                @endif
                            </h2>
                        </a>
                        
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">{{ $classroom->course }}</h2></a>
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">Batch-{{ $classroom->batch }}</h2></a>
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">31 - Students</h2></a>
                        <a href="{{ route('classrooms.show', $classroom) }}" class="w-full"><h2 class="text-[10px] leading-3 font-thin  rounded-lg">Campus- {{ $classroom->city }}</h2></a>
    
                      </div>
                    </div>
                  </div>
                @endif
                @endforeach
    
                </div>
    
            </div>
        </div>

    </section>

</x-layout>



<script>
    function openClassroom(evt, education) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(education).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Trigger click event on the "ALL" button by default
    window.onload = function() {
        document.getElementsByClassName('tablinks')[0].click();
    };
</script>

<style>

.tab button {
    transition: 0.3s all ease
}
.tab button:hover {
  /* background-color: #1E293B; */
}
.tab button.active {
  background-color: #0F172A;
}

.tabcontent {
  display: none;
}

.card {

  perspective: 1000px;
}

.card-inner {
  width: 100%;
  height: 100%;
  position: relative;
  transform-style: preserve-3d;
  transition: transform 0.5s;
}

.card:hover .card-inner {
  transform: scale(1.4) rotateY(180deg) ;
}

.card-front,
.card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

.card-back{
    z-index: -10;
    transform: rotateY(180deg);

}
                  







</style>






