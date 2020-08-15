<?php

    use App\Origo\Models\Customer;
    use App\Origo\Models\Plan;
    use App\Origo\Models\User;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;

    class CustomersSeeder extends Seeder
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
                foreach ($this->customers() as $customer) {
                    $client = Customer::create([
                        'name' => $customer['name'],
                        'email' => $customer['email'],
                        'phone' => $customer['phone'],
                        'state' => $customer['state'],
                        'city' => $customer['city'],
                        'birth_date' => date('Y-m-d', strtotime($customer['birth_date'])),
                    ]);
                    $plan = Plan::inRandomOrder()->limit(rand(1, 2))->pluck('id')->toArray();
                    $client->plans()->sync($plan);
                }
                DB::commit();
            } catch (Exception $exception) {
                DB::rollBack();
                echo $exception->getMessage();
            }
        }

        private function customers()
        {
            return [
                [
                    'name' => 'Claudianus Boast',
                    'email' => 'cboast0@fastcompany.com',
                    'phone' => '(19) 957645371',
                    'state' => 'São Paulo',
                    'city' => 'Araraquara',
                    'birth_date' => '07/06/1993'
                ],
                [
                    'name' => 'Loni Jennions',
                    'email' => 'ljennions1@va.gov',
                    'phone' => '(19) 905613161',
                    'state' => 'São Paulo',
                    'city' => 'Limeira',
                    'birth_date' => '09/05/1985'
                ],
                [
                    'name' => 'Margi Gilhouley',
                    'email' => 'mgilhouley2@telegraph.co.uk',
                    'phone' => '(19) 966290104',
                    'state' => 'São Paulo',
                    'city' => 'Araraquara',
                    'birth_date' => '13/09/1984'
                ],
                [
                    'name' => 'Lexy Sprulls',
                    'email' => 'lsprulls3@moonfruit.com',
                    'phone' => '(19) 976121601',
                    'state' => 'São Paulo',
                    'city' => 'Rio Claro',
                    'birth_date' => '19/10/1999'
                ],
                [
                    'name' => 'Marie Shatliff',
                    'email' => 'mshatliff4@cbslocal.com',
                    'phone' => '(19) 991376354',
                    'state' => 'São Paulo',
                    'city' => 'Rio Claro',
                    'birth_date' => '20/07/1990'
                ],
                [
                    'name' => 'Graig Mouncey',
                    'email' => 'gmouncey5@so-net.ne.jp',
                    'phone' => '(19) 941806149',
                    'state' => 'São Paulo',
                    'city' => 'Araraquara',
                    'birth_date' => '27/03/1990'
                ],
                [
                    'name' => 'Laurice Liger',
                    'email' => 'lliger0@php.net',
                    'phone' => '(35) 971740954',
                    'state' => 'Minas Gerais',
                    'city' => 'Areado',
                    'birth_date' => '25/10/1992'
                ],
                [
                    'name' => 'Kendrick Sooper',
                    'email' => 'ksooper1@slate.com',
                    'phone' => '(31) 944324086',
                    'state' => 'Minas Gerais',
                    'city' => 'Belo Horizonte',
                    'birth_date' => '02/06/1981'
                ],
                [
                    'name' => 'Gordon Levington',
                    'email' => 'glevington2@hpost.com',
                    'phone' => '(31) 922405868',
                    'state' => 'Minas Gerais',
                    'city' => 'Belo Horizonte',
                    'birth_date' => '25/11/1993'
                ],
                [
                    'name' => 'Noam Scolland',
                    'email' => 'nscolland3@mozilla.org',
                    'phone' => '(35) 996817669',
                    'state' => 'Minas Gerais',
                    'city' => 'Areado',
                    'birth_date' => '31/12/1999'
                ],
                [
                    'name' => 'Lindon Skehens',
                    'email' => 'lskehens4@npr.org',
                    'phone' => '(35) 967671104',
                    'state' => 'Minas Gerais',
                    'city' => 'Areado',
                    'birth_date' => '10/01/1985'
                ],
                [
                    'name' => 'Kimbra Rase',
                    'email' => 'krase5@topsy.com',
                    'phone' => '(35) 999428030',
                    'state' => 'Minas Gerais',
                    'city' => 'Areado',
                    'birth_date' => '05/05/1999'
                ],
                [
                    'name' => 'Lorenzo Fisk',
                    'email' => 'lfisk6@businessweek.com',
                    'phone' => '(31) 912695467',
                    'state' => 'Minas Gerais',
                    'city' => 'Belo Horizonte',
                    'birth_date' => '22/12/1985'
                ],
                [
                    'name' => 'Bourke Flavelle',
                    'email' => 'bflavelle7@fc2.com',
                    'phone' => '(35) 959386145',
                    'state' => 'Minas Gerais',
                    'city' => 'Itapeva',
                    'birth_date' => '10/04/1984'
                ],
                [
                    'name' => 'Curran McSharry',
                    'email' => 'cmcsharry8@webeden.co.uk',
                    'phone' => '(35) 902916131',
                    'state' => 'Minas Gerais',
                    'city' => 'Itapeva',
                    'birth_date' => '15/01/1983'
                ],
                [
                    'name' => 'Aveline Dowtry',
                    'email' => 'adowtry9@miibeian.gov.cn',
                    'phone' => '(31) 945227500',
                    'state' => 'Minas Gerais',
                    'city' => 'Belo Horizonte',
                    'birth_date' => '23/12/1994'
                ],
                [
                    'name' => 'John Sebastian',
                    'email' => 'jsebastiana@cbslocal.com',
                    'phone' => '(31) 907366740',
                    'state' => 'Minas Gerais',
                    'city' => 'Belo Horizonte',
                    'birth_date' => '06/04/1998'
                ],
                [
                    'name' => 'Reynolds Greenan',
                    'email' => 'rgreenanb@bloomberg.com',
                    'phone' => '(35) 923551410',
                    'state' => 'Minas Gerais',
                    'city' => 'Itapeva',
                    'birth_date' => '19/07/1985'
                ],
            ];
        }
    }
