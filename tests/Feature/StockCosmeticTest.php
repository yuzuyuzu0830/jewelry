<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StockCosmeticTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('list_of_stock');

        $response->assertStatus(200);
    }
}
