<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

it('redirect authenticated user', function () {

    expect(User::factory()->create())->toBeRedirectedFor('/auth/login');
});


it('shows an errors if the details not provider', function () {
    
    post('/login')
        ->assertSessionHasErrors(['email', 'password']);
});


it('logs the user in ')
    ->tap(function() {
        $user = User::factory()->create([
            'password' => bcrypt('vivaverdi')
        ]);
        
        post('login',[
            'email' => $user->email,
            'password' => 'vivaverdi'
        ]);
    })->assertAuthenticated();


it('shows the login page')
    ->get('/auth/login')
    ->assertOk();