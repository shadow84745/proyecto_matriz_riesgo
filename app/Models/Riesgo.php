<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riesgo extends Model
{
    use HasFactory;

    protected $table='riesgos';
    protected $primaryKey='id_riesgo';
    protected $fillable=['id_proyecto','nombre_riesgo','descripcion_riesgo','prob_ocurrencia','impacto','mitigaciones', 'responsable'];
    protected $guarded=[];
    public $timestamps = false;

    public function proyecto_id()
    {
        return $this->belongsTo(Proyecto::class, 'id_proyecto');
    }
}
