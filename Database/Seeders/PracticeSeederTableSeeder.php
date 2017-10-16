<?php

namespace Ignite\Settings\Database\Seeders;

use Faker\Factory;
use Ignite\Settings\Entities\Clinics;
use Ignite\Settings\Entities\Practice;
use Ignite\Settings\Entities\Rooms;
use Illuminate\Database\Seeder;

class PracticeSeederTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $good_names = ['Oseng\'teti', 'God Abouro', 'Oduwo'];
        //our practice
        $practice = Practice::firstOrNew(['id' => 1]);
        $practice->name = 'Platform';
        $practice->address = '444';
        $practice->telephone = '02054698745';
        $practice->mobile = '0712600600';
        $practice->email = 'info@' . str_slug($practice->name) . '.com';
        $practice->country = 88;
        $practice->town = 'Muhoroni';
        $practice->fax = '057713273123';
        $practice->street = 'Accra Street';
        $practice->building = 'Bazaar Plaza';
        $practice->office = strtoupper('suite 45');
        $practice->pin = '76das7678';
        $practice->save();

        // a few clinics
        foreach ($good_names as $name) {
            $faker = Factory::create();
            $clinic = new Clinics;
            $clinic->name = $name;
            $clinic->address = $faker->address;
            $clinic->telephone = $faker->phoneNumber;
            $clinic->fax = $practice->fax;
            $clinic->mobile = $practice->telephone;
            $clinic->email = $practice->email;
            $clinic->town = $practice->town;
            $clinic->location = $faker->streetAddress;
            $clinic->street = $practice->street;
            $clinic->building = $practice->building;
            $clinic->office = $practice->office;
            $clinic->status = 1;
            $clinic->type = 'medical';
            $clinic->practice = $practice->id;
            $clinic->save();

            $clinic->rooms()->create(['name' => 'Consultation Room ' . mt_rand(1, 20)]);
        }
    }

}
