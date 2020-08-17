<?php


namespace App\Origo\Repository;


use App\Origo\Contracts\Repository\GetAllInterface;
use App\Origo\Contracts\Repository\GetByIdInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PlanRepository implements GetAllInterface, GetByIdInterface
{

    private $model;

    public function __construct()
    {
        $this->model = app()->make('App\Origo\Models\Plan');
    }
    /**
     * @param string $orderColum
     * @param string $orientation
     * @param int $itensPerPage
     * @return mixed
     * @throws BindingResolutionException
     */
    public function getAll(
        string $orderColum = 'id',
        string $orientation = 'desc'
    ): Collection {
        return $this->model->orderBy($orderColum, $orientation)->get();
    }

    /**
     * @param int $id
     * @return Model
     */
    public function getById(int $id): Model
    {
        return $this->model->find($id);
    }
}
