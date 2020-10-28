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

        return $this->model->with('propietario:id,nombre,apellido,identificacion,full_name')->orderBy('id', 'Desc')->get([
            'propietario_id',
            'codigo',
            'direccion',
            'ciudad',
            'departamento',
            'proposito',
            'habitaciones',
            'canon',
            'portada',
            // 'descripcion',
            'id'
        ]);
    }

    public function create(array $req)
    {
        $data = $this->getPropietario($req);
        return $this->model->create($data);
    }

    public function update(array $req, $id)
    {
        $data = $this->getPropietario($req);
        return $this->model->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        return $this->model->with('propietario')->find($id, [
            'ciudad',
            'id',
            'codigo',
            'propietario_id',
            'departamento',
            'direccion',
            'proposito',
            'canon',
            'portada',
            'habitaciones',
            'barrio',
            'amoblado',
            'precio',
            'administracion',
            'comision',
            'descripcion',
            'tipo',
            'baños',
            'parqueadero',
            'estado',
        ]);
    }

    public function getPropietario($data)
    {
        $aux = Propietario::where('identificacion', $data['propietario_id'])->first();
        $data['propietario_id'] = $aux->id;
        return $data;
    }
}
