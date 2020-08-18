<?php


namespace App\Origo\Service;


use App\Origo\Contracts\CustomerServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class CustomerService implements CustomerServiceInterface
{
    private $repository;
    private $paginate;

    public function __construct()
    {
        $this->repository = app()->make('App\Origo\Repository\CustomerRepository');
        $this->paginate = 15;
    }

    /**
     * @param int $id
     */
    public function buildDelete(int $id): void
    {
        $customer = $this->renderEdit($id);

        foreach ($customer->plans as $plan) {

            if ($plan->id === 1 && $customer->state === 'São Paulo') {
                throw new Exception("Clientes do estado de São Paulo com plano Free, não podem ser excluídos", 500);
            }
        }

        $this->repository->delete($id);
    }

    /**
     * @param array $data
     * @return Model
     */
    public function buildInsert(array $data): Model
    {
        $customer =  $this->repository->create($data);

        $customer->plans()->sync(explode(',', $data['plans']));

        return $customer;
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function buildUpdate(int $id, array $data): bool
    {

        $return =  $this->repository->update($id, $data);
        if (isset($data['plans'])) {
            $customer = $this->renderEdit($id);

            $customer->plans()->sync(explode(',', $data['plans']));
        }

        return $return;
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
    public function renderList(string $column = 'id', $orderColum = 'DESC'): LengthAwarePaginator
    {
        return $this->repository->getAll($column, $orderColum, $this->paginate);
    }
}
