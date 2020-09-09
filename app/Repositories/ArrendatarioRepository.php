<?php

namespace App\Repositories;

use App\Arrendatario;

use App\InterfaceRepos\RepositorioInterface;

class ArrendatarioRepository implements RepositorioInterface
{

    protected $model;

    /**
     * ArrendatarioRepository constructor.
     *
     * @param Arrendatario $arrendatario
     */
    public function __construct(Arrendatario $arrendatario)
    {
        $this->model = $arrendatario;
    }

    public function all()
    {
        return $this->model->get(['id', 'nombre', 'apellido', 'email', 'identificacion', 'tipo_identificacion', 'direccion', 'telefono', 'accept']);
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
        $arrendatario = $this->model->find($id);
        return $arrendatario;
    }

    // public function specialCreate(array $data)
    // {
    //     $this->model->name = request()->get('name');
    //     $this->model->email = request()->get('email');
    //     $this->model->Arrendatarioname = request()->get('Arrendatarioname');
    //     $this->model->password = Hash::make(request()->get('password'));
    //     $this->model->saveOrFail();
    //     return  $this->model;
    // }
}
