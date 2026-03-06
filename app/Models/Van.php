<?php

namespace App\Models;

use App\Enums\Wheelbase;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Van extends Model
{
    /** @use HasFactory<\Database\Factories\VanFactory> */
    use HasFactory, HasUuids;

    protected $casts = [
        'wheelbase' => Wheelbase::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
