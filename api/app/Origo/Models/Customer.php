<?php


    namespace App\Origo\Models;


    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;

    class Customer extends Model
    {
        protected $fillable = ['name', 'email', 'phone', 'state', 'city', 'birth_date'];
        protected $hidden = ['created_at', 'updated_at'];
        protected $casts = [
            'birth_date' => 'date',
        ];
        public function plans()
        {
            return $this->belongsToMany(Plan::class);
        }

        public function getBirthDateAttribute($value)
        {
           return Carbon::parse($value)->format('d/m/Y');
        }
    }
