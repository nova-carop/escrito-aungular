<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea; 

class TareaController extends Controller
{
    public function VerTareaPorId($id){

        try {
            $tarea = Tarea::where('id', $id)
                ->get();

            return response()->json($tarea);
        } catch (\Exception $e) {
            
            return response()->json(['error' => 'Error al traer la tarea por id'], 500);
        }
    }

    public function VerTareaPorTitulo($titulo){

        try {
            $tarea = Tarea::where('titulo', $titulo)
                ->get();

            return response()->json($tarea);
        } catch (\Exception $e) {
            
            return response()->json(['error' => 'Error al traer la tarea por titulo'], 500);
        }
    }

    public function VerTareaPorEstado($estado){

        try {
            $tarea = Tarea::where('estado', $estado)
                ->get();

            return response()->json($tarea);
        } catch (\Exception $e) {
            
            return response()->json(['error' => 'Error al traer la tarea por estado'], 500);
        }
    }

    public function VerTareaPorAutor($autor){

        try {
            $tarea = Tarea::where('autor', $autor)
                ->get();

            return response()->json($tarea);
        } catch (\Exception $e) {
            
            return response()->json(['error' => 'Error al traer la tarea por autor'], 500);
        }
    }

    public function eliminarTarea($id){

        try {
            $tarea = Tarea::find($id);

            if (!$tarea) {
                return response()->json(['message' => 'Tarea no encontrada'], 404);
            }

            $tarea->delete();

            return response()->json(['message' => 'Tarea eliminada con éxito'], 200);
        } catch (\Exception $e) {
           
            return response()->json(['error' => 'Error al borrar tarea'], 500);
        }
    }


    public function ValidarSiExisteLaTarea(Request $request) {

        try {
            $validation = Validator::make($request->all(), [
                'titulo' => 'required',
                'contenido' => 'required',
                'estado' => 'required',
                'autor' => 'required',
            ]);

            if ($validation->fails()) {
                return $validation->errors();
            }

            $this->CrearTarea($request);
            return response()->json(['message' => 'Tarea creada con existo'], 201);

        } catch (\Exception $e) {
            
            return response()->json(['error' => 'Error creando tarea'], 500);
        }
    }


    public function CrearTarea(Request $request) {

        try {
            $tarea = new Tarea();
            $tarea->titulo = $request->post("titulo");
            $tarea->contenido = $request->post("contenido");
            $tarea->estado = $request->post('estado');
            $tarea->autor = $request->post("autor");

            $tarea->save();

        } catch (\Exception $e) {

            throw $e;
        }
    }    
}
