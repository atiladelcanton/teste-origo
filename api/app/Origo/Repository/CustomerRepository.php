<?php


namespace App\Origo\Repository;


use App\Origo\Contracts\Repository\CreateInterface;
use App\Origo\Contracts\Repository\DeleteInterface;
use App\Origo\Contracts\Repository\GetAllPaginateInterface;
use App\Origo\Contracts\Repository\GetByIdInterface;
use App\Origo\Contracts\Repository\UpdateInterface;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class CustomerRepository implements
    GetAllPaginateInterface,
    GetByIdInterface,
    CreateInterface,
    UpdateInterface,
    DeleteInterface
{
    private $model;

    public function __construct()
    {
        $this->model = app()->make('App\Origo\Models\Customer');
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        $this->model->find($id)->delete();
    }


    /**
     * @param int $id
     * @return Model
     */
    public function getById(int $id): Model
    {
        $customer = $this->model->with('plans')->find($id);
        if (is_null($customer)) {
            throw new Exception("Customer not found", 404);
        }

        return $customer;
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        return $this->model->find($id)->update($data);
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
        string $orientation = 'desc',
        int $itensPerPage = 15
    ): LengthAwarePaginator {
        return $this->model->orderBy($orderColum, $orientation)->paginate($itensPerPage);
    }
}
