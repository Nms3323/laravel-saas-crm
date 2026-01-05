<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_login_returns_token()
    {
        $response = $this->postJson('/api/v1/login', ['email' => 'admin@demo.com', 'password' => 'Admin@123']);
        $response->assertStatus(200)->assertJsonStructure(['token','user']);

        // Use token to assign a lead (smoke test)
        $token = $response->json('token');

        // Create a lead
        $lead = \App\Models\Lead::create(['name' => 'Assign Test', 'email' => 'assign@test']);
        $agent = \App\Models\User::where('email','agent@demo.com')->first();

        $assignResp = $this->withHeader('Authorization', 'Bearer '.$token)
            ->postJson('/api/v1/leads/'.$lead->id.'/assign', ['assignee_id' => $agent->id]);

        $assignResp->assertStatus(200)->assertJson(['status' => 'assigned']);
    }
}
