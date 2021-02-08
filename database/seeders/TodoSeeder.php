<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Todo;
//use Illuminate\Support\Facades\DB;



class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Leere die Tabelle todos, falls Daten darin enthalten sind
        Todo::truncate();
        // Erstelle 10 Testdatensätze mittels der Todo-Factory
        // schreibe diese in die Tabelle todos
        Todo::factory()->count(10)->create();
    }
}
