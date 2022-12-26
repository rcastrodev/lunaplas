<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'category_id'   => 1,
            'code'          => 'COD 1105',
            'name'          => 'VOLCADOR',
            'description'   => '<p>Camión volcador</p>',
            'width'         => '22 cm',
            'high'          => '23 cm',
            'length'        => '36 cm',
            'extra'         => 'images/data-sheet/zMfMWlg3ECv30PmHWaKJA8OWGSXhwu12fMktH3pu.jpg'
        ]);
    }
}
