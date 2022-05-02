<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

test('greets the user if they are signed out', function () {
    get('/')
        ->assertSee('BookFriends')
        ->assertSee('Sign up to get started.')
        ->assertDontSee(['Feed']);
});

test('shows authenticate menu items if the user is signed in', function() {
    //sign in
    $user = User::factory()->create();
    //acting as
    $this->actingAs($user)->get('/')
        ->assertSeeText(['Feed', 'My books', 'Add a book', 'Friend']);
});

test('shows unauthenticate menu items if the user is not signed in', function() {
    
    get('/')
        ->assertSeeText(['Home','Login', 'Register']);
});