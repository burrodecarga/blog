<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;

class PacienteController extends Controller
{
    public function index()
    {
       $pacientes=User::pacientes()->get();
       return view('pacientes.index',compact('pacientes'));
    }

    public function create()
    {
        $paciente = new User;
        return view('pacientes.create', compact('paciente'));
     }

     public function store(UserStoreRequest $request)
     {
        $data=$request->only('name', 'email', 'password', 'address', 'phone', 'card_id');
        $data=$data+['role'=>'paciente','password'=>bcrypt('secret')];
        $paciente = User::create($data);
         return redirect()->route('pacientes.index')->with('message', 'Paciente creada correctamente');
     }

    public function show($id)
     {
        $paciente=User::findOrFail($id);
        return view('pacientes.show', compact('paciente'));
     }

    public function edit($id)
     {
        $paciente=User::findOrFail($id);
        return view('pacientes.edit', compact('paciente'));
     }

      public function update(UserUpdateRequest $request, User $paciente)
     {

        //$paciente=User::findOrFail($id);
        $paciente->update($request->all());
         return redirect()->route('pacientes.index')->with('message', 'Paciente Actualizada correctamente');
     }

      public function destroy($id)
     {
         $paciente=User::findOrFail($id);
         $paciente->delete();
         return redirect()->route('pacientes.index')->with('message', 'Paciente Eliminada correctamente');
     }
}
