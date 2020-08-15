<?php


    namespace App\Origo\Contracts\Repository;


    use Illuminate\Database\Eloquent\Model;

    /**
     * Interface CreateInterface
     * @package App\Origo\Contracts\Repository
     */
    interface CreateInterface
    {

        /**
         * @param array $data
         * @return Model
         */
        public function create(array $data): Model;
    }
