<?php

use App\Models\Friendship;
use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('allows a user to send a friend request', function () {
    $sender = User::factory()->create();
    $receiver = User::factory()->create();

    $friendship = Friendship::factory()->create([
        'user_id' => $sender->id,
        'friend_id' => $receiver->id,
    ]);

    expect($friendship->isPending())->toBeTrue();

    $this->assertDatabaseHas('friendships', [
        'user_id' => $sender->id,
        'friend_id' => $receiver->id,
        'status' => 'pending',
    ]);
});
