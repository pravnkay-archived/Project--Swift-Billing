<?php

use Illuminate\Database\Seeder;
use App\ProfileSetting;

class ProfileSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profileSetting = new ProfileSetting();
        $profileSetting->businessName = 'Test Firm Pvt. Ltd.';
        $profileSetting->gstin = '33aasdf1234a1z1';
        $profileSetting->panNumber = 'aasdf1234a';
        $profileSetting->save();
    }
}
