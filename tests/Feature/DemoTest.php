<?php

namespace Tests\Feature;

use Tests\TestCase;

class DemoTest extends TestCase
{
    public function test_health_endpoint()
    {
        $response = $this->getJson('/api/v1/health');
        $response->assertStatus(200)->assertJson(['status' => 'ok']);
    }
}
