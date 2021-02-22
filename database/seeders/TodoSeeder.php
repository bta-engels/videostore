<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;
use App\Models\Todo;
// Für Variante über DB::table in der run-Funktion: DB einbinden
//use Illuminate\Support\Facades\DB;



class TodoSeeder extends Seeder
{
    private $count = 100;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Leere die Tabelle todos, falls Daten darin enthalten sind
        // setze dabei die automatisch generierten IDs zurück
        // DB::table('todos')->truncate();
        Todo::truncate();
        // Erstelle 10 Testdatensätze mittels der Todo-Factory
        // schreibe diese in die Tabelle todos
//        Todo::factory()->count(10)->create();
        Todo::factory()->count($this->count)->create();
    }
}
