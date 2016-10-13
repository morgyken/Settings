<?php

namespace Ignite\Settings\Database\Seeders;

use Illuminate\Database\Seeder;

class DefaultSettingsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        /* `platform`.`settings_settings` */
        $settings_settings = [
            ['name' => 'core::site-name', 'value' => 'Collabmed Platform'],
            ['name' => 'core::site-description', 'value' => 'An elegant , highly opinionated modular healthcare system'],
            ['name' => 'evaluation::receipt_prefix', 'value' => 'COL'],
            ['name' => 'reception::checkin_destinations', 'value' => '["1","5","9"]'],
            ['name' => 'reception::checkin_places', 'value' => '["laboratory","theatre","diagnostics","radiology"]'],
            ['name' => 'settings::app_name', 'value' => 'Collabmed Platform']
        ];
        foreach ($settings_settings as $setting)
            \Ignite\Settings\Entities\Settings::create($setting);
    }

}
