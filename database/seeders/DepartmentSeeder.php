<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            'name' => 'Computer-science',

        ]);
        DB::table('departments')->insert([
            'name' => 'Physics',

        ]);
        DB::table('departments')->insert([
            'name' => 'Economics',

        ]);
        DB::table('departments')->insert([
            'name' => 'B com',

        ]);
    }
}
