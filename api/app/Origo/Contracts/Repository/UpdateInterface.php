<?php


    namespace App\Origo\Contracts\Repository;

    /**
     * Interface UpdateInterface
     * @package App\Origo\Contracts\Repository
     */
    interface UpdateInterface
    {
        /**
         * @param int $id
         * @param array $data
         * @return bool
         */
        public function update(int $id, array $data): bool;
    }
