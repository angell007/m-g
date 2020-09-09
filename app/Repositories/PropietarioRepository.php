<?php

namespace App\Repositories;

use App\Propietario;

use App\InterfaceRepos\RepositorioInterface;

class PropietarioRepository implements RepositorioInterface
{

    protected $model;

    /**
     * PropietarioRepository constructor.
     *
     * @param Propietario $propietario
     */
    public function __construct(Propietario $propietario)
    {
        $this->model = $propietario;
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
        $propietario = $this->model->find($id);
        return $propietario;
    }
}
