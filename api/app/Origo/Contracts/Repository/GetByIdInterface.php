<?php


    namespace App\Origo\Contracts\Repository;


    use Illuminate\Database\Eloquent\Model;

    /**
     * Interface GetById
     * @package App\Origo\Contracts\Repository
     */
    interface GetByIdInterface
    {
        /**
         * @param int $id
         * @return Model
         */
        public function getById(int $id) : Model;
    }
