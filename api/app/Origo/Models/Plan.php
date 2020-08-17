<?php


    namespace App\Origo\Models;


    use Illuminate\Database\Eloquent\Model;

    class Plan extends Model
    {
        protected $fillable = ['name', 'price'];
        protected $hidden = ['created_at', 'updated_at','pivot'];
        protected $casts = ['price' => 'float'];

        public function customer()
        {
            return $this->belongsToMany(Customer::class);
        }
    }
