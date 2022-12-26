<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Data::create([
            'company_id'=> Company::first()->id,
            'address'   => 'Evita 393 Villa Madero',
            'email'     => 'luni@lunaplastsa.com.ar',
            'phone1'    => '+541146222429|(54 11) 4622-2429',
            'phone2'    => '+541146227875|7875',
            'phone3'    => '+541146227875',
            'logo_header'=> 'images/data/logo_header.png',
            'logo_footer'=> 'images/data/logo_footer.png'
        ]);
    }
}
