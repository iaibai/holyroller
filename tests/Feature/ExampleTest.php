<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIncrementHolyRoller()
    {
        $response = $this->get('/');
        $response->assertSee("Previous Rolls");
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testThatPreviousRollsIncludesPreviousRollFirst()
    {
        $response = $this->post('/roll');
        $firstRoll = $response->json()['roll'];

        $response = $this->get('/roll');
        $responseJ = $response->json();
        $this->assertEquals($firstRoll, array_values($responseJ)[0]['roll']);
    }
}
