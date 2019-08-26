<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function config() {
        return view('user.config');
    }

   public function update(Request $request) {
       //$surname = $request->input('surname');
       $user = \Auth::user();

       $id = $user->id;
       $name = $request->input('name');
       $nick = $request->input('nick');
       $email = $request->input('email');

       /* Preparacion de las validaciones */
       $validate = $this->validate($request, [
       'name' => 'required|string|max:255',
       'nick' => 'required|string|max:255|min:6|unique:users,nick,'.$id,
       'email' => 'required|string|email|max:255|unique:users,email,'.$id,
       ]);
           
        $user->name = $name;                
        $user->nick = $nick;       
        $user->email = $email; 
        //Subir imagen
        $image_path = $request->file('image');
        
        if( $image_path ) {
            //Poner nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();
            
            //Guardar en la carpeta storage (storage/app/user)
            Storage::disk('users')->put($image_path_name, File::get($image_path));
            
            //Seteo la propiedad imagen en el objeto
            $user->image = $image_path_name;
        }

        $user->update();

        return redirect()->route('config')  
        ->with(['message' => 'Usuario actualizado correctamente']);                        
   }

   public function getImage( $filename ) {
    $file = Storage::disk('users')->get($filename);

    return new Response($file,200);
   }
}
