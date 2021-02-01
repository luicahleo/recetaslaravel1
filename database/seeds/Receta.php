<?php

use Illuminate\Database\Seeder;

class Receta extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recetas')->insert([
            'titulo' => 'Sopa de fideo',
            'ingredientes' => '<div>fideo</div>',
            'preparacion' => '<div>agua y fideo</div>',
            'imagen' => 'upload-recetas/xbh86Y2oNIoAy939U850xbPwgUmVwcnBKRu10D29.jpg',
            'user_id' => 1,
            'categoria_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('recetas')->insert([
            'titulo' => 'Pique macho',
            'ingredientes' => '<div>carne</div>',
            'preparacion' => '<div>papa y carne</div>',
            'imagen' => 'upload-recetas/xbh86Y2oNIoAy939U850xbPwgUmVwcnBKRu10D29.jpg',
            'user_id' => 1,
            'categoria_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('recetas')->insert([
            'titulo' => 'Chanka',
            'ingredientes' => '<div>pollo</div>',
            'preparacion' => '<div>caldo y pollo</div>',
            'imagen' => 'upload-recetas/xbh86Y2oNIoAy939U850xbPwgUmVwcnBKRu10D29.jpg',
            'user_id' => 1,
            'categoria_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('recetas')->insert([
            'titulo' => 'Pique macho',
            'ingredientes' => '<div>kawi</div>',
            'preparacion' => '<div>caldo y carne</div>',
            'imagen' => 'upload-recetas/xbh86Y2oNIoAy939U850xbPwgUmVwcnBKRu10D29.jpg',
            'user_id' => 1,
            'categoria_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('recetas')->insert([
            'titulo' => 'Charke',
            'ingredientes' => '<div>carne</div>',
            'preparacion' => '<div>mote y carne</div>',
            'imagen' => 'upload-recetas/xbh86Y2oNIoAy939U850xbPwgUmVwcnBKRu10D29.jpg',
            'user_id' => 1,
            'categoria_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('recetas')->insert([
            'titulo' => 'Ensalada',
            'ingredientes' => '<div>enladas variadas</div>',
            'preparacion' => '<div>Enladas de todo</div>',
            'imagen' => 'upload-recetas/xbh86Y2oNIoAy939U850xbPwgUmVwcnBKRu10D29.jpg',
            'user_id' => 1,
            'categoria_id' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

    }
}
