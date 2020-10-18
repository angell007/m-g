<?php

namespace App\Repositories;

use App\PagoRealizado;

use App\InterfaceRepos\RepositorioInterface;

class PagoRealizadoRepository implements RepositorioInterface
{

    protected $model;

    /**
     * PagoRealizadoRepository constructor.
     *
     * @param PagoRealizado $realizado
     */
    public function __construct(PagoRealizado $realizado)
    {
        $this->model = $realizado;
    }

    public function all()
    {
        return $this->model->get(['*']);
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
        $realizado = $this->model->find($id);
        return $realizado;
    }
}
