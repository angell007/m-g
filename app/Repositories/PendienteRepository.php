<?php

namespace App\Repositories;

use App\Pendiente;

use App\InterfaceRepos\RepositorioInterface;

class PendienteRepository implements RepositorioInterface
{

    protected $model;

    /**
     * PendienteRepository constructor.
     *
     * @param Pendiente $pendiente
     */
    public function __construct(Pendiente $pendiente)
    {
        $this->model = $pendiente;
    }

    public function all()
    {
        return $this->model->with('contrato:id,codigo', 'user:id,name')->where('estado', 'activa')->get(['*']);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        $pendiente = $this->model->find($id);
        return $pendiente;
    }
}
