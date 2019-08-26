@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.succ-message')
                @foreach ($images as $image)
                <div class="card p-2">
                    <div class="card-header"> 
    
                        <img class="img-thumbnail" 
                        src="{{ route('user.avatar', ['filename' => $image->user->image]) }}" 
                        alt="" 
                        style="width:45px;">

                        {{ $image->user->name }} 
                        <p class="text-muted">@ {{ $image->user->nick }} </p>

                    </div>
                    <div class="card-body p-0">
                        <a href=" {{ route('image.detail', ['id' => $image->id]) }} ">
                            <img class="img-thumbnail" 
                            src="{{ route('image.get', ['filename' => $image->image_path]) }}" 
                            style="width: 100%; heigth:100%;">

                        </a>

                            <div id="likes">

                            </div>

                            <div id="descripcion">                                
                                   <p class=""> <span class="text-muted">{{ $image->user->nick }} 
                                    {{ \FormatTime::LongTimeFilter( $image->created_at ) }} 
                                </span> {{ $image->descripcion }} </p>
                            </div>
                    </div>
                </div>
                    
                @endforeach
        </div>
        <div class="col-12 d-flex justify-content-center py-2">
            <div class="clear-fix">
                {{ $images->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
