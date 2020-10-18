<?php

namespace App\Repositories;

use App\PagoRecibido;

use App\InterfaceRepos\RepositorioInterface;

class PagoRecibidoRepository implements RepositorioInterface
{

    protected $model;

    /**
     * PagoRecibidoRepository constructor.
     *
     * @param PagoRecibido $recibido
     */
    public function __construct(PagoRecibido $recibido)
    {
        $this->model = $recibido;
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
        $recibido = $this->model->find($id);
        return $recibido;
    }
}
