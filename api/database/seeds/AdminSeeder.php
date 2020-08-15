<?php

    use App\Origo\Models\User;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Hash;

    class AdminSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            User::create([
                'name' => 'Administrator',
                'email' => 'adm@email.com',
                'password' => Hash::make('origoTeste@2020')
            ]);
        }
    }
