<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostCDAG extends Model
{
    use HasFactory;

    protected $table = 'posts_cdag';

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'excerpt',
        'views',
        'category',
        'published_at',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'is_published' => 'boolean',
            'views' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserCDAG::class, 'user_id');
    }
}