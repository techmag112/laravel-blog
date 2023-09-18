<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'cover',
        'image',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(related: Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }

}
