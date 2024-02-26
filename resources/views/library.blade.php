<x-layout>


    
    <section class="w-full mt-4" style="min-height: calc(100vh - 80px)">
    
        <div class="w-[90%]   mx-auto text-center  rounded-xl p-10"  >
            <h1 class="text-3xl mb-5 font-semibold  tracking-wider uppercase">MSTians' Library</h1>
            <h1 class="text-2xl text-start">Categories</h1>
            {{-- <div class="border-b-2 border-white flex justify-between w-full overflow-hidden p-4">
                <a href="/bookDetail" class="w-[18%]">
                    <img  src="{{asset('images/bookCover1.jpg')}}" class="w-full h-64" alt="">
                </a>
                <a href="/bookDetail" class="w-[18%]">
                    <img  src="{{asset('images/bookCover2.jpg')}}" class="w-full h-64" alt="">
                </a>
                <a href="/bookDetail" class="w-[18%]">
                    <img  src="{{asset('images/bookCover3.jpg')}}" class="w-full h-64" alt="">
                </a>
                <a href="/bookDetail" class="w-[18%]">
                    <img  src="{{asset('images/bookCover4.jpg')}}" class="w-full h-64" alt="">
                </a>
                
            </div> --}}

            <div class="w-fullh-fit mt-4 flex justify-between flex-wrap">


              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/programming_languages.jpg')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/programming_languages.jpg')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">Programming Languages</a>
              </div>
              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/web_development.jpg')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/web_development.jpg')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">Web Development</a>
              </div>
              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/mobile_app_development.jpg')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/mobile_app_development.jpg')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">Mobile App Development</a>
              </div>
              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/database_management.jpg')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/database_management.jpg')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">Database Management</a>
              </div>

              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/network_security.jpg')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/network_security.jpg')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">Network Security</a>
              </div>
              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/artificial_intelligence.jpg')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/artificial_intelligence.jpg')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">Artificial Intelligence</a>
              </div>
              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/machine_learning.jpg')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/machine_learning.jpg')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">Machine Learning</a>
              </div>
              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/data_science.jpg')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/data_science.jpg')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">Data Science</a>
              </div>

              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/cybersecurity.jpg')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/cybersecurity.jpg')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">Cybersecurity</a>
              </div>
              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/cloud_computing.png')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/cloud_computing.png')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">Cloud Computing</a>
              </div>
              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/software_engineering.jpg')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/software_engineering.jpg')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">Software Engineering</a>
              </div>
              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/operating_systems.png')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/operating_systems.png')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">Operating Systems</a>
              </div>

              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/history.jpg')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/history.jpg')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">History</a>
              </div>
              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/science.jpg')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/science.jpg')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">Science</a>
              </div>
              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/literature.jpg')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/literature.jpg')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">Literature</a>
              </div>
              <div class="relative w-[24%]  object-cover  duration-300 rounded-md -skew-x-3 mb-4">
                <img class="w-full h-40 blur-md " src="{{asset('images/philosophy.jpg')}}" alt="">
                <img class="w-full h-40 absolute rounded-md top-0 left-0" src="{{asset('images/philosophy.jpg')}}" alt="">
                <a href="/books" class="font-semibold absolute rounded-b-md bottom-0 left-0 py-4 duration-300 hover:py-6 bg-black/70 text-center hover:tracking-wider w-full text-xl hover:backdrop-blur-sm">Philosophy</a>
              </div>
              

            </div>
            

    
    
        </div>
    

    
    
    
    
    </section>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        
        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
              panel.style.maxHeight = null;
            } else {
              panel.style.maxHeight = panel.scrollHeight + "px";
            } 
          });
        }
    </script>
        
    </x-layout>





            {{-- <style>
            .accordion {
              background-color: #eee;
              color: #444;
              cursor: pointer;
              padding: 18px;
              width: 100%;
              border: none;
              text-align: left;
              outline: none;
              font-size: 15px;
              transition: 0.4s;
            }
            
            .active, .accordion:hover {
              background-color: #ccc;
            }
            
            .panel {
              padding: 0 18px;
              background-color: white;
              max-height: 0;
              overflow: hidden;
              transition: max-height 0.2s ease-out;
            }
            </style>

        <h2>Animated Accordion</h2>
        <p>Click on the buttons to open the collapsible content.</p>
        
        <button class="accordion">Section 1</button>
        <div class="panel">
          <p class="text-black">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        
        <button class="accordion">Section 2</button>
        <div class="panel">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        
        <button class="accordion">Section 3</button>
        <div class="panel">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div> --}}

  