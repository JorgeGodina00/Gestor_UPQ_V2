<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Registro;
class RegistroController extends Controller
{
    //
    public function Insertar(Request $request){
        //dd($request);
        try{
            DB::beginTransaction();
            $reg = new Registro;
            $reg->usuario=$request->get('usuario');
            $reg->rol=$request->get('rol');
            $reg->correo=$request->get('correo');  
            $reg->nombre_documento=$request->get('nombre_documento');
            $reg->documento=$request->get('documento');
            if($request->hasFile('pdf')){
            $archivo = $request->file('pdf');
            $archivo->move(public_path().'/Archivos/',$archivo->getClientOriginalName());
            $reg->documento = $archivo;
        }
        $reg->save();
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['error'=>$e->getMessage()]);
        }
        
    }
}
