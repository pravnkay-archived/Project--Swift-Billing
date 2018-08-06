<?php

use Illuminate\Database\Seeder;
use App\InvoiceSetting;

class InvoiceSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invoicesetting = new InvoiceSetting();
        $invoicesetting->serialPrefix = 'INV-';
        $invoicesetting->serialNumberStart = '001';
        $invoicesetting->save();
    }
}
