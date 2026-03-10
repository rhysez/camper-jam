<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Friendship extends Pivot
{
    protected $table = 'friendships';

    protected $casts = [
        'accepted_at' => 'datetime',
    ];

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isAccepted(): bool
    {
        return $this->status === 'accepted';
    }

    public function isBlocked(): bool
    {
        return $this->status === 'blocked';
    }
}
