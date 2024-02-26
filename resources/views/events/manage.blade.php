<x-admin-layout>

<div class="flex flex-col flex-1">

        <div class=" mt-12 text-center h-20 ">
            <a href="/events/create" class="items-center text-2xl mt-3 px-6 py-6 rounded-2xl bg-green-500/90 hover:text-black hover:bg-green-600 active:text-white active:bg-black duration-300 text-black font-bold">Post New Event +</a>
        </div>
        @unless (count($events) == 0)
            <div class="bg-slate-600 w-full items-center px-10">
                @foreach($events as $event)
                    @props(['event'])

                    <div class="p-2 w-full bg-slate-950 flex my-4 items-center -skew-x-3 rounded-lg shadow-lg shadow-black/30">

                        <a href="/events/{{$event['id']}}">
                            <img src="/images/{{$event->images}}" class="h-28 w-44 mx-2 mr-4" alt="">
                        </a>

                        <div class="flex flex-1 flex-col justify-between h-full px-4">
                            <div class="flex h-fit items-center justify-between w-full">

                                <h1 class="font-semibold text-xl text-start flex-1">
                                    <a href="/events/{{$event['id']}}">{{$event['title']}}</a>
                                </h1>

    
                            </div>
    
    
                            
                            <div class=" text-lg flex justify-between mt-8 w-full">
                                <h5 class="font-thin text-sm my-2 ">
                                    {{$event['created_at']}}
                                </h5>
                                <h5 class="font-thin text-sm my-2 ">
                                    Posted by {{$event->user->name}}
                                </h5>
                                <a href="/events/{{$event->id}}/edit" class=" bg-slate-800  text-yellow-300 p-1 px-3 rounded-xl text-center">Edit <i class="fa fa-pencil"></i></a>
    
    
    
                                <!-- Delete Button -->
                                <button class="text-red-500  bg-slate-800 p-1 px-3 rounded-xl text-center" onclick="showDeleteConfirmationModal({{$event->id}})">Delete <i class="fa fa-trash"></i></button>
    
    
                            </div>

                        </div>



                    </div>
                    
                @endforeach
            </div>

 

            <!-- Delete Confirmation Modal -->
            <div id="deleteConfirmationModal" class="hidden fixed top-1/3 left-[30%] w-[40%] rounded-lg  h-fit bg-black bg-opacity-0 justify-center items-center z-50" >
                <div class="bg-gray-900 backdrop-blur-md p-12 rounded-xl">
                <p class="text-xl mb-4 text-red-500 font-semibold">Are you sure you want to delete this event? </p>
                    <div class="flex justify-between">
                        <button onclick="hideDeleteConfirmationModal()" class="bg-gray-400 px-4 py-2 rounded-md text-white hover:bg-gray-500">Cancel</button>
                        <form id="deleteEventForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 px-4 py-2 rounded-md text-white hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

            

        @else
            <p>No events</p>
        @endunless

        <div class="mt-6 p-4">
            {{$events->links()}}
        </div>

        
</div>

    <script>
        function showDeleteConfirmationModal(eventId) {
            document.getElementById('deleteEventForm').action = '/events/' + eventId;
            document.getElementById('deleteConfirmationModal').classList.remove('hidden');
        }

        function hideDeleteConfirmationModal() {
            document.getElementById('deleteConfirmationModal').classList.add('hidden');
        }
    </script>
</x-admin-layout>
