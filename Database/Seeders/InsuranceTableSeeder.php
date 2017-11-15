<?php

namespace Ignite\Settings\Database\Seeders;

use Faker\Factory;
use Ignite\Settings\Entities\Insurance;
use Ignite\Settings\Entities\Schemes;
use Illuminate\Database\Seeder;

class InsuranceTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedNHIF();

        for ($i = 0; $i < 10; $i++) {
            \DB::beginTransaction();
            $faker = Factory::create();
            $company = new Insurance;
            $company->name = $faker->firstNameFemale;
            $company->address = $faker->address;
            $company->post_code = '011000';
            $company->town = $faker->city;
            $company->street = $faker->streetName;
            $company->building = $faker->streetAddress;
            $company->telephone = $faker->phoneNumber;
            $company->mobile = $faker->phoneNumber;
            $company->email = $faker->email;
            $company->save();
            for ($a = 0; $a < 10; $a++) {
                $scheme = new Schemes;
                $scheme->company = $company->id;
                $scheme->name = $faker->city;
                $scheme->type = $faker->randomElement(array_keys(mconfig('settings.system.scheme_types')));
                $scheme->attention = $faker->name;
                if ($scheme->type > 1) {
                    $scheme->amount = ceil($faker->numberBetween(50, 1000) / 10) * 10;
                }
                $scheme->effective_date = $faker->date();
                $scheme->expiry_date = $scheme->effective_date->addYears(5);
                $scheme->save();
            }
            \DB::commit();
        }
    }

    /*
    * Method to create NHIF insurance company by default
    */
    public function seedNHIF()
    {
        Insurance::create([
            'name' => 'NHIF',
            'address' => '30443',
            'post_code' => '0100',
            'town' => 'Nairobi',
            'street' => 'UpperHill',
            'building' => 'NHIF',
            'telephone' => '(020) 272 3246',
            'mobile' => '(020) 272 3246',
            'email' => 'info@nhif.or.ke',
        ]);
    }

}
