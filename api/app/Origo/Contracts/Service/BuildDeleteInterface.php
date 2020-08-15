<?php


    namespace App\Origo\Contracts\Service;

    /**
     * Interface BuildDeleteInterface
     * @package App\Origo\Contracts\Service
     */
    interface BuildDeleteInterface
    {
        /**
         * @param int $id
         */
        public function buildDelete(int $id) : void;
    }
