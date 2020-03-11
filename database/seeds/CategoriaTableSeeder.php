<?php

use Illuminate\Database\Seeder;
use App\Categoria;
class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [ ['nombre'=> 'Alquileres', 'descripcion' => 'Alquiler de departamentos, habitaciones, casas, locales comerciales.'],
                        ['nombre'=> 'Casas y Lotes', 'descripcion' => 'Venta de casas del propietario, departamentos, lotes, terrenos...'],
                        ['nombre'=> 'Automóviles', 'descripcion' => 'Venta de automóviles de segunda mano: autos, camionetas, motos, mototaxis...'],
                        ['nombre'=> 'Necesito', 'descripcion' => 'Mozos, cocineros, pintor, albañil, ayudante de cocina, electricista, gasfitero...'],
                        ['nombre'=> 'Empleo', 'descripcion' => 'Diferentes ocupaciones y profesiones que se ofertan: electricista, gasfitero, peluquero...'],
                        ['nombre'=> 'Educación', 'descripcion' => 'Profesores de matemática, física, química, idiomas, tesis....'],
                        ['nombre'=> 'Informática', 'descripcion' => 'Venta de computadoras, laptop, impresoras, celulares, tablets...'],
                        ['nombre'=> 'Mascotas', 'descripcion' => 'Venta de diferentes tipos de mascotas: perritos de raza, gatos, loros, conejos...'],
                        ['nombre'=> 'Hogar', 'descripcion' => 'Muebles baratos, ropa, sofás, televisores, refrigerador, lavadoras, armarios, microondas...'],
                        ['nombre'=> 'Deporte', 'descripcion' => 'Academias de deporte, tutores, implementos deportivos, canchas de grass sintético...'],
                        ['nombre'=> 'Eventos', 'descripcion' => 'Organización de eventos, comidas, locales, quince años, promociones...'],
                        ['nombre'=> 'Arte', 'descripcion' => 'Bandas de músicos, orquestas, folclóricos, equipos de sonido, elencos...']
                      ];
        foreach($categorias as $categoria){
            $c = new Categoria();
            $c->nombre = $categoria['nombre'];
            $c->descripcion = $categoria['descripcion'];
        }
    }
}
