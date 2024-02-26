<x-layout>

    <main class="bg-cover bg-center   h-[100vh] relative  overflow-hidden" style="height: calc(100vh - 80px);" >
        <div class="bg-slate-950 h-[200%] w-[500px] absolute rotate-[120deg] -top-0 -left-10 py-20 -z-10"></div>
        <div class="bg-slate-800 z-10 p-10 shadow-lg shadow-white/30 text-white rounded-br-3xl  w-[80%] mx-auto mt-10" >

                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Register
                    </h2>
                    <p class="mb-4 italic">Be a MSTian.</p>
                </header>

                <form action="/users" method="POST" class="w-full flex justify-between flex-wrap">
                    @csrf
                    <div class="mb-6 w-[46%]">
                        <label for="name" class="inline-block text-lg mb-2">
                            Name
                        </label>
                        <input
                            type="text"
                            class="border bg-slate-400 rounded p-2 w-full rounded-br-2xl text-black focus:outline-none"
                            name="name" value="{{old('name')}}"
                        />
                        @error('name')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>



                    <div class="mb-6 w-[46%]">
                        <label for="email" class="inline-block text-lg mb-2"
                            >Email</label
                        >
                        <input
                            type="email"
                            class="border bg-slate-400 rounded p-2 w-full rounded-br-2xl text-black focus:outline-none"
                            name="email" value="{{old('email')}}"
                        />
                        @error('email')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6 w-[46%]">
                        <label
                            for="password"
                            class="inline-block text-lg mb-2"
                        >
                            Password
                        </label>
                        <div class="relative">
                            <input
                                type="password"
                                class="border bg-slate-400 placeholder:text-black/60 rounded p-2 w-full rounded-br-2xl text-black focus:outline-none"
                                name="password"
                                placeholder=""
                                id="password"
                            />
                        
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePasswordVisibility('password', 'eyeIcon')">
                                <i id="eyeIcon" class="fa-solid fa-eye-slash text-gray-500"></i>
                            </button>
                        </div>
                        @error('password')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6 w-[46%]">
                        <label
                            for="password2"
                            class="inline-block text-lg mb-2"
                        >
                            Confirm Password
                        </label>

                        
                        <div class="relative">
                            <input
                                type="password"
                                class="border bg-slate-400 placeholder:text-black/60 rounded p-2 w-full rounded-br-2xl text-black focus:outline-none"
                                name="password_confirmation"
                                placeholder=""
                                id="password_confirm"
                            />
                        
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePasswordVisibility('password_confirm', 'eyeIcon2')">
                                <i id="eyeIcon2" class="fa-solid fa-eye-slash text-gray-500"></i>
                            </button>
                        </div>
                        
                        <script>
                            function togglePasswordVisibility(passwordFieldId, eyeIconId) {
                                var passwordField = document.getElementById(passwordFieldId);
                                var eyeIcon = document.getElementById(eyeIconId);
                        
                                if (passwordField.type === "password") {
                                    passwordField.type = "text";
                                    eyeIcon.classList.remove("fa-eye-slash");
                                    eyeIcon.classList.add("fa-eye");
                                } else {
                                    passwordField.type = "password";
                                    eyeIcon.classList.remove("fa-eye");
                                    eyeIcon.classList.add("fa-eye-slash");
                                }
                            }
                        </script>
                        @error('password_confirmation')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="w-full flex justify-center ">
                        <button
                            type="submit"
                            class="bg-laravel text-white rounded py-2 px-4 active:bg-slate-950 hover:bg-slate-700 hover:tracking-wider duration-300 bg-slate-600">
                            Sign Up
                        </button>
                    </div>

                    <div class="mt-2 w-full text-center font-thin">
                        <p>
                            Already have an account?
                            <a href="/login" class="underline"
                                >Login</a
                            >
                        </p>
                    </div>
                </form>
            </div>
    </main>



</x-layout>