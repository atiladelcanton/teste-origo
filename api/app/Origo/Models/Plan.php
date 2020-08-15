<?php


    namespace App\Origo\Models;


    use Illuminate\Database\Eloquent\Model;

    class Plan extends Model
    {
        protected $fillable = ['name', 'price'];

        public function customer()
        {
            return $this->belongsToMany(Customer::class);
        }
    }
