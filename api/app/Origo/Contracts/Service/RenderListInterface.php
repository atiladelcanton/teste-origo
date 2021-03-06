<?php


namespace App\Origo\Contracts\Service;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface RenderListInterface
 * @package App\Origo\Contracts\Service
 */
interface RenderListInterface
{
    /**
     * @param string $column
     * @param string $orderColum
     * @return Collection
     */
    public function renderList(string $column = 'id', $orderColum = 'DESC'): Collection;
}
