<?php


    namespace App\Origo\Models;


    use Illuminate\Database\Eloquent\Model;

    class Customer extends Model
    {
        protected $fillable = ['name', 'email', 'phone', 'state', 'city', 'birth_date'];
        protected $hidden = ['created_at', 'updated_at'];
        public function plans()
        {
            return $this->belongsToMany(Plan::class);
        }

        public function getBirthDateAttribute($value)
        {

        }
    }
