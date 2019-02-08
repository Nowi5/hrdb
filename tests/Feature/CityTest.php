<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Illuminate\Config;

class CityTest extends TestCase
{

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testApiGet()
    {
        $this->user = User::first();
        Passport::actingAs($this->user);
        $response = $this->get('/api/v1/cities');
        $response->assertStatus(200);
    }

    public function testApiFilter()
    {
        $this->user = User::first();
        Passport::actingAs($this->user);
        $response = $this->get('/api/v1/cities?filter[name]=Monheim');
        $response->assertStatus(200);
    }

    public function testApiNestedFilter()
    {
        $this->user = User::first();
        Passport::actingAs($this->user);
        $response = $this->get('/api/v1/cities?filter[country.name]=Germany');
        $response->assertStatus(200);
    }

    public function testApiCreate()
    {
        $this->user = User::first();
        Passport::actingAs($this->user);
        $response = $this->json('POST', 'api/v1/cities',
            [
                "name" => "TestCity4",
                "postalcode" => "99999",
                "state_id" => 1,
                "country_id" => 38
            ]
        );

        $response->assertStatus(201); // can be 200 in case City already existed
                 // ->assertJson(['created' => true,]);
    }

    public function testApiDeepCreate()
    {
        $this->user = User::first();
        Passport::actingAs($this->user);
        $response = $this->json('POST', 'api/v1/cities',
            [
                "name" => "TestCity2",
                "postalcode" => "00000",
                "state" =>
                    [
                        // "id" => 1, // if ID is given, rest is optional
                        "name" => "Brandenburg",
                        "name_alternative" => "BB",
                    ],
                "country" =>
                    [
                        // "id" =>  38, // if ID is given, rest is optional
                        "iso2" => "DE",
                        "name" => "Deutschland",
                        "name_long" =>  "Bundesrepublik Deutschland"
                    ]
            ]
        );

        $response->assertStatus(201); // can be 200 in case City already existed
        // ->assertJson(['created' => true,]);
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
