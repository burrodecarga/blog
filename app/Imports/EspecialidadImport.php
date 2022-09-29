<?php

namespace App\Imports;

use App\Especialidad;
use Maatwebsite\Excel\Concerns\ToModel;

class EspecialidadImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Especialidad([
            'especialidad' =>$row[0],
            'descripcion' =>$row[1]
        ]);
    }
}
