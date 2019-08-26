@if ( Auth::user()->image )
    <img class="rounded-circle" src="{{ route('image.get', ['filename' => Auth::user()->image]) }}">
@endif