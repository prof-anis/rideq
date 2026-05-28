<?php

use App\Models\User;

it('allows an internal user to sign in from the login screen', function () {
    User::factory()->create([
        'name' => 'RideQ Ops',
        'email' => 'ops@rideq.test',
        'password' => 'secret-password',
    ]);

    visit('/login')
        ->assertSee('Sign in with your work account')
        ->fill('Email address', 'ops@rideq.test')
        ->fill('Password', 'secret-password')
        ->press('Sign in to RideQ')
        ->assertPathIs('/dashboard')
        ->assertSee('Signed in as')
        ->assertSee('RideQ Ops');
});

it('shows an error when invalid credentials are submitted in the browser', function () {
    User::factory()->create([
        'email' => 'ops@rideq.test',
        'password' => 'secret-password',
    ]);

    visit('/login')
        ->fill('Email address', 'ops@rideq.test')
        ->fill('Password', 'wrong-password')
        ->press('Sign in to RideQ')
        ->assertPathIs('/login')
        ->assertSee('These credentials do not match our records.');
});
