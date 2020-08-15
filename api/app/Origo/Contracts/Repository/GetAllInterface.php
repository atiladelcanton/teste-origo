<?php


    namespace App\Origo\Contracts\Repository;


    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Pagination\LengthAwarePaginator;

    interface GetAllInterface
    {
        /**
         * @param string $orderColum
         * @param string $orientation
         * @param int $itensPerPage
         * @return mixed
         */
        public function getAll(string $orderColum = 'id',string $orientation = 'desc',int $itensPerPage=15): LengthAwarePaginator;
    }
