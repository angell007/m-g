<?php

namespace App\Repositories;

use App\Arrendatario;
use App\Contrato;
use App\Inmueble;
use App\InterfaceRepos\RepositorioInterface;
use App\Propietario;

class ContratoRepository implements RepositorioInterface
{

    protected $model;

    /**
     * ContractoRepository constructor.
     *
     * @param Contracto $inmueble
     */
    public function __construct(Contrato $inmueble)
    {
        $this->model = $inmueble;
    }

    public function all()
    {
        return $this->model->with([
            'propietario:id,nombre,apellido,full_name',
            'arrendatario:id,identificacion,nombre,apellido,full_name',
            'inmueble:id,codigo'
        ])->orderBy('id', 'Desc')->get(['inmueble_id', 'propietario_id','arrendatario_id', 'codigo', 'inicio', 'fin', 'prorroga', 'observaciones', 'id']);
    }

    public function create(array $req)
    {
        $aux = $this->getArrendatario($req);
        $data = $this->getInmueble($aux);
        return $this->model->create($data);
    }

    public function update(array $req, $id)
    {
        $aux = $this->getArrendatario($req);
        $data = $this->getInmueble($aux);
        return $this->model->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        return $this->model->with([
            'propietario:id,identificacion,nombre,apellido,full_name',
            'arrendatario:id,identificacion,nombre,apellido,full_name',
            'inmueble:id,codigo'
        ])->find($id, ['*']);
    }

    public function getPropietario($data)
    {
        $aux = Propietario::where('identificacion', $data['propietario_id'])->first();
        $data['propietario_id'] = $aux->id;
        return $data;
    }
    public function getArrendatario($data)
    {
        $aux = Arrendatario::where('identificacion', $data['arrendatario_id'])->first();
        $data['arrendatario_id'] = $aux->id;
        return $data;
    }
    public function getInmueble($data)
    {
        $aux = Inmueble::where('codigo', $data['inmueble_id'])->first();
        $data['inmueble_id'] = $aux->id;
        return $data;
    }
}
