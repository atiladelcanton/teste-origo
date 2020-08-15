<?php


    namespace App\Origo\Contracts\Service;


    use Illuminate\Database\Eloquent\Model;

    /**
     * Interface RenderEditInterface
     * @package App\Origo\Contracts\Service
     */
    interface RenderEditInterface
    {
        /**
         * @param int $id
         * @return Model
         */
        public function renderEdit(int $id) : Model;
    }
