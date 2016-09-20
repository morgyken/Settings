<?php

namespace Ignite\Settings\Database\Seeders;

use Illuminate\Database\Seeder;

class SetupDatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(PracticeSeederTableSeeder::class);
        $this->call(InsuranceTableSeeder::class);
        //$this->call(ProceduresTableSeeder::class);
    }

}
