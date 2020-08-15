<?php

    use App\Origo\Models\Plan;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class PlanSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            try {
                DB::beginTransaction();
                Plan::create(['name' => 'Free', 'price' => 0]);
                Plan::create(['name' => 'Basic', 'price' => 100]);
                Plan::create(['name' => 'Plus', 'price' => 187]);
                DB::commit();
            } catch (Exception $exception) {
                DB::rollBack();
                echo $exception->getMessage();
            }
        }
    }
