<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Illuminate\Config;

class StateTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testApiGet()
    {
        $this->user = User::first();
        Passport::actingAs($this->user);
        $response = $this->get('/api/v1/states');
        $response->assertStatus(200);
    }

    public function testApiFilter()
    {
        //@todo: Implement
        $this->assertTrue(true);
    }

    public function testApiNestedFilter()
    {
        //@todo: Implement
        $this->assertTrue(true);
    }

    public function testApiCreate()
    {
        //@todo: Implement
        $this->assertTrue(true);
    }

    public function testApiDeepCreate()
    {
        //@todo: Implement
        $this->assertTrue(true);
    }

    public function testApiUpdate()
    {
        //@todo: Implement
        $this->assertTrue(true);
    }

    public function testApiDelete()
    {
        //@todo: Implement
        $this->assertTrue(true);
    }
}
