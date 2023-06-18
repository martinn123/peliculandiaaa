<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pelicula
 *
 * @property $id_peliculas
 * @property $titulo
 * @property $descripcion
 * @property $genero
 * @property $valoracion
 * @property $imagen
 * @property $video
 * @property $created_at
 * @property $updated_at
 *
 * @property Visualizacione[] $visualizaciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pelicula extends Model
{
    
    static $rules = [
		'id' => '',
		'titulo' => 'required',
		'descripcion' => 'required',
		'genero' => 'required',
		'valoracion' => 'required',
		'imagen' => 'required',
		'video' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','titulo','descripcion','genero','valoracion','imagen','video'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visualizaciones()
    {
        return $this->hasMany('App\Models\Visualizacione', 'id_pelicula', 'id');
    }

    public function BuscarPorTitulo($query, $filtro)
    {
        return $query->where('titulo', 'LIKE', '%' . $filtro . '%');
    }

}
