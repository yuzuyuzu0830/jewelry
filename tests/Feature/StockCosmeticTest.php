<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\StockCosmetic;

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

        $response = $this
        ->actingAs($user);

        $response = $this->actingAs($user)->get(route('list_of_stock'));

        $response->assertStatus(200);
    }

    public function testStore() {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('post_stock'));

        $response->assertStatus(200)
        ->assertViewIs('list_of_stock');
    }

    public function testEdit() {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('edit_stock'));

        $response->assertStatus(200)
        ->assertViewIs('list_of_stock');
    }

    public function testShow() {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('show_stock'));

        $response->assertStatus(200)
        ->assertViewIs('list_of_stock');
    }


    public function testGetSeeder()
    {
        $stocks = StockCosmetic::all();
        $this->assertEquals(20, count($stocks));
        $stock1 = StockCosmetic::where('brand', "エテュセ")->first();
        $this->assertTrue($stock1);
    }

    public function testStockDetail() {
        $tasks = StockCosmetic::find(2);
        $this->assertEquals('マスカラ', $tasks->product);
    }

    public function testDeleteStock() {
        $this->assertDatabaseHas('マスカラ', $this->product->toArray());

        $response = $this->delete('destroy_stock' . $this->stock_cosmetic->id);

        $response->assertStatus(302)
            ->assertRedirect('list_of_stock');

        $this->assertDatabaseMissing('product', $this->product->toArray());
    }
}
