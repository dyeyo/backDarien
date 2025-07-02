<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_index()
    {
        $user = User::factory()->create();
        Task::factory()->count(2)->for($user)->create();

        $this->actingAs($user);
        $response = $this->getJson('/api/tasks');

        $response->assertOk();
    }

    public function test_store()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = ['title' => 'Tarea prueba', 'description' => 'desc'];

        $response = $this->postJson('/api/tasks', $data);

        $response->assertCreated()
            ->assertJsonFragment(['title' => 'Tarea prueba']);
    }

    public function test_show_returns_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $response = $this->getJson("/api/tasks/{$task->id}");

        $response->assertOk()
            ->assertJsonFragment([
                'id' => $task->id,
                'title' => $task->title,
            ]);
    }

    public function test_update_modifies_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $data = ['title' => 'Título actualizado', 'description' => 'Descripción nueva'];

        $response = $this->putJson("/api/tasks/{$task->id}", $data);

        $response->assertOk()
            ->assertJsonFragment(['title' => 'Título actualizado']);
    }

    public function test_destroy_deletes_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $response = $this->deleteJson("/api/tasks/{$task->id}");

        $response->assertOk()
            ->assertJsonFragment(['message' => 'Tarea eliminada']);

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
