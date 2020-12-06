<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory as ValidacionFactory;

class CedulaRequest extends FormRequest
{
    public function __construct(ValidacionFactory $validacion){
        $validacion->extend(
            'cedula',
            function($attribute,$value,$parametros){
                $validado=false;
                if(strlen($value)<10||strlen($value)>10)
                    $validado=false;
                else
                {
                    if((int)substr($value,0,2)>24)
                        $validado=false;
                    else
                    {
                        if((int)substr($value,2,1)>6)
                            $validado=false;
                        else
                        {
                            $numeros=0;
                            for($x=0; $x<strlen($value)-1;$x++)
                            {
                                if($x%2==0)
                                {
                                    if((int)(substr($value,$x,1))*2>9)
                                        $numeros=$numeros+((int)(substr($value,$x,1))*2-9);
                                    else
                                        $numeros=$numeros+(int)(substr($value,$x,1))*2;
                                }
                                else
                                    $numeros=$numeros+(int)(substr($value,$x,1));
                            }
                            if(((int)(substr($numeros,0,1))+1)*10-$numeros==(int)(substr($value,9,1)))
                                $validado=true;
                        }
                    }
                }
                return $validado;
            }
        );
    }
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
            'idcedulacliente'=>'required|cedula|unique:informacion_clientes',
        ];
    }
    public function messages()
    {
        return [
            'cedula'=>'El valor ingresado no es un numero de cédula'
        ];
    }
}