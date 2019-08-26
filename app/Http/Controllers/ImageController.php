<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        return view('images.create');
    }

    public function save(Request $request) {

        $validate = $this->validate($request,[
            'descripcion' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg'
        ]);

        $descripcion = $request->input('descripcion');
        $image_path = $request->file('image');        

        $image = new Image();
        
        $user = Auth::user();
        $image->user_id = $user->id;
        $image->image_path = null;
        $image->descripcion = $descripcion;

        //Subir fichero
        if ( $image_path ) {
            $image_path_filename = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put( $image_path_filename, File::get($image_path) );
            $image->image_path = $image_path_filename;
        }

        $image->save();

        return redirect()->route('home')
        ->with(['message' => 'La foto se subio correctamente']);
    }

    public function getImage( $filename ) {
        $file = Storage::disk('images')->get($filename);
    
        return new Response($file,200);
    }

    public function detail( $id ) {
        $image = Image::find( $id );

        return view('images.detail', ['image' => $image]);
    }

    
}
