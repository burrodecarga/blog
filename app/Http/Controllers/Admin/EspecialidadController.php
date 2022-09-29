<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EspecialidadImport;
use App\Http\Requests\EspecialidadStoreRequest;
use App\Http\Requests\EspecialidadUpdateRequest;
use App\Especialidad;

class EspecialidadController extends Controller
{
    public function index(){
        $especialidades=Especialidad::orderBy('especialidad')->get();
      return view('especialidades.index',compact('especialidades'));
    }

    public function show(Especialidad $especialidad)
    {
        return view('especialidades.show', compact('especialidad'));
    }

    public function create(){
        $especialidad = new Especialidad;
             return view('especialidades.create', compact('especialidad'));
         }

    public function store(EspecialidadStoreRequest $request)
         {
             $especialidad = Especialidad::create($request->all());
             return redirect()->route('especialidades.index')->with('message', 'Especialidad creada correctamente');
         }

    public function edit(Especialidad $especialidad)
    {
        return view('especialidades.edit', compact('especialidad'));
    }

    public function update(EspecialidadUpdateRequest $request, Especialidad $especialidad)
    {
        $especialidad->update($request->all());
        return redirect()->route('especialidades.index')->with('message', 'Especialidad Actualizada correctamente');
    }

    public function destroy(Especialidad $especialidad)
    {
        $especialidad->delete();
        return redirect()->route('especialidades.index')->with('message', 'Especialidad Eliminada correctamente');
    }


    public function formImportExcel(){
        return view('especialidades.formImportExcel');
    }

    public function importExcel(Request $request){
      $file=$request->file('file');
      Excel::import(new EspecialidadImport, $file);
      return back()->with('message','Los datos se importaron correctamente');

    }
}
