<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LeadsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('leads')->insert([
            [
                'name' => 'Acme Corp',
                'email' => 'contact@acme.test',
                'status' => 'new',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
