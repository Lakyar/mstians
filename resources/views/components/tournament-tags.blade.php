@props(['tagsCsv'])

@php
$tags = explode(',', $tagsCsv);
@endphp
<h1 class="text-3xl font-bold">Participated Teams</h1>
<ul class="flex py-5 justify-center px-3 flex flex-wrap">
  @foreach($tags as $tag)
  <li class="flex items-center justify-center bg-black/80 text-white rounded-full text-lg font-bold  w-28 h-28 m-5">
    <a href="/tournaments/?tag={{$tag}}">{{$tag}}</a>
  </li>
  @endforeach
</ul>