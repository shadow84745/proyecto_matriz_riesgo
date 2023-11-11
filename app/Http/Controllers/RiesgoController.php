<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Riesgo;
use Illuminate\Http\Request;

class RiesgoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $proyecto = Proyecto::where('id_proyecto', $id)->first();
        if (!$proyecto) {
            // Manejar el caso en el que no se encuentre el proyecto
            return redirect()->back()->with('error', 'El proyecto no existe.');
        }

        $riesgos = new Riesgo;
        $riesgos->id_proyecto = $proyecto->id_proyecto;
        $riesgos->nombre_riesgo = $request->input('nombre_riesgo');
        $riesgos->descripcion_riesgo = $request->input('descripcion_riesgo');
        $riesgos->prob_ocurrencia = $request->input('prob_ocurrencia');
        $riesgos->impacto = $request->input('impacto');
        $riesgos->tipo_de_riesgo = $request->input('tipo_de_riesgo');
        $riesgos->zona_de_riesgo = round($request->input('prob_ocurrencia') * $request->input('impacto'));

        if ($riesgos->zona_de_riesgo <= 3) {
            $riesgos->se_acepta = 'Si';
        } else if ($riesgos->zona_de_riesgo <= 6) {
            $riesgos->se_acepta = 'No';
        } else {
            $riesgos->se_acepta = 'No';
        }

        $riesgos->tipo_de_control = $request->input('tipo_de_control');
        $riesgos->hmec = $request->input('hmec');
        $riesgos->mipc = $request->input('mipc');
        $riesgos->tce = $request->input('tce');
        $riesgos->rec = $request->input('rec');
        $riesgos->fec = $request->input('fec');

        $riesgos->calificacion_control = intval($request->input('hmec')) + intval($request->input('mipc')) + intval($request->input('tce')) + intval($request->input('rec')) + intval($request->input('fec'));

        if ($riesgos->tipo_de_control == 'preventivo') {
            $riesgos->pcp = $riesgos->calificacion_control;
        } else {
            $riesgos->pcp = 0;
        }

        if ($riesgos->pcp <= 50) {
            $riesgos->cdp = 0;
        } else if ($riesgos->pcp >= 51 && $riesgos->pcp <= 75) {
            $riesgos->cdp = 1;
        } else if ($riesgos->pcp >= 76) {
            $riesgos->cdp = 2;
        }

        if ($riesgos->tipo_de_control == 'correctivo') {
            $riesgos->pcc = $riesgos->calificacion_control;
        } else {
            $riesgos->pcc = 0;
        }

        if ($riesgos->tipo_de_riesgo == 'logico') {
            $riesgos->tipo_de_impacto = 'Continuidad Operativa';
        } else if ($riesgos->tipo_de_riesgo == 'fisico') {
            $riesgos->tipo_de_impacto = 'Continuidad Operativa';
        } else if ($riesgos->tipo_de_riesgo == 'locativo') {
            $riesgos->tipo_de_impacto = 'Continuidad Operativa';
        } else if ($riesgos->tipo_de_riesgo == 'legal') {
            $riesgos->tipo_de_impacto = 'Legal';
        } else if ($riesgos->tipo_de_riesgo == 'reputacional') {
            $riesgos->tipo_de_impacto = 'Imagen';
        } else if ($riesgos->tipo_de_riesgo == 'financiero') {
            $riesgos->tipo_de_impacto = 'Financiero';
        }


        if ($riesgos->pcc <= 50) {
            $riesgos->cdi = 0;
        } else if ($riesgos->pcc >= 51 && $riesgos->pcc <= 75) {
            $riesgos->cdi = 1;
        } else if ($riesgos->pcc >= 76) {
            $riesgos->cdi = 2;
        }

        $riesgos->mitigaciones = $request->input('mitigaciones');

        $riesgos->responsable = $request->input('responsable');



        $riesgos->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $riesgos = Riesgo::where('id_proyecto', $id)->get();

        return view('riesgos.index', compact('riesgos', 'id'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_riesgo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $riesgo = Riesgo::find($id);
        
        if (!$riesgo) {
            // Manejar el caso en el que no se encuentre el riesgo
            return redirect()->back()->with('error', 'El riesgo no existe.');
        }
        
        $proyecto = Proyecto::find($riesgo->id_proyecto);
        
        if (!$proyecto) {
            // Manejar el caso en el que no se encuentre el proyecto
            return redirect()->back()->with('error', 'El proyecto no existe.');
        }

        $riesgo->id_proyecto = $proyecto->id_proyecto;
        $riesgo->nombre_riesgo = $request->input('nombre_riesgo');
        $riesgo->descripcion_riesgo = $request->input('descripcion_riesgo');
        $riesgo->prob_ocurrencia = $request->input('prob_ocurrencia');
        $riesgo->impacto = $request->input('impacto');
        $riesgo->tipo_de_riesgo = $request->input('tipo_de_riesgo');
        $riesgo->zona_de_riesgo = round($request->input('prob_ocurrencia') * $request->input('impacto'));

        if ($riesgo->zona_de_riesgo <= 3) {
            $riesgo->se_acepta = 'Si';
        } else if ($riesgo->zona_de_riesgo <= 6) {
            $riesgo->se_acepta = 'No';
        } else {
            $riesgo->se_acepta = 'No';
        }

        $riesgo->tipo_de_control = $request->input('tipo_de_control');
        $riesgo->hmec = $request->input('hmec');
        $riesgo->mipc = $request->input('mipc');
        $riesgo->tce = $request->input('tce');
        $riesgo->rec = $request->input('rec');
        $riesgo->fec = $request->input('fec');

        $riesgo->calificacion_control = intval($request->input('hmec')) + intval($request->input('mipc')) + intval($request->input('tce')) + intval($request->input('rec')) + intval($request->input('fec'));

        if ($riesgo->tipo_de_control == 'preventivo') {
            $riesgo->pcp = $riesgo->calificacion_control;
        } else {
            $riesgo->pcp = 0;
        }

        if ($riesgo->pcp <= 50) {
            $riesgo->cdp = 0;
        } else if ($riesgo->pcp >= 51 && $riesgo->pcp <= 75) {
            $riesgo->cdp = 1;
        } else if ($riesgo->pcp >= 76) {
            $riesgo->cdp = 2;
        }

        if ($riesgo->tipo_de_control == 'correctivo') {
            $riesgo->pcc = $riesgo->calificacion_control;
        } else {
            $riesgo->pcc = 0;
        }




        if ($riesgo->tipo_de_riesgo == 'logico') {
            $riesgo->tipo_de_impacto = 'Continuidad Operativa';
        } else if ($riesgo->tipo_de_riesgo == 'fisico') {
            $riesgo->tipo_de_impacto = 'Continuidad Operativa';
        } else if ($riesgo->tipo_de_riesgo == 'locativo') {
            $riesgo->tipo_de_impacto = 'Continuidad Operativa';
        } else if ($riesgo->tipo_de_riesgo == 'legal') {
            $riesgo->tipo_de_impacto = 'Legal';
        } else if ($riesgo->tipo_de_riesgo == 'reputacional') {
            $riesgo->tipo_de_impacto = 'Imagen';
        } else if ($riesgo->tipo_de_riesgo == 'financiero') {
            $riesgo->tipo_de_impacto = 'Financiero';
        }


        if ($riesgo->pcc <= 50) {
            $riesgo->cdi = 0;
        } else if ($riesgo->pcc >= 51 && $riesgo->pcc <= 75) {
            $riesgo->cdi = 1;
        } else if ($riesgo->pcc >= 76) {
            $riesgo->cdi = 2;
        }
        
        $riesgo->mitigaciones = $request->input('mitigaciones');
        $riesgo->responsable = $request->input('responsable');


        $riesgo->fill($request->all());

        $riesgo->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $riesgos = Riesgo::find($id);
        if($riesgos){
            $riesgos->delete();
        }
        return redirect()->back();
    }
}