<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Cita;

class CitaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'medico_id' =>'exists:users,id',
            'especialidad_id' =>'exists:especialidades,id',
            'fechaDeCita' =>'required',
            'horaDeCita' =>'required',
        ];
    }
}
