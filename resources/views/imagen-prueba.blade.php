<h2>Imagenes en base de datos</h2>

@foreach ($imagenes as $imagen)
    <div>
        <h5>Id: </h5>{{ $imagen->id }}
        <p> {{ $imagen->image_path }} </p>
    </div>   
    <hr>
    <br>
@endforeach