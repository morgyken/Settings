<?php

namespace Ignite\Settings\Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsDatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // $this->call("OthersTableSeeder");
        // $this->call("OthersTableSeeder");
        $this->call(SetupDatabaseSeeder::class);
    }

}
