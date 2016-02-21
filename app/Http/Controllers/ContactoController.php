<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactoController extends Controller {

    public function getIndex() {
        return view('contacto.form');
    }

    public function postEnviar(Request $request) {
        $data = $request->all();

        $mensajesEspanol = array(
            'required' => 'El campo :attribute es requerido.',
            'min' => 'El campo :attribute debe contener al menos :min caracteres.',
            'email' => 'El campo :attribute debe ser una dirección de correo válido.',
            'alpha_num' => 'El :attribute debe contener sólo letras y números',
        );

        $validator = Validator::make($data, array('nombre' => 'required|alpha_num|min:4',
                    'titulo' => 'required|min:8',
                    'email' => 'required|email',
                    'mensaje' => 'required'), $mensajesEspanol);

        if ($validator->fails()) {
            //Retornamos e imprimimos el formulario en pantalla con los mensajes de errores
            return redirect()->to('contacto')
                            ->withErrors($validator)
                            ->withInput($request->input());
        } else {
            return view('contacto.ok')->with('datos', $data);
        }
    }

}
