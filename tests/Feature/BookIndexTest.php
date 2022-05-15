<?php

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

beforeEach(function() {
    $this->user = User::factory()->create();
});

it('shows books the user wants to read', function () {
    $this->user->books()->attach($book = Book::factory()->create(), [
        'status' => 'WANT_TO_READ'
    ]);

    actingAs($this->user)
        ->get('/')
        ->assertSeeText('Want to read')
        ->assertSeeText($book->title);


});

it('shows books the user is reading', function () {
    $this->user->books()->attach($book = Book::factory()->create(), [
        'status' => 'READING'
    ]);

    actingAs($this->user)
        ->get('/')
        ->assertSeeText('Reading')
        ->assertSeeText($book->title);


});

it('shows books the user has read', function () {
    $this->user->books()->attach($book = Book::factory()->create(), [
        'status' => 'READ'
    ]);

    actingAs($this->user)
        ->get('/')
        ->assertSeeText('Read')
        ->assertSeeText($book->title);


});
