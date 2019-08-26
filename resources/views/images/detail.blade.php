@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.succ-message')                
                <div class="card p-2">
                    <div class="card-header"> 
    
                        <img class=" rounded-circle" 
                        src="{{ route('user.avatar', ['filename' => $image->user->image]) }}" 
                        alt="" 
                        style="width:45px;">

                        {{ $image->user->name }} 
                        <p class="text-muted">{{ '@'.$image->user->nick }} </p>

                    </div>
                    <div class="card-body p-0">
                            <img class="img-thumbnail" 
                            src="{{ route('image.get', ['filename' => $image->image_path]) }}" 
                            style="width: 100%; heigth:100%;">

                            <div class="row py-2">
                                
                                <div class="col-3 pr-2" id="likes">                                                                  
                                    <div class="row">
                                        @if (Auth::check())                                  
                                            @if ( count($image->likes) == 0 )
                                            <i class="far fa-2x fa-heart col-5 col-sm-5 col-md-5 col-lg-4 col-xl-3  pr-0"
                                            onclick="likeAsync(event)">
                                                <a id="likeRef"                                              
                                                href=" {{ route('image.like', ['image_id' => $image->id]) }} "></a>
                                            </i>
                                            @endif        
                                            @foreach ($image->likes as $like)

                                                    {{-- Asignamos el icono cuando tiene dado like --}}
                                                    @if( $like->user_id == Auth::user()->id )                                                
                                                        <i class="fas fa-2x fa-heart col-5 col-sm-5 col-md-5 col-lg-4 col-xl-3  pr-0"
                                                        onclick="likeAsync(event)" style="color: #F44336;">
                                                            <a id="dislikeRef"                                              
                                                            href=" {{ route('image.dislike', ['image_id' => $image->id]) }} "></a>
                                                        </i>
                                                    @else 
                                                    <i class="far fa-2x fa-heart col-5 col-sm-5 col-md-5 col-lg-4 col-xl-3  pr-0"
                                                    onclick="likeAsync(event)">
                                                        <a id="likeRef"                                              
                                                        href=" {{ route('image.like', ['image_id' => $image->id]) }} "></a>
                                                    </i>
                                                    @endif 
                                                    
                                            @endforeach                                                                                    

                                        <i class="fas fa-2x fa-comment col-5 col-sm-5 col-md-5 col-lg-4 col-xl-3 px-0" 
                                        style="color: #2196f3;" onclick="comment(event)">                                            
                                        </i>
                                    
                                        @endif

                                    </div>
                                </div>
                                <div class="col-8 pl-1" id="descripcion">                                
                                    <p class="pl-2"> <span class="text-muted">{{ $image->user->nick }} </span> {{ $image->descripcion }} </p>
                                </div>
                            </div>


                            <div class="container-fluid bg-light">
                                @foreach ($image->comments as $comment)
                                <p class="text-muted p-2">
                                    <span> {{ $comment->user->nick }} </span>
                                    {{ $comment->content }}                                  
                                    
                                    @if ( Auth::check() && ($comment->user_id == Auth::user()->id || $image->user_id == Auth::user()->id) )
                                    <a href=" {{ route('comment.delete', ['id' => $comment->id]) }} ">
                                            <i class="fas fa-1x pt-1 fa-trash float-right"></i>
                                    </a>
                                    
                                        
                                    @endif
                                </p>                                
                                @endforeach
                            </div>
                            <form action="{{ route('image.comment') }}" method="POST" id="formaCom" style="display: none;">
                                    @csrf
                                    <input type="hidden" value="{{ $image->id }}" name="id">
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                    <p>
                                        <textarea name="content" 
                                        id="" 
                                        cols="90" 
                                        class="form-control"
                                        rows="1" 
                                        required></textarea>                                
                                    </p>
                                    <button type="submit" class="btn btn-success">Send</button>
                            </form>
                    </div>
                </div>
                                    
        </div>
    </div>
</div>
@endsection
