<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::truncate();
        $sql = file_get_contents(database_path('dumps/') . 'authors_data.sql');
        DB::unprepared($sql);
    }
}
