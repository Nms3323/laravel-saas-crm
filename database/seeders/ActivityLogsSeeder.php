<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActivityLogsSeeder extends Seeder
{
    public function run()
    {
        DB::table('activity_logs')->insert([
            [
                'action' => 'lead.created',
                'subject_type' => 'App\\Models\\Lead',
                'subject_id' => 1,
                'causer_id' => null,
                'meta' => json_encode(['info' => 'Seeded lead created']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
