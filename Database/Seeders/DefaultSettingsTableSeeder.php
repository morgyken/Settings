<?php

namespace Ignite\Settings\Database\Seeders;

use Ignite\Settings\Entities\Settings;
use Illuminate\Database\Seeder;

class DefaultSettingsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $settings_settings = [
                ['name' => 'core::site-name', 'value' => 'Collabmed Platform'],
                ['name' => 'core::site-description', 'value' => 'An elegant , highly opinionated modular healthcare system'],
                ['name' => 'core::real-time', 'value' => false],
                ['name' => 'finance::receipt_prefix', 'value' => 'COL'],
                ['name' => 'reception::checkin_destinations', 'value' => '["5"]'],
                ['name' => 'reception::checkin_places',
                    'value' => '["laboratory","theatre","diagnostics","radiology","pharmacy","optical","dental","nursing"]'
                ]
        ];
        foreach ($settings_settings as $setting) {
            Settings::create($setting);
        }
    }

}
