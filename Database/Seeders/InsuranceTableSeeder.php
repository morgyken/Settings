<?php

namespace Ignite\Settings\Database\Seeders;

use Faker\Factory;
use Ignite\Settings\Entities\Insurance;
use Ignite\Settings\Entities\Schemes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsuranceTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        for ($i = 0; $i < 5; $i++) {
            DB::transaction(function () {
                $faker = Factory::create();
                $company = new Insurance;
                $company->name = $faker->company;
                $company->address = $faker->address;
                $company->post_code = '011000';
                $company->town = $faker->city;
                $company->street = $faker->streetName;
                $company->building = $faker->streetAddress;
                $company->telephone = $faker->phoneNumber;
                $company->mobile = $faker->phoneNumber;
                $company->email = $faker->email;
                $company->save();
                for ($a = 0; $a < 4; $a++) {
                    $scheme = new Schemes;
                    $scheme->company = $company->id;
                    $scheme->name = $faker->company;
                    $scheme->type = $faker->randomElement(array_keys(mconfig('settings.system.scheme_types')));
                    $scheme->attention = $faker->name;
                    if ($scheme->type > 1) {
                        $scheme->amount = $faker->randomNumber(3);
                    }
                    $scheme->effective_date = $faker->date();
                    $scheme->expiry_date = (new \Date($scheme->effective_date))->add('5 years');
                    $scheme->save();
                }
            });
        }
    }

}
