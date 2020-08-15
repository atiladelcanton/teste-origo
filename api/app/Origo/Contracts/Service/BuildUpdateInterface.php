<?php


    namespace App\Origo\Contracts\Service;

    /**
     * Interface BuildUpdateInterface
     * @package App\Origo\Contracts\Service
     */
    interface BuildUpdateInterface
    {
        /**
         * @param int $id
         * @param array $data
         * @return bool
         */
        public function buildUpdate(int $id, array $data) : bool ;
    }
