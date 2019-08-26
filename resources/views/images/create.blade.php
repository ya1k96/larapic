@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Subir nueva imagen
                </div>
                <div class="card-body">
                    <form action=" {{ route('image.save') }} " method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">                            
                                <label for="image" class="col-md-4 col-form-label text-md-right">Imagen</label>
                           
                            <div class="col-md-6">
                                <input id="image_path" type="file" name="image" class="form-control">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">                            
                                <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>                            
                            <div class="col-md-6">
                                <textarea  id="decripcion" type="text" name="descripcion" class="form-control" cols="15" rows="5"></textarea>
                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">                            
                            <div class="col-md-4 offset-md-4">
                                <input type="submit" value="Enviar" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

