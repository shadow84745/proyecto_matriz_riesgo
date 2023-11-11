<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $table='proyectos';
    protected $primaryKey='id_proyecto';
    protected $fillable=['nombre_proyecto','descripcion_proyecto','imagen_proyecto','id'];
    protected $guarded=[];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

}
