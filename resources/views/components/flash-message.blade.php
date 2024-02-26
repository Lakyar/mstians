@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 500)" x-show="show"
  x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  class="fixed  top-1/3 left-1/2 transform -translate-x-1/2 text-2xl text-amber-500 italic font-semibold shadow-xl shadow-yellow-400/20 z-50">
  <p class="bg-black/30 backdrop-blur-lg min-w-[50vw] text-center px-16 py-16">
    {{session('message')}}
  </p>
</div>
@endif
