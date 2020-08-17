<?php




namespace App\Origo\Service;


use App\Origo\Contracts\PlanServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PlanService implements PlanServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = app()->make('App\Origo\Repository\PlanRepository');
    }

    /**
     * @param int $id
     * @return Model
     */
    public function renderEdit(int $id): Model
    {
        return $this->repository->getById($id);
    }

    /**
     * @param string $column
     * @param string $orderColum
     * @return Collection
     */
    public function renderList(string $column = 'id', $orderColum = 'DESC'): Collection
    {
        return $this->repository->getAll($column, $orderColum);
    }
}
