<?php

namespace Database\Seeders;

use App\Models\Todo;
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
        Todo::truncate();
        Todo::factory()->count(10)->create();


    /*    Todo::create([
            'id' => 0,
            'done' => 0,
            'text' => 'test',
        ]);*/
    }
}
