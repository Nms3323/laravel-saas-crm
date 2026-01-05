<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Lead;
use App\Models\User;
use App\Models\ActivityLog;

class ActivityLogTest extends TestCase
{
    public function test_updating_lead_creates_activity_log()
    {
        // Ensure users exist (seeders create them in demo flow)
        $user = User::where('email', 'agent@demo.com')->first();
        if (! $user) {
            $user = User::factory()->create(['email' => 'agent@demo.com', 'name' => 'Agent']);
        }

        $lead = Lead::create(['name' => 'Test Lead', 'email' => 'test@lead.test']);

        $lead->assigned_to = $user->id;
        $lead->save();

        $log = ActivityLog::where('subject_type', Lead::class)->where('subject_id', $lead->id)->latest()->first();

        $this->assertNotNull($log);
        $this->assertEquals('lead.updated', $log->action);
    }
}
