<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\NewItem;

class NewItemTest extends TestCase
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

        $response = $this->actingAs($user)->get(route('list_of_item'));

        $response->assertStatus(200);
    }

    public function testStore() {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('post_item'));

        $response->assertStatus(200)
        ->assertViewIs('list_of_item');
    }

    public function testEdit() {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('edit_item'));

        $response->assertStatus(200)
        ->assertViewIs('list_of_item');
    }

    public function testShow() {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('show_item'));

        $response->assertStatus(200)
        ->assertViewIs('list_of_item');
    }


    public function testGetSeeder()
    {
        $items = NewItem::all();
        $this->assertEquals(20, count($items));
        $item1 = NewItem::where('brand', 'エクセル')->first();
        $this->assertTrue($item1);
    }

    public function testItemDetail() {
        $items = NewItem::find(2);
        $this->assertEquals('リップ', $items->product);
    }

    public function testDeleteItem() {
        $this->assertDatabaseHas('リップ', $this->product->toArray());

        $response = $this->delete('destroy_item' . $this->new_item->id);

        $response->assertStatus(302)
            ->assertRedirect('list_of_item');

        $this->assertDatabaseMissing('product', $this->product->toArray());
    }
}
