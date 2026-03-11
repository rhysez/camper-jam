<?php

use App\Models\Friendship;
use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

test('index returns accepted friends for authenticated user', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $otherUser = User::factory()->create();

    Friendship::factory()->create([
        'user_id' => $user->id,
        'friend_id' => $otherUser->id,
        'status' => 'accepted',
    ]);

    Friendship::factory(4)->create([
        'user_id' => $user->id,
        'status' => 'accepted',
    ]);

    $response = $this->get('/friends');

    $response->assertStatus(200);
    $response->assertInertia(fn (Assert $page) => $page
        ->has('friends', $user->friends()->count())
        ->where('friends', function ($friends) use ($otherUser) {
            return collect($friends)->contains('id', $otherUser->id);
        })
        ->where('friends', function ($friends) {
            return collect($friends)->doesntContain('status', 'pending');
        })
        ->where('friends', function ($friends) {
            return collect($friends)->doesntContain('status', 'declined');
        })
    );
});

test('index filters friends by status', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $acceptedFriendship = Friendship::factory()->create(['user_id' => $user->id, 'status' => 'accepted']);
    $pendingFriendship = Friendship::factory()->create(['user_id' => $user->id, 'status' => 'pending']);

    $response = $this->get('/friends?status=pending');

    $response->assertInertia(fn (Assert $page) => $page
        ->has('friends', 1)
        ->where('friends.0.id', $pendingFriendship->friend_id)
    );

    $response = $this->get('/friends');

    $response->assertInertia(fn (Assert $page) => $page
        ->has('friends', 1)
        ->where('friends.0.id', $acceptedFriendship->friend_id)
    );
});

test('index returns 401 for unauthenticated user', function () {
    $response = $this->getJson('/friends');
    $response->assertStatus(401);
});


