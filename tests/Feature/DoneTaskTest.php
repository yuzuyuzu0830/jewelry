<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\DoneTask;

class DoneTaskTest extends TestCase
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
        ->actingAs($user)
        ->get('/home');

        $response->assertStatus(200);
    }

    public function testGetSeeder() {
        $tasks = DoneTask::all();
        $this->assertEquals(5, count($tasks));
        $task1 = DoneTask::where('title', "ブラシ洗浄")->first();
        $task1 = DoneTask::where('title', "顔のパック")->first();
        $this->assertTrue($task1);
    }

    public function testStore() {
        $user = factory(User::class)->create();

        $response = $this
        ->actingAs($user)
        ->get(route('done_task'));

        $response->assertStatus(200)
        ->assertViewIs('home');
    }
}
