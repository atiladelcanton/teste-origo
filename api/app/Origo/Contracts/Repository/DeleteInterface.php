<?php


    namespace App\Origo\Contracts\Repository;

    /**
     * Interface DeleteInterface
     * @package App\Origo\Contracts\Repository
     */
    interface DeleteInterface
    {
        /**
         * @param int $id
         */
        public function delete(int $id) : void;
    }
