<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);


test('has errors if the details are not provided')
    ->post('/register')
    ->assertSessionHasErrors(['name', 'email', 'password']);

it('can register a user')
    ->tap(fn () =>
        $this->post('/register', [
            'name' => 'Germano Gritti',
            'email' => 'gritti@mail.com',
            'password' => 'vivaverdi'
        ])
        ->assertRedirect('/')
    )
    ->assertDatabaseHas('users', [
        'email' => 'gritti@mail.com'
    ])
    ->assertAuthenticated();
