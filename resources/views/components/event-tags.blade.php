@props(['tagsCsv'])

@php
$tags = explode(',', $tagsCsv);
@endphp

<ul class="flex py-5 justify-center px-3">
  @foreach($tags as $tag)
  <li class="flex items-center justify-center bg-main text-white  py-1 px-3 mr-2 text-sm">
    <a href="/events/?tag={{$tag}}">{{$tag}}</a>
  </li>
  @endforeach
</ul>