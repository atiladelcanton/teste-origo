<?php


    namespace App\Origo\Contracts\Service;


    use Illuminate\Database\Eloquent\Model;

    /**
     * Interface BuildInsertInterface
     * @package App\Origo\Contracts\Service
     */
    interface BuildInsertInterface
    {
        /**
         * @param array $data
         * @return Model
         */
        public function buildInsert(array $data) : Model;
    }
