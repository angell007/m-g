<?php

namespace App\Repositories;

use App\Imagen;

use App\InterfaceRepos\RepositorioInterface;
use Illuminate\Database\Eloquent\Model;

class ImagenRepository implements RepositorioInterface
{

    protected $model;

    /**
     * ImagenRepository constructor.
     *
     * @param Imagen $inmueble
     */
    public function __construct(Imagen $inmueble)
    {
        $this->model = $inmueble;
    }

    public function getAll($id)
    {
        return $this->model->where('inmueble_id', $id)->orderBy('id', 'Desc')->get(['*']);
    }

    public function all()
    {
        // return $this->model->with('propietario:id,nombre,apellido,full_name')->orderBy('id', 'Desc')->get(['*']);
    }

    public function create(array $data)
    {
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
}
