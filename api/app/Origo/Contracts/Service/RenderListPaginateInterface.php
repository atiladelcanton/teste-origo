<?php


namespace App\Origo\Contracts\Service;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface RenderListInterface
 * @package App\Origo\Contracts\Service
 */
interface RenderListPaginateInterface
{
    /**
     * @param string $column
     * @param string $orderColum
     * @return Collection
     */
    public function renderList(string $column = 'id', $orderColum = 'DESC'): LengthAwarePaginator;
}
