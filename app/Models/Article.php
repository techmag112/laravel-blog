<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'cover',
        'image',
    ];

    public function categories(): BelongsToMany
    {
        return $this->BelongsToMany(related: Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }

}
