<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        /** Slider */
        for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id' => 1,
                'order'     => 'AA',
                'image'     => 'images/home/8bmi2tfIHEjruvnFSUPPxTUFYz6yI01ahdKgNCZu.jpg',
                'content_1' => 'VEHÍCULOS',
                'content_2' => 'CAMIÓN GROSSO',
            ]);
        }

        Content::create([
            'section_id' => 2,
            'image'     => 'images/home/Mask_Group_262.png',
            'content_1' => '<p>Somos una empresa familiar fabricante de los juegos y juguetes LUNI. Lunaplast S.A. tiene sus comienzos en la década del 60’ fabricando Juegos y Juguetes plásticos en Argentina.</p><p>Mesa y Silla, Camiones: Muchas variedades,Juegos Didácticos, Cocinita con frutas y verduras, Playa, Bowling, Cuna y bebés, Puzzles, Blockes</p>',
            'content_2' => 'images/home/LOGO_LUNI_GRANDE.png',
            'content_3' => 'images/home/LOGO_LUNAPLAST.png',
        ]);
         
        /** Fin home page */

        /** Calidad */
        Content::create([
            'section_id' => 3,
            'image'     => 'images/quality/43H8IafSZDLzJzqgh13729iTR6wqGZ2heG8jSsHp.png',
            'content_1' => '<p>Luni es una empresa dedicada a la fabricación de productos plásticos y metálicos con una muy buena calidad y servicio de atención al cliente personalizado.</p>
            <p>Contamos para lograrlo con un sistema de gestión de la calidad eficaz y eficiente, basado en el seguimiento y mejora continua de nuestros procesos flexibles ante cambios, logrando productos que cumplan con los requisitos exigidos por el cliente.</p>
            <p>Cada persona dentro de LunaPlast asume esta misión con responsabilidad y trabaja con el compromiso de mantener nuestro sistema de gestión de la Calidad y cumplir con los requisitos aplicables. Cada proceso está diseñado e implantado para obtener la mayor eficiencia de los recursos y calidad competitiva, teniendo en cuenta el control periódico y estableciendo la cultura de la prevención de problemas.</p>',
            'content_2' => '<p>Somos una empresa familiar fabricante de los juegos y juguetes LUNI. Lunaplast S.A. tiene sus comienzos en la década del 60’ fabricando Juegos y Juguetes plásticos en Argentina.</p><p>Mesa y Silla, Camiones: Muchas variedades,Juegos Didácticos, Cocinita con frutas y verduras, Playa, Bowling, Cuna y bebés, Puzzles, Blockes</p>',
            'content_2' => 'images/quality/fhez4X7gRlNUbpO9iQIB5llDmPL9bSE2GJcZoSgr.jpg'
        ]);
        /** fin Caliadad */
        /** Quienes somos */
        Content::create([
            'section_id' => 4,
            'image'     => 'images/company/Mask_Group_263.png',
            'content_1' => 'QUIENES SOMOS'
        ]);
        Content::create([
            'section_id' => 5,
            'image'     => 'images/company/Mask_Group_264.png',
            'content_1' => 'Contamos con 45 años de seriedad comercial.',
            'content_2' => '<p>Somos una empresa familiar fabricante de los juegos y juguetes LUNI. Lunaplast S.A. tiene sus comienzos en la década del 60’ fabricando Juegos y Juguetes plásticos en Argentina.</p>
            <p>Mesa y Silla, Camiones: Muchas variedades,Juegos Didácticos, Cocinita con frutas y verduras, Playa, Bowling, Cuna y bebés, Puzzles, Blockes</p>'
        ]);
        Content::create([
            'section_id' => 6,
            'content_1' => '4000 m2',
            'content_2' => '15',
            'content_3' => '3',
            'content_4' => '1',
        ]);
        /** Fin quienes somos */
    }
}

  
