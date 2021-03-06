<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Request;
    use Illuminate\Http\Resources\Json\JsonResource;

    class CustomerResource extends JsonResource
    {
        /**
         * Transform the resource into an array.
         *
         * @param Request $request
         * @return array
         */
        public function toArray($request)
        {
            return [
                "id" => $this->id,
                "name" => $this->name,
                "email" => $this->email,
                "phone" => $this->phone,
                "state" => $this->state,
                "city" => $this->city,
                "birth_date" => $this->birth_date,
                'plans' => $this->plans
            ];
        }
    }
