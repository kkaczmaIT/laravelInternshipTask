<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\ClientController;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/clients');

        $response->assertStatus(200);
    }
}
