<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

/*
 * Test 1: Create a user using model factory and assert DB has the user.
 */
test('can create a user using factory', function () {
    $email = 'factory_user@example.test';

    User::factory()->create([
        'name' => 'Factory User',
        'email' => $email,
        'password' => bcrypt('password'),
    ]);

    $this->assertDatabaseHas('users', ['email' => $email]);
});

/*
 * Test 2: Attempt to register a user via the registration route and assert DB entry.
 * This requires that a POST /register route exists (Laravel Breeze/Jetstream/fortify or similar).
 */
test('can register a user via http', function () {
    $email = 'http_user@example.test';

    $response = $this->post('/register', [
        'name' => 'HTTP User',
        'email' => $email,
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    // Many auth scaffolds redirect after successful registration.
    $response->assertStatus(302);

    $this->assertDatabaseHas('users', ['email' => $email]);
});
