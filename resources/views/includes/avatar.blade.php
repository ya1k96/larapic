@if ( Auth::user()->image )
    <img class="rounded-circle" src="{{ route('user.avatar', ['filename' => Auth::user()->image]) }}" alt="" style="width:35px;">
@endif