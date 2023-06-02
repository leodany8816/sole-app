<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publisher = new Publisher();
        $publisher->name = 'Editorial Aguilar';
        $publisher->country = 'México';
        $publisher->website = 'ediAguilar.mx';
        $publisher->email = "editaguilar@mail.com";
        $publisher->description = "Editorial aguilar con muchos libros";
        $publisher->save();

        $publisher1 = new Publisher();
        $publisher1->name = 'Editorial SEP';
        $publisher1->country = 'Colombia';
        $publisher1->website = 'editsep.com';
        $publisher1->email = "editsep@mail.com";
        $publisher1->description = "Editorial de libros de texto de educación";
        $publisher1->save();
    }
}
