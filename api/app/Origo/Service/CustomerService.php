<?php


    namespace App\Origo\Service;


    use App\Origo\Contracts\CustomerServiceInterface;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Pagination\LengthAwarePaginator;

    class CustomerService implements CustomerServiceInterface
    {
        private $repository;

        public function __construct()
        {
            $this->repository = app()->make('App\Origo\Repository\CustomerRepository');
        }

        /**
         * @param int $id
         */
        public function buildDelete(int $id): void
        {
            $this->repository->delete($id);
        }

        /**
         * @param array $data
         * @return Model
         */
        public function buildInsert(array $data): Model
        {
            return $this->repository->create($data);
        }

        /**
         * @param int $id
         * @param array $data
         * @return bool
         */
        public function buildUpdate(int $id, array $data): bool
        {
            return $this->repository->update($id, $data);
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
            return $this->repository->getAll($column, $orderColum,2);
        }
    }
