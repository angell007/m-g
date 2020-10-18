<?php

namespace App\Repositories;

use App\Descuento;

use App\InterfaceRepos\RepositorioInterface;

class DescuentoRepository implements RepositorioInterface
{

    protected $model;

    /**
     * DescuentoRepository constructor.
     *
     * @param Descuento $descuento
     */
    public function __construct(Descuento $descuento)
    {
        $this->model = $descuento;
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
        $descuento = $this->model->find($id);
        return $descuento;
    }
}
