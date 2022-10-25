<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //crear 10 cursos
        $cursos = Curso::factory(10)->create();

        //a cada curso asignarle una imagen
        foreach ($cursos as $curso){
            Image::factory(1)->create([
                'imageable_id' => $curso->id,
                'imageable_type' => Curso::class
            ]);
            $curso->etiquetas()->attach([
                rand(1, 4),
                rand(5, 8)
            ]);
        }
    }
}
