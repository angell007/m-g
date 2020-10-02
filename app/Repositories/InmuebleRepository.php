<?php

namespace App\Repositories;

use App\Inmueble;

use App\InterfaceRepos\RepositorioInterface;
use App\Propietario;
use Illuminate\Database\Eloquent\Model;

class InmuebleRepository implements RepositorioInterface
{

    protected $model;

    /**
     * InmuebleRepository constructor.
     *
     * @param Inmueble $inmueble
     */
    public function __construct(Inmueble $inmueble, PropietarioRepository $propietarioRepository)
    {
        $this->model = $inmueble;
    }

    public function all()
    {

        return $this->model->with('propietario:id,nombre,apellido,full_name')->orderBy('id', 'Desc')->get([
            'propietario_id',
            'direccion',
            'ciudad',
            'departamento',
            'tipo',
            'proposito',
            'habitaciones',
            'canon',
            'portada',
            'descripcion',
            'id'
        ]);
    }

    public function create(array $data)
    {
        $aux = Propietario::where('identificacion', $data['propietario_id'])->first();
        $data['propietario_id'] = $aux->id;
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        return $this->model->with('propietario')->find($id, [
            'direccion',
            'propietario_id',
            'ciudad',
            'departamento',
            'tipo',
            'proposito',
            'habitaciones',
            'canon',
            'portada',
            'id',
            'descripcion',
            'codigo',
            'precio'
        ]);
    }

    public function allGallery($id)
    {
        return $this->model->with('imagenes:id,nombre,apellido,full_name')->orderBy('id', 'Desc')->get([
            'propietario_id',
            'direccion',
            'ciudad',
            'departamento',
            'tipo',
            'proposito',
            'habitaciones',
            'canon',
            'portada',
            'descripcion',
            'id'
        ]);
    }
}
