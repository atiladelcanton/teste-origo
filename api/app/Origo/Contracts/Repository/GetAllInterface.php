<?php


namespace App\Origo\Contracts\Repository;


use Illuminate\Database\Eloquent\Collection;


interface GetAllInterface
{
    /**
     * @param string $orderColum
     * @param string $orientation
     * @param int $itensPerPage
     * @return mixed
     */
    public function getAll(string $orderColum = 'id', string $orientation = 'desc'): Collection;
}
