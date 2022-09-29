<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Especialidad;

class MedicoController extends Controller
{
    public function index()
    {
       $medicos=User::medicos()->get();
       return view('medicos.index',compact('medicos'));
    }

    public function create(){
    $medico = new User;
    $especialidades=Especialidad::orderBy('especialidad')->get();
    return view('medicos.create', compact('medico','especialidades'));
     }

     public function store(UserStoreRequest $request)
     {
       // dd($request->all());
        $data=$request->only('name', 'email', 'password', 'address', 'phone', 'card_id');
        $data=$data+['role'=>'medico','password'=>bcrypt('secret')];
        $medico = User::create($data);
        $especialidades=[];
        $especialidades=$request->input('especialidad');
        $medico->especialidades()->attach($especialidades);
         return redirect()->route('medicos.index')->with('message', 'Medico creada correctamente');
     }


     public function show($id)
 {
    $medico=User::findOrFail($id);
    $especialidades=$medico->especialidades()->pluck('especialidad');
    return view('medicos.show', compact('medico','especialidades'));
 }


 public function edit($id)
 {
    $medico=User::findOrFail($id);
    $especialidades=Especialidad::orderBy('especialidad')->get();
    $especialidades_id=$medico->especialidades()->pluck('especialidades.id');
    return view('medicos.edit', compact('medico','especialidades','especialidades_id'));
 }


 public function update(UserUpdateRequest $request, $id)
 {
    $medico=User::findOrFail($id);
   // dd($medico);
     $medico->update($request->all());
     $medico->especialidades()->sync($request->input('especialidad'));
     return redirect()->route('medicos.index')->with('message', 'Medico Actualizada correctamente');
 }


 public function destroy($id)
 {
     $medico=User::findOrFail($id);
     $medico->delete();
     return redirect()->route('medicos.index')->with('message', 'Medico Eliminada correctamente');
 }

}
