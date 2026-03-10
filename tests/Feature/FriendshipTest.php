<?php

use App\Models\Friendship;
use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

it('allows a user to send a friend request', function () {
    $sender = User::factory()->create();
    $receiver = User::factory()->create();

    $friendship = Friendship::create([
        'user_id' => $sender->id,
        'friend_id' => $receiver->id,
        'status' => 'pending',
    ]);

    expect($friendship->isPending())->toBeTrue();

    $this->assertDatabaseHas('friendships', [
        'user_id' => $sender->id,
        'friend_id' => $receiver->id,
        'status' => 'pending',
    ]);
});
