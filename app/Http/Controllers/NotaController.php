<?php

namespace App\Http\Controllers;
use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Return the view of all table's notes
     * @param Request
     * @return redirect|view
     */
    public function notes(Request $request)
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
      return view('notas.ver' , ['notas' => $notes]) ;
      
    }
}
