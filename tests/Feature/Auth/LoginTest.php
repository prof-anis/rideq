<?php

use App\Models\User;

it('redirects guests from the dashboard to the login screen', function () {
    $this->get('/dashboard')
        ->assertRedirect('/login');
});

it('renders the login screen', function () {
    $this->get('/login')
        ->assertOk();
});

it('authenticates users with valid credentials', function () {
    $user = User::factory()->create([
        'email' => 'ops@rideq.test',
        'password' => 'secret-password',
    ]);

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'secret-password',
    ]);

    $this->assertAuthenticatedAs($user);
    $response->assertRedirect('/dashboard');
});

it('rejects invalid credentials', function () {
    $user = User::factory()->create([
        'email' => 'ops@rideq.test',
        'password' => 'secret-password',
    ]);

    $response = $this->from('/login')->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
    $response->assertRedirect('/login');
    $response->assertSessionHasErrors('email');
});
