<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserLog extends Model
{
    use HasFactory;

    public function __construct()
    {
    }

    protected $fillable = [
        'type',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
