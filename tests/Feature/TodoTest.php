<?php

beforeEach(function () {
    $this->seed(\Database\Seeders\TodoSeeder::class);
});

test('if authenticated user can see his own todos', function () {
    $user = \App\Models\User::factory()->create();

    $this->actingAs($user);

    $response = $this->get('/tarefas');

    $response->assertSee('Minhas tarefas');

    $response->assertViewHas('todos', $user->todos);

    $response->assertStatus(200);
});
