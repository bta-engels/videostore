<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // leeren der tabelle todos, falls daten darin enthalten sind
        DB::table('todos')->truncate();
        // wir erstellen mittels der Todos Factory 10 Testdatensätze
        // und schreiben diese in unsere tabelle "todos"
        Todo::factory()->count(10)->create();
    }
}
