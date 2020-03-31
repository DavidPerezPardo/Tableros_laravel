<?php

/**
 * Antonio J.Sánchez 
 * curso 2019/20
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Tablero;


class NotaController extends Controller
{


    /**
     * Return the view of all table's notes
     * @param Request
     * @return redirect|view
     */
    public function view(Request $request)
    {
      // get parameter idTab
      $idTab = $request->has('id');

      // if get parameter is empty...
      if(!$idTab)
      return redirect()->route('tablero.ver');

      $idTab = $request->input('id');
      // get all table's notes
      $notes = Nota::where('idTab' , $idTab)->get();
      //dd($notes);
      return view('nota.ver' , ['notas' => $notes , 'idTab' => $idTab]) ;
      
    }


    /**
     * Añade una nota a un tablero determinado o
     * la actualiza.
     * @param Request
     */
    public function add(Request $request){


      // si no es pasado el parámetro idTab...
      if(!$request->has('idTab')) return redirect()->route('tablero.ver');

      $idTab = $request->input('idTab');

      // Si no existe el campo texto,mostramos formulario nueva nota. 
      if(!($request->has('texto'))):
        
        return view('nota.add' , ['idTab' => $idTab]);
      
      // Actualizamos la nota.
      elseif($request->has('idNot')):

        $idNot = $request->input('idNot');
        $texto = $request->input('texto');
        $fecha = $request->input('fecha');
        $completado = $request->input('estado');

        Nota::where('idNot' , $idNot)
        ->update(['texto' => $texto,
                  'fecha' => $fecha,
                  'completado' => $completado
                  ]);
        return redirect()->route('nota.ver' , ['id' => $idTab]);

      else:

        // Creamos la nueva nota del tablero
        $tablero = Tablero::find($idTab);

        $nota = $tablero->notas()->create(

          ['texto'     => $request->input('texto'),
          'fecha'      => $request->input('fecha'),
          'completado' => $request->input('estado')
          ]);
        
        return redirect()->route('nota.ver' , ['id' => $idTab]);

      endif;

    }


    /**
     * Muestra el formulario para editar
     * la nota.
     */
    public function editar(Request $request){

      // Si obtenemos id de la nota , editamos la nota.
        if($request->has('idNot')):

          $idTab = $request->input('idTab');
          $idNot = $request->input('idNot');
          $nota = Nota::find($idNot);
          return view('nota.add' , ['nota'  => $nota,
                                    'idTab' => $idTab]);

        endif;

    }


}
